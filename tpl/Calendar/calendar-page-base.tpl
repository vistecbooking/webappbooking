{*
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
*}
{include file='globalheader.tpl' Select2=true Qtip=true Fullcalendar=true cssFiles='scripts/css/jqtree.css'}

<div id="page-{$pageIdSuffix}">
<div class="container">
    <div class="box box-lg mb-3">
        <h1>Calendar</h1>
        <div class="row">
            <div class="col-12 col-sm-5 col-md-3">
                <div class="form-group mb-0">
                    <label>System</label>
                    <div class="btn-group d-flex" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-success" onclick="displayCalendar()">Booking</button>
                        <button type="button" class="btn btn-outline-secondary" onclick="displayQueue()">Queue</button>
                    </div>
                </div>
            </div>
            <div class="col">
                {include file='Calendar/calendar.filter.tpl'}
            </div>
        </div>
    </div>

    <div id="subscriptionContainer">
        {include file="Calendar/{$subscriptionTpl}" IsSubscriptionAllowed=$IsSubscriptionAllowed IsSubscriptionEnabled=$IsSubscriptionEnabled SubscriptionUrl=$SubscriptionUrl}
    </div>

    <div id="calendarContainer" class="overflow-h radius-lg table-shadow">
        <div id="calendar"></div>
    </div>

    <div id="dayDialog" class="default-box-shadow">
        <a href="#" id="dayDialogCreate">{html_image src="tick.png"}{translate key=CreateReservation}</a>
        <a href="#" id="dayDialogView">{html_image src="search.png"}{translate key=ViewDay}</a>
        <a href="#" id="dayDialogCancel">{html_image src="slash.png"}{translate key=Cancel}</a>
    </div>

    <div
        class="table-responsive table-shadow mb-5"
        id="table-queue"
        style="display: none"
      >
        <table class="table table-vistec table-highlight">
            <thead>
            <tr>
                <th colspan="4">QUEUE</th>
                <th class="text-right">
                <select>
                    <option>Sort by number of queue</option>
                </select>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="withdot">ATR-FTIR</td>
                <td>In queue: 8</td>
                <td>
                <span class="mr-2">In use : Chalantorn N.</span
                ><a href="#">view queue list</a>
                </td>
                <td>Limit time : 12 Hours</td>
                <td class="text-right"><a href="#">view detail</a></td>
            </tr>
            <tr>
                <td class="withdot">ATR-FTIR</td>
                <td>In queue: 8</td>
                <td>
                <span class="mr-2">In use : Chalantorn N.</span
                ><a href="#">view queue list</a>
                </td>
                <td>Limit time : 12 Hours</td>
                <td class="text-right"><a href="#">view detail</a></td>
            </tr>
            <tr>
                <td class="withdot">ATR-FTIR</td>
                <td>In queue: 8</td>
                <td>
                <span class="mr-2">In use : Chalantorn N.</span
                ><a href="#">view queue list</a>
                </td>
                <td>Limit time : 12 Hours</td>
                <td class="text-right"><a href="#">view detail</a></td>
            </tr>
            <tr>
                <td class="withdot">ATR-FTIR</td>
                <td>In queue: 8</td>
                <td>
                <span class="mr-2">In use : Chalantorn N.</span
                ><a href="#">view queue list</a>
                </td>
                <td>Limit time : 12 Hours</td>
                <td class="text-right"><a href="#">view detail</a></td>
            </tr>
            <tr>
                <td class="withdot">ATR-FTIR</td>
                <td>In queue: 8</td>
                <td>
                <span class="mr-2">In use : Chalantorn N.</span
                ><a href="#">view queue list</a>
                </td>
                <td>Limit time : 12 Hours</td>
                <td class="text-right"><a href="#">view detail</a></td>
            </tr>
            <tr>
                <td class="withdot">ATR-FTIR</td>
                <td>In queue: 8</td>
                <td>
                <span class="mr-2">In use : Chalantorn N.</span
                ><a href="#">view queue list</a>
                </td>
                <td>Limit time : 12 Hours</td>
                <td class="text-right"><a href="#">view detail</a></td>
            </tr>
            <tr>
                <td class="withdot">ATR-FTIR</td>
                <td>In queue: 8</td>
                <td>
                <span class="mr-2">In use : Chalantorn N.</span
                ><a href="#">view queue list</a>
                </td>
                <td>Limit time : 12 Hours</td>
                <td class="text-right"><a href="#">view detail</a></td>
            </tr>
            </tbody>
        </table>
    </div>

    {csrf_token}

    {jsfile src="reservationPopup.js"}
    {jsfile src="calendar.js"}
    {jsfile src="ajax-helpers.js"}
    {jsfile src="js/tree.jquery.js"}

    <div class="modal fade" id="moveErrorDialog" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="errorModalLabel">{translate key=ErrorMovingReservation}</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <ul id="moveErrorsList"></ul>
                    </div>
                </div>
                <div class="modal-footer">
                    {ok_button id="moveErrorOk"}
                </div>
            </div>
        </div>
    </div>

    <form id="moveReservationForm">
        <input id="moveReferenceNumber" type="hidden" {formname key=REFERENCE_NUMBER} />
        <input id="moveStartDate" type="hidden" {formname key=BEGIN_DATE} />
        <input id="moveResourceId" type="hidden" {formname key=RESOURCE_ID} value="0" />
        <input id="moveSourceResourceId" type="hidden" {formname key=ORIGINAL_RESOURCE_ID} value="0" />
    </form>

    <script type="text/javascript">
        $(document).ready(function () {

            var options = {
                view: '{$CalendarType|escape:javascript}',
                defaultDate: moment('{$DisplayDate->Format('Y-m-d')}', 'YYYY-MM-DD'),
                todayText: '{{translate key=Today}|escape:'javascript'}',
                dayText: '{{translate key=Day}|escape:'javascript'}',
                monthText: '{{translate key=Month}|escape:'javascript'}',
                weekText: '{{translate key=Week}|escape:'javascript'}',
                dayClickUrl: '{$pageUrl}?ct={CalendarTypes::Day}&sid={$ScheduleId|escape:'javascript'}&rid={$ResourceId|escape:'javascript'}&gid={$GroupId|escape:'javascript'}',
                dayClickUrlTemplate: '{$pageUrl}?ct={CalendarTypes::Day}&sid=[sid]&rid=[rid]&gid=[gid]',
                dayNames: {js_array array=$DayNames},
                dayNamesShort: {js_array array=$DayNamesShort},
                monthNames: {js_array array=$MonthNames},
                monthNamesShort: {js_array array=$MonthNamesShort},
                timeFormat: '{$TimeFormat}',
                dayMonth: '{$DateFormat}',
                /* firstDay: {$FirstDay},*/
                firstDay: 1,
                reservationUrl: '{Pages::RESERVATION}?sid={$ScheduleId|escape:'javascript'}&rid={$ResourceId|escape:'javascript'}',
                reservationUrlTemplate: '{Pages::RESERVATION}?sid=[sid]&rid=[rid]',
                reservable: true,
                eventsUrl: '{$pageUrl}',
                eventsData: {
                    dr: 'events',
                    sid: '{$ScheduleId|escape:'javascript'}',
                    rid: '{$ResourceId|escape:'javascript'}',
                    gid: '{$GroupId|escape:'javascript'}'
                },
                getSubscriptionUrl: '{$pageUrl}?dr=subscription',
                subscriptionEnableUrl: '{$pageUrl}?{QueryStringKeys::ACTION}={CalendarActions::ActionEnableSubscription}',
                subscriptionDisableUrl: '{$pageUrl}?{QueryStringKeys::ACTION}={CalendarActions::ActionDisableSubscription}',
                moveReservationUrl: "{$Path}ajax/reservation_move.php"
            };

            var calendar = new Calendar(options);
            calendar.init();

            calendar.bindResourceGroups({$ResourceGroupsAsJson}, {$SelectedGroupNode|default:0});

        });
    </script>

    <script>
        function displayCalendar(){
            $("#subscriptionContainer").show()
            $("#calendarContainer").show()
            $("#dayDialog").show()
            $("#table-queue").hide()
        }

        function displayQueue(){
            $("#subscriptionContainer").hide()
            $("#calendarContainer").hide()
            $("#dayDialog").hide()
            $("#table-queue").show()
        }
    </script>
</div>
</div>
{include file='globalfooter.tpl'}