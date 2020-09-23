<?php
/**
 * Copyright 2011-2017 Nick Korbel
 *
 * This file is part of Booked Scheduler.
 *
 * Booked Scheduler is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Booked Scheduler is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(ROOT_DIR . 'Pages/Admin/ManageBlackoutsPage.php');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'Presenters/ActionPresenter.php');
require_once(ROOT_DIR . 'lib/Application/Reservation/namespace.php');

class ManageBlackoutsActions
{
	const ADD = 'add';
	const DELETE = 'delete';
	const LOAD = 'load';
	const UPDATE = 'update';
	const DELETE_MULTIPLE = 'deleteMultiple';
}

class ManageBlackoutsPresenter extends ActionPresenter
{
	/**
	 * @var IManageBlackoutsPage
	 */
	private $page;

	/**
	 * @var IManageBlackoutsService
	 */
	private $manageBlackoutsService;

	/**
	 * @var IScheduleRepository
	 */
	private $scheduleRepository;

	/**
	 * @var IResourceRepository
	 */
	private $resourceRepository;

	/**
     * @var IAnnouncementRepository
     */
    private $announcementRepository;

	public function __construct(
			IManageBlackoutsPage $page,
			IManageBlackoutsService $manageBlackoutsService,
			IScheduleRepository $scheduleRepository,
			IResourceRepository $resourceRepository)
	{
		parent::__construct($page);

		$this->page = $page;
		$this->manageBlackoutsService = $manageBlackoutsService;
		$this->scheduleRepository = $scheduleRepository;
		$this->resourceRepository = $resourceRepository;

		$this->AddAction(ManageBlackoutsActions::ADD, 'AddBlackout');
		$this->AddAction(ManageBlackoutsActions::DELETE, 'DeleteBlackout');
		$this->AddAction(ManageBlackoutsActions::LOAD, 'LoadBlackout');
		$this->AddAction(ManageBlackoutsActions::UPDATE, 'UpdateBlackout');
		$this->AddAction(ManageBlackoutsActions::DELETE_MULTIPLE, 'DeleteMultiple');
	}

	public function PageLoad($userTimezone)
	{
		$session = ServiceLocator::GetServer()->GetUserSession();

		$this->page->BindSchedules($this->scheduleRepository->GetAll());
		$this->page->BindResources($this->resourceRepository->GetResourceList());

		$startDateString = $this->page->GetStartDate();
		$endDateString = $this->page->GetEndDate();

		// $startDate = $this->GetDate($startDateString, $userTimezone, -7);
		// $endDate = $this->GetDate($endDateString, $userTimezone, 7);
		$startDate = "";
		$endDate = "";
		$scheduleId = $this->page->GetScheduleId();
		$resourceId = $this->page->GetResourceId();

		$this->page->SetStartDate($startDate);
		$this->page->SetEndDate($endDate);
		$this->page->SetScheduleId($scheduleId);
		$this->page->SetResourceId($resourceId);

		$filter = new BlackoutFilter($startDate, $endDate, $scheduleId, $resourceId);

		$blackouts = $this->manageBlackoutsService->LoadFiltered($this->page->GetPageNumber(),
																 $this->page->GetPageSize(),
																 $this->page->GetSortField(),
																 $this->page->GetSortDirection(),
																 $filter,
																 $session);

		$this->page->BindBlackouts($blackouts->Results());
		$this->page->BindPageInfo($blackouts->PageInfo());

		$this->page->ShowPage();
	}

	private function GetDate($dateString, $timezone, $defaultDays)
	{
		$date = null;
		if (is_null($dateString))
		{
			$date = Date::Now()->AddDays($defaultDays)->ToTimezone($timezone)->GetDate();

		}
		elseif (!empty($dateString))
		{
			$date = Date::Parse($dateString, $timezone);
		}

		return $date;
	}

	public function AddBlackout()
	{
		$session = ServiceLocator::GetServer()->GetUserSession();

		$resourceIds = array();
		if ($this->page->GetApplyBlackoutToAllResources())
		{
			$scheduleId = $this->page->GetBlackoutScheduleId();
			$resources = $this->resourceRepository->GetScheduleResources($scheduleId);
			foreach ($resources as $resource)
			{
				$resourceIds[] = $resource->GetId();
			}
		}
		else
		{
			$resourceIds[] = $this->page->GetBlackoutResourceId();
		}

		$startDate = $this->page->GetBlackoutStartDate();
		$startTime = $this->page->GetBlackoutStartTime();
		$endDate = $this->page->GetBlackoutEndDate();
		$endTime = $this->page->GetBlackoutEndTime();

		$announceStartDate = $this->page->GetAnnounceStartDate();
		$announceStartTime = $this->page->GetAnnounceStartTime();
		$announceEndDate = $this->page->GetAnnounceEndDate();
		$announceEndTime = $this->page->GetAnnounceEndTime();

		$config = Configuration::Instance();

		$hostname = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_HOSTSPEC);
		$database_name = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_NAME);
		$database_user = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_USER);
		$database_password = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_PASSWORD);

		$conn = new mysqli($hostname, $database_user, $database_password, $database_name);
		// Check connection
		if ($conn->connect_error) {
		} else{
		}
		// $ann_resourceIds = "";

		// for($i = 0 ; $i < count($resourceIds) ; $i++){
		// 	if($i != 0){
		// 		$ann_resourceIds .= ',';
		// 	}
		// 	$sql2 = "SELECT name FROM `resources` WHERE resource_id = ".$resourceIds[$i] ;
		// 	$result_sql = $conn->query($sql2);
		// 	$row = $result_sql->fetch_assoc();
		// 	$ann_resourceIds .= $row["name"];

		// }
		$ann_announcement_text = "Black out";
		$ann_start_date = $announceStartDate ;
		$ann_end_date = $announceEndDate;
		$ann_start_time = $announceStartTime;
		$ann_end_time = $announceEndTime;

		$sql2 = "INSERT INTO announcements (announcement_text, start_date, end_date, start_time, end_time)	VALUES ('".$ann_announcement_text."','".$ann_start_date."','".$ann_end_date."','".$ann_start_time."','".$ann_end_time."')" ;
		$result_sql = $conn->query($sql2);
		$announce_id = $conn->insert_id;

		$blackoutDate = DateRange::Create($startDate . ' ' . $startTime, $endDate . ' ' . $endTime, $session->Timezone);

		$title = $this->page->GetBlackoutTitle();
		$conflictAction = $this->page->GetBlackoutConflictAction();

		$repeatOptionsFactory = new RepeatOptionsFactory();
		$repeatOptions = $repeatOptionsFactory->CreateFromComposite($this->page, $session->Timezone);

		$result = $this->manageBlackoutsService->Add($blackoutDate, $resourceIds, $title, ReservationConflictResolution::Create($conflictAction),
													 $repeatOptions, $announce_id);

		if($result->WasSuccessful() == false){
			$sql2 = "DELETE FROM announcements WHERE announcementid = ".$announce_id;
			$result_sql = $conn->query($sql2);
		}

		$this->page->ShowAddResult($result->WasSuccessful(), $result->Message(), $result->ConflictingReservations(), $result->ConflictingBlackouts(),
								   $session->Timezone);

		//add anno
		/*$user = ServiceLocator::GetServer()->GetUserSession();
        $text = "Blackout has create :".$this->page->GetBlackoutStartDate()."(".$this->page->GetBlackoutStartTime().")";
        $start = Date::Parse($this->page->GetBlackoutStartDate(), $user->Timezone);
        $timeStart = $this->page->GetBlackoutStartTime();
        $end = Date::Parse($this->page->GetBlackoutEndDate(), $user->Timezone);
        $timeend = $this->page->GetBlackoutEndTime();
        $priority = "0";
        $groupIds = array();
        $resourceIds = array();
        $sendAsEmail = true;

        Log::Debug('Adding new Announcement form balckout time');
       // $announcement = Announcement::Create($text, $start, $end, $priority, $groupIds, $resourceIds,$timeStart,$timeend );
        $this->announcementRepository->AddAnnouncement($announcement);

       /* if ($sendAsEmail) {
            $this->SendAsEmail($announcement, $user);
		}*/
		//-- end add anno
	}

	public function DeleteBlackout()
	{
		$id = $this->page->GetBlackoutId();
		$scope = $this->page->GetSeriesUpdateScope();

		Log::Debug('Deleting blackout. BlackoutId=%s, DeleteScope=%s', $id, $scope);

		$this->manageBlackoutsService->Delete($id, $scope);
	}

	public function LoadBlackout()
	{
		$id = $this->page->GetBlackoutId();
		$session = ServiceLocator::GetServer()->GetUserSession();

		Log::Debug('Loading blackout for editing. Id=%s', $id);
		$series = $this->manageBlackoutsService->LoadBlackout($id, $session->UserId);

		if ($series != null)
		{
			$announce_id = $series->AnnounceId();
			$this->page->SetAnnounceId($announce_id);
			if($announce_id != null && $announce_id != 0)
			{
				$config = Configuration::Instance();

				$hostname = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_HOSTSPEC);
				$database_name = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_NAME);
				$database_user = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_USER);
				$database_password = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_PASSWORD);

				$conn = new mysqli($hostname, $database_user, $database_password, $database_name);
				// Check connection
				if ($conn->connect_error) {
				} else{
				}

				$sql2 = "SELECT * FROM `announcements` WHERE announcementid = ".$announce_id ;
				$result_sql = $conn->query($sql2);
				$row = $result_sql->fetch_assoc();

				$startAnnounceDate = $row["start_date"];
				$endAnnounceDate = $row["end_date"];
				$startAnnounceTime = $row["start_time"];
				$endAnnounceTime = $row["end_time"];

				$this->page->SetAnnounceStartDate($startAnnounceDate);
				$this->page->SetAnnounceEndDate($endAnnounceDate);
				$this->page->SetAnnounceStartTime($startAnnounceTime);
				$this->page->SetAnnounceEndTime($endAnnounceTime);
			}

			$this->page->BindResources($this->resourceRepository->GetResourceList());
			$this->page->SetBlackoutResources($series->ResourceIds());
			$this->page->SetBlackoutId($id);
			$this->page->SetBlackoutStartDate($series->CurrentBlackout()->StartDate()->ToTimezone($session->Timezone));
			$this->page->SetBlackoutEndDate($series->CurrentBlackout()->EndDate()->ToTimezone($session->Timezone));
			$this->page->SetTitle($series->Title());
			$this->page->SetIsRecurring($series->RepeatType() != RepeatType::None);
			$repeatConfiguration = $series->RepeatConfiguration();
			$this->page->SetRepeatInterval($repeatConfiguration->Interval);
			$this->page->SetRepeatMonthlyType($repeatConfiguration->MonthlyType);
			if ($repeatConfiguration->TerminationDate != null)
			{
				$this->page->SetRepeatTerminationDate($repeatConfiguration->TerminationDate->ToTimezone($session->Timezone));
			}
			$this->page->SetRepeatType($repeatConfiguration->Type);
			$this->page->SetRepeatWeekdays($repeatConfiguration->Weekdays);
			$this->page->SetWasBlackoutFound(true);
		}
		else
		{
			$this->page->SetWasBlackoutFound(false);
		}

		$this->page->ShowBlackout();
	}

	public function UpdateBlackout()
	{
		$session = ServiceLocator::GetServer()->GetUserSession();

		$id = $this->page->GetUpdateBlackoutId();
		$announce_id = $this->page->GetAnnounceId();
		$scope = $this->page->GetSeriesUpdateScope();

		Log::Debug('Updating blackout. BlackoutId=%s, UpdateScope=%s', $id, $scope);

		$resourceIds = $this->page->GetBlackoutResourceIds();
		$startDate = $this->page->GetBlackoutStartDate();
		$startTime = $this->page->GetBlackoutStartTime();
		$endDate = $this->page->GetBlackoutEndDate();
		$endTime = $this->page->GetBlackoutEndTime();
		$blackoutDate = DateRange::Create($startDate . ' ' . $startTime, $endDate . ' ' . $endTime, $session->Timezone);

		$title = $this->page->GetBlackoutTitle();
		$conflictAction = $this->page->GetBlackoutConflictAction();

		$announceStartDate = $this->page->GetAnnounceStartDate();
		$announceStartTime = $this->page->GetAnnounceStartTime();
		$announceEndDate = $this->page->GetAnnounceEndDate();
		$announceEndTime = $this->page->GetAnnounceEndTime();

		$repeatOptionsFactory = new RepeatOptionsFactory();
		$repeatOptions = $repeatOptionsFactory->CreateFromComposite($this->page, $session->Timezone);

		$result = $this->manageBlackoutsService->Update($id, $blackoutDate, $resourceIds, $title, ReservationConflictResolution::Create($conflictAction),
														$repeatOptions, $scope);

		if($result->WasSuccessful())
		{
			if(isset($announce_id) && $announce_id != null && $announce_id != "" && $announce_id != 0)
			{
				$config = Configuration::Instance();

				$hostname = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_HOSTSPEC);
				$database_name = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_NAME);
				$database_user = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_USER);
				$database_password = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_PASSWORD);

				$conn = new mysqli($hostname, $database_user, $database_password, $database_name);
				// Check connection
				if ($conn->connect_error) {
				} else{
				}
				// $ann_resourceIds = "";

				// for($i = 0 ; $i < count($resourceIds) ; $i++){
				// 	if($i != 0){
				// 		$ann_resourceIds .= ',';
				// 	}
				// 	$sql2 = "SELECT name FROM `resources` WHERE resource_id = ".$resourceIds[$i] ;
				// 	$result_sql = $conn->query($sql2);
				// 	$row = $result_sql->fetch_assoc();
				// 	$ann_resourceIds .= $row["name"];

				// }
				$ann_announcement_text = "Black out" ;
				$ann_start_date = $announceStartDate ;
				$ann_end_date = $announceEndDate;
				$ann_start_time = $announceStartTime;
				$ann_end_time = $announceEndTime;

				$sql2 = "UPDATE announcements SET announcement_text = '".$ann_announcement_text."', start_date = '".$ann_start_date."', end_date = '".$ann_end_date."', start_time = '".$ann_start_time."', end_time = '".$ann_end_time."' WHERE announcementid = ".$announce_id ;
				$result_sql = $conn->query($sql2);
			}
		}

		$this->page->ShowUpdateResult($result->WasSuccessful(), $result->Message(), $result->ConflictingReservations(), $result->ConflictingBlackouts(),
									  $session->Timezone);
	}

	public function DeleteMultiple()
	{
		$ids = $this->page->GetDeletedBlackoutIds();
		Log::Debug('Blackout multiple delete. Ids=%s', implode(',', $ids));
		foreach ($ids as $id)
		{
			$this->manageBlackoutsService->Delete($id, SeriesUpdateScope::FullSeries);
		}
	}
}