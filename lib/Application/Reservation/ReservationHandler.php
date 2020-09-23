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

require_once(ROOT_DIR . 'lib/Config/namespace.php');
require_once(ROOT_DIR . 'lib/Server/namespace.php');
require_once(ROOT_DIR . 'lib/Common/namespace.php');
require_once(ROOT_DIR . 'Domain/namespace.php');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Reservation/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Reservation/Persistence/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Reservation/Validation/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Reservation/Notification/namespace.php');

interface IReservationHandler
{
	/**
	 * @param ReservationSeries $reservationSeries
	 * @param IReservationSaveResultsView $view
	 * @return bool if the reservation was handled or not
	 */
	public function Handle(ReservationSeries $reservationSeries, IReservationSaveResultsView $view);
}

class ReservationHandler implements IReservationHandler
{
	/**
	 * @var IReservationPersistenceService
	 */
	private $persistenceService;

	/**
	 * @var IReservationValidationService
	 */
	private $validationService;

	/**
	 * @var IReservationNotificationService
	 */
	private $notificationService;

	public function __construct(IReservationPersistenceService $persistenceService,
								IReservationValidationService $validationService,
								IReservationNotificationService $notificationService)
	{
		$this->persistenceService = $persistenceService;
		$this->validationService = $validationService;
		$this->notificationService = $notificationService;
	}

	/**
	 * @static
	 * @param $reservationAction string|ReservationAction
	 * @param $persistenceService null|IReservationPersistenceService
	 * @param UserSession $session
	 * @return IReservationHandler
	 */
	public static function Create($reservationAction, $persistenceService, UserSession $session)
	{
		if (!isset($persistenceService))
		{
			$persistenceFactory = new ReservationPersistenceFactory();
			$persistenceService = $persistenceFactory->Create($reservationAction);
		}

		$validationFactory = new ReservationValidationFactory();
		$validationService = $validationFactory->Create($reservationAction, $session);

		$notificationFactory = new ReservationNotificationFactory();
		$notificationService = $notificationFactory->Create($reservationAction, $session);

		return new ReservationHandler($persistenceService, $validationService, $notificationService);
	}

