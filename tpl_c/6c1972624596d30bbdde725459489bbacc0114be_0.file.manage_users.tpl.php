<?php
/* Smarty version 3.1.30, created on 2020-11-10 20:26:57
  from "/var/www/html/booking/tpl/Admin/manage_users.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5faa95210134f6_20223424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c1972624596d30bbdde725459489bbacc0114be' => 
    array (
      0 => '/var/www/html/booking/tpl/Admin/manage_users.tpl',
      1 => 1604742064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5faa95210134f6_20223424 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/booking/lib/external/Smarty/plugins/function.html_options.php';
if (!is_callable('smarty_function_cycle')) require_once '/var/www/html/booking/lib/external/Smarty/plugins/function.cycle.php';
?>

<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('InlineEdit'=>true,'cssFiles'=>'scripts/css/colorpicker.css'), 0, false);
?>


<div id="page-manage-users" class="admin-page">

	<div>
		<div class="dropdown admin-header-more pull-right">
			<button class="btn btn-default" type="button" id="moreUserActions" data-toggle="dropdown">
				<span class="glyphicon glyphicon-option-horizontal"></span>
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu" aria-labelledby="moreUserActions">
				<li role="presentation">
					<a role="menuitem" href="#" id="invite-users" class="add-link add-user"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"InviteUsers"),$_smarty_tpl);?>

						<span class="fa fa-send"></span>
					</a>
				</li>
				<li role="presentation">
					<a role="menuitem" href="#" id="import-users" class="add-link add-user"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Import"),$_smarty_tpl);?>

						<span class="glyphicon glyphicon-import"></span>
					</a>
				</li>
				<li role="presentation">
					<a role="menuitem" href="<?php echo $_smarty_tpl->tpl_vars['ExportUrl']->value;?>
" download="<?php echo $_smarty_tpl->tpl_vars['ExportUrl']->value;?>
" id="export-users" class="add-link add-user"
					   target="_blank"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Export"),$_smarty_tpl);?>

						<span class="glyphicon glyphicon-export"></span>
					</a>
				</li>
			</ul>
		</div>
		<div class="pull-right" style="margin-right: 20px; margin-top: 0.5em">
			<a role="menuitem" href="#" id="add-user" class="add-link add-user"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"AddUser"),$_smarty_tpl);?>

				<span class="fa fa-plus-circle add icon"></span>
			</a>
		</div>
		<h1><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ManageUsers'),$_smarty_tpl);?>
</h1>
	</div>

	<form id="filterForm" class="" role="form">
		<div class="form-group col-xs-4">
			<label for="userSearch"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'FindUser'),$_smarty_tpl);?>

				| <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_link'][0][0]->PrintLink(array('href'=>$_SERVER['SCRIPT_NAME'],'key'=>'AllUsers'),$_smarty_tpl);?>
</label>
			<input type="text" id="userSearch"
				   class="form-control"/>
		</div>
		<div class="form-group col-xs-2">
			<label for="filterStatusId"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Status'),$_smarty_tpl);?>
</label>
			<select id="filterStatusId" class="form-control">
				<?php echo smarty_function_html_options(array('selected'=>$_smarty_tpl->tpl_vars['FilterStatusId']->value,'options'=>$_smarty_tpl->tpl_vars['statusDescriptions']->value),$_smarty_tpl);?>

			</select>
		</div>
		<div class="form-group col-xs-6">
			<label for="filterGroupId"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Groups'),$_smarty_tpl);?>
</label>
			<select id="filterGroupId" class="form-control">
				<option value="0" <?php if ($_smarty_tpl->tpl_vars['FilterGroupId']->value == 0) {?> selected="true" <?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllGroups'),$_smarty_tpl);?>
</option>
				<option value="99999" <?php if ($_smarty_tpl->tpl_vars['FilterGroupId']->value == 99999) {?> selected="true" <?php }?>>No Group</option>
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['object_html_options'][0][0]->ObjectHtmlOptions(array('options'=>$_smarty_tpl->tpl_vars['Groups']->value,'label'=>'Name','key'=>'Id','selected'=>$_smarty_tpl->tpl_vars['FilterGroupId']->value),$_smarty_tpl);?>

			</select>
		</div>
		<div class="clearfix"></div>
	</form>

	<?php $_smarty_tpl->_assignInScope('colCount', 11);
?>
	<table width="100%" class="table admin-panel" id="userList">
		<thead>
		<tr>
			<th width="10%"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'Name','field'=>ColumnNames::LAST_NAME),$_smarty_tpl);?>
</th>
			<th width="10%"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'Username','field'=>ColumnNames::USERNAME),$_smarty_tpl);?>
</th>
			<th width="10%"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'Email','field'=>ColumnNames::EMAIL),$_smarty_tpl);?>
</th>
			<th width="10%"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'Phone','field'=>ColumnNames::PHONE_NUMBER),$_smarty_tpl);?>
</th>
			<th width="10%"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'Organization','field'=>ColumnNames::ORGANIZATION),$_smarty_tpl);?>
</th>
			<th width="10%"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'Position','field'=>ColumnNames::POSITION),$_smarty_tpl);?>
</th>
			<th width="5%"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'LastLogin','field'=>ColumnNames::LAST_LOGIN),$_smarty_tpl);?>
</th>
			<th width="5%" class="action"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['sort_column'][0][0]->SortColumn(array('key'=>'Status','field'=>ColumnNames::USER_STATUS),$_smarty_tpl);?>
</th>
			<?php if ($_smarty_tpl->tpl_vars['CreditsEnabled']->value) {?>
				<th width="5%" class="action"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Credits'),$_smarty_tpl);?>
</th>
				<?php $_smarty_tpl->_assignInScope('colCount', $_smarty_tpl->tpl_vars['colCount']->value+1);
?>
			<?php }?>
			<th width="5%" class="action"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Reservations'),$_smarty_tpl);?>
</th>
			<th width="5%"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Actions'),$_smarty_tpl);?>
</th>
			<th width="5%"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Actions'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'More'),$_smarty_tpl);?>
</th>
			<th class="action-delete">
				<div class="checkbox checkbox-single">
					<input type="checkbox" id="delete-all" aria-label="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'All'),$_smarty_tpl);?>
"/>
					<label for="delete-all"></label>
				</div>
			</th>
		</tr>
		</thead>
		<tbody>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
			<?php smarty_function_cycle(array('values'=>'row0,row1','assign'=>'rowCss'),$_smarty_tpl);?>

			<?php $_smarty_tpl->_assignInScope('id', $_smarty_tpl->tpl_vars['user']->value->Id);
?>
			<tr class="<?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
" data-userId="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
				<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fullname'][0][0]->DisplayFullName(array('first'=>$_smarty_tpl->tpl_vars['user']->value->First,'last'=>$_smarty_tpl->tpl_vars['user']->value->Last,'ignorePrivacy'=>"true"),$_smarty_tpl);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value->Username;?>
</td>
				<td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['user']->value->Email;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->Email;?>
</a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value->Phone;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value->Organization;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value->PositionName;?>
</td>
				<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['user']->value->LastLogin,'key'=>'short_datetime','timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value),$_smarty_tpl);?>
</td>
				<td class="action"><a href="#" class="update changeStatus"><?php echo $_smarty_tpl->tpl_vars['statusDescriptions']->value[$_smarty_tpl->tpl_vars['user']->value->StatusId];?>
</a>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array('id'=>"userStatusIndicator"),$_smarty_tpl);?>

				</td>
				<?php if ($_smarty_tpl->tpl_vars['CreditsEnabled']->value) {?>
					<td class="align-right">
						<span class="propertyValue inlineUpdate changeCredits"
							  data-type="number" data-pk="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-value="<?php echo $_smarty_tpl->tpl_vars['user']->value->CurrentCreditCount;?>
"
							  data-name="<?php echo FormKeys::CREDITS;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->CurrentCreditCount;?>
</span>
					</td>
				<?php }?>
				<td class="action">
					<a href="#" class="update viewReservations"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Reservations'),$_smarty_tpl);?>
</a>
				</td>
				<td>
					<div class="inline">
						<a href="#" class="update edit"><span class="fa fa-pencil-square-o icon update"></span></a>
					</div>
					|
					<div class="inline">
						<a href="#" class="update delete"><span class="fa fa-trash icon remove"></span></a>
					</div>
				</td>
				<td>
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-option-horizontal"></span>
							<span class="caret"></span>
							<span class="sr-only"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'More'),$_smarty_tpl);?>
</span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="moreActions<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
							<li role="presentation"><a role="menuitem"
														href="#"
														class="update viewimg"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"ProfileImg"),$_smarty_tpl);?>
</a>
							</li>
							<?php if ($_smarty_tpl->tpl_vars['PerUserColors']->value) {?>
								<li role="presentation">
									<a role="menuitem" href="#" class="update changeColor"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Color"),$_smarty_tpl);?>

										<?php if (!empty($_smarty_tpl->tpl_vars['user']->value->ReservationColor)) {?>
											<span class="user-color update changeColor"
												style="background-color:#<?php echo $_smarty_tpl->tpl_vars['user']->value->ReservationColor;?>
">&nbsp;</span>
										<?php }?>
									</a>
								</li>
							<?php }?>
							<li role="presentation"><a role="menuitem"
														href="#"
														class="update changePermissions"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Permissions"),$_smarty_tpl);?>
</a>
							</li>
							<li role="presentation"><a role="menuitem"
														href="#"
														class="update changeGroups"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Groups"),$_smarty_tpl);?>
</a>
							</li>
							<li role="presentation"><a role="menuitem"
														href="#"
														class="update resetPassword"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"ChangePassword"),$_smarty_tpl);?>
</a>
							</li>
						</ul>
					</div>
				</td>
				<td class="action-delete">
					<div class="checkbox checkbox-single">
						<input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'USER_ID','multi'=>true),$_smarty_tpl);?>
" class="delete-multiple" type="checkbox" id="delete<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
						aria-label="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
"/>
						<label for="delete<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"></label>
					</div>
				</td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tbody>
		<tfoot>
		<tr>
			<td colspan="<?php echo $_smarty_tpl->tpl_vars['colCount']->value-1;?>
"></td>
			<td class="action-delete"><a href="#" id="delete-selected" class="no-show" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
"><span class="fa fa-trash icon remove"></span></a></td>
		</tr>
		</tfoot>
	</table>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['pagination'][0][0]->CreatePagination(array('pageInfo'=>$_smarty_tpl->tpl_vars['PageInfo']->value),$_smarty_tpl);?>


	<div id="addUserDialog" class="modal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
		 aria-hidden="true">
		<form id="addUserForm" class="form" role="form" method="post"
			  ajaxAction="<?php echo ManageUsersActions::AddUser;?>
">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="addUserModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddUser'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div id="addUserResults" class="validationSummary alert alert-danger no-show">
							<ul>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"addUserEmailformat",'key'=>"ValidEmailRequired"),$_smarty_tpl);?>

								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"addUserUniqueemail",'key'=>"UniqueEmailRequired"),$_smarty_tpl);?>

								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"addUserUsername",'key'=>"UniqueUsernameRequired"),$_smarty_tpl);?>

								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"addAttributeValidator",'key'=>''),$_smarty_tpl);?>

							</ul>
						</div>

						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="form-group has-feedback">
									<label for="addUsername"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Username"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"USERNAME"),$_smarty_tpl);?>
 class="required form-control" required
										   id="addUsername"/>
									<i class="glyphicon glyphicon-asterisk form-control-feedback"
									   data-bv-icon-for="addUsername"></i>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="form-group has-feedback">
									<label for="addEmail"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Email"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"EMAIL"),$_smarty_tpl);?>
 class="required form-control" required
										   id="addEmail"/>
									<i class="glyphicon glyphicon-asterisk form-control-feedback"
									   data-bv-icon-for="addEmail"></i>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="form-group has-feedback">
									<label for="addFname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"FirstName"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"FIRST_NAME"),$_smarty_tpl);?>
 class="required form-control"
										   required
										   id="addFname"/>
									<i class="glyphicon glyphicon-asterisk form-control-feedback"
									   data-bv-icon-for="addFname"></i>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="form-group has-feedback">
									<label for="addLname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"LastName"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"LAST_NAME"),$_smarty_tpl);?>
 class="required form-control" required
										   id="addLname"/>
									<i class="glyphicon glyphicon-asterisk form-control-feedback"
									   data-bv-icon-for="addLname"></i>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="form-group has-feedback">
									<label for="addPassword"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Password"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"PASSWORD"),$_smarty_tpl);?>
 class="required form-control" required
										   id="addPassword"/>
									<i class="glyphicon glyphicon-asterisk form-control-feedback"
									   data-bv-icon-for="addPassword"></i>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="form-group has-feedback">
									<label for="addGroup"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Group"),$_smarty_tpl);?>
</label>
									<select id="addGroup" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'GROUP_ID'),$_smarty_tpl);?>
 class="form-control">
										<option value=""><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>
</option>
										<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['object_html_options'][0][0]->ObjectHtmlOptions(array('options'=>$_smarty_tpl->tpl_vars['Groups']->value,'label'=>'Name','key'=>'Id'),$_smarty_tpl);?>

									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="addNickname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"NickName"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"NICKNAME"),$_smarty_tpl);?>
 class="form-control" id="addNickname"/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="addPhone"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Phone"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"PHONE"),$_smarty_tpl);?>
 class="form-control" id="addPhone"/>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="addLineID"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"LineID"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"LINE_ID"),$_smarty_tpl);?>
 class="form-control" id="addLineID"/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="addAdvisorName"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"AdvisorName"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"ADVISOR_NAME"),$_smarty_tpl);?>
 class="form-control" id="addAdvisorName"/>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="addStudentID"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"StudentID"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"STUDENT_ID"),$_smarty_tpl);?>
 class="form-control" id="addStudentID"/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="addOrganization"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Organization"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"ORGANIZATION"),$_smarty_tpl);?>
 class="form-control" id="addOrganization"/>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="addPosition"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Position"),$_smarty_tpl);?>
</label>
									<select id="addPosition" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'POSITION'),$_smarty_tpl);?>
 class="form-control">
										<option value="0"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>
</option>
										<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['object_html_options'][0][0]->ObjectHtmlOptions(array('options'=>$_smarty_tpl->tpl_vars['Positions']->value,'label'=>'Name','key'=>'Id','selected'=>$_smarty_tpl->tpl_vars['PositionId']->value),$_smarty_tpl);?>

									</select>
								</div>
							</div>
						</div>

						<?php if (count($_smarty_tpl->tpl_vars['AttributeList']->value) > 0) {?>
							<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['AttributeList']->value)+1 - (1) : 1-(count($_smarty_tpl->tpl_vars['AttributeList']->value))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
								<?php if ($_smarty_tpl->tpl_vars['i']->value%2 == 1) {?>
									<div class="row">
								<?php }?>
								<div class="col-sm-12 col-md-6">
									<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['AttributeList']->value[$_smarty_tpl->tpl_vars['i']->value-1]),$_smarty_tpl);?>

								</div>
								<?php if ($_smarty_tpl->tpl_vars['i']->value%2 == 0 || $_smarty_tpl->tpl_vars['i']->value == count($_smarty_tpl->tpl_vars['AttributeList']->value)) {?>
									</div>
								<?php }?>
							<?php }
}
?>

						<?php }?>
					</div>
					<div class="modal-footer">
						<div class="checkbox inline">
                            <input type="checkbox" id="addIsAdmin" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'IS_ADMIN'),$_smarty_tpl);?>
 />
                            <label for="addIsAdmin"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'IsAdmin'),$_smarty_tpl);?>
</label>
                        </div>
						&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="checkbox inline">
                            <input type="checkbox" id="sendAddEmail" checked="checked" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SEND_AS_EMAIL'),$_smarty_tpl);?>
 />
                            <label for="sendAddEmail"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NotifyUser'),$_smarty_tpl);?>
</label>
                        </div>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['add_button'][0][0]->AddButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</div>
		</form>
	</div>

	<div id="importUsersDialog" class="modal" tabindex="-1" role="dialog" aria-labelledby="importUsersModalLabel"
		 aria-hidden="true">
		<form id="importUsersForm" class="form" role="form" method="post" enctype="multipart/form-data"
			  ajaxAction="<?php echo ManageUsersActions::ImportUsers;?>
">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="importUsersModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Import'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div id="importUserResults" class="validationSummary alert alert-danger no-show">
							<ul>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"fileExtensionValidator",'key'=>''),$_smarty_tpl);?>

							</ul>
						</div>
						<div id="importErrors" class="alert alert-danger no-show"></div>
						<div id="importResult" class="alert alert-success no-show">
							<span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RowsImported'),$_smarty_tpl);?>
</span>

							<div id="importCount" class="inline bold">0</div>
							<span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RowsSkipped'),$_smarty_tpl);?>
</span>

							<div id="importSkipped" class="inline bold">0</div>
							<a class="" href="<?php echo $_SERVER['SCRIPT_NAME'];?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Done'),$_smarty_tpl);?>
 <span
										class="fa fa-refresh"></span></a>
						</div>
						<div class="margin-bottom-25">
							<input type="file" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'USER_IMPORT_FILE'),$_smarty_tpl);?>
 />
						</div>
						<div id="importInstructions" class="alert alert-info">
							<div class="note"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UserImportInstructions'),$_smarty_tpl);?>
</div>
							<a href="<?php echo $_SERVER['SCRIPT_NAME'];?>
?dr=template" download="<?php echo $_SERVER['SCRIPT_NAME'];?>
?dr=template"
							   target="_blank"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'GetTemplate'),$_smarty_tpl);?>
 <span class="fa fa-download"></span></a>
						</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['add_button'][0][0]->AddButton(array('key'=>'Import'),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</div>
		</form>
	</div>

	<input type="hidden" id="activeId"/>

	<div id="permissionsDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permissionsModalLabel"
		 aria-hidden="true">
		<form id="permissionsForm" method="post" ajaxAction="<?php echo ManageUsersActions::Permissions;?>
">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="permissionsModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Permissions'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body scrollable-modal-content">
						<div class="alert alert-warning"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UserPermissionInfo'),$_smarty_tpl);?>
</div>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Select'),$_smarty_tpl);?>

						<a href="#" id="checkAllResources"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'All'),$_smarty_tpl);?>
</a> |
						<a href="#" id="checkNoResources"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>
</a>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resources']->value, 'resource');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
							<?php $_smarty_tpl->_assignInScope('resourceId', $_smarty_tpl->tpl_vars['resource']->value->GetResourceId());
?>
							<div class="checkbox">
								<input id="resource<?php echo $_smarty_tpl->tpl_vars['resourceId']->value;?>
" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_ID','multi'=>true),$_smarty_tpl);?>

									   class="resourceId" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetResourceId();?>
">
								<label for="resource<?php echo $_smarty_tpl->tpl_vars['resourceId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['resource']->value->GetName();?>
</label>
							</div>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</div>
		</form>
	</div>

	<div id="passwordDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
		 aria-hidden="true">
		<form id="passwordForm" method="post" ajaxAction="<?php echo ManageUsersActions::Password;?>
">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="passwordModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Password'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="form-group has-feedback">
							<label><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Password'),$_smarty_tpl);?>
</label>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('type'=>"password",'name'=>"PASSWORD",'class'=>"required",'value'=>''),$_smarty_tpl);?>

						</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</div>
		</form>
	</div>

	<div id="invitationDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="invitationModalLabel"
		 aria-hidden="true">
		<form id="invitationForm" method="post" ajaxAction="<?php echo ManageUsersActions::InviteUsers;?>
">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="invitationModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'InviteUsers'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="form-group has-feedback">
							<label for="inviteEmails"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'InviteUsersLabel'),$_smarty_tpl);?>
</label>
							<textarea id="inviteEmails" class="form-control"
									  rows="5" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'INVITED_EMAILS'),$_smarty_tpl);?>
></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<button type="button" class="btn btn-success save"><span
									class="fa fa-send"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'InviteUsers'),$_smarty_tpl);?>
</button>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</div>
		</form>
	</div>

	<div id="userDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
		 aria-hidden="true">
		<form id="userForm" method="post" ajaxAction="<?php echo ManageUsersActions::UpdateUser;?>
">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="userModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Edit'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div id="updateUserResults" class="alert alert-danger no-show">
							<ul>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"emailformat",'key'=>"ValidEmailRequired"),$_smarty_tpl);?>

								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"uniqueemail",'key'=>"UniqueEmailRequired"),$_smarty_tpl);?>

								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"uniqueusername",'key'=>"UniqueUsernameRequired"),$_smarty_tpl);?>

							</ul>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-6">

								<div class="form-group has-feedback">
									<label for="username"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Username"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"USERNAME"),$_smarty_tpl);?>
 class="required form-control" required
										id="username"/>
									<i class="glyphicon glyphicon-asterisk form-control-feedback"
									data-bv-icon-for="username"></i>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="form-group has-feedback">
									<label for="email"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Email"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"EMAIL"),$_smarty_tpl);?>
 class="required form-control" required
										id="email"/>
									<i class="glyphicon glyphicon-asterisk form-control-feedback"
									data-bv-icon-for="email"></i>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="form-group has-feedback">
									<label for="fname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"FirstName"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"FIRST_NAME"),$_smarty_tpl);?>
 class="required form-control" required
										id="fname"/>
									<i class="glyphicon glyphicon-asterisk form-control-feedback"
									data-bv-icon-for="fname"></i>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="form-group has-feedback">
									<label for="lname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"LastName"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"LAST_NAME"),$_smarty_tpl);?>
 class="required form-control" required
										id="lname"/>
									<i class="glyphicon glyphicon-asterisk form-control-feedback"
									data-bv-icon-for="lname"></i>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="nickname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"NickName"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"NICKNAME"),$_smarty_tpl);?>
 class="form-control" id="nickname"/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="phone"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Phone"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"PHONE"),$_smarty_tpl);?>
 class="form-control" id="phone"/>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="line_ID"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"LineID"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"LINE_ID"),$_smarty_tpl);?>
 class="form-control" id="line_ID"/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="advisor_name"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"AdvisorName"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"ADVISOR_NAME"),$_smarty_tpl);?>
 class="form-control" id="advisor_name"/>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="student_ID"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"StudentID"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"STUDENT_ID"),$_smarty_tpl);?>
 class="form-control" id="student_ID"/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="organization"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Organization"),$_smarty_tpl);?>
</label>
									<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>"ORGANIZATION"),$_smarty_tpl);?>
 class="form-control"
										id="organization"/>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="reg" for="position"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Position"),$_smarty_tpl);?>
</label>
									<select id="position" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'POSITION'),$_smarty_tpl);?>
 class="form-control">
										<option value="0"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>
</option>
										<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['object_html_options'][0][0]->ObjectHtmlOptions(array('options'=>$_smarty_tpl->tpl_vars['Positions']->value,'label'=>'Name','key'=>'Id'),$_smarty_tpl);?>

									</select>
								</div>
							</div>
						</div>

						<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<div class="checkbox inline">
                            <input type="checkbox" id="is_admin" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'IS_ADMIN'),$_smarty_tpl);?>
 />
                            <label for="is_admin"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'IsAdmin'),$_smarty_tpl);?>
</label>
                        </div>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</div>
		</form>
	</div>

	<div id="deleteDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
		 aria-hidden="true">
		<form id="deleteUserForm" method="post" ajaxAction="<?php echo ManageUsersActions::DeleteUser;?>
">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning">
							<div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteWarning'),$_smarty_tpl);?>
</div>

							<div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteUserWarning'),$_smarty_tpl);?>
</div>
						</div>

					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['delete_button'][0][0]->DeleteButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</div>
		</form>
	</div>

	<div id="deleteMultipleDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteMultipleModalLabel"
		 aria-hidden="true">
		<form id="deleteMultipleUserForm" method="post" ajaxAction="<?php echo ManageUsersActions::DeleteMultipleUsers;?>
">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteMultipleModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
 (<span id="deleteMultipleCount"></span>)</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning">
							<div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteWarning'),$_smarty_tpl);?>
</div>

							<div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteMultipleUserWarning'),$_smarty_tpl);?>
</div>
						</div>

					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['delete_button'][0][0]->DeleteButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
					<div id="deleteMultiplePlaceHolder" class="no-show"></div>
				</div>
			</div>
		</form>
	</div>

	<div id="groupsDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="groupsModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="groupsModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Groups'),$_smarty_tpl);?>
</h4>
				</div>
				<div class="modal-body scrollable-modal-content">

					<div id="groupList" class="hidden">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Groups']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
							<div class="group-item" groupId="<?php echo $_smarty_tpl->tpl_vars['group']->value->Id;?>
"><a href="#">&nbsp;</a>
								<span><?php echo $_smarty_tpl->tpl_vars['group']->value->Name;?>
</span>
							</div>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</div>

					<h5>Group Membership <span class="badge" id="groupCount">0</span></h5>
					<div id="addedGroups">
					</div>

					<h5>Available Groups</h5>
					<div id="removedGroups">
					</div>

					<form id="addGroupForm" method="post" ajaxAction="addUser">
						<input type="hidden" id="addGroupId" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'GROUP_ID'),$_smarty_tpl);?>
 />
						<input type="hidden" id="addGroupUserId" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'USER_ID'),$_smarty_tpl);?>
 />
					</form>

					<form id="removeGroupForm" method="post" ajaxAction="removeUser">
						<input type="hidden" id="removeGroupId" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'GROUP_ID'),$_smarty_tpl);?>
 />
						<input type="hidden" id="removeGroupUserId" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'USER_ID'),$_smarty_tpl);?>
 />
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="colorDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="colorModalLabel"
		 aria-hidden="true">
		<form id="colorForm" method="post" ajaxAction="<?php echo ManageUsersActions::ChangeColor;?>
">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="colorModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Color'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="input-group">
							<span class="input-group-addon">#</span>
							<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESERVATION_COLOR'),$_smarty_tpl);?>
 id="reservationColor" maxlength="6"
								   class="form-control" placeholder="FFFFFF">
						</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</div>
		</form>
	</div>

	<div id="imgDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="imgModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="imgModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ProfileImg'),$_smarty_tpl);?>
</h4>
				</div>
				<div class="modal-body">
					<center>
						<img id="profile-img" alt="Profile Image"
								class="img-circle" width="200px" height="200px" />
						<br/>
					</center>
				</div>
			</div>
		</div>
	</div>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>


	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"autocomplete.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"admin/user.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.form-3.09.min.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/colorpicker.js"),$_smarty_tpl);?>


	<?php echo '<script'; ?>
 type="text/javascript">
		function setUpEditables() {
			$.fn.editable.defaults.mode = 'popup';
			$.fn.editable.defaults.toggle = 'manual';
			$.fn.editable.defaults.emptyclass = '';
			$.fn.editable.defaults.params = function (params) {
				params.CSRF_TOKEN = $('#csrf_token').val();
				return params;
			};

			var updateUrl = '<?php echo $_SERVER['SCRIPT_NAME'];?>
?action=';
			$('.inlineAttribute').editable({
				url: updateUrl + '<?php echo ManageUsersActions::ChangeAttribute;?>
', emptytext: '-'
			});

			$('.changeCredits').editable({
				url: updateUrl + '<?php echo ManageUsersActions::ChangeCredits;?>
', emptytext: '-'
			});
		}

		$(document).ready(function () {
			var actions = {
				activate: '<?php echo ManageUsersActions::Activate;?>
', deactivate: '<?php echo ManageUsersActions::Deactivate;?>
'
			};

			var userOptions = {
				userAutocompleteUrl: "../ajax/autocomplete.php?type=<?php echo AutoCompleteType::MyUsers;?>
",
				groupsUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				groupManagementUrl: '<?php echo $_smarty_tpl->tpl_vars['ManageGroupsUrl']->value;?>
',
				permissionsUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				submitUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				saveRedirect: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				selectUserUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
?uid=',
				filterUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
?',
				queryStatus: '<?php echo QueryStringKeys::ACCOUNT_STATUS;?>
=',
				queryGroup: '<?php echo QueryStringKeys::GROUP_ID;?>
=',
				actions: actions,
				manageReservationsUrl: '<?php echo $_smarty_tpl->tpl_vars['ManageReservationsUrl']->value;?>
'
			};

			var userManagement = new UserManagement(userOptions);
			userManagement.init();

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
			var user = {
				id: <?php echo $_smarty_tpl->tpl_vars['user']->value->Id;?>
,
				first: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->First);?>
',
				last: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->Last);?>
',
				isActive: '<?php echo $_smarty_tpl->tpl_vars['user']->value->IsActive();?>
',
				isAdmin: '<?php echo $_smarty_tpl->tpl_vars['user']->value->IsAdmin;?>
',
				username: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->Username);?>
',
				email: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->Email);?>
',
				timezone: '<?php echo $_smarty_tpl->tpl_vars['user']->value->Timezone;?>
',
				phone: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->Phone);?>
',
				organization: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->Organization);?>
',
				position: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->Position);?>
',
				nickname: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->NickName);?>
',
				lineid: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->LineID);?>
',
				studentid: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->StudentID);?>
',
				advisor: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->Advisor);?>
',
				reservationColor: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['user']->value->ReservationColor);?>
',
				profileImg: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['profile_image'][0][0]->GetProfileImage(array('image'=>$_smarty_tpl->tpl_vars['user']->value->ProfileImg),$_smarty_tpl);?>
'
			};
			userManagement.addUser(user);
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


			$('#reservationColor').ColorPicker({
				onSubmit: function (hsb, hex, rgb, el) {
					$(el).val(hex);
					$(el).ColorPickerHide();
				}, onBeforeShow: function () {
					$(this).ColorPickerSetColor(this.value);
				}
			});


			setUpEditables();
		});
	<?php echo '</script'; ?>
>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
