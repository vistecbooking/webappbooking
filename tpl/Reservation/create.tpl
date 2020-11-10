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
{block name="header"}
{include file='globalheader.tpl' Validator=true Qtip=true printCssFiles='css/reservation.print.css'}
{cssfile src="scripts/newcss/booking-table.css" rel="stylesheet"}
{/block}

{function name="displayResource"}
	<div class="resourceName" style="background-color:{$resource->GetColor()};color:{$resource->GetTextColor()}">
		<span class="resourceDetails" data-resourceId="{$resource->GetId()}">{$resource->Name}</span>
		{if $resource->GetRequiresApproval()}<span class="fa fa-lock" data-tooltip="approval"></span>{/if}
		{if $resource->IsCheckInEnabled()}<i class="fa fa-sign-in" data-tooltip="checkin"></i>{/if}
		{if $resource->IsAutoReleased()}<i class="fa fa-clock-o" data-tooltip="autorelease"
										   data-autorelease="{$resource->GetAutoReleaseMinutes()}"></i>{/if}
	</div>
{/function}

<div id="page-reservation">
<div class="container">
<section class="box py-4">
	<div id="reservation-box">
		<form id="form-reservation" ajaxAction="{$ReservationAction}" method="post" action="{$smarty.server.SCRIPT_NAME}" enctype="multipart/form-data" role="form"
		 	data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
			data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
			data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
			data-bv-feedbackicons-required="glyphicon glyphicon-asterisk"
			data-bv-submitbuttons='button[type="submit"]'
			data-bv-onerror="enableButton"
			data-bv-onsuccess="enableButton"
			data-bv-live="enabled">

			<header>
				<div class="container-fluid">
					<div class="row">
						<div class="col-auto">
							<span class="h1">{$Resource->Name}</span>
							{if isset($Mode)}
							<!--
							<div class="form-group">
								<label>Mode</label>
								<input type="text" class="form-control" name="{FormKeys::MODE}" value="{$Mode}" readonly />
							</div>
							-->
							{/if}
							<section>
								<span class="badge badge-edit">Available</span>
							</section>
						</div>
						<div class="col-sm">
							<p>
								Maximum time : 24 Hrs. Available in : Monday - Friday<br>
								Moderator : Mr. Chalantorn New (Chalantorn@gmail.com)
							</p>
						</div>
					</div>
				</div>
			</header>
			<main class="mt-3 pb-1 box box-bordered pd-2">
				<div class="validationSummary alert alert-danger no-show" id="validationErrors">
					<ul>
						{async_validator id="additionalattributes" key=""}
					</ul>
				</div>
				{block name=reservationHeader}
					<span class="badge badge-edit" style="font-size:1rem">{translate key="CreateReservationHeading"}</span>
				{/block}
				&emsp;
				{if $ShowUserDetails && $ShowReservationDetails}
					<a href="#" id="userName" data-userid="{$UserId}">{$ReservationUserName}</a>
				{else}
					{translate key=Private}
				{/if}
				<input id="userId" type="hidden" {formname key=USER_ID} value="{$UserId}"/>
				{if $CanChangeUser}
					<!--
					<a href="#" id="showChangeUsers" class="small-action">{translate key=Change}</a>
					<div class="modal fade" id="changeUserDialog" tabindex="-1" role="dialog"
							aria-labelledby="usersModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-hidden="true">&times;</button>
									<h4 class="modal-title"
										id="usersModalLabel">{translate key=ChangeUser}</h4>
								</div>
								<div class="modal-body scrollable-modal-content">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default"
										data-dismiss="modal">{translate key='Cancel'}</button>
									<button type="button"
										class="btn btn-primary">{translate key='Done'}</button>
								</div>
							</div>
						</div>
					</div>
					-->
				{/if}
				<div id="availableCredits" {if !$CreditsEnabled}style="display:none" }{/if}>{translate key=AvailableCredits} <span
					id="availableCreditsCount">{$CurrentUserCredits}</span></div>
				<div class="form-row mt-3">
					<div class="col-12 col-md-6">
						<div class="box box-bordered mb-3">
							<h2>Time</h2>
							<div class="form-row">
								<div class="col form-group">
									<label for="BeginDate" class="reservationDate">{translate key='BeginDate'}</label>
									<input type="text" id="BeginDate" class="form-control"
											value="{formatdate date=$StartDate}" {if $ReservationAction == "update" && !$CanEditDateTime} readonly {/if} />
									<input type="hidden" id="formattedBeginDate" {formname key=BEGIN_DATE}
											value="{formatdate date=$StartDate key=system}"/>
								</div>
								<div class="col form-group">
									<label>&nbsp;</label>
									{if $ReservationAction == "update" && !$CanEditDateTime}
										<input type="text" class="form-control"
											value="{$SelectedStart->Label()}" readonly {formname key=BEGIN_PERIOD} />
									{else}
										<select id="BeginPeriod" {formname key=BEGIN_PERIOD}
												class="form-control" title="Begin time">
											{foreach from=$StartPeriods item=period}
												{if $period->IsReservable()}
													{assign var='selected' value=''}
													{if $period eq $SelectedStart}
														{assign var='selected' value=' selected="selected"'}
													{/if}
													<option value="{$period->Begin()}"{$selected}>{$period->Label()}</option>
												{/if}
											{/foreach}
										</select>
									{/if}
								</div>
							</div>
							<div class="form-row">
								<div class="col form-group">
									<label for="EndDate" class="reservationDate">{translate key='EndDate'}</label>
									<input type="text" id="EndDate" class="form-control"
											value="{formatdate date=$EndDate}" {if $ReservationAction == "update" && !$CanEditDateTime} readonly {/if} />
									<input type="hidden" id="formattedEndDate" {formname key=END_DATE}
											value="{formatdate date=$EndDate key=system}"/>
								</div>
								<div class="col form-group">
									<label>&nbsp;</label>
									{if $ReservationAction == "update" && !$CanEditDateTime}
										<input type="text" class="form-control"
												value="{$SelectedEnd->LabelEnd()}" readonly {formname key=END_PERIOD} />
									{else}
										<select id="EndPeriod" {formname key=END_PERIOD}
												class="form-control" title="End time">
											{foreach from=$EndPeriods item=period name=endPeriods}
												{if $period->IsReservable()}
													{assign var='selected' value=''}
													{if $period eq $SelectedEnd}
														{assign var='selected' value=' selected="selected"'}
													{/if}
													<option value="{$period->End()}"{$selected}>{$period->LabelEnd()}</option>
												{/if}
											{/foreach}
										</select>
									{/if}
								</div>
							</div>
							<section>
								<b>{translate key=ReservationLength}:</b>
								<span id="durationDays">0</span> {translate key=days}
								<span id="durationHours">0</span> {translate key=hours}
								<span id="durationMinutes">0</span> {translate key=minutes}
							</section>
							{if !$HideRecurrence}
							<div>
								{control type="RecurrenceControl" RepeatTerminationDate=$RepeatTerminationDate}
							</div>
							{/if}
							<div id="custom-attributes-placeholder">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="box box-bordered mb-3">
							{if $ShowParticipation && $AllowParticipation && $ShowReservationDetails}
								{include file="Reservation/participation.tpl"}
							{else}
								{include file="Reservation/private-participation.tpl"}
							{/if}
							{if !empty($ReferenceNumber)}
								<hr>
								<div class="form-group">
									<label>{translate key=ReferenceNumber}</label>
									{$ReferenceNumber}
								</div>
							{/if}
						</div>
					</div>
					{if $UploadsEnabled}
						<div class="col-12 col-md-6"><div class="box box-bordered mb-3">
							<label>{translate key=AttachFile} <span class="note">({$MaxUploadSize}
									MB {translate key=Maximum})</span>
							</label>
							<div id="reservationAttachments">
								<div class="attachment-item">
									<input type="file" {formname key=RESERVATION_FILE multi=true} />
									<a class="add-attachment" href="#">{translate key=Add} <i class="fa fa-plus-square"></i></a>
									<a class="remove-attachment" href="#"><i class="fa fa-minus-square"></i></a>
								</div>
							</div>
						</div></div>
					{/if}
					{if $RemindersEnabled}
						<div class="col-12 col-md-6"><div class="box box-bordered">
							<label for="startReminderEnabled">{translate key=SendReminder}</label>
							<div id="reminderOptionsStart">
								<div class="checkbox">
									<input type="checkbox" id="startReminderEnabled"
											class="reminderEnabled" {formname key=START_REMINDER_ENABLED}/>
									<label for="startReminderEnabled">
										<input type="number" min="0" max="999" size="3" maxlength="3" value="15"
												class="reminderTime form-control input-sm inline-block" {formname key=START_REMINDER_TIME}/>
										<select class="reminderInterval form-control input-sm inline-block" {formname key=START_REMINDER_INTERVAL}>
											<option value="{ReservationReminderInterval::Minutes}">{translate key=minutes}</option>
											<option value="{ReservationReminderInterval::Hours}">{translate key=hours}</option>
											<option value="{ReservationReminderInterval::Days}">{translate key=days}</option>
										</select>
										<span class="reminderLabel">{translate key=ReminderBeforeStart}</span></label>
								</div>
								<div class="clear">&nbsp;</div>
							</div>
							<div id="reminderOptionsEnd">
								<div class="checkbox">
									<input type="checkbox" id="endReminderEnabled"
											class="reminderEnabled" {formname key=END_REMINDER_ENABLED}/>
									<label for="endReminderEnabled">
										<input type="number" min="0" max="999" size="3" maxlength="3" value="15"
												class="reminderTime form-control input-sm inline-block" {formname key=END_REMINDER_TIME}/>
										<select class="reminderInterval form-control input-sm inline-block" {formname key=END_REMINDER_INTERVAL}>
											<option value="{ReservationReminderInterval::Minutes}">{translate key=minutes}</option>
											<option value="{ReservationReminderInterval::Hours}">{translate key=hours}</option>
											<option value="{ReservationReminderInterval::Days}">{translate key=days}</option>
										</select>
										<span class="reminderLabel">{translate key=ReminderBeforeEnd}</span></label>
								</div>
							</div>
							<div class="clear">&nbsp;</div>
						</div></div>
					{/if}
				</div>
			</main>

			<input type="hidden" {formname key=RESERVATION_ID} value="{$ReservationId}"/>
			<input type="hidden" {formname key=REFERENCE_NUMBER} value="{$ReferenceNumber}" id="referenceNumber"/>
			<input type="hidden" {formname key=RESERVATION_ACTION} value="{$ReservationAction}"/>

			<input type="hidden" {formname key=SERIES_UPDATE_SCOPE} id="hdnSeriesUpdateScope"
				   value="{SeriesUpdateScope::FullSeries}"/>

			{block name="submitButtons"}
			<div class="row mt-3">
				<div class="col-auto">
					<button type="button" class="btn btn-outline-secondary" onclick="window.location='{$ReturnUrl}'">
						{translate key='Cancel'}
					</button>
				</div>
				<div class="col"></div>
				<div class="col-auto">
					<button type="button" class="btn btn-success save create btnCreate">
						{translate key='Create'}
					</button>
				</div>
			</div>
			{/block}

			{csrf_token}

			{if $UploadsEnabled}
				{block name='attachments'}
				{/block}
			{/if}


			<div id="retrySubmitParams" class="no-show"></div>
		</form>
	</div>
