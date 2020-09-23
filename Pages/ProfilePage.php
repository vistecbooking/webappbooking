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

require_once(ROOT_DIR . 'Pages/SecurePage.php');
require_once(ROOT_DIR . 'Presenters/ProfilePresenter.php');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');

interface IProfilePage extends IPage, IActionPage
{
	public function SetFirstName($firstName);

	public function SetLastName($lastName);

	public function SetEmail($email);

	public function SetUsername($username);

	public function SetHomepage($homepageId);

	public function SetHomepages($homepageValues, $homepageOutput);

	public function SetNickName($nickName);

	public function SetStudent($student);

	public function SetLine($line);

	public function SetAdvisor($advisor);

	public function SetProfile($profile);

	public function SetPhone($phone);

	public function SetOrganization($organization);

	public function SetPosition($positionId, $positionName);

	public function SetAttributes($attributes);

	public function SetIsUser($isUser);

	public function GetFirstName();

	public function GetLastName();

	public function GetEmail();

	public function GetLoginName();

	public function GetHomepage();

	public function GetNickName();

	public function GetStudent();

	public function GetAdvisor();

	public function GetLine();

	public function GetProfile();

	public function GetPhone();

	public function GetOrganization();

	public function GetPosition();
	
	public function GetDefaultSchedule();

	/**
	 * @param PositionItemView[] $positions
	*/
	public function BindPositions($positions);

	/**
	 * @abstract
	 * @return AttributeFormElement[]
	 */
	public function GetAttributes();

	/**
	 * @param IAuthenticationActionOptions $options
	 */
	public function SetAllowedActions($options);
}

class ProfilePage extends ActionPage implements IProfilePage
{
	/**
	 * @var \ProfilePresenter
	 */
	private $presenter;

	public function __construct()
	{
		parent::__construct('EditProfile');
		$this->presenter = new ProfilePresenter($this,
												new UserRepository(),
												new AttributeService(new AttributeRepository()),
												new PositionRepository(),
												new ImageFactory());
	}

	public function ProcessPageLoad()
	{
		$this->presenter->PageLoad();
		$this->Display('MyAccount/profile.tpl');
	}

	public function SetFirstName($firstName)
	{
		$this->Set('FirstName', $firstName);
	}

	public function SetEmail($email)
	{
		$this->Set('Email', $email);
	}

	public function SetHomepage($homepageId)
	{
		$this->Set('Homepage', $homepageId);
	}

	public function SetLastName($lastName)
	{
		$this->Set('LastName', $lastName);
	}

	public function SetHomepages($homepageValues, $homepageOutput)
	{
		$this->Set('HomepageValues', $homepageValues);
		$this->Set('HomepageOutput', $homepageOutput);
	}

	public function SetUsername($username)
	{
		$this->Set('Username', $username);
	}

	public function SetNickName($nickName)
	{
		$this->Set('NickName', $nickName);
	}

	public function SetStudent($student)
	{
		$this->Set('StudentID', $student);
	}

	public function SetLine($line)
	{
		$this->Set('LineID', $line);
	}

	public function SetAdvisor($advisor)
	{
		$this->Set('AdvisorName', $advisor);
	}

	public function SetProfile($profile)
	{
		$this->Set('ProfileImg', $profile != null && $profile != "" ? $profile : "noimg.png");
	}
	
	public function SetOrganization($organization)
	{
		$this->Set('Organization', $organization);
	}

	public function SetPhone($phone)
	{
		$this->Set('Phone', $phone);
	}

	public function SetPosition($positionId, $positionName)
	{
		$this->Set('PositionId', $positionId);
		$this->Set('PositionName', $positionName);
	}

	public function SetAttributes($attributes)
	{
		$this->Set('Attributes', $attributes);
	}

	public function SetIsUser($isUser)
	{
		$this->Set('IsUser', $isUser);
	}

	public function GetEmail()
	{
		return $this->GetForm(FormKeys::EMAIL);
	}

	public function GetFirstName()
	{
		return $this->GetForm(FormKeys::FIRST_NAME);
	}

	public function GetLastName()
	{
		return $this->GetForm(FormKeys::LAST_NAME);
	}

	public function GetLoginName()
	{
		return $this->GetForm(FormKeys::USERNAME);
	}

	public function GetHomepage()
	{
		return $this->GetForm(FormKeys::DEFAULT_HOMEPAGE);
	}

	public function GetNickName()
	{
		return $this->GetForm(FormKeys::NICKNAME);
	}

	public function GetStudent()
	{
		return $this->GetForm(FormKeys::STUDENT_ID);
	}

	public function GetAdvisor()
	{
		return $this->GetForm(FormKeys::ADVISOR_NAME);
	}

	public function GetLine()
	{
		return $this->GetForm(FormKeys::LINE_ID);
	}

	public function GetProfile()
	{
		return $this->server->GetFile(FormKeys::PROFILE_IMG);
	}

	public function GetOrganization()
	{
		return $this->GetForm(FormKeys::ORGANIZATION);
	}

	public function GetPhone()
	{
		return $this->GetForm(FormKeys::PHONE);
	}

	public function GetPosition()
	{
		return $this->GetForm(FormKeys::POSITION_ID);
	}

	public function GetAttributes()
	{
		return AttributeFormParser::GetAttributes($this->GetForm(FormKeys::ATTRIBUTE_PREFIX));
	}
	
	/**
	 * @param PositionItemView[] $positions
	*/
	public function BindPositions($positions)
	{
		$this->Set('Positions', $positions);
	}

	/**
	 * @return void
	 */
	public function ProcessAction()
	{
		$this->presenter->ProcessAction();
	}

	public function ProcessDataRequest($dataRequest)
	{
		// no-op
	}

	public function GetDefaultSchedule()
	{
		return $this->server->GetQuerystring(QueryStringKeys::SCHEDULE_ID);
	}

	/**
	 * @param IAuthenticationActionOptions $options
	 */
	public function SetAllowedActions($options)
	{
		$this->Set('AllowEmailAddressChange', $options->AllowEmailAddressChange());
		$this->Set('AllowNameChange', $options->AllowNameChange());
		$this->Set('AllowOrganizationChange', $options->AllowOrganizationChange());
		$this->Set('AllowPhoneChange', $options->AllowPhoneChange());
		$this->Set('AllowPositionChange', $options->AllowPositionChange());
		$this->Set('AllowUsernameChange', $options->AllowUsernameChange());
	}
}