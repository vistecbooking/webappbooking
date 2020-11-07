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
{include file='globalheader.tpl' Select2=true}

<div class="container">
<div class="box box-lg mb-3">
	<h1>{translate key=ManageAnnouncements}</h1>
	<div class="box box-bordered">
	<h2>{translate key="AddAnnouncement"} {showhide_icon}</h2>
	<div id="addResults" class="error no-show col-md-12"></div>
	<form id="addForm" role="form" method="post">
		<div class="form-group">
			<label for="announcement-txtarea">{translate key='Announcement'}
				<span class="text-danger"> *required</span>
			</label>
			<textarea id="txtareaAnnouncement" class="form-control required" rows="5" {formname key=ANNOUNCEMENT_TEXT} id="addAnnouncement"></textarea>
		</div>
		<div class="row no-gutters">
			<div class="col-12 col-md-6">
				<div class="form-row">
					<div class="col-sm form-group">
						<label for="BeginDate">{translate key='BeginDate'}</label>
						<div class="input-with-icon">
							<input type="text" class="form-control" id="BeginDate"
								placeholder="Date" {formname key=ANNOUNCEMENT_START}>
							<span class="input-icon"><i
								class="material-icons">calendar_today</i></span>
							<input type="hidden" id="formattedBeginDate" {formname key=ANNOUNCEMENT_START} />
						</div>
					</div>
					<div class="col-sm form-group align-self-end">
						<div class="input-with-icon">
							<input type="time" id="TimeBeginDate"
								placeholder="hh:mm" class="form-control" {formname key=ANNOUNCEMENT_TIME_START} />
							<span class="input-icon"><i
								class="material-icons">query_builder</i></span>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-sm form-group">
						<label for="EndDate">{translate key='EndDate'}</label>
						<div class="input-with-icon">
							<input type="text" id="EndDate" class="form-control"
								placeholder="Date" {formname key=ANNOUNCEMENT_END} />
							<span class="input-icon"><i
								class="material-icons">calendar_today</i></span>
							<input type="hidden" id="formattedEndDate" {formname key=ANNOUNCEMENT_END} />
						</div>
					</div>
					<div class="col-sm form-group align-self-end">
						<div class="input-with-icon">
							<input type="time" id="TimeEndDate" class="form-control"
								placeholder="hh:mm" {formname key=ANNOUNCEMENT_TIME_END} />
							<span class="input-icon"><i
								class="material-icons">query_builder</i></span>
						</div>
					</div>
				</div>
				<!-- <div class="form-group">
					<label for="addPriority">{translate key='Priority'}</label>
					<input type="number" min="0" step="1" class="form-control" {formname key=ANNOUNCEMENT_PRIORITY} id="addPriority" value="0" />
				</div> -->
				<div class="form-group">
					<label for="announcementGroups" class="">{translate key=ChooseUsersInGroups}</label>
					<select id="announcementGroups" class="form-control" multiple="multiple" style="width:100%" {formname key=FormKeys::GROUP_ID multi=true}>
						{foreach from=$Groups item=group}
							<option value="{$group->Id}">{$group->Name}</option>
						{/foreach}
					</select>
				</div>
				<div class="form-group">
					<label for="sendAsEmail">{translate key=ChooseSendAsEmail}</label><br/>
					<div class="checkbox no-padding-left" >
						<input type="checkbox" id="sendAsEmail" {formname key=FormKeys::SEND_AS_EMAIL} />
						<label for="sendAsEmail">{translate key=SendAsEmail}</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-sm col-md-auto mr-sm-2">
				{add_button class="btn-block"}
			</div>
			<div class="col-sm col-md-auto mr-sm-2">
				{reset_button class="btn-block"}
			</div>
			<div class="col-sm col-md-auto">
				{indicator}
			</div>
		</div>
	</form>
	</div>
