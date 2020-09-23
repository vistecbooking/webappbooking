<?php
/**
Copyright 2011-2017 Nick Korbel

This file is part of Booked Scheduler.

Booked Scheduler is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Booked Scheduler is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(ROOT_DIR . 'config/timezones.php');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'lib/Config/namespace.php');
require_once(ROOT_DIR . 'lib/Common/namespace.php');
require_once(ROOT_DIR . 'lib/Graphics/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Attributes/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Admin/ImageUploadDirectory.php');
require_once(ROOT_DIR . 'Presenters/ActionPresenter.php');

class ProfileActions
{
	const Update = 'update';
	const ChangeDefaultSchedule = 'changeDefaultSchedule';
	const ActionChangeImage = 'image';
	const ActionRemoveImage = 'removeImage';
}

class ProfilePresenter extends ActionPresenter
{
	/**
	 * @var IProfilePage
	 */
	private $page;

	/**
	 * @var UserRepository
	 */
	private $userRepository;

	/**
	 * @var IAttributeService
	 */
	private $attributeService;

	/**
     * @var IPositionViewRepository
     */
	private $positionViewRepository;
	
	/**
	 * @var IImageFactory
	 */
	private $imageFactory;

	public function __construct(IProfilePage $page, IUserRepository $userRepository,
								IAttributeService $attributeService, 
								IPositionViewRepository $positionViewRepository,
								IImageFactory $imageFactory)
	{
		parent::__construct($page);

		$this->page = $page;
		$this->userRepository = $userRepository;
		$this->attributeService = $attributeService;
		$this->positionViewRepository = $positionViewRepository;
		$this->imageFactory = $imageFactory;

		$this->AddAction(ProfileActions::Update, 'UpdateProfile');
		$this->AddAction(ProfileActions::ChangeDefaultSchedule, 'ChangeDefaultSchedule');
		$this->AddAction(ProfileActions::ActionChangeImage, 'ChangeImage');
		$this->AddAction(ProfileActions::ActionRemoveImage, 'RemoveImage');
	}

	public function PageLoad()
	{
		$userSession = ServiceLocator::GetServer()->GetUserSession();

		Log::Debug('ProfilePresenter loading user %s', $userSession->UserId);

		$user = $this->userRepository->LoadById($userSession->UserId);
		$isUser = $user->IsUser();

		$this->page->SetUsername($user->Username());
		$this->page->SetFirstName($user->FirstName());
		$this->page->SetLastName($user->LastName());
		$this->page->SetEmail($user->EmailAddress());
		$this->page->SetHomepage($user->Homepage());
		if($isUser)
		{
			$this->page->SetNickName($user->NickName());
			$this->page->SetAdvisor($user->AdvisorName());
			$this->page->SetLine($user->LineID());
			$this->page->SetStudent($user->StudentID());
			$this->page->SetProfile($user->ProfileImg());
		}
		$this->page->SetPhone($user->GetAttribute(UserAttribute::Phone));
		$this->page->SetOrganization($user->GetAttribute(UserAttribute::Organization));
		$this->page->SetPosition($user->GetAttribute(UserAttribute::PositionId), $user->GetAttribute(UserAttribute::PositionName));

		$positions = $this->positionViewRepository->GetList();
        $this->page->BindPositions($positions->Results());
		
		$userId = $userSession->UserId;
		$this->page->SetAttributes($this->GetAttributes($userId));

		$this->PopulateHomepages();
		$this->page->SetAllowedActions(PluginManager::Instance()->LoadAuthentication());
		$this->page->SetIsUser($isUser);
	}

	public function UpdateProfile()
	{
		$userSession = ServiceLocator::GetServer()->GetUserSession();
		Log::Debug('ProfilePresenter updating profile for user %s', $userSession->UserId);

		$user = $this->userRepository->LoadById($userSession->UserId);

		$user->ChangeName($this->page->GetFirstName(), $this->page->GetLastName());
		$user->ChangeEmailAddress($this->page->GetEmail());
		$user->ChangeUsername($this->page->GetLoginName());
		$user->ChangeDefaultHomePage($this->page->GetHomepage());
		if($user->IsUser())
		{
			$user->ChangeNickName($this->page->GetNickName());
			$user->ChangeAdvisorName($this->page->GetAdvisor());
			$user->ChangeStudentID($this->page->GetStudent());
			$user->ChangeLineID($this->page->GetLine());			
		}
		$user->ChangeAttributes($this->page->GetPhone(), $this->page->GetOrganization(), $this->page->GetPosition());
		$user->ChangeCustomAttributes($this->GetAttributeValues());

		$userSession->Email = $this->page->GetEmail();
		$userSession->FirstName = $this->page->GetFirstName();
		$userSession->LastName = $this->page->GetLastName();
		$userSession->HomepageId = $this->page->GetHomepage();

		$this->userRepository->Update($user);
		ServiceLocator::GetServer()->SetUserSession($userSession);
	}

	public function ChangeDefaultSchedule()
	{
		$userSession = ServiceLocator::GetServer()->GetUserSession();
		$scheduleId = $this->page->GetDefaultSchedule();

		Log::Debug('ProfilePresenter updating default schedule to %s for user %s', $scheduleId, $userSession->UserId);

		$user = $this->userRepository->LoadById($userSession->UserId);
		$user->ChangeDefaultSchedule($scheduleId);

		$this->userRepository->Update($user);

		$userSession->ScheduleId = $this->page->GetDefaultSchedule();
		ServiceLocator::GetServer()->SetUserSession($userSession);
	}

	protected function LoadValidators($action)
	{
		if ($action != ProfileActions::Update)
		{
			return;
		}
		$userId = ServiceLocator::GetServer()->GetUserSession()->UserId;
		$this->page->RegisterValidator('fname', new RequiredValidator($this->page->GetFirstName()));
		$this->page->RegisterValidator('username', new RequiredValidator($this->page->GetLoginName()));
		$this->page->RegisterValidator('lname', new RequiredValidator($this->page->GetLastName()));
		$this->page->RegisterValidator('emailformat', new EmailValidator($this->page->GetEmail()));
		$this->page->RegisterValidator('uniqueemail',
									   new UniqueEmailValidator($this->userRepository, $this->page->GetEmail(), $userId));
		$this->page->RegisterValidator('uniqueusername',
									   new UniqueUserNameValidator($this->userRepository, $this->page->GetLoginName(), $userId));
		$this->page->RegisterValidator('additionalattributes',
									   new AttributeValidator($this->attributeService, CustomAttributeCategory::USER, $this->GetAttributeValues(), $userId));
	}

	public function ChangeImage()
	{
		$userSession = ServiceLocator::GetServer()->GetUserSession();

		Log::Debug("Changing profile image for user id %s", $userSession->UserId);

		$uploadedImage = $this->page->GetProfile();

		if ($uploadedImage == null)
		{
			return;
		}

		if ($uploadedImage->IsError())
		{
			die("Image error: " . $uploadedImage->Error());
		}

		$fileType = strtolower($uploadedImage->Extension());

		$supportedTypes = array('jpeg', 'gif', 'png', 'jpg');

		if (!in_array($fileType, $supportedTypes))
		{
			die("Invalid image type: $fileType");
		}

		$imageSize = getimagesize($uploadedImage->TemporaryName());
		$bytesNeeded = $imageSize[0] * $imageSize[1] * 3;
		$memoryLimit = ini_get('memory_limit');
		$currentUsage = memory_get_usage();
		$needed = ($bytesNeeded + $currentUsage) / 1048576;
		$limit = str_replace('M', '', $memoryLimit);

		if ($needed > $limit)
		{
			echo 'Image too big. Resize to a smaller size or reduce the resolution and try again.';
			Log::Error("Uploaded image for %s is too big. Needed %s limit %s", $userSession->UserId, $needed, $limit);
			die();
		}

		$image = $this->imageFactory->Load($uploadedImage->TemporaryName());
		$image->ResizeToWidth(300);
		$now = date('dmYHmi');
		$fileName = "profileuser_{$userSession->UserId}_{$now}.$fileType";
		$imageUploadDirectory = Configuration::Instance()->GetKey(ConfigKeys::IMAGE_UPLOAD_DIRECTORY);

		$path = '';

		if (is_dir($imageUploadDirectory))
		{
			$path = $imageUploadDirectory;
		}
		else
		{
			if (is_dir(ROOT_DIR . $imageUploadDirectory))
			{
				$path = ROOT_DIR . $imageUploadDirectory;
			}
		}

		$path = "$path/profiles/$fileName";
		Log::Debug("Saving profile image $path");

		$image->Save($path);

		$this->SaveProfileImage($fileName);
	}

	public function RemoveImage()
	{
		$this->SaveProfileImage(null);
	}

	/**
	 * @return array|AttributeValue[]
	 */
	private function GetAttributeValues()
	{
		$attributes = array();
		foreach ($this->page->GetAttributes() as $attribute)
		{
			$attributes[] = new AttributeValue($attribute->Id, $attribute->Value);
		}
		return $attributes;
	}

	private function PopulateTimezones()
	{
		$timezoneValues = array();
		$timezoneOutput = array();

		foreach ($GLOBALS['APP_TIMEZONES'] as $timezone)
		{
			$timezoneValues[] = $timezone;
			$timezoneOutput[] = $timezone;
		}

		$this->page->SetTimezones($timezoneValues, $timezoneOutput);
	}

	private function PopulateHomepages()
	{
		$homepageValues = array();
		$homepageOutput = array();

		$pages = Pages::GetAvailablePages();
		foreach ($pages as $pageid => $page)
		{
			$homepageValues[] = $pageid;
			$homepageOutput[] = Resources::GetInstance()->GetString($page['name']);
		}

		$this->page->SetHomepages($homepageValues, $homepageOutput);
	}

    private function GetAttributes($userId)
    {
        $allAttributes = array();

        $attributes = $this->attributeService->GetAttributes(CustomAttributeCategory::USER, $userId);
        $asList = $attributes->GetAttributes($userId);

        foreach ($asList as $a)
        {
            if (!$a->AdminOnly())
            {
                $allAttributes[] = $a;
            }
        }

        return $allAttributes;
	}

	private function SaveProfileImage($fileName)
	{
		$userSession = ServiceLocator::GetServer()->GetUserSession();
		Log::Debug('ProfilePresenter updating profile image for user %s', $userSession->UserId);

		$user = $this->userRepository->LoadById($userSession->UserId);
		$user->ChangeProfileImg($fileName);

		$this->userRepository->UpdateImage($user);
	}
}

