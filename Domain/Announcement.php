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

class Announcement
{
    private $Id;
    private $Text;
    private $Start;
    private $timeStart;
    private $End;
    private $timeend;
    private $Priority;
    private $GroupIds;
    private $ResourceIds;
    private $update_date;
    private $create_date;

    private $is_blackout;
    private $resources_blackout;
    private $start_blackout;
    private $end_blackout;
    
    /**
     * @return int
     */
    public function Id()
    {
        return $this->Id;
    }

    /**
     * @return string
     */
    public function Text()
    {
        return $this->Text;
    }

    /**
     * @return Date
     */
    public function Start()
    {
        return $this->Start;
    }

    public function Update_date()
    {
        return $this->update_date;
    }
    
    public function Create_date()
    {
        return $this->create_date;
    }
	 /**
     * @return String
     */
    public function timeStart()
    {
        //return $this->timeStart;
		return empty($this->timeStart) ? null : $this->timeStart;
    }
	
    /**
     * @return Date
     */
    public function End()
    {
        return $this->End;
    }
	
	 /**
     * @return String
     */
    public function timeend()
    {
       // return $this->timeend;
		return empty($this->timeend) ? null : $this->timeend;
    }
	
    /**
     * @return int
     */
    public function Priority()
    {
        return empty($this->Priority) ? null : (int)$this->Priority;
    }

    /**
     * @return int[]
     */
    public function GroupIds()
    {
        return empty($this->GroupIds) ? array() : $this->GroupIds;
    }

    /**
     * @return int[]
     */
    public function ResourceIds()
    {
        return empty($this->ResourceIds) ? array() : $this->ResourceIds;
    }

    /**
     * @return bool
     */
    public function IsBlackout()
    {
        return $this->is_blackout;
    }

    /**
     * @return string
     */
    public function ResourcesBlackout()
    {
        return $this->resources_blackout;
    }

    public function StartBlackout()
    {
        return $this->start_blackout;
    }

    public function EndBlackout()
    {
        return $this->end_blackout;
    }

    public function __construct($id, $text, Date $start, Date $end, $priority, $groupIds, $resourceIds,$timeStart,$timeend,$update_date,$create_date)
    {
        $this->Id = $id;
		$text = str_replace('&lt;script&gt;', '', $text);
		$text = str_replace('&lt;/script&gt;', '', $text);
        $this->Text = $text;
        $this->Start = $start;
        $this->End = $end;
        $this->Priority = $priority;
        $this->GroupIds = $groupIds;
        $this->ResourceIds = $resourceIds;
		$this->timeStart = $timeStart;
        $this->timeend = $timeend;
		$this->update_date = $update_date;
		$this->create_date = $create_date;
    }

    public static function FromRow($row)
    {
        $groupIds = $row[ColumnNames::GROUP_IDS];
        $resourceIds = $row[ColumnNames::RESOURCE_IDS];
        Log::Debug('Acco CREATE_DATE is %s', $row[ColumnNames::CREATE_DATE]);
        return new Announcement(
            $row[ColumnNames::ANNOUNCEMENT_ID],
            $row[ColumnNames::ANNOUNCEMENT_TEXT],
            Date::FromDatabase($row[ColumnNames::ANNOUNCEMENT_START]),
            Date::FromDatabase($row[ColumnNames::ANNOUNCEMENT_END]),
            $row[ColumnNames::ANNOUNCEMENT_PRIORITY],
            empty($groupIds) ? array() : explode(',', $groupIds),
            empty($resourceIds) ? array() : explode(',', $resourceIds),
			$row[ColumnNames::ANNOUNCEMENT_TIME_START],
            $row[ColumnNames::ANNOUNCEMENT_TIME_END],
			$row[ColumnNames::UPDATE_DATE],
			$row[ColumnNames::CREATE_DATE]

        );
    }

    /**
     * @static
     * @param string $text
     * @param Date $start
     * @param Date $end
     * @param int $priority
     * @param int[] $groupIds
     * @param int[] $resourceIds
     * @return Announcement
	 
     */
    public static function Create($text, Date $start , Date $end, $priority, $groupIds, $resourceIds, $timeStart, $timeend)
    {
        Log::Debug('Create new Announcement');
        if (empty($priority)) {
            $priority = null;
        }
        return new Announcement(null, $text, $start, $end, $priority, $groupIds, $resourceIds, $timeStart, $timeend);
    }

    /**
     * @param string $text
     */
    public function SetText($text)
    {
        $this->Text = $text;
    }
	
	/**
     * @param string $text
     */
    public function SetTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;
    }
	
	/**
     * @param string $text
     */
    public function SetTimeEnd($timeend)
    {
        $this->timeend = $timeend;
    }

    public function SetUpdateDate($update_date)
    {
        $this->update_date = $update_date;
    }
    

    public function SetCreate_date($create_date)
    {
        $this->create_date = $create_date;
    }
    /**
     * @param Date $start
     * @param Date $end
     */
    public function SetDates(Date $start, Date $end)
    {
        $this->Start = $start;
        $this->End = $end;
    }

    /**
     * @param int $priority
     */
    public function SetPriority($priority)
    {
        $this->Priority = $priority;
    }

    /**
     * @param Array $GroupIds
     */
    public function SetGroupIds($GroupIds)
    {
        $this->GroupIds = $GroupIds;
    }

     /**
     * @param Array $GroupIds
     */
    public function SetResourceIds($ResourceIds)
    {
        $this->ResourceIds = $ResourceIds;
    }

    /**
     * @param bool $is_blackout
     */
    public function SetIsBlackout($isBlackout)
    {
        $this->is_blackout = $isBlackout;
    }

    /**
     * @param string $resources_blackout
     */
    public function SetResourcesBlackout($resources)
    {
        $this->resources_blackout = $resources;
    }

    /**
     * @param Date $start_blackout
     */
    public function SetStartBlackout($start)
    {
        $this->start_blackout = $start;
    }

    /**
     * @param Date $end_blackout
     */
    public function SetEndBlackout($end)
    {
        $this->end_blackout = $end;
    }

    /**
     * @param UserSession $user
     * @param IPermissionService $permissionService
     * @return bool
     */
    public function AppliesToUser(UserSession $user, IPermissionService $permissionService)
    {
        $groupIds = $this->GroupIds();
        $resourceIds = $this->ResourceIds();

        $allowedForGroup = empty($groupIds);
        $allowedForResource = empty($resourceIds);

        foreach ($this->ResourceIds() as $resourceId)
        {
            if ($permissionService->CanAccessResource(new AnnouncementResource($resourceId), $user))
            {
                $allowedForResource = true;
                break;
            }
        }

        foreach ($this->GroupIds() as $groupId)
        {
            if (in_array($groupId, $user->Groups))
            {
                $allowedForGroup = true;
                break;
            }
        }

        return $allowedForGroup && $allowedForResource;
    }
}

class AnnouncementResource implements IPermissibleResource
{
    private $resourceId;

    public function __construct($resourceId)
    {
        $this->resourceId = $resourceId;
    }

    public function GetResourceId()
    {
        return $this->resourceId;
    }
}