</div>
<div class="table-responsive table-shadow mb-3">
	<table class="table table-md table-vistec table-highlight" id="announcementList">
		<thead>
		<tr>
			<th>{sort_column key=Announcement field=ColumnNames::ANNOUNCEMENT_TEXT}</th>
			<th>{sort_column key=BeginDate field=ColumnNames::ANNOUNCEMENT_START}</th>
			<th>{sort_column key=EndDate field=ColumnNames::ANNOUNCEMENT_END}</th>
			<th>{translate key='Groups'}</th>
			<!-- <th>{translate key='Resources'}</th> --!>
			<th class="action">{translate key='Actions'}</th>
		</tr>
		</thead>
		<tbody>
		{foreach from=$announcements item=announcement}
			{cycle values='row0,row1' assign=rowCss}
			<tr class="{$rowCss}" data-announcement-id="{$announcement->Id()}">
				<td class="announcementText">{$announcement->Text()|nl2br}</td>
				<td class="announcementStart">{formatdate date=$announcement->Start() format='m/d/Y'} {date('h:i A', strtotime($announcement->timeStart()))}</td>
				<td class="announcementEnd">{formatdate date=$announcement->End() format='m/d/Y'} {date('h:i A', strtotime($announcement->timeend()))}</td>
				<td class="announcementGroups">{foreach from=$announcement->GroupIds() item=groupId}{$Groups[$groupId]->Name}, {/foreach}</td>
				<!-- <td class="announcementResources">{foreach from=$announcement->ResourceIds() item=resourceId}{$Resources[$resourceId]->GetName()}, {/foreach}.</td> --!>
				<td class="action announcementActions text-nowrap">
					<a href="#" title="{translate key=Email}" class="update sendEmail link-edit mr-1">Send email</a>
					<a href="#" title="{translate key=Edit}" class="update edit mr-1"><span class="custom-icon icon-edit"></span></a>
					<a href="#" title="{translate key=Delete}" class="update delete"><span class="custom-icon icon-delete"></span></a>
				</td>
			</tr>
		{/foreach}
		</tbody>
	</table>
