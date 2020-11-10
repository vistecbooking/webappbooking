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
{cssfile src='scripts/newcss/positions.css'}

<div id="page-manage-positions">
	
	<div class="container">
      <div class="box box-lg mb-4">
        <h2>Positions</h2>
		<form id="addPositionForm" role="form" method="post">
			<div class="box box-bordered">
			<h3>Add position</h3>
			<div class="ml-4">
				<div class="row">
					<div class="col-lg">
						<div class="form-group">
						<label for="position name"
							>Position Name
							<span class="text-danger">*require</span></label
						>
						<input
							type="text"
							class="form-control"
							placeholder="position name"
							{formname key=POSITION_NAME} id="addPositionName" required
						/>
						</div>
					</div>
					<div class="col-lg"></div>
				</div>
				<div class="row">
					<div class="col-lg-auto">
						{add_button class="btn-sm"}
						{reset_button class="btn-sm"}
						{indicator}
					</div>
				</div>
			</div>
			</div>
		</form>
      </div>
      <div class="table-responsive table-shadow mb-5">
        <table id="positionList" class="table table-vistec table-highlight">
          <thead>
            <tr>
              <th colspan="2">Positions name</th>
            </tr>
          </thead>
          <tbody>
		  {foreach from=$positions item=position}
		  {cycle values='row0,row1' assign=rowCss}
			<tr data-group-id="{$position->Id}">
				<td>{$position->Name}</td>
				<td><a href="#" class="update rename"><span class="custom-icon icon-edit icon"></span
                ></a><a href="#" class="update delete"><span class="custom-icon icon-delete remove"></span></a></td>
			</tr>
		{/foreach}
		</tbody>
		</table>
	</div>
</div>

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
