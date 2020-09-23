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

require_once(ROOT_DIR . 'Pages/SecurePage.php');
require_once(ROOT_DIR . 'Presenters/SchedulePresenter.php');
require_once(ROOT_DIR . 'lib/Database/SqlCommand.php');



interface ISchedulePage extends IActionPage
{
	
	/**
	 * @param BookableResource[] $resources
	 */
	public function BindResources($resources);
	/**
	 * Bind schedules to the page
	 *
	 * @param array|Schedule[] $schedules
	 */
	public function SetSchedules($schedules);

	/**
	 * Bind resources to the page
	 *
	 * @param array|ResourceDto[] $resources
	 */
	public function SetResources($resources);

	/**
	 * Bind layout to the page for daily time slot layouts
	 *
	 * @param IDailyLayout $dailyLayout
	 */
	public function SetDailyLayout($dailyLayout);

	/**
	 * Returns the currently selected scheduleId
	 * @return int
	 */
	public function GetScheduleId();

	/**
	 * @param int $scheduleId
	 */
	public function SetScheduleId($scheduleId);

	/**
	 * @param string $scheduleName
	 */
	public function SetScheduleName($scheduleName);

	/**
	 * @param int $firstWeekday
	 */
	public function SetFirstWeekday($firstWeekday);

	/**
	 * Sets the dates to be displayed for the schedule, adjusted for timezone if necessary
	 *
	 * @param DateRange $dates
	 */
	public function SetDisplayDates($dates);

	/**
	 * @param Date $previousDate
	 * @param Date $nextDate
	 */
	public function SetPreviousNextDates($previousDate, $nextDate);

	/**
	 * @return string
	 */
	public function GetSelectedDate();

	/**
	 * @return Date[]
	 */
	public function GetSelectedDates();

	/**
	 * @abstract
	 */
	public function ShowInaccessibleResources();

	/**
	 * @abstract
	 * @param bool $showShowFullWeekToggle
	 */
	public function ShowFullWeekToggle($showShowFullWeekToggle);

	/**
	 * @abstract
	 * @return bool
	 */
	public function GetShowFullWeek();

	/**
	 * @param ScheduleLayoutSerializable $layoutResponse
	 */
	public function SetLayoutResponse($layoutResponse);

	/**
	 * @return string
	 */
	public function GetLayoutDate();

	/**
	 * @param int $scheduleId
	 * @return string|ScheduleStyle
	 */
	public function GetScheduleStyle($scheduleId);

	/**
	 * @param string|ScheduleStyle Direction
	 */
	public function SetScheduleStyle($direction);

	/**
	 * @return int
	 */
	public function GetResourceId();

	/**
	 * @return int[]
	 */
	public function GetResourceIds();

	/**
	 * @param ResourceGroupTree $resourceGroupTree
	 */
	public function SetResourceGroupTree(ResourceGroupTree $resourceGroupTree);

	/**
	 * @param ResourceType[] $resourceTypes
	 */
	public function SetResourceTypes($resourceTypes);

	/**
	 * @param Attribute[] $attributes
	 */
	public function SetResourceCustomAttributes($attributes);

	/**
	 * @param Attribute[] $attributes
	 */
	public function SetResourceTypeCustomAttributes($attributes);

	/**
	 * @return bool
	 */
	public function FilterSubmitted();

	/**
	 * @return int
	 */
	public function GetResourceTypeId();

	/**
	 * @return int
	 */
	public function GetMaxParticipants();

	/**
	 * @return AttributeFormElement[]|array
	 */
	public function GetResourceAttributes();

	/**
	 * @return AttributeFormElement[]|array
	 */
	public function GetResourceTypeAttributes();

	/**
	 * @param ScheduleResourceFilter $resourceFilter
	 */
	public function SetFilter($resourceFilter);

	/**
	 * @param CalendarSubscriptionUrl $subscriptionUrl
	 */
	public function SetSubscriptionUrl(CalendarSubscriptionUrl $subscriptionUrl);

	/**
	 * @param bool $shouldShow
	 */
	public function ShowPermissionError($shouldShow);

	/**
	 * @param UserSession $user
	 * @param Schedule $schedule
	 * @return string
	 */
	public function GetDisplayTimezone(UserSession $user, Schedule $schedule);

	/**
	 * @param Date[] $specificDates
	 */
	public function SetSpecificDates($specificDates);

    /**
     * @return bool
     */
    public function FilterCleared();

}

