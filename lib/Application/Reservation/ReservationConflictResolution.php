<?php
/**
 * Copyright 2011-2017 Nick Korbel
 *
 * This file is part of Booked Scheduler is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'lib/Email/Messages/ReservationConflictDeleteEmail.php');

interface IReservationConflictResolution
{
	/**
	 * @param ReservationItemView $existingReservation
	 * @param Blackout $blackout
	 * @return bool
	 */
	public function Handle(ReservationItemView $existingReservation, Blackout $blackout);
}

abstract class ReservationConflictResolution implements IReservationConflictResolution
{
	const BookAround = 'bookAround';
	const Delete = 'delete';
	const Notify = 'notify';

	protected function __construct()
	{
	}

	/**
	 * @param string|ReservationConflictResolution $resolutionType
	 * @return ReservationConflictResolution
	 */
	public static function Create($resolutionType)
	{
		if ($resolutionType == self::Delete)
		{
			return new ReservationConflictDelete(new ReservationRepository());
		}
		if ($resolutionType == self::BookAround)
		{
			return new ReservationConflictBookAround();
		}
		return new ReservationConflictNotify(new ReservationRepository());
	}
}

class ReservationConflictNotify extends ReservationConflictResolution
{
	/**
	 * @var IReservationRepository
	 */
	private $repository;

