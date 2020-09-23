<?php
/**
 * Copyright 2011-2017 Nick Korbel
 * Copyright 2012-2014 Alois Schloegl
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

require_once(ROOT_DIR . 'Domain/Values/ReservationUserLevel.php');
require_once(ROOT_DIR . 'Domain/Values/ReservationStatus.php');
require_once(ROOT_DIR . 'Domain/Values/CustomAttributes.php');
require_once(ROOT_DIR . 'Domain/Values/UserPreferences.php');
require_once(ROOT_DIR . 'Domain/RepeatOptions.php');
require_once(ROOT_DIR . 'Domain/ReservationReminderView.php');
require_once(ROOT_DIR . 'Domain/ReservationResourceView.php');
require_once(ROOT_DIR . 'Domain/ReservationUserView.php');
require_once(ROOT_DIR . 'Domain/ReservationView.php');
require_once(ROOT_DIR . 'Domain/ReservationAttachmentView.php');
require_once(ROOT_DIR . 'Domain/AccessoryReservation.php');
require_once(ROOT_DIR . 'Domain/ReservationItemView.php');
require_once(ROOT_DIR . 'Domain/ReservationAccessoryView.php');

interface IReservationViewRepository
{
	/**
	 * @var $referenceNumber string
	 * @return ReservationView
	 */
	public function GetReservationForEditing($referenceNumber);

	/**
	 * @param Date $startDate
	 * @param Date $endDate
	 * @param int|null $userId
	 * @param int|ReservationUserLevel|null $userLevel
	 * @param int|int[]|null $scheduleIds
	 * @param int|int[]|null $resourceIds
	 * @return ReservationItemView[]
	 */
	public function GetReservations(
			Date $startDate,
			Date $endDate,
			$userId = ReservationViewRepository::ALL_USERS,
			$userLevel = ReservationUserLevel::OWNER,
			$scheduleIds = ReservationViewRepository::ALL_SCHEDULES,
			$resourceIds = ReservationViewRepository::ALL_RESOURCES);

	/**
	 * @param Date $startDate
	 * @param Date $endDate
	 * @param string $accessoryName
	 * @return ReservationItemView[]
	 */
	public function GetAccessoryReservationList(Date $startDate, Date $endDate, $accessoryName);

	/**
	 * @param int $pageNumber
	 * @param int $pageSize
	 * @param string $sortField
	 * @param string $sortDirection
	 * @param ISqlFilter $filter
	 * @return PageableData|ReservationItemView[]
	 */
	public function GetList($pageNumber, $pageSize, $sortField = null, $sortDirection = null, $filter = null);

	/**
	 * @param DateRange $dateRange
	 * @param int|null $scheduleId
	 * @return BlackoutItemView[]
	 */
	public function GetBlackoutsWithin(DateRange $dateRange, $scheduleId = ReservationViewRepository::ALL_SCHEDULES);

	/**
	 * @param int $pageNumber
	 * @param int $pageSize
	 * @param null|string $sortField
	 * @param null|string $sortDirection
	 * @param null|ISqlFilter $filter
	 * @return PageableData|BlackoutItemView[]
	 */
	public function GetBlackoutList($pageNumber, $pageSize, $sortField = null, $sortDirection = null, $filter = null);

	/**
	 * @param DateRange $dateRange
	 * @return array|AccessoryReservation[]
	 */
	public function GetAccessoriesWithin(DateRange $dateRange);
}

class ReservationViewRepository implements IReservationViewRepository
{
	const ALL_SCHEDULES = -1;
	const ALL_RESOURCES = -1;
	const ALL_USERS = -1;
	const ALL_ACCESSORIES = -1;