</section>
</div>

{*

███╗   ███╗ ██████╗ ██████╗  █████╗ ██╗     ███████╗
████╗ ████║██╔═══██╗██╔══██╗██╔══██╗██║     ██╔════╝
██╔████╔██║██║   ██║██║  ██║███████║██║     ███████╗
██║╚██╔╝██║██║   ██║██║  ██║██╔══██║██║     ╚════██║
██║ ╚═╝ ██║╚██████╔╝██████╔╝██║  ██║███████╗███████║
╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝  ╚═╝╚══════╝╚══════╝

*}

	<div class="modal fade" id="dialogResourceGroups" tabindex="-1" role="dialog" aria-labelledby="resourcesModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="resourcesModalLabel">{translate key=AddResources}</h4>
				</div>
				<div class="modal-body scrollable-modal-content">
					<div id="resourceGroups"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btnClearAddResources"
							data-dismiss="modal">{translate key='Cancel'}</button>
					<button type="button" class="btn btn-primary btnConfirmAddResources">{translate key='Done'}</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="dialogAddAccessories" tabindex="-1" role="dialog" aria-labelledby="accessoryModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="accessoryModalLabel">{translate key=AddAccessories}</h4>
				</div>
				<div class="modal-body scrollable-modal-content">
					<table class="table table-condensed">
						<thead>
						<tr>
							<th>{translate key=Accessory}</th>
							<th>{translate key=QuantityRequested}</th>
							<th>{translate key=QuantityAvailable}</th>
						</tr>
						</thead>
						<tbody>
						{foreach from=$AvailableAccessories item=accessory}
							<tr accessory-id="{$accessory->GetId()}">
								<td>{$accessory->GetName()}</td>
								<td>
									<input type="hidden" class="name" value="{$accessory->GetName()}"/>
									<input type="hidden" class="id" value="{$accessory->GetId()}"/>
									<input type="hidden" class="resource-ids"
										   value="{','|implode:$accessory->ResourceIds()}"/>
									{if $accessory->GetQuantityAvailable() == 1}
										<input type="checkbox" name="accessory{$accessory->GetId()}" value="1"
											   size="3"/>
									{else}
										<input type="number" min="0" max="999"
											   class="form-control input-sm accessory-quantity"
											   name="accessory{$accessory->GetId()}"
											   value="0" size="3"/>
									{/if}
								</td>
								<td accessory-quantity-id="{$accessory->GetId()}"
									accessory-quantity-available="{$accessory->GetQuantityAvailable()}">{$accessory->GetQuantityAvailable()|default:'&infin;'}</td>
							</tr>
						{/foreach}
						</tbody>
					</table>

				</div>
				<div class="modal-footer">
					<button id="btnCancelAddAccessories" type="button" class="btn btn-default"
							data-dismiss="modal">{translate key='Cancel'}</button>
					<button id="btnConfirmAddAccessories" type="button"
							class="btn btn-primary">{translate key='Done'}</button>
				</div>
			</div>
		</div>
	</div>

	<div id="wait-box" class="wait-box">
		<div id="creatingNotification">
			<h3 id="createUpdateMessage" class="no-show">
				{block name="ajaxMessage"}
					{translate key=CreatingReservation}
				{/block}
			</h3>
			<h3 id="checkingInMessage" class="no-show">
				{translate key=CheckingIn}
			</h3>
			<h3 id="checkingOutMessage" class="no-show">
				{translate key=CheckingOut}
			</h3>
			<h3 id="joiningWaitingList" class="no-show">
				{translate key=AddingToWaitlist}
			</h3>
			{html_image src="reservation_submitting.gif"}
		</div>
		<div id="result"></div>
	</div>