	public function __construct(IReservationRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function Handle(ReservationItemView $existingReservation, Blackout $blackout)
	{
		date_default_timezone_set('Asia/Bangkok'); 

		$txt = "";
		$start_blackout = date("Y-m-d H:i:s", strtotime($blackout->StartDate()));
		$end_blackout = date("Y-m-d H:i:s", strtotime($blackout->EndDate()));
			
		Log::Debug('ReservationConflictDelete delete lise. Ids=%s', $existingReservation->GetId());
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
		mysqli_set_charset($conn,"utf8");

		$sql2 = "SELECT * FROM `reservation_series` LEFT JOIN `users` ON `reservation_series`.`owner_id` = `users`.`user_id` LEFT JOIN `reservation_instances` ON `reservation_series`.`series_id` = `reservation_instances`.`series_id` LEFT JOIN `reservation_resources` ON `reservation_resources`.`series_id` = `reservation_series`.`series_id` WHERE `reservation_instances`.`reservation_instance_id` = ".$existingReservation->GetId() ;
		$result_sql = $conn->query($sql2);
		$row = $result_sql->fetch_assoc();

		$start_reservation = date("Y-m-d H:i:s", strtotime($row['start_date']));
		$end_reservation = date("Y-m-d H:i:s", strtotime($row['end_date']));
		$resource_id = $row['resource_id'];
		$reservation_instance_id = $row['reservation_instance_id'];
		$user_id = $row['user_id'];

		$userRepository = new UserRepository();
		$user = $userRepository->LoadById($user_id);

		// in period, delete
		if(($start_reservation >= $start_blackout && $start_reservation <= $end_blackout) &&
			($end_reservation >= $start_blackout && $end_reservation <= $end_blackout))
		{
			$txt = "Blockout time has create. So, Your Reservation will be delete.";
			$txt .= "<br/>";
			$txt .= "Information in below.";
			$txt .= "<br/>";
			$txt .= "<br/>";

			$txt .= "Your Reservation <b>".$row['title']."</b>";
			if($row['description']){
				$txt .= "[".$row['description']."]";
			}
			$txt .= "<br/>";
			$txt .= "Start Date Time: ".$row['start_date'];
			$txt .= "<br/>";
			$txt .= "End Date Time: ".$row['end_date'];
			$txt .= "<br/>";
			$txt .= "<br/>";
			$txt .= "<br/>";
			$txt .= "Sorry for the inconvenience.";

			$reservation = $this->repository->LoadById($existingReservation->GetId());
			$reservation->ApplyChangesTo(SeriesUpdateScope::ThisInstance);
			$reservation->Delete(ServiceLocator::GetServer()->GetUserSession());
			$this->repository->Delete($reservation);
		}
		// overlap, edit end data of reservation
		else if((($start_reservation >= $start_blackout && $start_reservation <= $end_blackout) == false &&
			($end_reservation >= $start_blackout && $end_reservation <= $end_blackout)) ||
			(($start_reservation >= $start_blackout && $start_reservation <= $end_blackout) == false &&
			($end_reservation >= $start_blackout && $end_reservation <= $end_blackout == false)))
		{
			$week = date('w', strtotime($blackout->StartDate()));
			$start_date = date('Y-m-d', strtotime($blackout->StartDate()));
			$start_time = date('H:i:s', strtotime($blackout->StartDate()));

			$sql3 = "SELECT `time_blocks`.* FROM `resources` INNER JOIN `schedules` ON `schedules`.`schedule_id` = `resources`.`schedule_id` INNER JOIN `time_blocks` ON `time_blocks`.`layout_id` = `schedules`.`layout_id` WHERE `resources`.`resource_id` = ".$resource_id." AND (`time_blocks`.`day_of_week` = ".$week." OR `time_blocks`.`day_of_week` IS NULL) AND `time_blocks`.`end_time` >= '".$start_time."' ORDER BY end_time LIMIT 0,1 ";
			$result_sql3 = $conn->query($sql3);
			$row3 = $result_sql3->fetch_assoc();
			$end_time_for_update = $row3['end_time'];

			$end_date_update_str = $start_date." ".$end_time_for_update;
			$end_date_update = date('Y-m-d H:i:s', strtotime($end_date_update_str));

			if($start_reservation != $end_date_update)
			{
				$sql4 = "UPDATE `reservation_instances` SET `end_date` = '".$end_date_update."' WHERE `reservation_instance_id` = ".$reservation_instance_id;
				$result_sql4 = $conn->query($sql4);

				$txt = "Blockout time has create, Your Reservation has changed the end date time.";
				$txt .= "<br/>";
				$txt .= "Information in below.";
				$txt .= "<br/>";
				$txt .= "<br/>";

				$txt .= "Your Reservation <b>".$row['title']."</b>";
				if($row['description']){
					$txt .= "[".$row['description']."]";
				}
				$txt .= "<br/>";
				$txt .= "Start Date Time: ".$row['start_date'];
				$txt .= "<br/>";
				$txt .= "End Date Time: ".$end_date_update;
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "Sorry for the inconvenience.";
			}
			else
			{
				$txt = "Blockout time has create. So, Your Reservation will be delete.";
				$txt .= "<br/>";
				$txt .= "Information in below.";
				$txt .= "<br/>";
				$txt .= "<br/>";

				$txt .= "Your Reservation <b>".$row['title']."</b>";
				if($row['description']){
					$txt .= "[".$row['description']."]";
				}
				$txt .= "<br/>";
				$txt .= "Start Date Time: ".$row['start_date'];
				$txt .= "<br/>";
				$txt .= "End Date Time: ".$row['end_date'];
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "Sorry for the inconvenience.";

				$reservation = $this->repository->LoadById($existingReservation->GetId());
				$reservation->ApplyChangesTo(SeriesUpdateScope::ThisInstance);
				$reservation->Delete(ServiceLocator::GetServer()->GetUserSession());
				$this->repository->Delete($reservation);
			}
		}
		// overlap, edit start data of reservation
		else if(($start_reservation >= $start_blackout && $start_reservation <= $end_blackout) &&
			($end_reservation >= $start_blackout && $end_reservation <= $end_blackout) == false)
		{
			$week = date('w', strtotime($blackout->EndDate()));
			$end_date = date('Y-m-d', strtotime($blackout->EndDate()));
			$end_time = date('H:i:s', strtotime($blackout->EndDate()));

			$sql3 = "SELECT `time_blocks`.* FROM `resources` INNER JOIN `schedules` ON `schedules`.`schedule_id` = `resources`.`schedule_id` INNER JOIN `time_blocks` ON `time_blocks`.`layout_id` = `schedules`.`layout_id` WHERE `resources`.`resource_id` = ".$resource_id." AND (`time_blocks`.`day_of_week` = ".$week." OR `time_blocks`.`day_of_week` IS NULL) AND `time_blocks`.`start_time` >= '".$end_time."' ORDER BY start_time LIMIT 0,1 ";
			$result_sql3 = $conn->query($sql3);
			$row3 = $result_sql3->fetch_assoc();
			$start_time_for_update = $row3['start_time'];

			$start_date_update_str = $end_date." ".$start_time_for_update;
			$start_date_update = date('Y-m-d H:i:s', strtotime($start_date_update_str));

			if($start_date_update != $end_reservation)
			{
				$sql4 = "UPDATE `reservation_instances` SET `start_date` = '".$start_date_update."' WHERE `reservation_instance_id` = ".$reservation_instance_id;
				$result_sql4 = $conn->query($sql4);

				$txt = "Blockout time has create, Your Reservation has changed the start date time.";
				$txt .= "<br/>";
				$txt .= "Information in below.";
				$txt .= "<br/>";
				$txt .= "<br/>";

				$txt .= "Your Reservation <b>".$row['title']."</b>";
				if($row['description']){
					$txt .= "[".$row['description']."]";
				}
				$txt .= "<br/>";
				$txt .= "Start Date Time: ".$start_date_update;
				$txt .= "<br/>";
				$txt .= "End Date Time: ".$row['end_date'];
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "Sorry for the inconvenience.";
			}
			else
			{
				$txt = "Blockout time has create. So, Your Reservation will be delete.";
				$txt .= "<br/>";
				$txt .= "Information in below.";
				$txt .= "<br/>";
				$txt .= "<br/>";

				$txt .= "Your Reservation <b>".$row['title']."</b>";
				if($row['description']){
					$txt .= "[".$row['description']."]";
				}
				$txt .= "<br/>";
				$txt .= "Start Date Time: ".$row['start_date'];
				$txt .= "<br/>";
				$txt .= "End Date Time: ".$row['end_date'];
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "Sorry for the inconvenience.";

				$reservation = $this->repository->LoadById($existingReservation->GetId());
				$reservation->ApplyChangesTo(SeriesUpdateScope::ThisInstance);
				$reservation->Delete(ServiceLocator::GetServer()->GetUserSession());
				$this->repository->Delete($reservation);
			}
		}

		ServiceLocator::GetEmailService()->Send(new ReservationConflictDeleteEmail($user,$txt,ServiceLocator::GetServer()->GetUserSession()));
     
		return false;
	}
}

class ReservationConflictDelete extends ReservationConflictResolution
{
	/**
	 * @var IReservationRepository
	 */
	private $repository;
	private $phpMailer;

