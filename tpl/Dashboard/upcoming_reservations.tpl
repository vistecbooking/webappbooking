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


<div class="dashboard upcomingReservationsDashboard" id="upcomingReservationsDashboard">
	<div class="dashboardHeader">
		<div class="pull-left">{translate key="UpcomingReservations"} <span class="badge">{$Total}</span></div>
		<div class="pull-right">
			<a href="#" title="{translate key=ShowHide} {translate key="UpcomingReservations"}">
				<i class="glyphicon"></i>
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="dashboardContents">
	
		<table id="table_id" class="display">
		    <thead>
		        <tr>
		        	<th style="width: 15px !important;">No</th>
		            <th>User</th>
		            <th>Resource</th>
		            <th>Start </th>
		            <th>End</th>
		            <th>Remaining time</th>
		        </tr>
		    </thead>
		    <tbody>
		        {assign var=colspan value="5"}
				{if $Total > 0}
					{$i = 0}
					{$j = 1}
					{$todays = 0}
					{$Tomorrows = 0}
					{$ThisWeeks = 0}
					{$NextWeeks = 0}
					{foreach from=$TodaysReservations item=reservation}
					{$todays = 1}
					{$Tomorrows = 0}
					{$ThisWeeks = 0}
					{$NextWeeks = 0}
	                    {include file='Dashboard/dashboard_reservation.tpl' reservation=$reservation}
	                    {$i=$i+1}
	                    {$j=$j+1}
					{/foreach}
					{$i = 0}
					{foreach from=$TomorrowsReservations item=reservation}
					{$todays = 0}
					{$Tomorrows = 1}
					{$ThisWeeks = 0}
					{$NextWeeks = 0}
	                    {include file='Dashboard/dashboard_reservation.tpl' reservation=$reservation}
	                    {$i=$i+1}
	                    {$j=$j+1}
					{/foreach}
					{$i = 0}
					{foreach from=$ThisWeeksReservations item=reservation}
					{$todays = 0}
					{$Tomorrows = 0}
					{$ThisWeeks = 1}
					{$NextWeeks = 0}
	                    {include file='Dashboard/dashboard_reservation.tpl' reservation=$reservation}
	                    {$i=$i+1}
	                    {$j=$j+1}
					{/foreach}

					{$i = 0}
					{foreach from=$NextWeeksReservations item=reservation}
					{$todays = 0}
					{$Tomorrows = 0}
					{$ThisWeeks = 0}
					{$NextWeeks = 1}
	                    {include file='Dashboard/dashboard_reservation.tpl' reservation=$reservation}
	                    {$i=$i+1}
	                    {$j=$j+1}
					{/foreach}
				{else}

				{/if}
		    </tbody>
		</table>
	</div>

	<form id="form-checkin" method="post" action="ajax/reservation_checkin.php?action={ReservationAction::Checkin}">
		<input type="hidden" id="referenceNumber" {formname key=REFERENCE_NUMBER} />
		{csrf_token}
	</form>
</div>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#table_id').DataTable();
	} );


</script>