class ScheduleStyle
{
	const Wide = 'Wide';
	const Tall = 'Tall';
	const Standard = 'Standard';
	const CondensedWeek = 'CondensedWeek';
}

class SchedulePage extends ActionPage implements ISchedulePage
{
	protected $ScheduleStyle = ScheduleStyle::Standard;
	private $resourceCount = 0;

	/**
	 * @var SchedulePresenter
	 */
	protected $_presenter;

	private $_styles = array(
			ScheduleStyle::Wide => 'Schedule/schedule-days-horizontal.tpl',
			ScheduleStyle::Tall => 'Schedule/schedule-flipped.tpl',
			ScheduleStyle::CondensedWeek => 'Schedule/schedule-week-condensed.tpl',
	);

	/**
	 * @var bool
	 */
	private $_isFiltered = true;

	public function __construct()
	{
		parent::__construct('Schedule');

		$permissionServiceFactory = new PermissionServiceFactory();
		$scheduleRepository = new ScheduleRepository();
		$userRepository = new UserRepository();
		$resourceService = new ResourceService(
				new ResourceRepository(),
				$permissionServiceFactory->GetPermissionService(),
				new AttributeService(new AttributeRepository()),
				$userRepository,
				new AccessoryRepository());
		$pageBuilder = new SchedulePageBuilder();
		$reservationService = new ReservationService(new ReservationViewRepository(), new ReservationListingFactory());
		$dailyLayoutFactory = new DailyLayoutFactory();
		$scheduleService = new ScheduleService($scheduleRepository, $resourceService, $dailyLayoutFactory);
		$this->_presenter = new SchedulePresenter($this, $scheduleService, $resourceService, $pageBuilder, $reservationService, $dailyLayoutFactory);
		$this->s=$_GET['s'];
	}