	/**
	 * @param ReservationSeries $reservationSeries
	 * @param IReservationSaveResultsView $view
	 * @return bool if the reservation was handled or not
	 * @throws Exception
	 */
	public function Handle(ReservationSeries $reservationSeries, IReservationSaveResultsView $view)
	{
		date_default_timezone_set('Asia/Bangkok'); 

		if (Log::DebugEnabled())
		{
			Log::Debug('submitted retry params %s', var_export($view->GetRetryParameters(), true));
		}

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
		
		$user_id = $reservationSeries->BookedBy()->UserId;
		$seriesId = $reservationSeries->SeriesId();

		$i=0;
		foreach ($reservationSeries->AllResources() as $resource)
		{
			$keyedResources[$resource->GetId()] = $resource;
			$resource_id =$resource->GetId();
			$i++;
		}
		$GetEvents_del = $reservationSeries->IsMarkedForDelete($resource_id);	
		$date_booked_start_original = $reservationSeries->CurrentInstance()->StartDate();
		
		$e = explode(" ", $date_booked_start_original);
		$date_booked_start = $e[0]." ".$e[1];
		$date_booked_start_condition = $e[0];
		$date_booked_start2 = $e[0]." ".$e[1];
		$date_booked_start2 = new DateTime($date_booked_start); 
		
		$date_booked_end_original = $reservationSeries->CurrentInstance()->EndDate();
		$date_booked_end = $date_booked_end_original;
		$e = explode(" ", $date_booked_end);
		$date_booked_end = $e[0]." ".$e[1];
		$date_booked_end =  new DateTime($date_booked_end); ;
		$_Hour2  = $date_booked_start2->diff($date_booked_end); 
		$_days = intval($_Hour2->format("%D")); 
		$_Hour = intval($_Hour2->format("%H")) + ($_days*24) ; 
		
		$can_save = 0;
		$sql2 = "SELECT `user_groups`.group_id, `users`.is_admin FROM `user_groups` INNER JOIN `users` ON `users`.user_id = `user_groups`.user_id WHERE `user_groups`.user_id = ".$user_id ;
		$result_sql = $conn->query($sql2);
		$row = $result_sql->fetch_assoc();
		$group_id = $row["group_id"];
		$is_admin = strval($row["is_admin"]) != "0" ? true : false;

		if(!$group_id){
			$sql = "SELECT * FROM quotas WHERE  resource_id = $resource_id OR resource_id = NULL  AND group_id = NULL  ";
		}else{
			$sql = "SELECT * FROM quotas WHERE  resource_id = $resource_id OR resource_id = NULL  AND  group_id = $group_id OR group_id = NULL  ";
		}

		if($is_admin == true){
			$can_save = 1;
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
			if($resource_id == 2 || $resource_id == 24)
			{
				$mode = $reservationSeries->Mode();
				if(!$group_id){
					$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = $resource_id AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T1.mode = '".$mode."' " ;
				}
				else{
					$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = $resource_id AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T4.group_id = '$group_id' AND T1.mode = '".$mode."' " ;
				}

				if($seriesId != null && $seriesId != ""){
					$sql_sum_hour.= "AND T1.series_id != $seriesId ";
				}
			}
			else
			{
				if(!$group_id){
					$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = $resource_id AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (T1.mode IS NULL OR (T1.mode != 'Modified mode' AND T1.mode != 'ES-QTOF mode')) " ;
				}
				else{
					$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = $resource_id AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T4.group_id = '$group_id' AND (T1.mode IS NULL OR (T1.mode != 'Modified mode' AND T1.mode != 'ES-QTOF mode')) " ;
				}
			}
			
			$result_sql_sum_hour = $conn->query($sql_sum_hour);
			$sum_hour = 0;
			if ($result_sql_sum_hour->num_rows > 0) 
			{
				// output data of each row
				while($row = $result_sql_sum_hour->fetch_assoc()) 
				{
					$day1 = strtotime($row['start_date']);
					$day2 = strtotime($row['end_date']);

					$diffHours = round(($day2 - $day1) / 3600);
					$sum_hour += $diffHours;
				}
			}
			if( $enforced_days == NULL && $enforced_time_start == NULL && $enforced_time_end == NULL ){
				if($sum_hour == 0){
					if($_Hour <= $quota_limit){
						$can_save = 1;
					}else{
					}
				}else if(($sum_hour+$_Hour) <= $quota_limit  ){
					$can_save = 1;
				}
			}else if($enforced_days != NULL && ($enforced_time_start == NULL && $enforced_time_end == NULL)){
				// enforced_days
				$e = explode(" ", $date_booked_start);
				$e = $e[0];  //date 2017-12-17
				$e_date = $e;
				$e1= $e[1];  //time 00:00:00.000000
				$e = explode("-", $e);
				$date_booked_end = $e[0]." ".$e[1];
				$e1 = explode(".", $e1); 
				$e1 = $e1[0]; //time 00:00:00
				$e1 = explode(":", $e1); 
				//$day_of_start_date = date("l", mktime($e1[2], $e1[2], $e1[2], $e[0], $e[1], $e[2]));
				$day_of_start_date = date('w', strtotime($e_date));
				
				switch ($day_of_start_date) {
					case "Sunday":
						//code to be executed if n=label1;
						$day_of_start_date = 0;
						break;
					case "Monday":
						//code to be executed if n=label1;
						$day_of_start_date = 1;
						break;
					case "Thursday":
						//code to be executed if n=label2;
						$day_of_start_date = 2;
						break;
					case "Wednesday":
						//code to be executed if n=label3;
						$day_of_start_date = 3;
						break;
					case "Thursday":
						//code to be executed if n=label3;
						$day_of_start_date = 4;
						break;
					case "Friday ":
						//code to be executed if n=label3;
						$day_of_start_date = 5;
						break;
					case "Saturday":
						//code to be executed if n=label3;
						$day_of_start_date = 6;
						break;
					default:
						//code to be executed if n is different from all labels;
				}
				//$day_of_start_date = $day_of_start_date - 1;
				$days = explode(",", $enforced_days);
				$ff = 0;
				foreach ($days as &$day) {
					if($day_of_start_date == $day){
						$ff = 1;
					}
				}
				if ( $ff == 1 && $_Hour > $quota_limit) {
					//echo "Got Irix";
				}else{
					$can_save = 1;
				}
			}else if($enforced_days == NULL && ($enforced_time_start != NULL || $enforced_time_end == !NULL)){
				//if 3
				$e = explode(" ", $date_booked_start);
				$e = explode(":", $e[1]);
				$e0 = $e[0];
				//$e1 = $e[1]
				$time_start = $e0.".".$e1;
				$passC = 0;
				$time_table = 0; 
				for($i = 0;$i<$_Hour ;$i++)
				{
					$str = "$e0:30:00";
					$str2 = "$e0:00:00";
					if($str == $enforced_time_start || $str2 == $enforced_time_start  ){
						$passC = 1;
						$time_table++;
					}
					
					if($passC == 1){
						$time_table++;
						if($str == $enforced_time_end || $str2 == $enforced_time_end ){
							$passC = 0;
						}
					}
					$e0++;
					if($e0 == 24){
						$e0 = 0;
					}
				}
									
				if ( ($time_table-1) > $quota_limit ) {
				}else{
					$can_save = 1;
				}
			}else{
			}
		} 
		else
		{
			$can_save = 1;
		}
		$quota_limit = $quota_limit - $sum_hour;
		$error_txt = "";
		// Case XRD 
		$t=date('Y-m-d');
		$t_week = date(substr($date_booked_start_original,0,10));
		$week_m = intval(substr($date_booked_start_original,5,2));
		$week_current_m = intval(substr($t,5,2));

		// $week = ($this->getWeeks($t_week, "sunday"))*$week_m ;
		// $week_current = ($this->getWeeks($t, "sunday"))*$week_current_m;
		$week = $this->weekOfMonthStartSUN($t_week);
		$week_current = $this->weekOfMonthStartSUN($t);

		$week_day_start = date("w", strtotime($date_booked_start_original));
		$week_day_end = date("w", strtotime($date_booked_end_original));
		$week_day_current = date("w", strtotime($t));

		$day_only_start = date("d", strtotime($date_booked_start_original));
		$day_only_end = date("d", strtotime($date_booked_end_original));
		$day_only_current = date("d", strtotime($t));

		$week_month_start = $this->getWeekOfMonth(date("Y-m-d", strtotime($date_booked_start_original)));
		$week_month_current = $this->getWeekOfMonth($t);

		Log::Debug('week_month_start %s', $week_month_start);
		Log::Debug('week_month_current %s', $week_month_current);

		$loop_days = ceil($_Hour/24)-1;
		if($resource_id == 2)
		{
			$obj = $reservationSeries->attributeValues();
			foreach ($obj as $key => $value) 
			{
				$i=0;
				foreach ($value as $key2 => $value2) {
					$str[$i] = $value2;
					$i++;
				}
			}

			$mode = $reservationSeries->Mode();

			$week_start = $this->weekOfMonthStartTHU($date_booked_start_original);
			$week_end = $this->weekOfMonthStartTHU($date_booked_end_original);

			$time_only_end = date("H:i",strtotime($date_booked_end_original));
			$midnight = date("H:i", strtotime("24:00"));

			// Modified mode
			if($mode == "Modified mode")
			{
				// Check week, can booking on week 1 or 3 of month
				if($week_start != 1 && $week_start != 3)
				{
					$can_save = 0;
					$error_txt = "02";
				}
				else
				{
					// Check day, make booking before Wednesday
					if($week_day_start < 4 || ($week_day_end == 0 && $time_only_end > $midnight) || ($week_day_end > 0 && $week_day_end < 4))
					{
						$can_save = 0;
						$error_txt = "02";
					}
					else if($week_day_current < 3)
					{
						$diff_end = 7 - $week_day_start;
						$last_day_end = $day_only_start + $diff_end;
						if($day_only_current >= ($day_only_start - $week_day_start) && $day_only_end <= $last_day_end)
						{
							$can_save = 1;
						}
						else
						{
							$can_save = 0;
							$error_txt = "02";
						}
					}
					else
					{
						$can_save = 0;
						$error_txt = "02";
					}
				}
			}
			// Powder mode
			else
			{
				if($week_day_start >= 4)
				{
					if($week_start != 1 && $week_start != 3)
					{
						if($_Hour > $quota_limit && $is_admin == false)
						{
							//Over quota
							$can_save = 0;
							$error_txt = "01";
						}
						else
						{
							//Not over quota
							$can_save = 1;
						}
					}
					else if($week_month_start == $week_month_current && $week_day_current >= 3)
					{
						if($_Hour > $quota_limit && $is_admin == false){
							//Over quota
							$can_save = 0;
							$error_txt = "01";
						}else{
							//Not over quota
							$can_save = 1;
						}
					}
					else
					{
						$can_save = 0;
						$error_txt = "02";
					}
				}
				else if($week_day_end >= 4 && $time_only_end > $midnight)
				{
					if($week_end != 1 && $week_end != 3)
					{
						if($_Hour > $quota_limit && $is_admin == false)
						{
							//Over quota
							$can_save = 0;
							$error_txt = "01";
						}
						else
						{
							//Not over quota
							$can_save = 1;
						}
					}
					else if($week_month_start == $week_month_current && $week_day_current >= 3)
					{
						if($_Hour > $quota_limit && $is_admin == false){
							//Over quota
							$can_save = 0;
							$error_txt = "01";
						}else{
							//Not over quota
							$can_save = 1;
						}
					}
					else
					{
						$can_save = 0;
						$error_txt = "02";
					}
				}
				else
				{
					if($_Hour > $quota_limit && $is_admin == false){
						//Over quota
						$can_save = 0;
						$error_txt = "01";
					}else{
						//Not over quota
						$can_save = 1;
					}
				}
			}
			$loop_days = ceil($_Hour/24)-1;
		}
		//End case XRD

		//Case LC-QTOF-MS/MS
		if($resource_id == 24)
		{
			$obj = $reservationSeries->attributeValues();
			foreach ($obj as $key => $value) 
			{
				$i=0;
				foreach ($value as $key2 => $value2) {
					$str[$i] = $value2;
					$i++;
				}
			}

			$mode = $reservationSeries->Mode();

			$date_current = date("D",strtotime($t));

			$date_time_start = date("Y-m-d H:i",strtotime($date_booked_start_original));
			$date_time_end = date("Y-m-d H:i",strtotime($date_booked_end_original));

			$date_only_start = date("Y-m-d",strtotime($date_booked_start_original));
			$date_only_end = date("Y-m-d",strtotime($date_booked_end_original));

			$time_only_start = date("H:i",strtotime($date_booked_start_original));
			$time_only_end = date("H:i",strtotime($date_booked_end_original));

			$start_datetime_8 = date("Y-m-d H:i", strtotime($date_only_start." 08:00"));
			$end_datetime_20 = date("Y-m-d H:i", strtotime($date_only_start." 20:00"));

			$start_date_yesterday = date('Y-m-d', strtotime($date_only_start . "-1 days"));
			$start_datetime_20 = date("Y-m-d H:i", strtotime($start_date_yesterday." 20:00"));
			$start_date_tomorrow = date('Y-m-d', strtotime($date_only_start . "+1 days"));
			$end_datetime_8 = date("Y-m-d H:i", strtotime($start_date_tomorrow." 08:00"));

			$midnight = date("H:i", strtotime("24:00"));

			if($mode == "ES-QTOF mode")
			{
				//quota = 6h
				if(!$group_id){
					$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = $resource_id AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T1.mode = 'ES-QTOF mode' " ;
				}
				else{
					$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T5 ON (T1.owner_id = T5.user_id) WHERE resource_id = $resource_id AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T1.mode = 'ES-QTOF mode' AND T5.group_id = '$group_id' " ;
				}

				if($seriesId != null && $seriesId != ""){
					$sql_sum_hour.= "AND T1.series_id != $seriesId ";
				}

				$result_sql_sum_hour = $conn->query($sql_sum_hour);
				$sum_hour = 0;
				if ($result_sql_sum_hour->num_rows > 0) 
				{
					// output data of each row
					while($row = $result_sql_sum_hour->fetch_assoc()) 
					{
						$day1 = strtotime($row['start_date']);
						$day2 = strtotime($row['end_date']);

						$diffHours = round(($day2 - $day1) / 3600);
						$sum_hour += $diffHours;
					}
				}
				$quota_limit = 6;
				$quota_limit = $quota_limit - $sum_hour;
				
				if($week_day_start > 3)
				{
					if($_Hour > $quota_limit && $is_admin == false){
						$can_save = 0;
						$error_txt = "01";
					}
					else{
						$can_save = 1;
					}
				}
				else
				{
					if($date_time_start >= $start_datetime_8 && $date_time_end <= $end_datetime_20)
					{
						if($_Hour > $quota_limit && $is_admin == false){
							$can_save = 0;
							$error_txt = "01";
						}
						else{
							$can_save = 1;
						}
					}
					else
					{
						$can_save = 0;
						$error_txt = "02";
					}
				}
			}
			else
			{
				// Mode LC coupled with QTOF-MS/MS
				$advance = $week_day_start - 1;
				if($week_day_start > 3)
				{
					if($week_month_start == $week_month_current && $week_day_current <= $advance)
					{
						if($week_day_end > 3 || ($week_day_end == 0 && $time_only_end <= $midnight))
						{
							//quota = 36h
							if(!$group_id){
								$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = $resource_id AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 3 OR WEEKDAY(T3.start_date) = 4 OR WEEKDAY(T3.start_date) = 5 ) AND T1.mode = 'LC coupled with QTOF-MS/MS' " ;
							}
							else{
								$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T5 ON (T1.owner_id = T5.user_id) WHERE resource_id = $resource_id AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 3 OR WEEKDAY(T3.start_date) = 4 OR WEEKDAY(T3.start_date) = 5 ) AND T1.mode = 'LC coupled with QTOF-MS/MS' AND T5.group_id = '$group_id' " ;
							}

							if($seriesId != null && $seriesId != ""){
								$sql_sum_hour.= "AND T1.series_id != $seriesId ";
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
							$quota_limit = 36;
							$quota_limit = $quota_limit - $sum_hour;

							if($_Hour > $quota_limit && $is_admin == false){
								$can_save = 0;
								$error_txt = "01";
							}else{
								$can_save = 1;
							}
						}
						else
						{
							$can_save = 0;
							$error_txt = "02";
						}
					}
					else
					{
						$can_save = 0;
						$error_txt = "02";
					}
				}
				else
				{
					// time start 20:00 to before 08:00 next day
					if(($date_time_start >= $end_datetime_20 && $date_time_end <= $end_datetime_8) ||
						($date_time_start >= $start_datetime_20 && $date_time_end <= $start_datetime_8))
					{
						//quota = 12h
						if(!$group_id){
							$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = $resource_id AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 0 OR WEEKDAY(T3.start_date) = 1 OR WEEKDAY(T3.start_date) = 2 OR WEEKDAY(T3.start_date) = 6 ) AND T1.mode = 'LC coupled with QTOF-MS/MS' " ;
						}
						else{
							$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T5 ON (T1.owner_id = T5.user_id) WHERE resource_id = $resource_id AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 0 OR WEEKDAY(T3.start_date) = 1 OR WEEKDAY(T3.start_date) = 2 OR WEEKDAY(T3.start_date) = 6 ) AND T1.mode = 'LC coupled with QTOF-MS/MS' AND T5.group_id = '$group_id'  " ;
						}
						if($seriesId != null && $seriesId != ""){
							$sql_sum_hour.= "AND T1.series_id != $seriesId ";
						}

						$result_sql_sum_hour = $conn->query($sql_sum_hour);
						$sum_hour = 0;
						if ($result_sql_sum_hour->num_rows > 0) 
						{
							// output data of each row
							while($row = $result_sql_sum_hour->fetch_assoc()) 
							{
									$day1 = strtotime($row['start_date']);
									$day2 = strtotime($row['end_date']);

								$diffHours = round(($day2 - $day1) / 3600);
								$sum_hour += $diffHours;
							}
						}
						
						$quota_limit = 12;
						$quota_limit = $quota_limit - $sum_hour;

						if($_Hour > $quota_limit && $is_admin == false){
							$can_save = 0;
							$error_txt = "01";
						}
						else{
							$can_save = 1;
						}
					}
					else
					{
						$can_save = 0;
						$error_txt = "02";
					}
				}
			}
		}
		
		//delete validate
		$GetEvents_del = $reservationSeries->IsMarkedForDelete($resource_id);			
		//	now
		$date_booked_start2 = new DateTime($date_booked_start); 
		
		$_Hour_bdel_o = 0;
		if($GetEvents_del == 1)
		{
			$date_now = date("Y-m-d H:i:s");
			$date_now2 = new DateTime($date_now);  
			$_Hour_bdel  = $date_now2->diff($date_booked_start2); 
			$_s_bdel = intval($_Hour_bdel->format("%s")); 
			$_days_bdel = intval($_Hour_bdel->format("%d")); 
			$_i_bdel = intval($_Hour_bdel->format("%i")); 
			if($_s_bdel != 0){
				$_i_bdel += 1 ;
			}
			
			$_Hour_bdel_o = intval($_Hour_bdel->format("%H")) + intval($_days_bdel*24)+($_i_bdel/100) ;
			
			
			$limit_del = 24.00;
			if($_Hour_bdel_o-$limit_del < 0.00 && $is_admin == false){
				$can_save = 0;
			
			}else{
				$can_save = 1;
			
			}
		}
		Log::Debug('Tool Mode is %s', $mode);
				
		if($can_save == 0 && ($_Hour > $quota_limit && $is_admin == false))
		{
			$currentId = $reservationSeries->SeriesId();
			$validationResult = $this->validationService->Validate($reservationSeries, $view->GetRetryParameters());
			$result = $validationResult->CanBeSaved();
			if ($validationResult->CanBeSaved())
			{
				if($error_txt == "01"){
					$view->SetErrors("Your time selected is over the quota limit.");
				}
				else if($error_txt == "02"){
					$view->SetErrors("Your date or time is incorrect in the conditions.");
				}
				else{
					try
					{
						if($currentId){
							$this->persistenceService->Persist($reservationSeries);
						}
					} catch (Exception $ex)
					{
						Log::Error('Error saving reservation: %s', $ex);
						throw($ex);
					}
					
					$this->notificationService->Notify($reservationSeries);
					if($currentId){
						$view->SetSaveSuccessfulMessage($result);
					}
				}
			}
			else
			{
				$view->SetSaveSuccessfulMessage($result);
				$view->SetErrors($validationResult->GetErrors());

				$view->SetCanBeRetried($validationResult->CanBeRetried());
				if (Log::DebugEnabled())
				{
					Log::Debug('retry params %s', var_export($validationResult->GetRetryParameters(), true));
					Log::Debug('retry messages %s', var_export($validationResult->GetRetryMessages(), true));
				}
				$view->SetRetryParameters($validationResult->GetRetryParameters());
				$view->SetRetryMessages($validationResult->GetRetryMessages());
				$view->SetCanJoinWaitList($validationResult->CanJoinWaitList() && Configuration::Instance()->GetSectionKey(ConfigSection::RESERVATION, ConfigKeys::RESERVATION_ALLOW_WAITLIST, new BooleanConverter()));
			}
		
		}
		else if($can_save == 0 && $_Hour < $quota_limit && $error_txt != "02")
		{
			$currentId = $reservationSeries->SeriesId();
			$validationResult = $this->validationService->Validate($reservationSeries, $view->GetRetryParameters());
			$result = $validationResult->CanBeSaved();
			if ($validationResult->CanBeSaved())
			{
				try
				{
					if($currentId){
						$this->persistenceService->Persist($reservationSeries);
					}
				} catch (Exception $ex)
				{
					Log::Error('Error saving reservation: %s', $ex);
					throw($ex);
				}
				
				$this->notificationService->Notify($reservationSeries);
				if($currentId){
				$view->SetSaveSuccessfulMessage($result);
				}
				$view->SetErrors("Your time selected is over the quota limit.");
			}
			else
			{
				$view->SetSaveSuccessfulMessage($result);
				$view->SetErrors($validationResult->GetErrors());

				$view->SetCanBeRetried($validationResult->CanBeRetried());
				if (Log::DebugEnabled())
				{
					Log::Debug('retry params %s', var_export($validationResult->GetRetryParameters(), true));
					Log::Debug('retry messages %s', var_export($validationResult->GetRetryMessages(), true));
				}
				$view->SetRetryParameters($validationResult->GetRetryParameters());
				$view->SetRetryMessages($validationResult->GetRetryMessages());
				$view->SetCanJoinWaitList($validationResult->CanJoinWaitList() && Configuration::Instance()->GetSectionKey(ConfigSection::RESERVATION, ConfigKeys::RESERVATION_ALLOW_WAITLIST, new BooleanConverter()));
			}
		}
		else if($can_save == 0 )
		{
			$currentId = $reservationSeries->SeriesId();
			$validationResult = $this->validationService->Validate($reservationSeries, $view->GetRetryParameters());
			if($error_txt == "01"){
				$view->SetErrors("Your time selected is over the quota limit.");
				$er = "XX";
			}
			else if($error_txt == "02"){
				$view->SetErrors("Your date or time is incorrect in the conditions.");
				$er = "XX";
			}
			else{
				$view->SetErrors("Cancellation of reservation must be made at least 24 hours in advance.");
				$er = "XX";
			}
		}
		else
		{
			$validationResult = $this->validationService->Validate($reservationSeries, $view->GetRetryParameters());
			$result = $validationResult->CanBeSaved();
			
			if ($validationResult->CanBeSaved())
			{
				try
				{
					$this->persistenceService->Persist($reservationSeries);
				} catch (Exception $ex)
				{
					Log::Error('Error saving reservation: %s', $ex);
					throw($ex);
				}

				$this->notificationService->Notify($reservationSeries);
			
				$view->SetSaveSuccessfulMessage($result);
				
			}
			else
			{
				$view->SetSaveSuccessfulMessage($result);
				$view->SetErrors($validationResult->GetErrors());
				
				$view->SetCanBeRetried($validationResult->CanBeRetried());
				if (Log::DebugEnabled())
				{
					Log::Debug('retry params %s', var_export($validationResult->GetRetryParameters(), true));
					Log::Debug('retry messages %s', var_export($validationResult->GetRetryMessages(), true));
				}
				$view->SetRetryParameters($validationResult->GetRetryParameters());
				$view->SetRetryMessages($validationResult->GetRetryMessages());
				$view->SetCanJoinWaitList($validationResult->CanJoinWaitList() && Configuration::Instance()->GetSectionKey(ConfigSection::RESERVATION, ConfigKeys::RESERVATION_ALLOW_WAITLIST, new BooleanConverter()));
			}
		
		}

		return $result;
	}

	function weekOfMonthStartTHU($date) {
		// estract date parts
		list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));
	
		// current week, min 1
		$w = 0;
	
		// for each day since the start of the month
		for ($i = 1; $i <= $d; ++$i) {
			// if that day was a thursday and is not the first day of month
			if (date('w', strtotime("$y-$m-$i")) == 4) {
				// increment current week
				++$w;
			}
		}
	
		// now return
		return $w;
	}

	function weekOfMonthStartSUN($date) {
		// estract date parts
		list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));
	
		// current week, min 1
		$w = 0;
	
		// for each day since the start of the month
		for ($i = 1; $i <= $d; ++$i) {
			// if that day was a thursday and is not the first day of month
			if (date('w', strtotime("$y-$m-$i")) == 0) {
				// increment current week
				++$w;
			}
		}
	
		// now return
		return $w;
	}

	public function getWeeks($date, $rollover)
    {
        $cut = substr($date, 0, 8);
        $daylen = 86400;

        $timestamp = strtotime($date);
        $first = strtotime($cut . "00");
        $elapsed = ($timestamp - $first) / $daylen;

        $weeks = 1;

        for ($i = 1; $i <= $elapsed; $i++)
        {
            $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
            $daytimestamp = strtotime($dayfind);

            $day = strtolower(date("l", $daytimestamp));

            if($day == strtolower($rollover))  $weeks ++;
        }

        return $weeks;
	}

	public function getWeekOfMonth($date) 
	{    
		$firstOfMonth = date("Y-m-01", $date);

        $w1 = date("W", strtotime($firstOfMonth));
        $w2 = date("W", strtotime($date));

		$weekNum = $w2 - $w1 + 1;
		
        return $weekNum;
    }
	
}