</div>
<div>

	{pagination pageInfo=$PageInfo}

	<input type="hidden" id="activeId"/>

	<div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="deleteForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteDialogLabel">{translate key=Delete}</h4>
					</div>
					<div class="modal-body">
						<label for="CancelReason">{translate key=AnnouncementCancelReason}</label><br/>
						<textarea style="width: 100%;margin-bottom: 15px;" id="CancelReason" class="form-control required" {formname key=ANNOUNCEMENT_CANCEL_REASON}></textarea>

						<div class="alert alert-warning">
							<div>{translate key=DeleteWarning}</div>
						</div>
					</div>
					<div class="modal-footer">
						{cancel_button}
						{delete_button}
						{indicator}
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="editDialog" tabindex="-1" role="dialog" aria-labelledby="editDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="editForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="editDialogLabel">{translate key=Edit}</h4>
					</div>
					<div class="modal-body">
						<div class="form-group has-feedback">
							<label for="editText">{translate key=Announcement}</label><br/>
							<textarea id="editText" class="form-control required" {formname key=ANNOUNCEMENT_TEXT}></textarea>
							<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="editText"></i>
						</div>
						<div class="form-group">
							<label for="editBegin">{translate key='BeginDate'}</label><br/>
							<input type="text" id="editBegin" class="form-control"/>
							<input type="hidden" id="formattedEditBegin" {formname key=ANNOUNCEMENT_START} />
						</div>
						<div class="form-group">
							<label for="TimeBeginDate">{translate key='TimeBeginDate'}(12 hrs.)</label>
							<input type="time" id="editTimeBeginDate" placeholder="hh:mm" class="form-control" {formname key=ANNOUNCEMENT_TIME_START} />
						</div>
						<div class="form-group">
							<label for="editEnd">{translate key='EndDate'}</label><br/>
							<input type="text" id="editEnd" class="form-control"/>
							<input type="hidden" id="formattedEditEnd" {formname key=ANNOUNCEMENT_END} />
						</div>
						<div class="form-group">
							<label for="TimeEndDate">{translate key='TimeEndDate'}(12 hrs.)</label>
							<input type="time" id="editTimeEndDate" class="form-control" placeholder="hh:mm" {formname key=ANNOUNCEMENT_TIME_END} />
						</div>
						<div class="form-group no-show">
							<label for="editPriority">{translate key='Priority'}</label> <br/>
							<input value="0" type="number" min="0" step="1" id="editPriority" class="form-control" {formname key=ANNOUNCEMENT_PRIORITY} />
						</div>
						<div class="form-group">
							<label for="announcementGroups" class="">{translate key=ChooseUsersInGroups}</label>
							<select id="editUserGroups" class="form-control" multiple="multiple" style="width:100%" {formname key=FormKeys::GROUP_ID multi=true}>
								{foreach from=$Groups item=group}
									<option value="{$group->Id}">{$group->Name}</option>
								{/foreach}
							</select>
						</div>
						<!--
						<div class="form-group">
							<label for="resourceGroups" class="">{translate key=ChooseUsersWithAccessToResources}</label>
							<select id="editResourceGroups" class="form-control" multiple="multiple" style="width:100%" {formname key=RESOURCE_ID multi=true}>
								{foreach from=$Resources item=resource}
									<option value="{$resource->GetId()}">{$resource->GetName()}</option>
								{/foreach}
							</select>
						</div>
						--!>
					</div>
					<div class="modal-footer">
						{cancel_button}
						{update_button}
						{indicator}
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="emailDialog" tabindex="-1" role="dialog" aria-labelledby="emailDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="emailForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="emailDialogLabel">{translate key=SendAsEmail}</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-info"><span id="emailCount" class="bold"></span> {translate key=AnnouncementEmailNotice}</div>
					</div>
					<div class="modal-footer">
						{cancel_button}
						{update_button key=SendAsEmail}
						{indicator}
					</div>
				</div>
			</form>
		</div>
	</div>

	{control type="DatePickerSetupControl" ControlId="BeginDate" AltId="formattedBeginDate"}
	{control type="DatePickerSetupControl" ControlId="EndDate" AltId="formattedEndDate"}
	{control type="DatePickerSetupControl" ControlId="editBegin" AltId="formattedEditBegin"}
	{control type="DatePickerSetupControl" ControlId="editEnd" AltId="formattedEditEnd"}

	{csrf_token}

	{jsfile src="ajax-helpers.js"}
	{jsfile src="admin/announcement.js"}
	{jsfile src="js/jquery.form-3.09.min.js"}
	{jsfile src="js/24hours.js"}
	<script type="text/javascript">
		$(document).ready(function () {

			var actions = {
				add: '{ManageAnnouncementsActions::Add}',
				edit: '{ManageAnnouncementsActions::Change}',
				deleteAnnouncement: '{ManageAnnouncementsActions::Delete}',
				email: '{ManageAnnouncementsActions::Email}'
			};

			var accessoryOptions = {
				submitUrl: '{$smarty.server.SCRIPT_NAME}',
				saveRedirect: '{$smarty.server.SCRIPT_NAME}',
				getEmailCountUrl: '{$smarty.server.SCRIPT_NAME}?dr=emailCount',
				actions: actions
			};

			var announcementManagement = new AnnouncementManagement(accessoryOptions);
			announcementManagement.init();

			{foreach from=$announcements item=announcement}
			announcementManagement.addAnnouncement(
					'{$announcement->Id()}',
					'{$announcement->Text()|escape:"quotes"|regex_replace:"/[\n]/":"\\n"}',
					'{formatdate date=$announcement->Start() format='m/d/Y'}',
					'{formatdate date=$announcement->End() format='m/d/Y'}',
					'{$announcement->Priority()}',
					[{foreach from=$announcement->GroupIds() item=id}{$id},{/foreach}],
					[{foreach from=$announcement->ResourceIds() item=id}{$id},{/foreach}],
					'{$announcement->timeStart()}',
					'{$announcement->timeend()}'
			);
			{/foreach}

			$('#add-announcement-panel').showHidePanel();

			$('#announcementGroups, #editUserGroups').select2({
				placeholder: '{translate key=UsersInGroups}'
			});

			$('#resourceGroups, #editResourceGroups').select2({
				placeholder: '{translate key=UsersWithAccessToResources}'
			});
		});
	</script>
</div>
</div>
{include file='globalfooter.tpl'}