	public function ProcessPageLoad()
	{
		$start = microtime(true);

		$user = ServiceLocator::GetServer()->GetUserSession();

		$this->_presenter->PageLoad($user);

		$endLoad = microtime(true);

		if ($user->IsAdmin && $this->resourceCount == 0 && !$this->_isFiltered)
		{
			$this->Set('ShowResourceWarning', true);
		}

		$this->Set('SlotLabelFactory', new SlotLabelFactory($user));
		$this->Set('DisplaySlotFactory', new DisplaySlotFactory());
		$this->Set('PopupMonths', $this->IsMobile ? 1 : 3);
		$this->Set('CreateReservationPage', Pages::RESERVATION);
		$this->Set('LockTableHead', (int)($this->ScheduleStyle == ScheduleStyle::Tall || (count($this->GetVar('Resources')) > 7 )));
		$this->Set('LoadViewOnly', false);
		$this->Set('ShowSubscription', true);
		$this->set('rid',$_GET["id"]);
		$this->set('Unavailable', isset($_GET["unavailable"]) ? $_GET["unavailable"] : false);
		
		$data['resources']= array();
		$data['pagination']= array();

		$config = Configuration::Instance();

		$hostname = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_HOSTSPEC);
		$database_name = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_NAME);
		$database_user = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_USER);
		$database_password = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_PASSWORD);
			
		$tab = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		// Create connection
		$conn = new mysqli($hostname, $database_user, $database_password, $database_name);
		// Check connection
		if ($conn->connect_error) {
			$this->set('text3',"connect_error");
		} else{
			$this->set('text3',"connected");
		}
		mysqli_set_charset($conn, "utf8");
		
		$page_ = 1;
		if(isset($_GET['page'])){
			$page_ = $_GET['page'];
		}
		$userSession = ServiceLocator::GetServer()->GetUserSession();
		$sql2 = "SELECT group_id FROM `user_groups` WHERE user_id = ".$userSession->UserId ;
		$result_sql = $conn->query($sql2);
		$row = $result_sql->fetch_assoc();
		$group_id = $row["group_id"];
		$this->set('UserGroupId',$group_id);
		$this->set('UserGroupIdSql',$sql2);
		$s = $_GET["s"];
		$bs = $_GET['bs'];
		if($s){
			if($bs){
				$sql = "SELECT resource_id, name, image_name, schedule_id,contact_info,location,notes FROM resources WHERE name LIKE '%$s%' AND resource_type_id = $bs ";
			}else{
				$sql = "SELECT resource_id, name, image_name, schedule_id,contact_info,location,notes FROM resources WHERE name LIKE '%$s%' ";
			}
			
		}else{
			$sql = "SELECT resource_id, name, image_name, schedule_id,contact_info,location,notes FROM resources ";
		}
		$this->set('get_s',$s);
		$this->set('get_bs',$bs);
		$result = $conn->query($sql);
		$pageall =  CEIL($result->num_rows / 8);
		$pageall2 =  $pageall;
		
		$this->set('pagination',$data['pagination']); 
		$this->set('nextPage',$page_+1); 
		$this->set('pageall','1');
		$this->set('loopend',array(1,2,3,4));
	
		$start = ($page_-1)*8;
		$count_per_page = 8;
		if($bs){
			$sql = "SELECT resource_id, name, image_name, schedule_id,status_id,contact_info,location,notes FROM resources WHERE name LIKE '%$s%' AND resource_type_id = $bs ORDER BY name ASC ";
		}else{
			$sql = "SELECT resource_id, name, image_name, schedule_id,status_id,contact_info,location,notes FROM resources WHERE name LIKE '%$s%' ORDER BY name ASC ";
		}
		$this->set('text3',$sql);
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$data['resources'][] = $row;
			}
		} 
		
		$this->Set('resources',$data['resources'] );
		$userSession = ServiceLocator::GetServer()->GetUserSession();
		$user_id = $userSession->UserId;
		$sql2 = "SELECT group_id FROM `user_groups` WHERE user_id = ".$user_id ;
		$result_sql = $conn->query($sql2);
		$row = $result_sql->fetch_assoc();
		$group_id = $row["group_id"];
		if(!$group_id){
			$sql = "SELECT * FROM quotas WHERE  resource_id = ".$_GET['id']." OR resource_id = NULL  AND group_id = NULL  ";
		}else{
			$sql = "SELECT * FROM quotas WHERE  resource_id = ".$_GET['id']." OR resource_id = NULL  AND  group_id = $group_id OR group_id = NULL  ";
		}
		$result_sql = $conn->query($sql);
		if ($result_sql->num_rows > 0) 
		{
			// output data of each row
			while($row = $result_sql->fetch_assoc()) 
			{
				$quota_limit = $row["quota_limit"];
				$duration = $row["duration"];
				$enforced_days = $row["enforced_days"];
				$enforced_time_start = $row["enforced_time_start"];
				$enforced_time_end = $row["enforced_time_end"];
			}
			$continue_sql = "";
			switch ($duration) {
				case "day":
					//code to be executed if n=label1;
					$continue_sql = " AND DATE(T3.start_date)='$date_booked_start_condition'";
					break;
				case "week":
					//code to be executed if n=label2;
					$continue_sql = " AND `start_date` between date_sub('$date_booked_start_condition',INTERVAL 1 WEEK) and '$date_booked_start_condition'";
					break;
				case "month":
					//code to be executed if n=label3;
					$continue_sql = " AND YEAR(`start_date`)=YEAR('$date_booked_start_condition') AND MONTH(`start_date`)=MONTH('$date_booked_start_condition')";
					break;
				default:
					//code to be executed if n is different from all labels;
			}
			//$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE resource_id = $resource_id AND T1.status_id = 1".$continue_sql ;
			if($_GET['id'] == 2)
			{
				$mode = $_GET['mode'];
				if(!$group_id){
					$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = ".$_GET['id']." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T1.mode = '".$mode."' " ;
				}
				else{
					$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = ".$_GET['id']." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T4.group_id = '$group_id' AND T1.mode = '".$mode."' " ;
				}
			}
			else if($_GET['id'] == 24)
			{
				$mode = $_GET['mode'];
				if($_GET['mode'] == "ES-QTOF mode")
				{
					if(!$group_id){
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = ".$_GET['id']." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T1.mode = '".$mode."' " ;
					}
					else{
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = ".$_GET['id']." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T4.group_id = '$group_id' AND T1.mode = '".$mode."' " ;
					}
				}
				else
				{
					if(!$group_id){
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = ".$_GET['id']." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 0 OR WEEKDAY(T3.start_date) = 1 OR WEEKDAY(T3.start_date) = 2 OR WEEKDAY(T3.start_date) = 6 ) AND T1.mode = '".$mode."' " ;
						$sql_sum_hour_ = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = ".$_GET['id']." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 3 OR WEEKDAY(T3.start_date) = 4 OR WEEKDAY(T3.start_date) = 5 ) AND T1.mode = '".$mode."' " ;
					}
					else{
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = ".$_GET['id']." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 0 OR WEEKDAY(T3.start_date) = 1 OR WEEKDAY(T3.start_date) = 2 OR WEEKDAY(T3.start_date) = 6 ) AND T4.group_id = '$group_id' AND T1.mode = '".$mode."' " ;
						$sql_sum_hour_ = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = ".$_GET['id']." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 3 OR WEEKDAY(T3.start_date) = 4 OR WEEKDAY(T3.start_date) = 5 ) AND T4.group_id = '$group_id' AND T1.mode = '".$mode."' " ;
					}
				}
			}
			else
			{
				if(!$group_id){
					$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = ".$_GET['id']." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (T1.mode IS NULL OR (T1.mode != 'Modified mode' AND T1.mode != 'ES-QTOF mode')) " ;
				}
				else{
					$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = ".$_GET['id']." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T4.group_id = '$group_id' AND (T1.mode IS NULL OR (T1.mode != 'Modified mode' AND T1.mode != 'ES-QTOF mode')) " ;
				}
			}
			
			$result_sql_sum_hour = $conn->query($sql_sum_hour);
			$sum_hour = 0;
			if ($result_sql_sum_hour->num_rows > 0) 
			{
				// output data of each row
				while($row = $result_sql_sum_hour->fetch_assoc()) {
					$day1 = strtotime($row['start_date']);
					$day2 = strtotime($row['end_date']);

					$diffHours = round(($day2 - $day1) / 3600);
					$sum_hour += $diffHours;
				}
			}

			$sum_hour_ = 0;
			if(isset($sql_sum_hour_))
			{
				$result_sql_sum_hour_ = $conn->query($sql_sum_hour_);
				if ($result_sql_sum_hour_->num_rows > 0) 
				{
					// output data of each row
					while($row_ = $result_sql_sum_hour_->fetch_assoc()) {
						$day1_ = strtotime($row_['start_date']);
						$day2_ = strtotime($row_['end_date']);

						$diffHours_ = round(($day2_ - $day1_) / 3600);
						$sum_hour_ += $diffHours_;
					}
				}
			}
		}
		$conn->close();

		if($_GET['id'] == 2)
		{
			if($_GET['mode'] == "Modified mode"){
				$quota_limit = 99999;
			}
			else{
				$quota_limit = 12;
			}
		}
		else if($_GET['id'] == 24)
		{
			if($_GET['mode'] == "ES-QTOF mode"){
				$quota_limit = 6;
			}
			else{
				$quota_limit = 48;
			}
		}
			
		if($_GET['id'] == 24)
		{
			if($_GET['mode'] == "ES-QTOF mode")
			{
				$remaining = 6 - floatval($sum_hour) > 0 ? 6 - floatval($sum_hour) : 0;
				$this->set('quota_limit_txt', $userSession->IsAdmin ? 1 : $remaining);	
			}
			else
			{
				$remaining1 = 12 - floatval($sum_hour) > 0 ? 12 - floatval($sum_hour) : 0;
				$remaining2 = 36 - floatval($sum_hour_) > 0 ? 36 - floatval($sum_hour_) : 0;
				$remaining = "Sun-Wed ".$remaining1." hrs left / Thu-Sat ".$remaining2;
				$this->set('quota_limit_txt', $userSession->IsAdmin ? 1 : $remaining);	
			}
		}
		else
		{
			$remaining = floatval($quota_limit) - floatval($sum_hour) > 0 ? floatval($quota_limit) - floatval($sum_hour) : 0;
			$this->set('quota_limit_txt', $userSession->IsAdmin ? 1 : $remaining);	
		}

		$this->set('quota_limit', $userSession->IsAdmin ? 1 : (floatval($quota_limit) - floatval($sum_hour)));	
		
		if(isset($_GET['mode'])){
			$this->set('mode', $_GET['mode']);
		}

		if ($this->IsMobile && !$this->IsTablet)
		{
			if ($this->ScheduleStyle == ScheduleStyle::Tall)
			{
				$this->Display('Schedule/schedule-flipped.tpl');
			}
			else 
			{
				$this->Display('Schedule/schedule-mobile.tpl');
			}
		}
		else
		{
			if (array_key_exists($this->ScheduleStyle, $this->_styles))
			{
				$this->Display($this->_styles[$this->ScheduleStyle]);
			}
			else
			{
				$this->Display('Schedule/schedule.tpl');
			}
		}

		$endDisplay = microtime(true);

		$load = $endLoad - $start;
		$display = $endDisplay - $endLoad;
		$total = $endDisplay - $start;
		Log::Debug('Schedule took %s sec to load, %s sec to render. Total %s sec', $load, $display, $total);
	}
	
	public function BindResources($resources)
	{
		$this->Set('Resources', $resources);
	}
	public function ProcessDataRequest($dataRequest)
	{
		$this->_presenter->GetLayout(ServiceLocator::GetServer()->GetUserSession());
	}

	public function GetScheduleId()
	{
		return $this->GetQuerystring(QueryStringKeys::SCHEDULE_ID);
	}

	public function SetScheduleId($scheduleId)
	{
		$this->Set('ScheduleId', intval($scheduleId));
	}

	public function SetScheduleName($scheduleName)
	{
		$this->Set('ScheduleName', $scheduleName);
	}

	public function SetSchedules($schedules)
	{
		$this->Set('Schedules', $schedules);
	}

	public function SetFirstWeekday($firstWeekday)
	{
		$this->Set('FirstWeekday', $firstWeekday);
	}

	public function SetResources($resources)
	{
		$this->resourceCount = count($resources);
		$this->Set('Resources', $resources);
	}

	public function SetDailyLayout($dailyLayout)
	{
		$this->Set('DailyLayout', $dailyLayout);
	}

	public function SetDisplayDates($dateRange)
	{
		$this->Set('DisplayDates', $dateRange);
		$this->Set('BoundDates', $dateRange->Dates());
	}

	public function SetSpecificDates($specificDates)
	{
		if (!empty($specificDates))
		{
			$this->Set('BoundDates', $specificDates);
		}
		$this->Set('SpecificDates', $specificDates);
	}

	public function SetPreviousNextDates($previousDate, $nextDate)
	{
		$this->Set('PreviousDate', $previousDate);
		$this->Set('NextDate', $nextDate);
	}

	public function GetSelectedDate()
	{
		return $this->server->GetQuerystring(QueryStringKeys::START_DATE);
	}

	public function GetSelectedDates()
	{
		$dates = $this->server->GetQuerystring(QueryStringKeys::START_DATES);
		if (empty($dates))
		{
			return array();
		}
		$parseDates = array();
		foreach (explode(',', $dates) as $date)
		{
			$parseDates[] = Date::Parse($date, ServiceLocator::GetServer()->GetUserSession()->Timezone);
			//$parseDates[] = Date::Parse($date, "Asia/Bangkok");
		}

		usort($parseDates, function ($d1, $d2)
		{
			return $d1->Compare($d2);
		});

		return $parseDates;
	}

	public function ShowInaccessibleResources()
	{
		return Configuration::Instance()
							->GetSectionKey(ConfigSection::SCHEDULE,
											ConfigKeys::SCHEDULE_SHOW_INACCESSIBLE_RESOURCES,
											new BooleanConverter());
	}

	public function ShowFullWeekToggle($showShowFullWeekToggle)
	{
		$this->Set('ShowFullWeekLink', $showShowFullWeekToggle);
	}

	public function GetShowFullWeek()
	{
		$showFullWeek = $this->GetQuerystring(QueryStringKeys::SHOW_FULL_WEEK);

		return !empty($showFullWeek);
	}

	public function ProcessAction()
	{
		// no-op
	}

	public function SetLayoutResponse($layoutResponse)
	{
		$this->SetJson($layoutResponse);
	}

	public function GetLayoutDate()
	{
		return $this->GetQuerystring(QueryStringKeys::LAYOUT_DATE);
	}

	public function GetScheduleStyle($scheduleId)
	{
		$cookie = $this->server->GetCookie("schedule-direction-$scheduleId");
		if ($cookie != null)
		{
			return $cookie;
		}

		return ScheduleStyle::Standard;
	}

	public function SetScheduleStyle($direction)
	{
		$this->ScheduleStyle = $direction;
		$this->Set('CookieName', 'schedule-direction-' . $this->GetVar('ScheduleId'));
		$this->Set('CookieValue', $direction);
	}

	/**
	 * @return int
	 */
	public function GetResourceId()
	{
		return $this->GetQuerystring(QueryStringKeys::RESOURCE_ID);
	}

	/**
	 * @return int[]
	 */
	public function GetResourceIds()
	{
		$resourceIds = $this->GetQuerystring(FormKeys::RESOURCE_ID);
		if (empty($resourceIds))
		{
			return array();
		}

		if (!is_array($resourceIds))
		{
			return array(intval($resourceIds));
		}

		return array_filter($resourceIds, 'intval');
	}

	public function SetResourceGroupTree(ResourceGroupTree $resourceGroupTree)
	{
		$this->Set('ResourceGroupsAsJson', json_encode($resourceGroupTree->GetGroups()));
	}

	public function SetResourceTypes($resourceTypes)
	{
		$this->Set('ResourceTypes', $resourceTypes);
	}

	public function SetResourceCustomAttributes($attributes)
	{
		$this->Set('ResourceAttributes', $attributes);
	}

	public function SetResourceTypeCustomAttributes($attributes)
	{
		$this->Set('ResourceTypeAttributes', $attributes);
	}

	public function FilterSubmitted()
	{
		$k = $this->GetQuerystring(FormKeys::SUBMIT);

		return !empty($k);
	}

	public function GetResourceTypeId()
	{
		return $this->GetQuerystring(FormKeys::RESOURCE_TYPE_ID);
	}

	public function GetMaxParticipants()
	{
		$max = $this->GetQuerystring(FormKeys::MAX_PARTICIPANTS);
		return intval($max);
	}

	public function GetResourceAttributes()
	{
		return AttributeFormParser::GetAttributes($this->GetQuerystring('r' . FormKeys::ATTRIBUTE_PREFIX));
	}

	public function GetResourceTypeAttributes()
	{
		return AttributeFormParser::GetAttributes($this->GetQuerystring('rt' . FormKeys::ATTRIBUTE_PREFIX));
	}

	public function SetFilter($resourceFilter)
	{
		$this->Set('ResourceIdFilter', $this->GetResourceId());
		$this->Set('ResourceTypeIdFilter', $resourceFilter->ResourceTypeId);
		$this->Set('MaxParticipantsFilter', $resourceFilter->MinCapacity);
		$this->Set('ResourceIds', $resourceFilter->ResourceIds);
		$this->_isFiltered = $resourceFilter->HasFilter();
	}

	public function SetSubscriptionUrl(CalendarSubscriptionUrl $subscriptionUrl)
	{
		$this->Set('SubscriptionUrl', $subscriptionUrl);
	}

	public function ShowPermissionError($shouldShow)
	{
		$this->Set('IsAccessible', !$shouldShow);
	}

	public function GetDisplayTimezone(UserSession $user, Schedule $schedule)
	{
		return $user->Timezone;
		//return "Asia/Bangkok";
	}

    public function FilterCleared()
    {
       return $this->GetQuerystring('clearFilter') == '1';
    }
}