	public function GetReservationForEditing($referenceNumber)
	{
		$reservationView = NullReservationView::Instance();

		$getReservation = new GetReservationForEditingCommand($referenceNumber);

		$result = ServiceLocator::GetDatabase()->Query($getReservation);
		$config = Configuration::Instance();

		$hostname = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_HOSTSPEC);
		$database_name = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_NAME);
		$database_user = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_USER);
		$database_password = $config->GetSectionKey(ConfigSection::DATABASE, ConfigKeys::DATABASE_PASSWORD);
		$conn = new mysqli($hostname, $database_user, $database_password, $database_name);
		// Check connection
		if ($conn->connect_error) {
			//die("Connection failed: " . $conn->connect_error);
			//$this->set('text3',"connect_error");
		} else{
			//$this->set('text3',"connected");
		}
		mysqli_set_charset($conn, "utf8");
		while ($row = $result->GetRow())
		{
			$reservationView = new ReservationView();

			$reservationView->Description = $row[ColumnNames::RESERVATION_DESCRIPTION];
			$reservationView->EndDate = Date::FromDatabase($row[ColumnNames::RESERVATION_END]);
			$reservationView->OwnerId = $row[ColumnNames::USER_ID];
			$reservationView->ResourceId = $row[ColumnNames::RESOURCE_ID];
			$reservationView->ResourceName = $row[ColumnNames::RESOURCE_NAME];
			$reservationView->ReferenceNumber = $row[ColumnNames::REFERENCE_NUMBER];
			$reservationView->ReservationId = $row[ColumnNames::RESERVATION_INSTANCE_ID];
			$reservationView->ScheduleId = $row[ColumnNames::SCHEDULE_ID];
			$reservationView->StartDate = Date::FromDatabase($row[ColumnNames::RESERVATION_START]);
			$reservationView->Title = $row[ColumnNames::RESERVATION_TITLE];
			$reservationView->SeriesId = $row[ColumnNames::SERIES_ID];
			$reservationView->OwnerFirstName = $row[ColumnNames::FIRST_NAME];
			$reservationView->OwnerLastName = $row[ColumnNames::LAST_NAME];
			$reservationView->OwnerEmailAddress = $row[ColumnNames::EMAIL];
			$reservationView->OwnerPhone = $row[ColumnNames::PHONE_NUMBER];
			$reservationView->StatusId = $row[ColumnNames::RESERVATION_STATUS];
			$reservationView->DateCreated = Date::FromDatabase($row[ColumnNames::RESERVATION_CREATED]);
			$reservationView->DateModified = Date::FromDatabase($row[ColumnNames::RESERVATION_MODIFIED]);
			$reservationView->ResourcesGroupName = $row['name_group'];
			$reservationView->Mode = $row[ColumnNames::MODE];

			$repeatConfig = RepeatConfiguration::Create($row[ColumnNames::REPEAT_TYPE],
														$row[ColumnNames::REPEAT_OPTIONS]);

			$reservationView->RepeatType = $repeatConfig->Type;
			$reservationView->RepeatInterval = $repeatConfig->Interval;
			$reservationView->RepeatWeekdays = $repeatConfig->Weekdays;
			$reservationView->RepeatMonthlyType = $repeatConfig->MonthlyType;
			$reservationView->RepeatTerminationDate = $repeatConfig->TerminationDate;
			$reservationView->AllowParticipation = (bool)$row[ColumnNames::RESERVATION_ALLOW_PARTICIPATION];
			$reservationView->CheckinDate = Date::FromDatabase($row[ColumnNames::CHECKIN_DATE]);
			$reservationView->CheckoutDate = Date::FromDatabase($row[ColumnNames::CHECKOUT_DATE]);
			$reservationView->OriginalEndDate = Date::FromDatabase($row[ColumnNames::PREVIOUS_END_DATE]);
			$reservationView->CreditsConsumed = $row[ColumnNames::CREDIT_COUNT];

			$this->SetResources($reservationView);
			$this->SetParticipants($reservationView);
			$this->SetAccessories($reservationView);
			$this->SetAttributes($reservationView);
			$this->SetAttachments($reservationView);
			$this->SetReminders($reservationView);
			$this->SetGuests($reservationView);

			$user_id = $reservationView->OwnerId;
			$sql2 = "SELECT `user_groups`.group_id, `users`.is_admin FROM `users` LEFT JOIN `user_groups` ON `users`.user_id = `user_groups`.user_id WHERE `users`.user_id = ".$user_id ;
			$result_sql = $conn->query($sql2);
			$row = $result_sql->fetch_assoc();
			$group_id = $row["group_id"];
			$is_admin = strval($row["is_admin"]) != "0" ? true : false;
			$sum_hour = 0;
			$sum_hour_ = 0;
			$quota_limit = 0;
			if(!$group_id || $group_id == null){
				$sql = "SELECT * FROM quotas WHERE  resource_id = ".$reservationView->ResourceId." OR resource_id = NULL  AND group_id = NULL  ";
			}else{
				$sql = "SELECT * FROM quotas WHERE  resource_id = ".$reservationView->ResourceId." OR resource_id = NULL  AND  group_id = $group_id OR group_id = NULL  ";
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
						break;
				}
				//$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE resource_id = $resource_id AND T1.status_id = 1".$continue_sql ;
				if($reservationView->ResourceId == 2)
				{
					if(!$group_id || $group_id == null){
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = ".$reservationView->ResourceId." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T1.mode = '".$reservationView->Mode."' " ;
					}
					else{
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = ".$reservationView->ResourceId." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T4.group_id = '$group_id' AND T1.mode = '".$reservationView->Mode."' " ;
					}
				}
				else if($reservationView->ResourceId == 24)
				{
					if($reservationView->Mode == "ES-QTOF mode")
					{
						if(!$group_id || $group_id == null){
							$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = ".$reservationView->ResourceId." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T1.mode = '".$reservationView->Mode."' " ;
						}
						else{
							$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = ".$reservationView->ResourceId." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T4.group_id = '$group_id' AND T1.mode = '".$reservationView->Mode."' " ;
						}
					}
					else
					{
						if(!$group_id || $group_id == null){
							$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = ".$reservationView->ResourceId." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 0 OR WEEKDAY(T3.start_date) = 1 OR WEEKDAY(T3.start_date) = 2 OR WEEKDAY(T3.start_date) = 6 ) AND T1.mode = '".$reservationView->Mode."' " ;
							$sql_sum_hour_ = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = ".$reservationView->ResourceId." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 3 OR WEEKDAY(T3.start_date) = 4 OR WEEKDAY(T3.start_date) = 5 ) AND T1.mode = '".$reservationView->Mode."' " ;
						}
						else{
							$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = ".$reservationView->ResourceId." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 0 OR WEEKDAY(T3.start_date) = 1 OR WEEKDAY(T3.start_date) = 2 OR WEEKDAY(T3.start_date) = 6 ) AND T4.group_id = '$group_id' AND T1.mode = '".$reservationView->Mode."' " ;
							$sql_sum_hour_ = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = ".$reservationView->ResourceId." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (WEEKDAY(T3.start_date) = 3 OR WEEKDAY(T3.start_date) = 4 OR WEEKDAY(T3.start_date) = 5 ) AND T4.group_id = '$group_id' AND T1.mode = '".$reservationView->Mode."' " ;
						}
					}
				}
				else
				{
					if(!$group_id || $group_id == null){
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) WHERE T1.owner_id = ".$user_id." AND resource_id = ".$reservationView->ResourceId." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND (T1.mode IS NULL OR (T1.mode != 'Modified mode' AND T1.mode != 'ES-QTOF mode')) " ;
					}
					else{
						$sql_sum_hour = "SELECT * FROM reservation_series T1 JOIN reservation_resources T2 ON(T1.series_id = T2.series_id) JOIN reservation_instances T3 ON (T1.series_id = T3.series_id) JOIN user_groups T4 ON (T1.owner_id = T4.user_id) WHERE resource_id = ".$reservationView->ResourceId." AND T1.status_id = 1 AND T3.end_date >= CURRENT_TIMESTAMP() AND T4.group_id = '$group_id' AND (T1.mode IS NULL OR (T1.mode != 'Modified mode' AND T1.mode != 'ES-QTOF mode')) " ;
					}
				}

				$result_sql_sum_hour = $conn->query($sql_sum_hour);
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

			if($reservationView->Mode == "Modified mode")
			{
				$reservationView->QuotaLimit = $is_admin == true ? "-" : "no limit";	
				$reservationView->SumHour = floatval($sum_hour)." hours";
			}
			else if($reservationView->ResourceId == 24)
			{
				if($reservationView->Mode == "ES-QTOF mode")
				{
					$remaining = 6 - floatval($sum_hour) > 0 ? 6 - floatval($sum_hour) : 0;
					$reservationView->QuotaLimit = $is_admin == true ? "-" : $remaining." hrs left";
					$reservationView->SumHour = floatval($sum_hour)." hours";
				}
				else
				{
					$remaining1 = 12 - floatval($sum_hour) > 0 ? 12 - floatval($sum_hour) : 0;
					$remaining2 = 36 - floatval($sum_hour_) > 0 ? 36 - floatval($sum_hour_) : 0;
					$remaining = "Sun-Wed ".$remaining1." hrs left / Thu-Sat ".$remaining2;
					$reservationView->QuotaLimit = $is_admin == true ? "-" : $remaining." hrs left";
					$reservationView->SumHour = "Sun-Wed ".floatval($sum_hour)." hours  / Thu-Sat ".floatval($sum_hour_)." hours";
				}
			}
			else
			{
				$remaining = floatval($quota_limit) - floatval($sum_hour) > 0 ? floatval($quota_limit) - floatval($sum_hour) : 0;
				$reservationView->QuotaLimit = $is_admin == true ? "-" : $remaining." hrs left";
				$reservationView->SumHour = floatval($sum_hour)." hours";
			}
		}

		return $reservationView;
	}

	public function GetReservations(
			Date $startDate,
			Date $endDate,
			$userId = self::ALL_USERS,
			$userLevel = ReservationUserLevel::OWNER,
			$scheduleIds = self::ALL_SCHEDULES,
			$resourceIds = self::ALL_RESOURCES)
	{
		if (empty($userId))
		{
			$userId = self::ALL_USERS;
		}
		if (is_null($userLevel))
		{
			$userLevel = ReservationUserLevel::OWNER;
		}
		if (empty($scheduleIds))
		{
			$scheduleIds = self::ALL_SCHEDULES;
		}
		if (empty($resourceIds))
		{
			$resourceIds = self::ALL_RESOURCES;
		}
		if ($resourceIds == self::ALL_RESOURCES)
		{
			$resourceIds = null;
		}
		if ($scheduleIds == self::ALL_SCHEDULES)
		{
			$scheduleIds = null;
		}

		if (!empty($resourceIds) && $resourceIds != ReservationViewRepository::ALL_RESOURCES && !is_array($resourceIds))
		{
			$resourceIds = array($resourceIds);
		}
		if (!empty($scheduleIds) && $scheduleIds != ReservationViewRepository::ALL_SCHEDULES && !is_array($scheduleIds))
		{
			$scheduleIds = array($scheduleIds);
		}

		$getReservations = new GetReservationListCommand($startDate, $endDate, $userId, $userLevel, $scheduleIds, $resourceIds);

		$result = ServiceLocator::GetDatabase()->Query($getReservations);

		$reservations = array();

		$reservationRepository = new ReservationRepository();
		$rules = $reservationRepository->GetReservationColorRules();

		while ($row = $result->GetRow())
		{
			$reservation = ReservationItemView::Populate($row);
			$reservation->WithColorRules($rules);
			$reservations[] = $reservation;
		}

		$result->Free();

		return $reservations;
	}

	public function GetAccessoryReservationList(Date $startDate, Date $endDate, $accessoryName)
	{
		$getReservations = new GetReservationsByAccessoryNameCommand($startDate, $endDate, $accessoryName);

		$result = ServiceLocator::GetDatabase()->Query($getReservations);

		$reservations = array();

		while ($row = $result->GetRow())
		{
			$reservations[] = ReservationItemView::Populate($row);
		}

		$result->Free();

		return $reservations;
	}

	public function GetList($pageNumber, $pageSize, $sortField = null, $sortDirection = null, $filter = null)
	{
		$command = new GetFullReservationListCommand();

		if ($filter != null)
		{
			$command = new FilterCommand($command, $filter);
		}

		$builder = array('ReservationItemView', 'Populate');
		return PageableDataStore::GetList($command, $builder, $pageNumber, $pageSize, $sortField, $sortDirection);
	}

	private function SetResources(ReservationView $reservationView)
	{
		$getResources = new GetReservationResourcesCommand($reservationView->SeriesId);

		$result = ServiceLocator::GetDatabase()->Query($getResources);

		while ($row = $result->GetRow())
		{
			if ($row[ColumnNames::RESOURCE_LEVEL_ID] == ResourceLevel::Additional)
			{
				$reservationView->AdditionalResourceIds[] = $row[ColumnNames::RESOURCE_ID];
			}
			$rrv = new ReservationResourceView(
					$row[ColumnNames::RESOURCE_ID],
					$row[ColumnNames::RESOURCE_NAME],
					$row[ColumnNames::RESOURCE_ADMIN_GROUP_ID],
					$row[ColumnNames::SCHEDULE_ID],
					$row[ColumnNames::SCHEDULE_ADMIN_GROUP_ID_ALIAS],
					$row[ColumnNames::RESOURCE_STATUS_ID],
					$row[ColumnNames::ENABLE_CHECK_IN],
					$row[ColumnNames::AUTO_RELEASE_MINUTES]
			);
			$rrv->SetColor(ColumnNames::RESERVATION_COLOR);

			$reservationView->Resources[] = $rrv;
		}
	}

	private function SetParticipants(ReservationView $reservationView)
	{
		$getParticipants = new GetReservationParticipantsCommand($reservationView->ReservationId);

		$result = ServiceLocator::GetDatabase()->Query($getParticipants);

		while ($row = $result->GetRow())
		{
			$levelId = $row[ColumnNames::RESERVATION_USER_LEVEL];
			$reservationUserView = new ReservationUserView(
					$row[ColumnNames::USER_ID],
					$row[ColumnNames::FIRST_NAME],
					$row[ColumnNames::LAST_NAME],
					$row[ColumnNames::EMAIL],
					$levelId);

			if ($levelId == ReservationUserLevel::PARTICIPANT)
			{
				$reservationView->Participants[] = $reservationUserView;
			}

			if ($levelId == ReservationUserLevel::INVITEE)
			{
				$reservationView->Invitees[] = $reservationUserView;
			}
		}
	}

	private function SetAccessories(ReservationView $reservationView)
	{
		$getAccessories = new GetReservationAccessoriesCommand($reservationView->SeriesId);

		$result = ServiceLocator::GetDatabase()->Query($getAccessories);

		while ($row = $result->GetRow())
		{
			$reservationView->Accessories[] = new ReservationAccessoryView($row[ColumnNames::ACCESSORY_ID],
																		   $row[ColumnNames::QUANTITY],
																		   $row[ColumnNames::ACCESSORY_NAME],
																		   $row[ColumnNames::ACCESSORY_QUANTITY]);
		}
	}

	private function SetAttributes(ReservationView $reservationView)
	{
		$getAttributes = new GetAttributeValuesCommand($reservationView->SeriesId,
													   CustomAttributeCategory::RESERVATION);

		$result = ServiceLocator::GetDatabase()->Query($getAttributes);

		while ($row = $result->GetRow())
		{
			$reservationView->AddAttribute(new AttributeValue($row[ColumnNames::ATTRIBUTE_ID],
															  $row[ColumnNames::ATTRIBUTE_VALUE],
															  $row[ColumnNames::ATTRIBUTE_LABEL]));
		}
	}

	private function SetAttachments(ReservationView $reservationView)
	{
		$getAttachments = new GetReservationAttachmentsCommand($reservationView->SeriesId);

		$result = ServiceLocator::GetDatabase()->Query($getAttachments);

		while ($row = $result->GetRow())
		{
			$reservationView->AddAttachment(new ReservationAttachmentView($row[ColumnNames::FILE_ID],
																		  $row[ColumnNames::SERIES_ID],
																		  $row[ColumnNames::FILE_NAME]));
		}
	}

	private function SetReminders(ReservationView $reservationView)
	{
		$getReminders = new GetReservationReminders($reservationView->SeriesId);
		$result = ServiceLocator::GetDatabase()->Query($getReminders);
		while ($row = $result->GetRow())
		{
			if ($row[ColumnNames::REMINDER_TYPE] == ReservationReminderType::Start)
			{
				$reservationView->StartReminder = new ReservationReminderView($row[ColumnNames::REMINDER_MINUTES_PRIOR]);
			}
			else
			{
				$reservationView->EndReminder = new ReservationReminderView($row[ColumnNames::REMINDER_MINUTES_PRIOR]);
			}
		}
	}

	private function SetGuests(ReservationView $reservationView)
	{
		$getGuests = new GetReservationGuestsCommand($reservationView->ReservationId);

		$result = ServiceLocator::GetDatabase()->Query($getGuests);

		while ($row = $result->GetRow())
		{
			$levelId = $row[ColumnNames::RESERVATION_USER_LEVEL];
			$email = $row[ColumnNames::EMAIL];

			if ($levelId == ReservationUserLevel::PARTICIPANT)
			{
				$reservationView->ParticipatingGuests[] = $email;
			}

			if ($levelId == ReservationUserLevel::INVITEE)
			{
				$reservationView->InvitedGuests[] = $email;
			}
		}
	}

	public function GetAccessoriesWithin(DateRange $dateRange)
	{
		$getAccessoriesCommand = new GetAccessoryListCommand($dateRange->GetBegin(), $dateRange->GetEnd());

		$result = ServiceLocator::GetDatabase()->Query($getAccessoriesCommand);

		$accessories = array();
		while ($row = $result->GetRow())
		{
			$accessories[] = new AccessoryReservation(
					$row[ColumnNames::REFERENCE_NUMBER],
					Date::FromDatabase($row[ColumnNames::RESERVATION_START]),
					Date::FromDatabase($row[ColumnNames::RESERVATION_END]),
					$row[ColumnNames::ACCESSORY_ID],
					$row[ColumnNames::QUANTITY]);
		}

		$result->Free();

		return $accessories;
	}

	public function GetBlackoutsWithin(DateRange $dateRange, $scheduleId = ReservationViewRepository::ALL_SCHEDULES)
	{
		$getBlackoutsCommand = new GetBlackoutListCommand($dateRange->GetBegin(), $dateRange->GetEnd(), $scheduleId);

		$result = ServiceLocator::GetDatabase()->Query($getBlackoutsCommand);

		$blackouts = array();
		while ($row = $result->GetRow())
		{
			$blackouts[] = BlackoutItemView::Populate($row);
		}

		$result->Free();

		return $blackouts;
	}

	public function GetBlackoutList($pageNumber, $pageSize, $sortField = null, $sortDirection = null, $filter = null)
	{
		$command = new GetBlackoutListFullCommand();

		if ($filter != null)
		{
			$command = new FilterCommand($command, $filter);
		}

		$builder = array('BlackoutItemView', 'Populate');
		return PageableDataStore::GetList($command, $builder, $pageNumber, $pageSize, $sortField, $sortDirection);
	}
}