	public function __construct(IReservationRepository $repository)
	{
		$this->repository = $repository;
	}

	public function Handle(ReservationItemView $existingReservation, Blackout $blackout)
	{
		date_default_timezone_set('Asia/Bangkok'); 

		$txt = "";
		$start_blackout = date("Y-m-d H:i:s", strtotime($blackout->StartDate()));
		$end_blackout = date("Y-m-d H:i:s", strtotime($blackout->EndDate()));
			
		Log::Debug('ReservationConflictDelete delete lise. Ids=%s', $existingReservation->GetId());
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
		mysqli_set_charset($conn,"utf8");

		$sql2 = "SELECT * FROM `reservation_series` LEFT JOIN `users` ON `reservation_series`.`owner_id` = `users`.`user_id` LEFT JOIN `reservation_instances` ON `reservation_series`.`series_id` = `reservation_instances`.`series_id` LEFT JOIN `reservation_resources` ON `reservation_resources`.`series_id` = `reservation_series`.`series_id` WHERE `reservation_instances`.`reservation_instance_id` = ".$existingReservation->GetId() ;
		$result_sql = $conn->query($sql2);
		$row = $result_sql->fetch_assoc();

		$start_reservation = date("Y-m-d H:i:s", strtotime($row['start_date']));
		$end_reservation = date("Y-m-d H:i:s", strtotime($row['end_date']));
		$resource_id = $row['resource_id'];
		$reservation_instance_id = $row['reservation_instance_id'];
		$user_id = $row['user_id'];

		$userRepository = new UserRepository();
		$user = $userRepository->LoadById($user_id);

		// in period, delete
		if(($start_reservation >= $start_blackout && $start_reservation <= $end_blackout) &&
			($end_reservation >= $start_blackout && $end_reservation <= $end_blackout))
		{
			$txt = "Blockout time has create. So, Your Reservation will be delete.";
			$txt .= "<br/>";
			$txt .= "Information in below.";
			$txt .= "<br/>";
			$txt .= "<br/>";

			$txt .= "Your Reservation <b>".$row['title']."</b>";
			if($row['description']){
				$txt .= "[".$row['description']."]";
			}
			$txt .= "<br/>";
			$txt .= "Start Date Time: ".$row['start_date'];
			$txt .= "<br/>";
			$txt .= "End Date Time: ".$row['end_date'];
			$txt .= "<br/>";
			$txt .= "<br/>";
			$txt .= "<br/>";
			$txt .= "Sorry for the inconvenience.";

			$reservation = $this->repository->LoadById($existingReservation->GetId());
			$reservation->ApplyChangesTo(SeriesUpdateScope::ThisInstance);
			$reservation->Delete(ServiceLocator::GetServer()->GetUserSession());
			$this->repository->Delete($reservation);
		}
		// overlap, edit end data of reservation
		else if((($start_reservation >= $start_blackout && $start_reservation <= $end_blackout) == false &&
			($end_reservation >= $start_blackout && $end_reservation <= $end_blackout)) ||
			(($start_reservation >= $start_blackout && $start_reservation <= $end_blackout) == false &&
			($end_reservation >= $start_blackout && $end_reservation <= $end_blackout == false)))
		{
			$week = date('w', strtotime($blackout->StartDate()));
			$start_date = date('Y-m-d', strtotime($blackout->StartDate()));
			$start_time = date('H:i:s', strtotime($blackout->StartDate()));

			$sql3 = "SELECT `time_blocks`.* FROM `resources` INNER JOIN `schedules` ON `schedules`.`schedule_id` = `resources`.`schedule_id` INNER JOIN `time_blocks` ON `time_blocks`.`layout_id` = `schedules`.`layout_id` WHERE `resources`.`resource_id` = ".$resource_id." AND (`time_blocks`.`day_of_week` = ".$week." OR `time_blocks`.`day_of_week` IS NULL) AND `time_blocks`.`end_time` >= '".$start_time."' ORDER BY end_time LIMIT 0,1 ";
			$result_sql3 = $conn->query($sql3);
			$row3 = $result_sql3->fetch_assoc();
			$end_time_for_update = $row3['end_time'];

			$end_date_update_str = $start_date." ".$end_time_for_update;
			$end_date_update = date('Y-m-d H:i:s', strtotime($end_date_update_str));

			if($start_reservation != $end_date_update)
			{
				$sql4 = "UPDATE `reservation_instances` SET `end_date` = '".$end_date_update."' WHERE `reservation_instance_id` = ".$reservation_instance_id;
				$result_sql4 = $conn->query($sql4);

				$txt = "Blockout time has create, Your Reservation has changed the end date time.";
				$txt .= "<br/>";
				$txt .= "Information in below.";
				$txt .= "<br/>";
				$txt .= "<br/>";

				$txt .= "Your Reservation <b>".$row['title']."</b>";
				if($row['description']){
					$txt .= "[".$row['description']."]";
				}
				$txt .= "<br/>";
				$txt .= "Start Date Time: ".$row['start_date'];
				$txt .= "<br/>";
				$txt .= "End Date Time: ".$end_date_update;
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "Sorry for the inconvenience.";
			}
			else
			{
				$txt = "Blockout time has create. So, Your Reservation will be delete.";
				$txt .= "<br/>";
				$txt .= "Information in below.";
				$txt .= "<br/>";
				$txt .= "<br/>";

				$txt .= "Your Reservation <b>".$row['title']."</b>";
				if($row['description']){
					$txt .= "[".$row['description']."]";
				}
				$txt .= "<br/>";
				$txt .= "Start Date Time: ".$row['start_date'];
				$txt .= "<br/>";
				$txt .= "End Date Time: ".$row['end_date'];
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "Sorry for the inconvenience.";

				$reservation = $this->repository->LoadById($existingReservation->GetId());
				$reservation->ApplyChangesTo(SeriesUpdateScope::ThisInstance);
				$reservation->Delete(ServiceLocator::GetServer()->GetUserSession());
				$this->repository->Delete($reservation);
			}
		}
		// overlap, edit start data of reservation
		else if(($start_reservation >= $start_blackout && $start_reservation <= $end_blackout) &&
			($end_reservation >= $start_blackout && $end_reservation <= $end_blackout) == false)
		{
			$week = date('w', strtotime($blackout->EndDate()));
			$end_date = date('Y-m-d', strtotime($blackout->EndDate()));
			$end_time = date('H:i:s', strtotime($blackout->EndDate()));

			$sql3 = "SELECT `time_blocks`.* FROM `resources` INNER JOIN `schedules` ON `schedules`.`schedule_id` = `resources`.`schedule_id` INNER JOIN `time_blocks` ON `time_blocks`.`layout_id` = `schedules`.`layout_id` WHERE `resources`.`resource_id` = ".$resource_id." AND (`time_blocks`.`day_of_week` = ".$week." OR `time_blocks`.`day_of_week` IS NULL) AND `time_blocks`.`start_time` >= '".$end_time."' ORDER BY start_time LIMIT 0,1 ";
			$result_sql3 = $conn->query($sql3);
			$row3 = $result_sql3->fetch_assoc();
			$start_time_for_update = $row3['start_time'];

			$start_date_update_str = $end_date." ".$start_time_for_update;
			$start_date_update = date('Y-m-d H:i:s', strtotime($start_date_update_str));

			if($start_date_update != $end_reservation)
			{
				$sql4 = "UPDATE `reservation_instances` SET `start_date` = '".$start_date_update."' WHERE `reservation_instance_id` = ".$reservation_instance_id;
				$result_sql4 = $conn->query($sql4);

				$txt = "Blockout time has create, Your Reservation has changed the start date time.";
				$txt .= "<br/>";
				$txt .= "Information in below.";
				$txt .= "<br/>";
				$txt .= "<br/>";

				$txt .= "Your Reservation <b>".$row['title']."</b>";
				if($row['description']){
					$txt .= "[".$row['description']."]";
				}
				$txt .= "<br/>";
				$txt .= "Start Date Time: ".$start_date_update;
				$txt .= "<br/>";
				$txt .= "End Date Time: ".$row['end_date'];
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "Sorry for the inconvenience.";
			}
			else
			{
				$txt = "Blockout time has create. So, Your Reservation will be delete.";
				$txt .= "<br/>";
				$txt .= "Information in below.";
				$txt .= "<br/>";
				$txt .= "<br/>";

				$txt .= "Your Reservation <b>".$row['title']."</b>";
				if($row['description']){
					$txt .= "[".$row['description']."]";
				}
				$txt .= "<br/>";
				$txt .= "Start Date Time: ".$row['start_date'];
				$txt .= "<br/>";
				$txt .= "End Date Time: ".$row['end_date'];
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "<br/>";
				$txt .= "Sorry for the inconvenience.";

				$reservation = $this->repository->LoadById($existingReservation->GetId());
				$reservation->ApplyChangesTo(SeriesUpdateScope::ThisInstance);
				$reservation->Delete(ServiceLocator::GetServer()->GetUserSession());
				$this->repository->Delete($reservation);
			}
		}

		ServiceLocator::GetEmailService()->Send(new ReservationConflictDeleteEmail($user,$txt,ServiceLocator::GetServer()->GetUserSession()));
     
		return true;
	}
}

class ReservationConflictBookAround extends ReservationConflictResolution
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Handle(ReservationItemView $existingReservation, Blackout $blackout)
    {
        $originalStart = $blackout->StartDate();
        $originalEnd = $blackout->EndDate();
        $reservationStart = $existingReservation->StartDate;
        $reservationEnd = $existingReservation->EndDate;
        $timezone = $blackout->StartDate()->Timezone();

        if ($originalStart->LessThan($reservationStart) && $originalEnd->GreaterThan($reservationEnd))
        {
            Log::Debug('Blackout around reservation %s start %s end %s', $existingReservation->GetId(), $reservationStart, $reservationEnd);

            $blackout->SetDate(new DateRange($originalStart, $reservationStart->ToTimezone($timezone)));
            $blackout->GetSeries()->AddBlackout(new Blackout(new DateRange($reservationEnd->ToTimezone($timezone), $originalEnd)));
            return true;
        }

        if ($originalStart->LessThan($reservationStart) && $originalEnd->GreaterThan($reservationStart) && $originalEnd->LessThanOrEqual($reservationEnd))
        {
            $blackout->SetDate(new DateRange($originalStart, $reservationStart->ToTimezone($timezone)));
            return true;
        }

        if ($originalStart->GreaterThan($reservationStart) && $originalStart->LessThanOrEqual($reservationEnd) && $originalEnd->GreaterThan($reservationEnd))
        {
            $blackout->SetDate(new DateRange($reservationEnd->ToTimezone($timezone), $originalEnd));
            return true;
        }

        if ($originalStart->GreaterThanOrEqual($reservationStart) && $originalEnd->LessThanOrEqual($reservationEnd))
        {
            return $blackout->GetSeries()->Delete($blackout);
        }

        return false;
    }
}