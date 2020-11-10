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
{include file='globalheader.tpl' Timepicker=true}
{cssfile src='scripts/newcss/quotas.css'}

<div id="page-manage-quotas" class="admin-page">
	 <div class="container">
      <div class="box box-lg mb-4">
        <h2>Quotas</h2>
		<form id="addQuotaForm" method="post" role="form">
			<div class="box box-bordered">
			<h3>Add Quotas</h3>
			<div class="ml-4">
				<div class="row align-items-center">
				<div class="col-lg-auto mb-3">
					<span>On</span>
					<select id='scheduleId' {formname key=SCHEDULE_ID} title='Select Schedule'>
						<option selected='selected' value=''>{translate key=AllSchedules}</option>
						{foreach from=$Schedules item=schedule}
							{if $schedule->GetId() == $FilterSchedule}
								<option value='{$schedule->GetId()}' selected>{$schedule->GetName()|replace:',':' '}</option>
							{else}
								<option value='{$schedule->GetId()}'>{$schedule->GetName()|replace:',':' '}</option>
							{/if}
						{/foreach}
					</select>
				</div>
				<div class="col-lg-auto mb-3">
					<span>For</span>
					<select {formname key=RESOURCE_ID} title='Select Resource'>
						<option selected='selected' value=''>{translate key=AllResources}</option>
						{foreach from=$Resources item=resource}
							<option value='{$resource->GetResourceId()}'>{$resource->GetName()|replace:',':' '}</option>
						{/foreach}
					</select>
				</div>
				</div>
				<div class="row align-items-center">
				<div class="col-lg-auto mb-3">
					<span>users in</span>
					<select {formname key=GROUP} title='Select Group'>
						<option selected='selected' value=''>{translate key=AllGroups}</option>
						{foreach from=$Groups item=group}
							<option value='{$group->Id}'>{$group->Name|replace:',':' '}</option>
						{/foreach}
					</select>
				</div>
				<div class="col-lg-auto mb-3">
					<span>are limited to</span>
					<input type='number' step='any' min='0' max='10000' value='0' {formname key=LIMIT} title='Quota number'/>
					<span>hours</span>
				</div>
				</div>
				<div class="row">
				<div class="col-lg-auto">
					{add_button class="btn btn-success"}
					{reset_button class="btn btn-secondary"}
					{indicator}
				</div>
				</div>
			</div>
			</div>
		</form>
      </div>
      <h3>All Quotas</h3>
      <div class="table-responsive table-shadow">
        <table class="table table-vistec table-highlight">
          <thead>
            <tr>
              <th colspan="2">Equipment</th>
            </tr>
          </thead>
		  <tbody>
		 	{foreach from=$Quotas item=quota}
			 <tr>
				{capture name="scheduleName" assign="scheduleName"}
					<span class='bold'>{if $quota->ScheduleName ne ""}
							{$quota->ScheduleName|replace:',':' '}
						{else}
							{translate key="AllSchedules"}
						{/if}
					</span>
				{/capture}
				{capture name="resourceName" assign="resourceName"}
					<span class='bold'>{if $quota->ResourceName ne ""}
							{$quota->ResourceName|replace:',':' '}
						{else}
							{translate key="AllResources"}
						{/if}
					</span>
				{/capture}
				{capture name="groupName" assign="groupName"}
					<span class='bold'>
						{if $quota->GroupName ne ""}
							{$quota->GroupName|replace:',':' '}
						{else}
							{translate key="AllGroups"}
						{/if}
					</span>
				{/capture}
				{capture name="amount" assign="amount"}
					<span class='bold'>{$quota->Limit}</span>
				{/capture}
				{capture name="unit" assign="unit"}
					<span class='bold'>{translate key=$quota->Unit}</span>
				{/capture}
				{capture name="duration" assign="duration"}
					
				{/capture}
				{capture name="enforceHours" assign="enforceHours"}
					<span class='bold'>
					{if $quota->AllDay}
						{translate key=AllDay}
					{else}
						{translate key=Between} {formatdate date=$quota->EnforcedStartTime key=period_time} - {formatdate date=$quota->EnforcedEndTime key=period_time}
					{/if}
					</span>
				{/capture}
				{capture name="enforceDays" assign="enforceDays"}
					<span class='bold'>
					{if $quota->Everyday}
						{translate key=Everyday}
					{else}
						{foreach from=$quota->EnforcedDays item=day}
							{translate key=$DayNames[$day]}
						{/foreach}
					{/if}
					</span>
				{/capture}
				{capture name="scope" assign="scope"}
					{if $quota->Scope == QuotaScope::IncludeCompleted}
						{translate key=IncludingCompletedReservations}
					{else}
						{translate key=NotCountingCompletedReservations}
					{/if}
				{/capture}
				{cycle values='row0,row1' assign=rowCss}
					<td>
						{translate key=QuotaConfiguration args="$scheduleName,$resourceName,$groupName,$amount,$unit,$duration"} <span class="bold">{$scope}</span>.
					</td>
					<td>
						<a href="#" quotaId="{$quota->Id}" class="delete pull-right"><span class="fa fa-trash icon remove"></span></a>
					</td>
				{foreachelse}
				{translate key=None}
			</tr>
			{/foreach} 
		  </tbody>
		</table>
	</div>
