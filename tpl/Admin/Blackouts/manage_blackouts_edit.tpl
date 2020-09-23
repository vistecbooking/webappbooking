{*
Copyright 2013-2017 Nick Korbel

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

<div id="updateBlackout">
	<form id="editBlackoutForm" class="form-inline" role="form" method="post">
		<div class="form-group col-xs-12">
			<label for="updateStartDate">{translate key=BeginBlackout}</label>
			<input type="text" id="updateStartDate" class="form-control dateinput inline-block "
				   value="{formatdate date=$BlackoutStartDate}"/>
			<input {formname key=BEGIN_DATE} id="formattedUpdateStartDate" type="hidden"
											 value="{formatdate date=$BlackoutStartDate key=system}"/>
			<input {formname key=BEGIN_TIME} type="time" id="updateStartTime"
											 class="form-control inline-block"
											 value="{formatdate date=$BlackoutStartDate format='H:i'}"/>
		</div>
		<br />
		<br />
		<div class="form-group col-xs-12">
			<label for="updateEndDate">{translate key=EndBlackout}</label>
			<input type="text" id="updateEndDate" class="form-control dateinput inline-block " size="10"
				   value="{formatdate date=$BlackoutEndDate}"/>
			<input {formname key=END_DATE} type="hidden" id="formattedUpdateEndDate"
										   value="{formatdate date=$BlackoutEndDate key=system}"/>
			<input {formname key=END_TIME} type="time" id="updateEndTime"
										   class="form-control inline-block"
										   value="{formatdate date=$BlackoutEndDate format='H:i'}"/>
		</div>
		<br />
		<br />
		<input {formname key=ANNOUNCEMENT_ID} id="announceId" type="hidden" value="{$AnnounceId}"/>
		<div class="form-group col-xs-12">
			<label for="updateAnnounceStartDate">{translate key=BeginAnnouncement}</label>
			<input type="text" id="updateAnnounceStartDate" class="form-control dateinput inline-block "
					value="{formatdate date=$AnnounceStartDate}"/>
			<input {formname key=ANNOUNCEMENT_START} id="formattedUpdateAnnounceStartDate" type="hidden"
												value="{formatdate date=$AnnounceStartDate key=system}"/>
			<input {formname key=ANNOUNCEMENT_TIME_START} type="time" id="updateAnnounceStartTime"
												class="form-control inline-block"
												value="{formatdate date=$AnnounceStartTime format='H:i'}" />
		</div>
		<br />
		<br />
		<div class="form-group col-xs-12">
			<label for="updateAnnounceEndDate">{translate key=EndAnnouncement}</label>
			<input type="text" id="updateAnnounceEndDate" class="form-control dateinput inline-block " size="10"
					value="{formatdate date=$AnnounceEndDate}"/>
			<input {formname key=ANNOUNCEMENT_END} type="hidden" id="formattedUpdateAnnounceEndDate"
											value="{formatdate date=$AnnounceEndDate key=system}"/>
			<input {formname key=ANNOUNCEMENT_TIME_END} type="time" id="updateAnnounceEndTime"
											class="form-control inline-block "
											value="{formatdate date=$AnnounceEndTime format='H:i'}" />
		</div>
		<br />
		<br />
		<div class="form-group col-xs-12 blackouts-edit-resources">
			<label>{translate key=Resources}</label>
			{foreach from=$Resources item=resource}
				{assign var=checked value=""}
				{if in_array($resource->GetId(), $BlackoutResourceIds)}
					{assign var=checked value="checked='checked'"}
				{/if}
				<label class="resourceItem">
					<div class="checkbox">
						<input {formname key=RESOURCE_ID  multi=true} type="checkbox"
																	  value="{$resource->GetId()}" {$checked}
																	  id="r{$resource->GetId()}"/>
						<label for="r{$resource->GetId()}">{$resource->GetName()}</label>
					</div>
				</label>
			{/foreach}
		</div>
		<br />
		<br />
		<div class="col-xs-12">
			<div class="form-group has-feedback">
				<label for="blackoutReason">{translate key=Reason}</label>
				<input {formname key=SUMMARY} type="text" id="blackoutReason" required
											  class="form-control required" value="{$BlackoutTitle}"/>
				<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="blackoutReason"></i>
			</div>
		</div>
		<br />
		<br />
		<div style="margin-top: 210px;">
			{control type="RecurrenceControl" RepeatTerminationDate=$RepeatTerminationDate prefix='edit'}
		</div>
		<br />
		<div class="form-group col-xs-12">
            <div class="radio">
                <input {formname key=CONFLICT_ACTION} type="radio" id="deleteExistingUpdate"
                                                      name="existingReservations"
													   checked="checked"
                                                      value="{ReservationConflictResolution::Delete}"/>
                <label for="deleteExisting">{translate key=BlackoutDeleteConflicts}</label>
            </div>
            <div class="radio">
                <input {formname key=CONFLICT_ACTION} type="radio" id="notifyExistingUpdate"
                                                      name="existingReservations"
                                                      value="{ReservationConflictResolution::Notify}"/>
                <label for="notifyExisting">{translate key=BlackoutShowMe}</label>
            </div>
            
		</div>

		<div id="update-blackout-buttons" class="col-xs-12 margin-bottom-25">
			<div class="pull-right">
				<button type="button" class="btn btn-default" id="cancelUpdate">
					{translate key='Cancel'}
				</button>
				{if $IsRecurring}
					<button type="button" class="btn btn-success save btnUpdateThisInstance">
						<span class="glyphicon glyphicon-ok-circle"></span>
						{translate key='ThisInstance'}
					</button>
					<button type="button" class="btn btn-success save btnUpdateAllInstances">
						<span class="glyphicon glyphicon-ok-circle"></span>
						{translate key='AllInstances'}
					</button>
				{else}
					<button type="button" class="btn btn-success save update btnUpdateAllInstances">
						<span class="glyphicon glyphicon-ok-circle"></span>
						{translate key='Update'}
					</button>
				{/if}

			</div>
		</div>

		<input type="hidden" {formname key=BLACKOUT_INSTANCE_ID} value="{$BlackoutId}"/>
		<input type="hidden" {formname key=SERIES_UPDATE_SCOPE} class="hdnSeriesUpdateScope"
			   value="{SeriesUpdateScope::FullSeries}"/>
	{csrf_token}
	</form>
</div>

<script type="text/javascript">
	$(function ()
	{
		var recurOpts = {
			repeatType: '{$RepeatType}',
			repeatInterval: '{$RepeatInterval}',
			repeatMonthlyType: '{$RepeatMonthlyType}',
			repeatWeekdays: [{foreach from=$RepeatWeekdays item=day}{$day}, {/foreach}]
		};

		var recurrence = new Recurrence(recurOpts, {}, 'edit');
		recurrence.init();
	});
</script>
<script type="text/javascript">
	$( document ).ready(function() {
	  // Handler for .ready() called.
	  //cancelUpdate

	  $( "#cancelUpdate" ).click(function() {
		  //alert( "Handler for .click() called." );
		  $('#editBlackoutForm').css('display','none');
		});
	});
</script>

{control type="DatePickerSetupControl" ControlId="updateStartDate" AltId="formattedUpdateStartDate"}
{control type="DatePickerSetupControl" ControlId="updateEndDate" AltId="formattedUpdateEndDate"}
{control type="DatePickerSetupControl" ControlId="editEndRepeat" AltId="editformattedEndRepeat"}
{control type="DatePickerSetupControl" ControlId="updateAnnounceStartDate" AltId="formattedUpdateAnnounceStartDate"}
{control type="DatePickerSetupControl" ControlId="updateAnnounceEndDate" AltId="formattedUpdateAnnounceEndDate"}