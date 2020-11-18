{*
Copyright 2012-2017 Nick Korbel

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

{include file='globalheader.tpl' cssFiles="scripts/js/jqplot/jquery.jqplot.min.css" Select2=true}
{cssfile src='scripts/newcss/create-report.css'}
<div id="page-generate-report">
	<div class="container">
		<div class="box box-lg mb-4">
		<h2 class="mb-4">Create new report</h2>
		<form role="form" id="customReportInput">
			<div class="form-group">
			<div class="row mb-3" id="selectDiv">
				<div class="col-lg-2">
				<label>Select</label>
				</div>
				<div class="col-lg-auto">
				<div class="form-check">
					<input
					class="form-check-input"
					type="radio"
					name="Select" {formname key=REPORT_RESULTS} value="{Report_ResultSelection::FULL_LIST}"id="results_list" checked />
					<label class="form-check-label" for="results_list">List</label>
				</div>
				</div>
				<div class="col-lg-auto">
				<div class="form-check">
					<input
					class="form-check-input"
					type="radio"
					name="Select" {formname key=REPORT_RESULTS} value="{Report_ResultSelection::TIME}" id="results_time" />
					<label class="form-check-label" for="results_time">Total Time</label>
				</div>
				</div>
				<div class="col-lg-auto">
				<div class="form-check">
					<input
					class="form-check-input"
					type="radio"
					name="Select" {formname key=REPORT_RESULTS} value="{Report_ResultSelection::COUNT}" id="results_count" />
					<label class="form-check-label" for="results_count">Count</label>
				</div>
				</div>
			</div>
			<div class="input-set select-toggle" id="listOfDiv">
				<div class="row mb-3">
					<div class="col-lg-2">
					<label>Usage</label>
					</div>
					<div class="col-lg-auto">
					<div class="form-check">
						<input
						class="form-check-input"
						type="radio"
						name="Usage" {formname key=REPORT_USAGE} value="{Report_Usage::RESOURCES}" id="usage_resources"
						checked />
						<label class="form-check-label" for="usage_resources">Equipments</label>
					</div>
					</div>
					<div class="col-lg-auto">
					<div class="form-check">
						<input
						class="form-check-input"
						type="radio"
						name="Usage" {formname key=REPORT_USAGE} value="{Report_Usage::ACCESSORIES}" id="usage_accessories"/>
						<label class="form-check-label" for="usage_accessories">Accessories</label>
					</div>
					</div>
				</div>
			</div>
			<div class="input-set select-toggle" id="aggregateDiv" style="display:none;">
				<div class="row mb-3">
					<div class="col-lg-2">
					<label>Aggregate by</label>
					</div>
					<div class="col-lg-auto">
						<div class="form-check">
							<input type="radio" class="form-check-input" {formname key=REPORT_GROUPBY} value="{Report_GroupBy::NONE}" id="groupby_none" checked />
							<label class="form-check-label" for="groupby_none">None</label>
						</div>
					</div>
					<div class="col-lg-auto">
						<div class="form-check">
							<input type="radio" class="form-check-input" {formname key=REPORT_GROUPBY} value="{Report_GroupBy::RESOURCE}" id="groupby_resource"/>
							<label class="form-check-label" for="groupby_resource">Equipment</label>
						</div>
					</div>
					<div class="col-lg-auto">
						<div class="form-check">
							<input type="radio" class="form-check-input" {formname key=REPORT_GROUPBY} value="{Report_GroupBy::SCHEDULE}" id="groupby_schedule"/>
							<label class="form-check-label" for="groupby_schedule">Schedule</label>
						</div>
					</div>
					<div class="col-lg-auto">
						<div class="form-check">
							<input type="radio" class="form-check-input" {formname key=REPORT_GROUPBY} value="{Report_GroupBy::USER}" id="groupby_user"/>
							<label class="form-check-label" for="groupby_user">User</label>
						</div>
					</div>
					<div class="col-lg-auto">
						<div class="form-check">
							<input type="radio" class="form-check-input" {formname key=REPORT_GROUPBY} value="{Report_GroupBy::GROUP}" id="groupby_group"/>
							<label class="form-check-label" for="groupby_group">Group</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-lg-2"><label>Range</label></div>
				<div class="col-lg-10">
				<div class="row">
					<div class="col-lg-auto">
					<div class="form-check">
						<input
						class="form-check-input"
						type="radio"
						name="Range" {formname key=REPORT_RANGE} value="{Report_Range::ALL_TIME}" id="range_all"
						checked />
						<label class="form-check-label" for="All Time">All Time</label>
					</div>
					</div>
					<div class="col-lg-auto">
					<div class="form-check">
						<input
						class="form-check-input"
						type="radio"
						name="Range" {formname key=REPORT_RANGE} value="{Report_Range::CURRENT_MONTH}" id="current_month"/>
						<label class="form-check-label" for="Current mount">Current
						mount</label>
					</div>
					</div>
					<div class="col-lg-auto">
					<div class="form-check">
						<input
						class="form-check-input"
						type="radio"
						name="Range" {formname key=REPORT_RANGE} value="{Report_Range::CURRENT_WEEK}" id="current_week" />
						<label class="form-check-label" for="Current week">Current
						week</label>
					</div>
					</div>
					<div class="col-lg-auto">
					<div class="form-check">
						<input
						class="form-check-input"
						type="radio"
						name="Range" {formname key=REPORT_RANGE} value="{Report_Range::TODAY}" id="today" />
						<label class="form-check-label" for="Today">Today</label>
					</div>
					</div>
					<div class="col-lg-auto">
					<div class="form-check">
						<input
						class="form-check-input"
						type="radio"
						name="Range" {formname key=REPORT_RANGE} value="{Report_Range::DATE_RANGE}" id="range_within" />
						<label class="form-check-label" for="Between">Between</label>
						<input
						class="form-text-input"
						type="text" id="startDate"
						placeholder="dd/mm/yyyy" />
						<input type="hidden" id="formattedBeginDate" {formname key=REPORT_START}/>
						<span class="to">-</span>
						<input
						class="form-text-input"
						type="text" id="endDate"
						placeholder="dd/mm/yyyy" />
						<input type="hidden" id="formattedEndDate" {formname key=REPORT_END} />
					</div>
					</div>
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2">
				<label>Filter by</label>
				</div>
				<div class="col-lg-10">
					<select class="filter-by-input" {formname key=RESOURCE_ID multi=true} multiple="multiple" id="resourceId"> 
						{foreach from=$Resources item=resource}
							<option value="{$resource->GetId()}">{$resource->GetName()}</option>
						{/foreach}
					</select>
					<select class="filter-by-input" {formname key=RESOURCE_TYPE_ID multi=true} multiple="multiple" id="resourceTypeId">
						{foreach from=$ResourceTypes item=resourceType}
							<option value="{$resourceType->Id()}">{$resourceType->Name()}</option>
						{/foreach}
					</select>
					<select class="filter-by-input" {formname key=ACCESSORY_ID multi=true} multiple="multiple" id="accessoryId">
						{foreach from=$Accessories item=accessory}
							<option value="{$accessory->Id}">{$accessory->Name}</option>
						{/foreach}
					</select>
					<select class="filter-by-input" {formname key=SCHEDULE_ID multi=true} multiple="multiple" id="scheduleId">
						{foreach from=$Schedules item=schedule}
							<option value="{$schedule->GetId()}">{$schedule->GetName()}</option>
						{/foreach}
					</select>
					<select class="filter-by-input" {formname key=GROUP_ID multi=true} multiple="multiple" id="groupId">
						{foreach from=$Groups item=group}
							<option value="{$group->Id}">{$group->Name}</option>
						{/foreach}
					</select>
					<input
					class="filter-by-input"
					type="text"
					id="user-filter"
					placeholder="All Users" style="display: inline;" />
					<input id="user_id" class="filter-id" type="hidden" {formname key=USER_ID}/>
					<input
					class="filter-by-input"
					id="participant-filter"
					type="text"
					placeholder="All Paticipants" />
					<input id="participant_id" class="filter-id" type="hidden" {formname key=PARTICIPANT_ID}/>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-lg-2"></div>
				<div class="col-lg-10">
				<div class="form-check">
					<input
					class="form-check-input"
					type="checkbox"
					name="Range" id="chkIncludeDeleted" {formname key=INCLUDE_DELETED} />
					<label
					class="form-check-label"
					for="Include deleted reservations">Include deleted reservations</label>
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
				<button type="submit" class="btn btn-success" value="{translate key=GetReport}" id="btnCustomReport" asyncAction="" >
					Get report
				</button>
				</div>
			</div>
			</div>
		</form>
		</div>
	</div>
</div>

<div id="saveMessage" class="alert alert-success no-show">
	<strong>{translate key=ReportSaved}</strong> <a
			href="{$Path}reports/{Pages::REPORTS_SAVED}">{translate key=MySavedReports}</a>
</div>

<div id="resultsDiv">
</div>

<div id="indicator" style="display:none; text-align: center;"><h3>{translate key=Working}
	</h3>{html_image src="admin-ajax-indicator.gif"}</div>

{include file="Reports/chart.tpl"}

<div class="modal fade" id="saveDialog" tabindex="-1" role="dialog" aria-labelledby="saveDialogLabel"
	 aria-hidden="true">
	<div class="modal-dialog">
		<form id="saveReportForm" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="saveDialogLabel">{translate key=SaveThisReport}</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="savereportname">{translate key=Name}</label>
						<input type="text" id="saveReportName" {formname key=REPORT_NAME} class="form-control"
							   placeholder="{translate key=NoTitleLabel}"/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default cancel"
							data-dismiss="modal">{translate key='Cancel'}</button>
					<button type="button" id="btnSaveReport" class="btn btn-success"><span
								class="glyphicon glyphicon-ok-circle"></span>
						{translate key='SaveThisReport'}
					</button>
					{indicator}
				</div>
			</div>
		</form>
	</div>
</div>

{jsfile src="autocomplete.js"}
{jsfile src="ajax-helpers.js"}
{jsfile src="reports/generate-reports.js"}
{jsfile src="reports/common.js"}
{jsfile src="reports/chart.js"}

<script type="text/javascript">
	$(document).ready(function () {
		var reportOptions = {
			userAutocompleteUrl: "{$Path}ajax/autocomplete.php?type={AutoCompleteType::User}",
			groupAutocompleteUrl: "{$Path}ajax/autocomplete.php?type={AutoCompleteType::Group}",
			customReportUrl: "{$smarty.server.SCRIPT_NAME}?{QueryStringKeys::ACTION}={ReportActions::Generate}",
			printUrl: "{$smarty.server.SCRIPT_NAME}?{QueryStringKeys::ACTION}={ReportActions::PrintReport}&",
			csvUrl: "{$smarty.server.SCRIPT_NAME}?{QueryStringKeys::ACTION}={ReportActions::Csv}&",
			saveUrl: "{$smarty.server.SCRIPT_NAME}?{QueryStringKeys::ACTION}={ReportActions::Save}"
		};

		var reports = new GenerateReports(reportOptions);
		reports.init();

		var common = new ReportsCommon({
			scriptUrl: '{$ScriptUrl}'
		});
		common.init();

        $('#resourceId').select2({
            placeholder: '{translate key=AllResources}'
        });
        $('#resourceTypeId').select2({
            placeholder: '{translate key=AllResourceTypes}'
        });
        $('#accessoryId').select2({
            placeholder: '{translate key=AllAccessories}'
        });
        $('#scheduleId').select2({
            placeholder: '{translate key=AllSchedules}'
        });
        $('#groupId').select2({
            placeholder: '{translate key=AllGroups}'
        });
	});

	$('#report-filter-panel').showHidePanel();


	$('#user-filter, #participant-filter').clearable();
</script>

{control type="DatePickerSetupControl" ControlId="startDate" AltId="formattedBeginDate"}
{control type="DatePickerSetupControl" ControlId="endDate" AltId="formattedEndDate"}

</div>
{include file='globalfooter.tpl'}