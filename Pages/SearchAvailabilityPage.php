<?php

/**
 * Copyright 2017 Nick Korbel
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

// require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'Presenters/SearchAvailabilityPresenter.php');
require_once(ROOT_DIR . 'Pages/SecurePage.php');
// require_once(ROOT_DIR . 'Pages/ActionPage.php');
// require_once(ROOT_DIR . 'lib/Application/Schedule/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Schedule/CalendarSubscriptionService.php');

interface ISearchAvailabilityPage extends ICommonCalendarPage
{
    /**
     * @param ResourceDto[] $resources
     */
    public function SetResources($resources);

    /**
     * @param ResourceType[] $resourceTypes
     */
    public function SetResourceTypes($resourceTypes);

    /**
     * @param AvailableOpeningView[] $openings
     */
    public function ShowOpenings($openings);

    /**
     * @return int
     */
    public function GetRequestedHours();

    /**
     * @return int
     */
    public function GetRequestedMinutes();

    /**
     * @return string
     */
    public function GetRequestedRange();

    /**
     * @return string
     */
    public function GetRequestedStartDate();

    /**
     * @return string
     */
    public function GetRequestedEndDate();

    /**
     * @return int[]
     */
    public function GetResources();

    /**
     * @return int
     */
    public function GetResourceType();

    /**
     * @return int
     */
    public function GetMaxParticipants();

    /**
     * @return AttributeFormElement[]
     */
    public function GetResourceAttributeValues();

    /**
     * @return AttributeFormElement[]
     */
    public function GetResourceTypeAttributeValues();

    /**
     * @param Attribute[] $attributes
     */
    public function SetResourceAttributes($attributes);

    /**
     * @param Attribute[] $attributes
     */
    public function SetResourceTypeAttributes($attributes);
}

class SearchAvailabilityPage extends CommonCalendarPage implements ISearchAvailabilityPage
{
    /**
     * @var SearchAvailabilityPresenter
     */
    private $presenter;

    public function __construct()
    {
        parent::__construct('FindATime', 0);

        $userRepository = new UserRepository();
		$subscriptionService = new CalendarSubscriptionService($userRepository, new ResourceRepository(), new ScheduleRepository());
        $resourceService = ResourceService::Create();
        
		$this->presenter = new SearchAvailabilityPresenter(
				$this,
				new ReservationViewRepository(),
				new CalendarFactory(),
				$subscriptionService,
				$userRepository,
				$resourceService,
                new ScheduleRepository(),
                new ReservationService(new ReservationViewRepository(), new ReservationListingFactory()),
                new ScheduleService(new ScheduleRepository(), $resourceService, new DailyLayoutFactory())
        );
                
        $user = ServiceLocator::GetServer()->GetUserSession();
        $this->Set('Today', Date::Now()->ToTimezone($user->Timezone));
        $this->Set('Tomorrow', Date::Now()->AddDays(1)->ToTimezone($user->Timezone));
    }

    public function RenderSubscriptionDetails()
    {
        $this->Display('Calendar/calendar.subscription.tpl');
    }

    public function ProcessAction()
    {
        $this->presenter->ProcessAction();
    }

    public function ProcessDataRequest($dataRequest)
    {
        $this->presenter->ProcessDataRequest($dataRequest);
    }

    public function ProcessPageLoad()
    {
        $user = ServiceLocator::GetServer()->GetUserSession();
        $this->presenter-> SetResourcesPage();
        $this->presenter->PageLoad($user);
        
        $this->Set('HeaderLabels', Resources::GetInstance()->GetDays('full'));
		$this->Set('Today', Date::Now()->ToTimezone($user->Timezone));
		$this->Set('TimeFormat', Resources::GetInstance()->GetDateFormat('calendar_time'));
        $this->Set('DateFormat', Resources::GetInstance()->GetDateFormat('calendar_dates'));
        
        $this->Display('SearchAvailability/search-availability.tpl');
    }

    public function SetResources($resources)
    {
        $this->Set('Resources', $resources);
    }

    public function SetResourceTypes($resourceTypes)
    {
        $this->Set('ResourceTypes', $resourceTypes);
    }

    public function ShowOpenings($openings)
    {
        $this->Set('Openings', $openings);
        $this->Display('SearchAvailability/search-availability-results.tpl');
    }

    public function GetRequestedHours()
    {
        return intval($this->GetForm(FormKeys::HOURS));
    }

    public function GetRequestedMinutes()
    {
        return intval($this->GetForm(FormKeys::MINUTES));
    }

    public function GetRequestedRange()
    {
        return $this->GetForm(FormKeys::AVAILABILITY_RANGE);
    }

    public function GetRequestedStartDate()
    {
        return $this->GetForm(FormKeys::BEGIN_DATE);
    }

    public function GetRequestedEndDate()
    {
        return $this->GetForm(FormKeys::END_DATE);
    }

    public function GetResources()
    {
        $resources = $this->GetForm(FormKeys::RESOURCE_ID);
        if (empty($resources))
        {
            return array();
        }

        return $resources;
    }

    public function GetResourceType()
    {
        return $this->GetForm(FormKeys::RESOURCE_TYPE_ID);
    }

    public function GetMaxParticipants()
    {
       return $this->GetForm(FormKeys::MAX_PARTICIPANTS);
    }

    public function GetResourceAttributeValues()
    {
        return AttributeFormParser::GetAttributes($this->GetForm('r' . FormKeys::ATTRIBUTE_PREFIX));
    }

    public function GetResourceTypeAttributeValues()
    {
        return AttributeFormParser::GetAttributes($this->GetForm('rt' . FormKeys::ATTRIBUTE_PREFIX));
    }

    public function SetResourceAttributes($attributes)
    {
       $this->Set('ResourceAttributes', $attributes);
    }

    public function SetResourceTypeAttributes($attributes)
    {
        $this->Set('ResourceTypeAttributes', $attributes);
    }
}

class CalendarUrl
{
    private $url;

    private function __construct($year, $month, $day, $type)
    {
        // TODO: figure out how to get these values without coupling to the query string
        $resourceId = ServiceLocator::GetServer()->GetQuerystring(QueryStringKeys::RESOURCE_ID);
        $scheduleId = ServiceLocator::GetServer()->GetQuerystring(QueryStringKeys::SCHEDULE_ID);

        $format = Pages::OPENINGS . '?'
            . QueryStringKeys::DAY . '=%d&'
            . QueryStringKeys::MONTH . '=%d&'
            . QueryStringKeys::YEAR . '=%d&'
            . QueryStringKeys::CALENDAR_TYPE . '=%s&'
            . QueryStringKeys::RESOURCE_ID . '=%s&'
            . QueryStringKeys::SCHEDULE_ID . '=%s';

        $this->url = sprintf($format, $day, $month, $year, $type, $resourceId, $scheduleId);
    }

    /**
     * @static
     * @param $date Date
     * @param $type string
     * @return PersonalCalendarUrl
     */
    public static function Create($date, $type)
    {
        return new CalendarUrl($date->Year(), $date->Month(), $date->Day(), $type);
    }

    public function __toString()
    {
        return $this->url;
    }
}