</div>

				{capture name="unit" assign="unit"}
					<select style='display:none;' class='form-control' {formname key=UNIT} title='Quota unit' >
						<option value='{QuotaUnit::Hours}'>{translate key=hours}XX</option>
						<option value='{QuotaUnit::Reservations}'>{translate key=reservations}</option>
					</select>
				{/capture}

				{capture name="duration" assign="duration"}
					<select class='form-control' {formname key=DURATION} title='Quota frequency' style='display:none;' >
						<option value='{QuotaDuration::Day}'>{translate key=day}</option>
						<option value='{QuotaDuration::Week}'>{translate key=week}</option>
						<option value='{QuotaDuration::Month}'>{translate key=month}</option>
						<option value='{QuotaDuration::Year}'>{translate key=year}</option>
					</select>
				{/capture}

				{capture name="enforceHours" assign="enforceHours"}
					<div class='checkbox' style='display:none;'>
						<input type='checkbox' id='enforce-all-day' checked='checked' value='1' {formname key=ENFORCE_ALL_DAY}/>
						<label for='enforce-all-day'>{translate key=AllDay}</label>
					</div>
					<div id='enforce-hours-times' class='inline no-show' style='display:none;'>
						<div class='form-group form-group-sm'>
							<span>{translate key=Between}</span>
							<input type='text' class='form-control time' id='enforce-time-start' size='6' value='12:00am' {formname key=BEGIN_TIME}/>
							-
							<input type='text' class='form-control time' id='enforce-time-end' size='6' value='12:00am' {formname key=END_TIME}/>
						</div>
					</div>
				{/capture}

				{capture name="enforceDays" assign="enforceDays"}
					<div class='checkbox' style='display:none;'>
						<input type='checkbox' id='enforce-every-day' checked='checked' value='1' {formname key=ENFORCE_EVERY_DAY}/>
						<label for='enforce-every-day'>{translate key=Everyday}</label>
					</div>
					<div id='enforce-days' class='inline no-show' style='display:none;'>
						<div class='checkbox'>
							<input type='checkbox' id='enforce-sun' value='0' {formname key=DAY multi=true}/>
							<label for='enforce-sun'>{translate key="DaySundayAbbr"}</label>
						</div>
						<div class='checkbox'>
							<input type='checkbox' id='enforce-mon' value='1' {formname key=DAY multi=true}/>
							<label for='enforce-mon'>{translate key="DayMondayAbbr"}</label>
						</div>
						<div class='checkbox'>
							<input type='checkbox' id='enforce-tue' value='2' {formname key=DAY multi=true}/>
							<label for='enforce-tue'>{translate key="DayTuesdayAbbr"}</label>
						</div>
						<div class='checkbox'>
							<input type='checkbox' id='enforce-wed' value='3' {formname key=DAY multi=true}/>
							<label for='enforce-wed'>{translate key="DayWednesdayAbbr"}</label>
						</div>
						<div class='checkbox'>
							<input type='checkbox' id='enforce-thu'
								   value='4' {formname key=DAY multi=true}/>
							<label for='enforce-thu'>{translate key="DayThursdayAbbr"}</label>
						</div>
						<div class='checkbox'>
							<input type='checkbox'
								   id='enforce-fri'
								   value='5' {formname key=DAY multi=true}/>
							<label for='enforce-fri'>{translate key="DayFridayAbbr"}</label>
						</div>
						<div class='checkbox'>
							<input type='checkbox'
								   id='enforce-sat'
								   value='6' {formname key=DAY multi=true}/>
							<label for='enforce-sat'>{translate key="DaySaturdayAbbr"}</label>
						</div>
					</div>
				{/capture}

				{capture name="scope" assign="scope"}
					<div class='form-group'>
						<select  style='display:none;' class='form-control' {formname key=QUOTA_SCOPE}>
							<option value='{QuotaScope::IncludeCompleted}'>{translate key=IncludingCompletedReservations}</option>
							<option value='{QuotaScope::ExcludeCompleted}' selected>{translate key=NotCountingCompletedReservations}</option>
						</select>
					</div>
				{/capture}

				<div class="add-quota-line" style='display:none;'>{translate key=QuotaConfiguration args="$schedules,$resources,$groups,$amount,$unit,$duration"} {$scope}</div>
				<div class="add-quota-line" style='display:none;'>{translate key=QuotaEnforcement args="$enforceHours,$enforceDays"}</div>

				
			</div>
		</div>
	</form>

	<div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="deleteModalLabel">{translate key=Delete}</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning">
						{translate key=DeleteWarning}
					</div>
				</div>
				<div class="modal-footer">
					<form id="deleteQuotaForm" method="post">
						{cancel_button}
						{delete_button}
						{indicator}
					</form>
				</div>
			</div>
		</div>
	</div>

	{csrf_token}
	{jsfile src="ajax-helpers.js"}
	{jsfile src="admin/quota.js"}
	{jsfile src="js/jquery.form-3.09.min.js"}

	<script type="text/javascript">
		$(document).ready(function () {

			var actions = {
				addQuota: '{ManageQuotasActions::AddQuota}',
				deleteQuota: '{ManageQuotasActions::DeleteQuota}'
			};

			var quotaOptions = {
				submitUrl: '{$smarty.server.SCRIPT_NAME}',
				saveRedirect: '{$smarty.server.SCRIPT_NAME}',
				actions: actions
			};

			$('#enforce-time-start').timepicker({
				show24Hours: false
			});
			$('#enforce-time-end').timepicker({
				show24Hours: false
			});

			var quotaManagement = new QuotaManagement(quotaOptions);
			quotaManagement.init();

			$('#add-quota-panel').showHidePanel();

			$( "#scheduleId" ).change(function() {
				var str = "";	 
				if($('select[name=scheduleId]').val() != ""){
					str = '?s='+$('select[name=scheduleId]').val();
				}else{
					str = "";	
				}

				var hostname = window.location.hostname;
				var path = window.location.pathname;
				var rootFolder = '';
				var pathindex = path.toLowerCase().indexOf('/web');
				if(pathindex > 0)
				{
					rootFolder = path.substring(0, pathindex);
				}
				hostname += rootFolder;
				window.location.replace("http://"+hostname+"/Web/admin/manage_quotas.php"+str); // online
			});
		});
	</script>
</div>
{include file='globalfooter.tpl'}