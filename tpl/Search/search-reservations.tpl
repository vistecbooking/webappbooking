{*
Copyright 2017 Nick Korbel

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
*}

{include file='globalheader.tpl' Select2=true Qtip=true}
{cssfile src='scripts/newcss/calendar.css'}

<div class="page-search-reservations">

    <form role="form" name="searchForm" id="searchForm" method="post"
          action="{$smarty.server.SCRIPT_NAME}?action=search">

        <div class="container">
      <div class="box box-lg mb-2">
        <h2>Search reservation</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="user">Users</label>
                <input
                  id="userFilter" type="search" class="form-control" value="{$UserNameFilter}"
                   placeholder="{translate key=User}"
                />
                <span class="searchclear glyphicon glyphicon-remove-circle" ref="userFilter,userId"></span>
                <input id="userId" type="hidden" {formname key=USER_ID} value="{$UserIdFilter}"/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md">
            <div class="form-group">
                <label for="resources">Equipment</label>
                <select id="resources" class="form-control" multiple="multiple" {formname key=RESOURCE_ID multi=true}>
                    {foreach from=$Resources item=resource}
                        <option value="{$resource->GetId()}">{$resource->GetName()}</option>
                    {/foreach}
                </select>
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
                <label for="schedules">Schedules</label>
                <select id="schedules" class="form-control" multiple="multiple" {formname key=SCHEDULE_ID multi=true}>
                    {foreach from=$Schedules item=schedule}
                        <option value="{$schedule->GetId()}">{$schedule->GetName()}</option>
                    {/foreach}
                </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="search" id="title" class="form-control" {formname key=RESERVATION_TITLE}
                   placeholder="{translate key=Title}"/>
                <span class="searchclear glyphicon glyphicon-remove-circle" ref="title"></span>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                <label for="referenceNumber">Reference Number</label>
                <input type="search" id="referenceNumber" class="form-control" {formname key=REFERENCE_NUMBER} placeholder="{translate key=ReferenceNumber}"/>
                <span class="searchclear glyphicon glyphicon-remove-circle" ref="referenceNumber"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="description">Description</label>
                <input type="search" id="description" class="form-control" {formname key=DESCRIPTION}
                   placeholder="{translate key=Description}"/>
                <span class="searchclear glyphicon glyphicon-remove-circle" ref="description"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5">
            <div class="form-group">
              <label for="">In</label>
              <div
                class="btn-group btn-group-toggle d-flex"
                data-toggle="buttons"
              >
                <label class="btn btn-outline-success">
                    <input type="radio" id="today"
                           value="today" {formname key=AVAILABILITY_RANGE} />
                    <span class="hidden-xs">{translate key=Today}</span>
                    <span> {format_date date=$Today key=calendar_dates}</span>
                </label>
                <label class="btn btn-outline-success">
                  <input type="radio" id="tomorrow" value="tomorrow" {formname key=AVAILABILITY_RANGE} />
                  Tomorrow
                </label>
                <label class="btn btn-outline-success">
                  <input type="radio" id="thisweek" value="thisweek" {formname key=AVAILABILITY_RANGE} />
                  This week
                </label>
                <label class="btn btn-outline-success active">
                  <input type="radio" id="daterange" value="daterange" checked="checked" 
                  {formname key=AVAILABILITY_RANGE} />
                  Custom date
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-auto">
                <input type="text" id="beginDate" class="inline dateinput"
                   placeholder="{translate key=BeginDate}"/>
            <input type="hidden" id="formattedBeginDate" {formname key=BEGIN_DATE}
                   value="{formatdate date=$BeginDate key=system}"/>
            -
            <input type="text" id="endDate" class="inline dateinput"
                   placeholder="{translate key=EndDate}"/>
            <input type="hidden" id="formattedEndDate" {formname key=END_DATE}
                   value="{formatdate date=$EndDate key=system}"/>
            </div>
        </div>
        <div class="row justify-content-center">
          <button type="submit" class="btn btn-success search" value="submit" {formname key=SUBMIT}>Search</button>
          {indicator}
        </div>
      </div>
    </div>

        <div class="clearfix"></div>

        <div class="clearfix"></div>

        <div class="clearfix"></div>

    </form>

    <div class="clearfix"></div>

    <div class="container-fluid">
    <div id="reservation-results" class="table-responsive table-shadow"></div>
    </div>

    {csrf_token}

    {jsfile src="js/jquery.cookie.js"}
    {jsfile src="ajax-helpers.js"}
    {jsfile src="resourcePopup.js"}
    {jsfile src="autocomplete.js"}
    {jsfile src="reservationPopup.js"}
    {jsfile src="reservation-search.js"}
    {jsfile src="search-clear.js"}

    {control type="DatePickerSetupControl" ControlId="beginDate" AltId="formattedBeginDate" DefaultDate=$BeginDate}
    {control type="DatePickerSetupControl" ControlId="endDate" AltId="formattedEndDate" DefaultDate=$EndDate}

    <script type="text/javascript">

        $(document).ready(function () {
            var opts = {
                autocompleteUrl: "{$Path}ajax/autocomplete.php?type={AutoCompleteType::User}",
                reservationUrlTemplate: "{$Path}reservation.php?{QueryStringKeys::REFERENCE_NUMBER}=[refnum]",
                popupUrl: "{$Path}ajax/respopup.php"
            };

            var search = new ReservationSearch(opts);
            search.init();


            $('#resources').select2({
                placeholder: '{translate key=Resources}'
            });

            $('#schedules').select2({
                placeholder: '{translate key=Schedules}'
            });
        });
    </script>
</div>
