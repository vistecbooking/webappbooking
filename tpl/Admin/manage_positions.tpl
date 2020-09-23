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
{include file='globalheader.tpl'}

<div id="page-manage-positions" class="admin-page">
	<h1>{translate key=ManagePositions}</h1>

	<form id="addPositionForm" class="form-inline" role="form" method="post">
		<div class="panel panel-default" id="add-position-panel">
			<div class="panel-heading">{translate key="AddPosition"} {showhide_icon}</div>
			<div class="panel-body add-contents">
				<div id="addPositionResults" class="error" style="display:none;"></div>
				<div class="form-group has-feedback">
					<label for="addPositionName">{translate key=Name}</label>
					<input {formname key=POSITION_NAME} type="text" id="addPositionName" required class="form-control required"/>
					<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="addPositionName"></i>
				</div>
			</div>
			<div class="panel-footer">
				{add_button class="btn-sm"}
				{reset_button class="btn-sm"}
				{indicator}
			</div>
		</div>
	</form>

	<div id="positionSearchPanel">
		<label for="positionSearch">{translate key='FindPosition'}</label> |  {html_link href=$smarty.server.SCRIPT_NAME key=AllPositions}
		<input type="text" id="positionSearch" class="form-control" size="40"/>
	</div>

	<table class="table" id="positionList">
		<thead>
		<tr>
			<th>{sort_column key=PositionName field=ColumnNames::POSITION_NAME}</th>
			<th class="action">{translate key='Actions'}</th>
		</tr>
		</thead>
		<tbody>
		{foreach from=$positions item=position}
			{cycle values='row0,row1' assign=rowCss}
			<tr class="{$rowCss}" data-group-id="{$position->Id}">
				<td>{$position->Name}</td>
				<td class="action">
					<a href="#" class="update rename"><span class="fa fa-pencil-square-o icon"></a> |
					<a href="#" class="update delete"><span class="fa fa-trash icon remove"></span></a>
				</td>
			</tr>
		{/foreach}
		</tbody>
	</table>

	{pagination pageInfo=$PageInfo}

	<input type="hidden" id="activeId"/>

	<div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="deletePositionForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteDialogLabel">{translate key=Delete}</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning">
							<div>{translate key=DeleteWarning}</div>
							<div>{translate key=DeletePositionWarning}</div>
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

	<div class="modal fade" id="renameDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="renamePositionForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteDialogLabel">{translate key=Rename}</h4>
					</div>
					<div class="modal-body">
						<div class="form-group has-feedback">
							<label for="positionName">{translate key=Name}</label>
							<input type="text" id="positionName" class="form-control required" required {formname key=POSITION_NAME} />
							<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="positionName"></i>
						</div>
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

	{csrf_token}

	{jsfile src="ajax-helpers.js"}
	{jsfile src="autocomplete.js"}
	{jsfile src="admin/position.js"}
	{jsfile src="js/jquery.form-3.09.min.js"}

	<script type="text/javascript">
		$(document).ready(function () {

			var actions = {
				addPosition: '{ManagePositionsActions::AddPosition}',
				renamePosition: '{ManagePositionsActions::RenamePosition}',
				deletePosition: '{ManagePositionsActions::DeletePosition}',
			};

			var positionOptions = {
				positionAutocompleteUrl: "../ajax/autocomplete.php?type={AutoCompleteType::Position}",
				positionsUrl: "{$smarty.server.SCRIPT_NAME}",
				submitUrl: '{$smarty.server.SCRIPT_NAME}',
				saveRedirect: '{$smarty.server.SCRIPT_NAME}',
				selectPositionUrl: '{$smarty.server.SCRIPT_NAME}?pstid=',
				actions: actions
			};

			var positionManagement = new PositionManagement(positionOptions);
			positionManagement.init();

			$('#add-position-panel').showHidePanel();
		});
	</script>
</div>
{include file='globalfooter.tpl'}