class DisplaySlotFactory
{
	public function GetFunction(IReservationSlot $slot, $accessAllowed = false, $unavailable = false, $has_quota = true, $functionSuffix = '')
	{
		if ($slot->IsReserved())
		{
			if ($this->IsMyReservation($slot))
			{
				return "displayMyReserved$functionSuffix";
			}
			elseif ($this->AmIParticipating($slot))
			{
				return "displayMyParticipating$functionSuffix";
			}
			elseif ($unavailable == true)
			{
				return "displayUnreservable$functionSuffix";
			}
			else
			{
				return "displayReserved$functionSuffix";
			}
		}
		else
		{
			if (!$accessAllowed)
			{
				if ($unavailable == true){
					return "displayUnreservable$functionSuffix";
				}
				else{
					return "displayRestricted$functionSuffix";
				}
			}
			else
			{
				if ($slot->IsPastDate(Date::Now()))
				{
					if (!$slot->IsReservable() && $slot->Type() == "blackout")
					{
						return "displayUnreservable$functionSuffix";
					}
					else
					{
						return "displayPastTime$functionSuffix";
					}
				}
				else
				{
					if ($slot->IsReservable() && $unavailable == false && $has_quota == true)
					{
						return "displayReservable$functionSuffix";
					}
					elseif ((!$slot->IsReservable() && $slot->Type() == "blackout") || $unavailable == true)
					{
						return "displayUnreservable$functionSuffix";
					}
					elseif($has_quota == false)
					{
						return "displayPastTime$functionSuffix";
					}
					else
					{
						return "displayUnreservable$functionSuffix";
					}
				}
			}
		}
		return null;
	}

	private function UserHasAdminRights()
	{
		return ServiceLocator::GetServer()
							 ->GetUserSession()->IsAdmin;
	}

	private function IsMyReservation(IReservationSlot $slot)
	{
		$mySession = ServiceLocator::GetServer()
								   ->GetUserSession();
		return $slot->IsOwnedBy($mySession);
	}

	private function AmIParticipating(IReservationSlot $slot)
	{
		$mySession = ServiceLocator::GetServer()
								   ->GetUserSession();
		return $slot->IsParticipating($mySession);
	}
}