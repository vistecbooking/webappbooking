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

require_once (ROOT_DIR . 'Domain/Announcement.php');

class AnnouncementRepository implements IAnnouncementRepository
{
    public function GetFuture()
    {
        $announcements = array();

        $reader = ServiceLocator::GetDatabase()->Query(new GetDashboardAnnouncementsCommand(Date::Now()));

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

        while ($row = $reader->GetRow())
        {
            $announcement = Announcement::FromRow($row);
            $announ_id = $announcement->Id();
            $sql2 = "SELECT * FROM `blackout_series` INNER JOIN `blackout_instances` ON `blackout_instances`.blackout_series_id = `blackout_series`.blackout_series_id WHERE `blackout_series`.announce_id = ".$announ_id;
			$result_sql2 = $conn->query($sql2);
			$row2 = $result_sql2->fetch_assoc();
            $blackout_series_id = $row2["blackout_series_id"];
            $reason = $row2["title"];
            
            if($blackout_series_id != null)
            {
                $resouces = array();
                $sql3 = "SELECT `resources`.name AS resource_name FROM `blackout_series_resources` INNER JOIN `resources` ON `resources`.resource_id = `blackout_series_resources`.resource_id WHERE `blackout_series_resources`.blackout_series_id = ".$blackout_series_id ;
                $result_sql3 = $conn->query($sql3);
                while($row3 = $result_sql3->fetch_assoc()) {
                    array_push($resouces, $row3['resource_name']);
                }
                $resouces_blackout = join(', ', $resouces);

                $event_text = "[".$announcement->Text()."] ".$reason;
                $announcement->SetText($event_text);
                $announcement->SetIsBlackout(true);
                $announcement->SetResourcesBlackout($resouces_blackout);
                $announcement->SetStartBlackout(Date::FromDatabase($row2["start_date"]));
                $announcement->SetEndBlackout(Date::FromDatabase($row2["end_date"]));
            }
            else
            {
                $announcement->SetIsBlackout(false);
            }
            
            $announcements[] = $announcement;
        }

        $reader->Free();

        return $announcements;
    }

    public function GetAll($sortField = null, $sortDirection = null)
    {
        $announcements = array();

        $command = new GetAllAnnouncementsCommand();

        if (!empty($sortField))
        {
            $command = new SortCommand($command, $sortField, $sortDirection);
        }
       // Log::Debug('command GetAllAnnouncementsCommand :'. $command);
        $reader = ServiceLocator::GetDatabase()->Query($command);

        while ($row = $reader->GetRow())
        {
            $announcements[] = Announcement::FromRow($row);
        }

        $reader->Free();

        return $announcements;
    }

    /**
	 * @param int $pageNumber
	 * @param int $pageSize
	 * @param string $sortField
	 * @param string $sortDirection
	 * @return PageableData|Announcement[]
	 */
	public function GetList($pageNumber = null, $pageSize = null, $sortField = null, $sortDirection = null)
    {
        $command = new GetAllAnnouncementsCommand();

        $builder = array('Announcement', 'FromRow');
        return PageableDataStore::GetList($command, $builder, $pageNumber, $pageSize, $sortField, $sortDirection);
    }

    /**
     * @param Announcement $announcement
     */
    public function Add(Announcement $announcement)
    {
        $db = ServiceLocator::GetDatabase();
        $announcementId = $db->ExecuteInsert(new AddAnnouncementCommand($announcement->Text(), $announcement->Start(), $announcement->timeStart(), $announcement->End(), $announcement->timeend(), $announcement->Priority()));
        foreach ($announcement->GroupIds() as $groupId)
        {
            $db->ExecuteInsert(new AddAnnouncementGroupCommand($announcementId, $groupId));
        }

        foreach ($announcement->ResourceIds() as $resourceId)
        {
            $db->ExecuteInsert(new AddAnnouncementResourceCommand($announcementId, $resourceId));
        }
    }

    /**
     * @param int $announcementId
     */
    public function Delete($announcementId,$CancelReason)
    {
        ServiceLocator::GetDatabase()->Execute(new DeleteAnnouncementCommand($announcementId,$CancelReason));
    }

    /**
     * @param int $announcementId
     * @return Announcement
     */
    public function LoadById($announcementId)
    {
        $announcement = null;
        $reader = ServiceLocator::GetDatabase()->Query(new GetAnnouncementByIdCommand($announcementId));

        if ($row = $reader->GetRow())
        {
            $announcement = Announcement::FromRow($row);
        }

        return $announcement;
    }

    public function Update(Announcement $announcement)
    {
        Log::Debug('Update Announcement');
        $this->Delete($announcement->Id(),"Delete for Update by System");
        $this->Add($announcement);
    }
}

interface IAnnouncementRepository
{
    /**
     * Gets all announcements to be displayed for the user
     * @return Announcement[]
     */
    public function GetFuture();

    /**
     * @param null|string $sortField
     * @param null|string $sortDirection
     * @return Announcement[]|array
     */
    public function GetAll($sortField = null, $sortDirection = null);

    /**
     * @param Announcement $announcement
     */
    public function Add(Announcement $announcement);

    /**
     * @param Announcement $announcement
     */
    public function Update(Announcement $announcement);

    /**
     * @param int $announcementId
     */
    public function Delete($announcementId,$CancelReason);

    /**
     * @param int $announcementId
     * @return Announcement
     */
    public function LoadById($announcementId);

    /**
	 * @param int $pageNumber
	 * @param int $pageSize
	 * @param string $sortField
	 * @param string $sortDirection
	 * @return PageableData|Announcement[]
	 */
	public function GetList($pageNumber = null, $pageSize = null, $sortField = null, $sortDirection = null);
}