</div>

{if $ReservationAction == "create" || ($ReservationAction == "update" && $CanEditDateTime)}
	{control type="DatePickerSetupControl" ControlId="BeginDate" AltId="formattedBeginDate" DefaultDate=$StartDate}
	{control type="DatePickerSetupControl" ControlId="EndDate" AltId="formattedEndDate" DefaultDate=$EndDate}
{/if}
{control type="DatePickerSetupControl" ControlId="EndRepeat" AltId="formattedEndRepeat" DefaultDate=$RepeatTerminationDate}

{jsfile src="js/jquery.autogrow.js"}
{jsfile src="js/moment.min.js"}
{jsfile src="ajax-helpers.js"}
{jsfile src="js/bootstrapvalidator/bootstrapValidator.min.js"}
{jsfile src="resourcePopup.js"}
{jsfile src="userPopup.js"}
{jsfile src="date-helper.js"}
{jsfile src="recurrence.js"}
{jsfile src="reservation.js"}
{jsfile src="autocomplete.js"}
{jsfile src="force-numeric.js"}
{jsfile src="reservation-reminder.js"}
{jsfile src="js/tree.jquery.js"}

<script type="text/javascript">

	function enableButton() {
		$('#form-reservation').find('button').removeAttr('disabled');
	}

	$(document).ready(function () {
		var scopeOptions = {
			instance: '{SeriesUpdateScope::ThisInstance}', full: '{SeriesUpdateScope::FullSeries}', future: '{SeriesUpdateScope::FutureInstances}'
		};

		var reservationOpts = {
			additionalResourceElementId: '{FormKeys::ADDITIONAL_RESOURCES}',
			accessoryListInputId: '{FormKeys::ACCESSORY_LIST}[]',
			returnUrl: '{$ReturnUrl}',
			scopeOpts: scopeOptions,
			createUrl: 'ajax/reservation_save.php',
			updateUrl: 'ajax/reservation_update.php',
			deleteUrl: 'ajax/reservation_delete.php',
			checkinUrl: 'ajax/reservation_checkin.php?action={ReservationAction::Checkin}',
			checkoutUrl: 'ajax/reservation_checkin.php?action={ReservationAction::Checkout}',
			waitlistUrl: 'ajax/reservation_waitlist.php',
			userAutocompleteUrl: "ajax/autocomplete.php?type={AutoCompleteType::User}",
			groupAutocompleteUrl: "ajax/autocomplete.php?type={AutoCompleteType::Group}",
			changeUserAutocompleteUrl: "ajax/autocomplete.php?type={AutoCompleteType::MyUsers}",
			maxConcurrentUploads: '{$MaxUploadCount}',
			guestLabel: '({translate key=Guest})',
			accessoriesUrl: 'ajax/available_accessories.php?{QueryStringKeys::START_DATE}=[sd]&{QueryStringKeys::END_DATE}=[ed]&{QueryStringKeys::START_TIME}=[st]&{QueryStringKeys::END_TIME}=[et]&{QueryStringKeys::REFERENCE_NUMBER}=[rn]'
		};

		var reminderOpts = {
			reminderTimeStart: '{$ReminderTimeStart}',
			reminderTimeEnd: '{$ReminderTimeEnd}',
			reminderIntervalStart: '{$ReminderIntervalStart}',
			reminderIntervalEnd: '{$ReminderIntervalEnd}'
		};

		var reservation = new Reservation(reservationOpts);
		reservation.init('{$UserId}', '{format_date date=$StartDate key=system_datetime timezone=$Timezone}', '{format_date date=$EndDate key=system_datetime timezone=$Timezone}');

		var reminders = new Reminder(reminderOpts);
		reminders.init();

		{foreach from=$Participants item=user}
		reservation.addParticipant("{$user->FullName|escape:'javascript'}", "{$user->UserId|escape:'javascript'}");
		{/foreach}

		{foreach from=$Invitees item=user}
		reservation.addInvitee("{$user->FullName|escape:'javascript'}", '{$user->UserId}');
		{/foreach}

		{foreach from=$ParticipatingGuests item=guest}
		reservation.addParticipatingGuest('{$guest}');
		{/foreach}

		{foreach from=$InvitedGuests item=guest}
		reservation.addInvitedGuest('{$guest}');
		{/foreach}

		{foreach from=$Accessories item=accessory}
		reservation.addAccessory({$accessory->AccessoryId}, {$accessory->QuantityReserved}, "{$accessory->Name|escape:'javascript'}");
		{/foreach}

		reservation.addResourceGroups({$ResourceGroupsAsJson});

		var recurOpts = {
			repeatType: '{$RepeatType}',
			repeatInterval: '{$RepeatInterval}',
			repeatMonthlyType: '{$RepeatMonthlyType}',
			repeatWeekdays: [{foreach from=$RepeatWeekdays item=day}{$day}, {/foreach}]
		};

		var recurrence = new Recurrence(recurOpts);
		recurrence.init();

		$('#description').autogrow();
		$('#userName').bindUserDetails();

		$.blockUI.defaults.css.width = '60%';
		$.blockUI.defaults.css.left = '20%';

		var resources = $('#reservation-resources');
		resources.tooltip({
			selector: '[data-tooltip]', title: function () {
				var tooltipType = $(this).data('tooltip');
				if (tooltipType === 'approval')
				{
					return "{translate key=RequiresApproval}";
				}
				if (tooltipType === 'checkin')
				{
					return "{translate key=RequiresCheckInNotification}";
				}
				if (tooltipType === 'autorelease')
				{
					var text = "{translate key=AutoReleaseNotification args='%s'}";
					return text.replace('%s', $(this).data('autorelease'));
				}
			}
		});
	});
</script>

{include file='globalfooter.tpl'}
