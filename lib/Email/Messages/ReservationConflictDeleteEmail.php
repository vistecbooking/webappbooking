<?php
/**
 * Copyright 2017 Nick Korbel
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

require_once(ROOT_DIR . 'lib/Email/namespace.php');

class ReservationConflictDeleteEmail extends EmailMessage
{
    /**
     * @var string
     */
    private $txt;


    /**
     * @var null|UserSession
     */
    private $userSession;

     /**
     * @var User
     */
    private $user;

    public function __construct(User $user, $txt, $userSession = null)
    {
        $this->txt = $txt;
        $this->userSession = $userSession;
        $this->user = $user;
        parent::__construct(Configuration::Instance()->GetKey(ConfigKeys::LANGUAGE));
        Log::Debug('class ReservationConflictDeleteEmail %s %s', $EmailAddressTo,  $FullNameTo);
    }

    /**
     * @return array|EmailAddress[]|EmailAddress
     */
    function To()
    {
        Log::Debug('class ReservationConflictDeleteEmail To %s %s', $this->user->EmailAddress(),  $this->user->FullName());
        return new EmailAddress($this->user->EmailAddress(), $this->user->FullName());
    }

    /**
     * @return string
     */
    function Subject()
    {
        return "Your Reservation is Conflict with Blockout time";
    }

    /**
     * @return string
     */
    function Body()
    {
        $this->Set('Txt', $this->txt);
        $this->Set('AppTitle', Configuration::Instance()->GetKey(ConfigKeys::APP_TITLE));
        $this->Set('ScriptUrl', Configuration::Instance()->GetScriptUrl());

        return $this->FetchTemplate('ReservationConflictDelete.tpl');
    }
}