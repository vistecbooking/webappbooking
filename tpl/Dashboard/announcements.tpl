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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<style type="text/css">
	#table_id_info{
		display: none;
	}
	.row:before {
	    display: table;
	    content: none;
	}
</style>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<div class="dashboard" id="announcementsDashboard">
	<div class="dashboardHeader">
		<div class="pull-left">{translate key="Announcements"} <span class="badge">{$Announcements|count}</span></div>
		<div class="pull-right">
			<a href="#" title="{translate key=ShowHide} {translate key="Announcements"}">
				<i class="glyphicon"></i>
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="dashboardContents">
		<table id="table_announ" class="display" style="width: 99% !important">
		    <thead>
		        <tr>
		        	<th style="width: 5% !important;text-align: center !important;"  rowspan="2">No</th>
					<th style="width: 20%% !important;text-align: center !important;"  rowspan="2">Instrument</th>
		            <th style="width: 30% !important;text-align: center !important;"  rowspan="2">Event Title</th>
		            <th style="text-align: center !important;" colspan="2"> Event Period </th>
		            <th style="width: 15% !important;text-align: center !important;" rowspan="2">Announcement date</th>
		        </tr>
				 <tr>
		        	<th style="width: 15% !important;text-align: center !important;">Start </th>
		            <th style="width: 15% !important;text-align: center !important;">End</th>
		        </tr>
		    </thead>
			<tbody>
			{$i = 0}
				{foreach from=$Announcements item=each}
					{$i=$i+1}
					<tr>
						<td>{$i}</td>
						<td>
							{if $each->IsBlackout()}
								{$each->ResourcesBlackout()}
							{else}
								-
							{/if}
						</td>
						<td>
							<b>{$each->Text()|html_entity_decode|url2link|nl2br}</b>
						</td>
						<td>
							{if $each->IsBlackout()}
								{formatdate date=$each->StartBlackout() format='D, m/d h:i A'}
							{else}
								-
							{/if}
						</td>
						<td>
							{if $each->IsBlackout()}
								{formatdate date=$each->EndBlackout() format='D, m/d h:i A'}
							{else}
								-
							{/if}
						</td>
						<td>
							{formatdate date=$each->Start() format='D, m/d'} {date('h:i A', strtotime($each->timeStart()))}
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	    $('#table_announ').DataTable();
	} );
</script>