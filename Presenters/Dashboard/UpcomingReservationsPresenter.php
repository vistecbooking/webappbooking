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

require_once(ROOT_DIR . 'Controls/Dashboard/UpcomingReservations.php');

class UpcomingReservationsPresenter
{
	/**
	 * @var IUpcomingReservationsControl
	 */
	private $control;

	/**
	 * @var IReservationViewRepository
	 */
	private $repository;

	/**
	 * @var int
	 */
	private $searchUserId = ReservationViewRepository::ALL_USERS;

	/**
	 * @var int
	 */
	private $searchUserLevel = ReservationUserLevel::ALL;

	public function __construct(IUpcomingReservationsControl $control, IReservationViewRepository $repository)
	{
		$this->control = $control;
		$this->repository = $repository;
	}

	public function SetSearchCriteria($userId, $userLevel)
	{
		$this->searchUserId = $userId;
		$this->searchUserLevel = $userLevel;
	}

	public function PageLoad()
	{
		$user = ServiceLocator::GetServer()->GetUserSession();
		$timezone = $user->Timezone;

		$now = Date::Now();
		$today = $now->ToTimezone($timezone)->GetDate();
		$dayOfWeek = $today->Weekday();

		$lastDate = $now->AddDays(13-$dayOfWeek-1);
		$reservations = $this->repository->GetReservations($now, $lastDate, $this->searchUserId, $this->searchUserLevel);
		$tomorrow = $today->AddDays(1);

		$startOfNextWeek = $today->AddDays(7-$dayOfWeek);

		$todays = array();
		$todays_h = array();
		$tomorrows = array();
		$tomorrows_h = array();
		$thisWeeks = array();
		$thisWeeks_h = array();
		$nextWeeks = array();
		$nextWeeks_h = array();

		$consolidated = array();
		foreach ($reservations as $reservation)
		{
			if (!array_key_exists($reservation->ReferenceNumber, $consolidated))
			{
				$consolidated[$reservation->ReferenceNumber] = $reservation;
			}

			$consolidated[$reservation->ReferenceNumber]->Resources[] = $reservation->ResourceName;
		}

		/* @var $reservation ReservationItemView */
		$i=0;
		foreach ($consolidated as $reservation)
		{
			$i++;
			$start = $reservation->StartDate->ToTimezone($timezone);
			$user_id = $reservation->UserId;
			$ResourceId = $reservation->ResourceId;
			$Mode = $reservation->Mode;
			
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

			$can_save = 0;
			$sql2 = "SELECT group_id FROM `user_groups` WHERE user_id = ".$user_id ;
			$result_sql = $conn->query($sql2);
			$row = $result_sql->fetch_assoc();
			$group_id = $row["group_id"];
			if(!$group_id){
				$sql = "SELECT * FROM quotas WHERE  resource_id = $ResourceId OR resource_id = NULL  AND group_id = NULL  ";
			}else{
				$sql = "SELECT * FROM quotas WHERE  resource_id = $ResourceId OR resource_id = NULL  AND  group_id = $group_id OR group_id = NULL  ";
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
				if($ResourceId == 2 || $ResourceId == 24)
				{
					if(!$group_id){
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = $ResourceId AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T1.mode = '".$Mode."' " ;
					}
					else{
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = $ResourceId AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T4.group_id = '$group_id' AND T1.mode = '".$Mode."' " ;
					}
				}
				else
				{
					if(!$group_id){
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = $ResourceId AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (T1.mode IS NULL OR (T1.mode != 'Modified mode' AND T1.mode != 'ES-QTOF mode')) " ;
					}
					else{
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = $ResourceId AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T4.group_id = '$group_id' AND (T1.mode IS NULL OR (T1.mode != 'Modified mode' AND T1.mode != 'ES-QTOF mode')) " ;
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
			}

			if ($start->DateEquals($today))
			{
				$todays[] = $reservation;
				$todays_h[] = (floatval($quota_limit)  - floatval($sum_hour)) ." Hrs.";
			}
			else if ($start->DateEquals($tomorrow))
			{
				$tomorrows[] = $reservation;
				$tomorrows_h[] = (floatval($quota_limit)  - floatval($sum_hour)) ." Hrs.";
			}
			else if ($start->LessThan($startOfNextWeek))
			{
				$thisWeeks[] = $reservation;
				$thisWeeks_h[] = (floatval($quota_limit)  - floatval($sum_hour)) ." Hrs.";
			}
			else
			{
				$nextWeeks[] = $reservation;
				$nextWeeks_h[] = (floatval($quota_limit)  - floatval($sum_hour)) ." Hrs.";
			}
		}

		$this->control->SetTotal(count($consolidated));
		$this->control->SetTimezone($timezone);
		$this->control->SetUserId($user->UserId);
		$this->control->BindToday($todays);
		$this->control->BindTodayH($todays_h);
		$this->control->BindTomorrow($tomorrows);
		$this->control->BindTomorrowH($tomorrows_h);
		$this->control->BindThisWeek($thisWeeks);
		$this->control->BindThisWeekH($thisWeeks_h);
		$this->control->BindNextWeek($nextWeeks);
		$this->control->BindNextWeekH($nextWeeks_h);
	}
}