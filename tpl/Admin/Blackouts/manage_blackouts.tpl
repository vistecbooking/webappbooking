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
<div id="page-manage-blackouts" class="container">

	<div class="box box-lg mb-3">
		<h1>{translate key=ManageBlackouts}</h1>
		<form id="addBlackoutForm" role="form" method="post">
			<fieldset class="bordered">
				<h2>{translate key="AddBlackout"} {showhide_icon}</h2>
				<div class="form-row">
					<div class="form-group col-md">
						<label for="addResourceId">{translate key=Resource}</label>
						<select {formname key=RESOURCE_ID} class="form-control" id="addResourceId">
							{object_html_options options=$Resources key='GetId' label="GetName" selected=$ResourceId}
						</select>
					</div>
					<div class="form-group col-md align-self-end">
						<div class="form-row">
							<div class="col-auto d-flex align-items-center">
								<span class="mr-2">or</span>
								<div class="form-check mr-1 pl-0" style="width:auto">
									<input {formname key=BLACKOUT_APPLY_TO_SCHEDULE} type="checkbox" id="allResources"/>
									<label class="mb-0" for="allResources">{translate key=AllResourcesOn}</label>
								</div>
							</div>
							<div class="col">
								<select {formname key=SCHEDULE_ID} id="addScheduleId" class="form-control" disabled="disabled"
									title="Schedule">
									{object_html_options options=$Schedules key='GetId' label="GetName" selected=$ScheduleId}
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<div class="form-row">
							<div class="col-sm form-group">
								<label for="addStartDate">{translate key=BeginBlackout}</label>
								<div class="input-with-icon">
									<input type="text" id="addStartDate" class="form-control"
										value="{formatdate date=$AddStartDate}"/>
									<input {formname key=BEGIN_DATE} id="formattedAddStartDate" type="hidden"
										value="{formatdate date=$AddStartDate key=system}"/>
									<span class="input-icon"><i
											class="material-icons">calendar_today</i></span>
								</div>
							</div>
							<div class="col-sm form-group align-self-end">
								<div class="input-with-icon">
									<input {formname key=BEGIN_TIME} type="time" id="addStartTime"
										class="form-control"
										value="{format_date format='H:00' date=Date::Now()}"
										title="Start time"/>
									<span class="input-icon"><i
											class="material-icons">query_builder</i></span>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm form-group">
								<label for="addEndDate">{translate key=EndBlackout}</label>
								<div class="input-with-icon">
									<input type="text" id="addEndDate" class="form-control" size="10"
										value="{formatdate date=$AddEndDate}"/>
									<input {formname key=END_DATE} type="hidden" id="formattedAddEndDate"
										value="{formatdate date=$AddEndDate key=system}"/>
									<span class="input-icon"><i
											class="material-icons">calendar_today</i></span>
								</div>
							</div>
							<div class="col-sm form-group align-self-end">
								<div class="input-with-icon">
									<input {formname key=END_TIME} type="time" id="addEndTime"
										class="form-control"
										value="{format_date format='H:00' date=Date::Now()->AddHours(1)}"
										title="End time"/>
									<span class="input-icon"><i
											class="material-icons">query_builder</i></span>
								</div>
							</div>
						</div>
						<div class="form-row mb-3">
							<div class="col-auto align-self-center">
								<span>Repeat:</span>
							</div>
							<div class="col">
								{control type="RecurrenceControl" RepeatTerminationDate=$RepeatTerminationDate}
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm form-group">
								<label for="addAnnounceStartDate">{translate key=BeginAnnouncement}</label>
								<div class="input-with-icon">
									<input type="text" id="addAnnounceStartDate" class="form-control"
											value="{formatdate date=$AddAnnounceStartDate}"/>
									<input {formname key=ANNOUNCEMENT_START} id="formattedAddAnnounceStartDate" type="hidden"
											value="{formatdate date=$AddAnnounceStartDate key=system}"/>
									<span class="input-icon"><i
											class="material-icons">calendar_today</i></span>
								</div>
							</div>
							<div class="col-sm form-group align-self-end">
								<div class="input-with-icon">
									<input {formname key=ANNOUNCEMENT_TIME_START} type="time" id="addAnnounceStartTime"
										class="form-control"
										value="{format_date format='H:00' date=Date::Now()}"
										title="Start time"/>
									<span class="input-icon"><i
											class="material-icons">query_builder</i></span>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm form-group">
								<label for="addAnnounceEndDate">{translate key=EndAnnouncement}</label>
								<div class="input-with-icon">
									<input type="text" id="addAnnounceEndDate" class="form-control" size="10"
										value="{formatdate date=$AddAnnounceEndDate}"/>
									<input {formname key=ANNOUNCEMENT_END} type="hidden" id="formattedAddAnnounceEndDate"
										value="{formatdate date=$AddAnnounceEndDate key=system}"/>
									<span class="input-icon"><i
											class="material-icons">calendar_today</i></span>
								</div>
							</div>
							<div class="col-sm form-group align-self-end">
								<div class="input-with-icon">
									<input {formname key=ANNOUNCEMENT_TIME_END} type="time" id="addAnnounceEndTime"
										class="form-control"
										value="{format_date format='H:00' date=Date::Now()->AddHours(1)}"
										title="End time"/>
									<span class="input-icon"><i
											class="material-icons">query_builder</i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="form-group">
							<label for="blackoutReason">{translate key=Reason} <span class="text-danger">*required</span></label>
							<input {formname key=SUMMARY} type="text" id="blackoutReason" required class="form-control required"/>
						</div>
						<div class="form-group">
							<label for="Confliction">Confliction</label>
							<div class="form-check">
								<input class="form-check-input" {formname key=CONFLICT_ACTION} type="radio" id="deleteExisting"
									name="existingReservations"
									checked="checked"
									value="{ReservationConflictResolution::Delete}"/>
								<label class="form-check-label" for="deleteExisting">{translate key=BlackoutDeleteConflicts}</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" {formname key=CONFLICT_ACTION} type="radio" id="notifyExisting"
									name="existingReservations"
									value="{ReservationConflictResolution::Notify}"/>
								<label class="form-check-label" for="notifyExisting">{translate key=BlackoutShowMe}</label>
							</div>
						</div>
					</div>
				</div>
				{add_button}
				{reset_button}
			</fieldset>

		</form>
	</div>


	<div class="box box-lg mb-3">
	<h1>{translate key="Filter"}</h1>
		<form class="form" role="form">
			<div class="form-row">
				<div class="form-group col-sm">
					<input id="startDate" type="text" class="form-control"
						value="{formatdate date=$StartDate}"
						title="Between start date" placeholder="{translate key=BeginDate}"/>
					<input id="formattedStartDate" type="hidden" value="{formatdate date=$StartDate key=system}"/>
				</div>
				<div class="col-sm-auto mt-2 d-none d-sm-block">
					&mdash;
				</div>
				<div class="form-group col-sm">
					<input id="endDate" type="text" class="form-control"
						value="{formatdate date=$EndDate}" placeholder="{translate key=EndDate}"/>
					<input id="formattedEndDate" type="hidden" value="{formatdate date=$EndDate key=system}"/>
				</div>
				<div class="form-group col-sm">
					<select id="scheduleId" class="form-control col-xs-12">
						<option value="">{translate key=AllSchedules}</option>
						{object_html_options options=$Schedules key='GetId' label="GetName" selected=$ScheduleId}
					</select>
				</div>
				<div class="form-group col-sm">
					<select id="resourceId" class="form-control col-xs-12">
						<option value="">{translate key=AllResources}</option>
						{object_html_options options=$Resources key='GetId' label="GetName" selected=$ResourceId}
					</select>
				</div>
				<div class="col-sm-auto">
					{filter_button class="btn-sm" id="filter"}
					<button id="showAll" class="btn btn-link btn-sm">{translate key=ViewAll}</button>
				</div>
			</div>
		</form>
	</div>

	<div class="table-responsive table-shadow mb-3">
	<table class="table table-md table-vistec table-highlight" id="blackoutTable">
		<thead>
		<tr>
			<th>{sort_column key=Resource field=ColumnNames::RESOURCE_NAME}</th>
			<th>{sort_column key=BeginDate field=ColumnNames::BLACKOUT_START}</th>
			<th>{sort_column key=EndDate field=ColumnNames::BLACKOUT_END}</th>
			<th>{sort_column key=Reason field=ColumnNames::BLACKOUT_TITLE}</th>
			<th>{translate key=CreatedBy}</th>
			<th>&nbsp;</th>
		</tr>
		</thead>
		<tbody>
		{foreach from=$blackouts item=blackout}
			{cycle values='row0,row1' assign=rowCss}
			{assign var=id value=$blackout->InstanceId}
			<tr class="{$rowCss} editable" data-blackout-id="{$id}">
				<td>{$blackout->ResourceName}</td>
				<td class="date">{formatdate date=$blackout->StartDate timezone=$Timezone format='m/d/Y h:i A'}</td>
				<td class="date">{formatdate date=$blackout->EndDate timezone=$Timezone format='m/d/Y h:i A'}</td>
				<td>{$blackout->Title}</td>
				<td style="max-width:150px;">{fullname first=$blackout->FirstName last=$blackout->LastName}</td>
				<td class="update edit text-right text-nowrap">
					<a href="#">
						<span class="custom-icon icon-edit"></span>
					</a>
					{if $blackout->IsRecurring}
						<a href="#" class="update delete-recurring"><span class="custom-icon icon-delete"></span></a>
					{else}
						<a href="#" class="update delete"><span class="custom-icon icon-delete"></span></a>
					{/if}
				</td>
			</tr>
		{/foreach}
		</tbody>
		<tfoot>
		<tr>
			<td colspan="7"></td>
			<td class="action-delete"><a href="#" id="delete-selected" class="no-show" title="{translate key=Delete}"><span class="fa fa-trash icon remove"></span></a></td>
		</tr>
		</tfoot>
	</table>
	</div>

	{pagination pageInfo=$PageInfo}

	<div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
		 aria-hidden="true">
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
					<form id="deleteForm" method="post">
						{cancel_button}
						{delete_button class="btnUpdateAllInstances"}
					</form>

				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="deleteRecurringDialog" tabindex="-1" role="dialog" aria-labelledby="deleteRecurringModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="deleteRecurringModalLabel">{translate key=Delete}</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning">
						{translate key=DeleteWarning}
					</div>
				</div>
				<div class="modal-footer">
					<form id="deleteRecurringForm" method="post">
						<button type="button" class="btn btn-default cancel"
								data-dismiss="modal">{translate key='Cancel'}</button>

						<button type="button" class="btn btn-danger save btnUpdateAllInstances">
							<span class="fa fa-remove"></span> {translate key='ThisInstance'}</button>

						<button type="button" class="btn btn-danger save btnUpdateAllInstances">
							<span class="fa fa-remove"></span> {translate key='AllInstances'}</button>

						<input type="hidden" {formname key=SERIES_UPDATE_SCOPE} class="hdnSeriesUpdateScope"
							   value="{SeriesUpdateScope::FullSeries}"/>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="deleteMultipleDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteMultipleModalLabel"
		 aria-hidden="true">
		<form id="deleteMultipleForm" method="post" action="{$smarty.server.SCRIPT_NAME}?action={ManageBlackoutsActions::DELETE_MULTIPLE}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteMultipleModalLabel">{translate key=Delete} (<span id="deleteMultipleCount"></span>)</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning">
							<div>{translate key=DeleteWarning}</div>
						</div>

					</div>
					<div class="modal-footer">
						{cancel_button}
						{delete_button}
						{indicator}
					</div>
					<div id="deleteMultiplePlaceHolder" class="no-show"></div>
				</div>
			</div>
		</form>
	</div>

	{csrf_token}

	{jsfile src="reservationPopup.js"}
	{jsfile src="ajax-helpers.js"}
	{jsfile src="admin/blackouts.js"}
	{jsfile src="date-helper.js"}
	{jsfile src="recurrence.js"}

	<script type="text/javascript">

		$(document).ready(function () {
			var updateScope = {};
			updateScope.instance = '{SeriesUpdateScope::ThisInstance}';
			updateScope.full = '{SeriesUpdateScope::FullSeries}';
			updateScope.future = '{SeriesUpdateScope::FutureInstances}';

			var actions = {};

			var blackoutOpts = {
				scopeOpts: updateScope,
				actions: actions,
				deleteUrl: '{$smarty.server.SCRIPT_NAME}?action={ManageBlackoutsActions::DELETE}&{QueryStringKeys::BLACKOUT_ID}=',
				addUrl: '{$smarty.server.SCRIPT_NAME}?action={ManageBlackoutsActions::ADD}',
				editUrl: '{$smarty.server.SCRIPT_NAME}?action={ManageBlackoutsActions::LOAD}&{QueryStringKeys::BLACKOUT_ID}=',
				updateUrl: '{$smarty.server.SCRIPT_NAME}?action={ManageBlackoutsActions::UPDATE}',
				reservationUrlTemplate: "{$Path}reservation.php?{QueryStringKeys::REFERENCE_NUMBER}=[refnum]",
				popupUrl: "{$Path}ajax/respopup.php",
				timeFormat: '{$TimeFormat}'
			};

			var recurOpts = {
				repeatType: '{$RepeatType}',
				repeatInterval: '{$RepeatInterval}',
				repeatMonthlyType: '{$RepeatMonthlyType}',
				repeatWeekdays: [{foreach from=$RepeatWeekdays item=day}{$day}, {/foreach}]
			};

			var recurElements = {
				beginDate: $('#formattedAddStartDate'), endDate: $('#formattedAddEndDate'), beginTime: $('#addStartTime'), endTime: $('#addEndTime')
			};

			var recurrence = new Recurrence(recurOpts, recurElements);
			recurrence.init();

			var blackoutManagement = new BlackoutManagement(blackoutOpts);
			blackoutManagement.init();

			$('#add-blackout-panel').showHidePanel();
		});

		$.blockUI.defaults.css.width = '60%';
		$.blockUI.defaults.css.left = '20%';
	</script>

	{control type="DatePickerSetupControl" ControlId="startDate" AltId="formattedStartDate"}
	{control type="DatePickerSetupControl" ControlId="endDate" AltId="formattedEndDate"}
	{control type="DatePickerSetupControl" ControlId="addStartDate" AltId="formattedAddStartDate"}
	{control type="DatePickerSetupControl" ControlId="addEndDate" AltId="formattedAddEndDate"}
	{control type="DatePickerSetupControl" ControlId="addAnnounceStartDate" AltId="formattedAddAnnounceStartDate"}
	{control type="DatePickerSetupControl" ControlId="addAnnounceEndDate" AltId="formattedAddAnnounceEndDate"}
	{control type="DatePickerSetupControl" ControlId="EndRepeat" AltId="formattedEndRepeat"}

	<div id="wait-box" class="wait-box">
		<div id="creatingNotification">
			<h3>
				{block name="ajaxMessage"}
					{translate key=Working}...
				{/block}
			</h3>
			{html_image src="reservation_submitting.gif"}
		</div>
		<div id="result"></div>
	</div>

	<div id="update-box" class="no-show">
		{indicator id="update-spinner"}
		<div id="update-contents"></div>
	</div>

</div>
{include file='globalfooter.tpl'}
