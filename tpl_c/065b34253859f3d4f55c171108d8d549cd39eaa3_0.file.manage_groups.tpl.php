<?php
/* Smarty version 3.1.30, created on 2020-11-18 10:43:42
  from "/var/www/html/booking/tpl/Admin/manage_groups.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fb4986ec37d96_98255198',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '065b34253859f3d4f55c171108d8d549cd39eaa3' => 
    array (
      0 => '/var/www/html/booking/tpl/Admin/manage_groups.tpl',
      1 => 1605594180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
  ),
),false)) {
function content_5fb4986ec37d96_98255198 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/var/www/html/booking/lib/external/Smarty/plugins/function.cycle.php';
?>

<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('cssFiles'=>'scripts/css/colorpicker.css'), 0, false);
?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cssfile'][0][0]->IncludeCssFile(array('src'=>'scripts/newcss/positions.css'),$_smarty_tpl);?>


<div id="page-manage-groups" >

<div class="container">
      <div class="box box-lg mb-4">
        <h2>Groups</h2>
		<form id="addGroupForm" role="form" method="post">
			<div class="box box-bordered" id="add-group-panel">
			<h3>Add group</h3>
			<div class="row ml-2">
				<div class="col-md">
				<div id="addGroupResults" class="error" style="display:none;"></div>
				<div class="form-group">
					<label for="Group name"
					>Group name <span class="text-danger">*require</span></label
					>
					<input
					type="text"
					class="form-control"
					placeholder="group name"
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'GROUP_NAME'),$_smarty_tpl);?>
 id="addGroupName" required
					/>
				</div>
				</div>
				<div class="col-md">
				<div class="form-group">
					<label for="Color">Color</label>
					<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="color-hex">#</span>
					</div>
					<input
						type="text"
						class="form-control"
						placeholder="FFFFFF"
						aria-label="FFFFFF"
						aria-describedby="color-hex"
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'GROUP_COLOR'),$_smarty_tpl);?>
 id="groupColor" maxlength="6"
					/>
					</div>
				</div>
				</div>
			</div>
			<div class="row ml-2">
				<div class="col-sm-auto">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['add_button'][0][0]->AddButton(array('class'=>"btn-sm"),$_smarty_tpl);?>

					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['reset_button'][0][0]->ResetButton(array('class'=>"btn-sm"),$_smarty_tpl);?>

					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

				</div>
			</div>
			</div>
		</form>
      </div>
	  <div class="box box-lg mb-3">
        <div class="form-group">
          <div class="row">
            <div class="col-md-4" id="groupSearchPanel" style="margin-bottom: 0;">
              	<label for="groupSearch"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'FindGroup'),$_smarty_tpl);?>
</label> |  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_link'][0][0]->PrintLink(array('href'=>$_SERVER['SCRIPT_NAME'],'key'=>'AllGroups'),$_smarty_tpl);?>

				<input type="text" id="groupSearch" class="form-control" size="40" placeholder="Search group name" />
            </div>
          </div>
        </div>
      </div>
	  <div class="table-responsive table-shadow">
        <table class="table table-vistec table-highlight" id="groupList">
          <thead>
            <tr>
              <th>Group name</th>
              <th>Group members</th>
              <th colspan="2">Permissions</th>
            </tr>
          </thead>
		  <tbody>
		 	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
				<?php smarty_function_cycle(array('values'=>'row0,row1','assign'=>'rowCss'),$_smarty_tpl);?>

				<tr class="<?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
" data-group-id="<?php echo $_smarty_tpl->tpl_vars['group']->value->Id;?>
">
					<td><?php echo $_smarty_tpl->tpl_vars['group']->value->Name;?>
</td>
					<td><a href="#" class="update members"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Members'),$_smarty_tpl);?>
</a></td>
					<td><a href="#" class="update permissions"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Change'),$_smarty_tpl);?>
</a></td>
					
					<td>
						<a href="#" class="update rename"><span class="custom-icon icon-edit icon"></a>
						<a href="#" class="update delete"><span class="custom-icon icon-delete remove">
						</span></a>
					</td>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 
		  </tbody>
		</table>
	</div>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['pagination'][0][0]->CreatePagination(array('pageInfo'=>$_smarty_tpl->tpl_vars['PageInfo']->value),$_smarty_tpl);?>


	<input type="hidden" id="activeId"/>
</div>

	<div class="modal fade" id="membersDialog" tabindex="-1" role="dialog" aria-labelledby="membersDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="membersDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'GroupMembers'),$_smarty_tpl);?>
</h4>
				</div>
				<div class="modal-body scrollable-modal-content">
					
					<h4><span id="totalUsers"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UsersInGroup'),$_smarty_tpl);?>
</h4>

					<div id="groupUserList"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default cancel" data-dismiss="modal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Done'),$_smarty_tpl);?>
</button>
				</div>
			</div>
		</div>
	</div>

	<div id="allUsers" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="browseUsersDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="browseUsersDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllUsers'),$_smarty_tpl);?>
</h4>
				</div>
				<div class="modal-body scrollable-modal-content">
					<div id="allUsersList"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="permissionsDialog" tabindex="-1" role="dialog" aria-labelledby="permissionsDialogLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form id="permissionsForm" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="permissionsDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Permissions'),$_smarty_tpl);?>
</h4>
						</div>
						<div class="modal-body scrollable-modal-content">
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
								<div class="checkbox">
									<input id="resource<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetResourceId();?>
" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_ID','multi'=>true),$_smarty_tpl);?>
 class="form-control resourceId" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetResourceId();?>
">
									<label for="resource<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetResourceId();?>
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
				</form>
			</div>
		</div>

	<form id="removeUserForm" method="post">
		<input type="hidden" id="removeUserId" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'USER_ID'),$_smarty_tpl);?>
 />
	</form>

	<form id="addUserForm" method="post">
		<input type="hidden" id="addUserId" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'USER_ID'),$_smarty_tpl);?>
 />
	</form>

	<div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="deleteGroupForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning">
							<div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteWarning'),$_smarty_tpl);?>
</div>
							<div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteGroupWarning'),$_smarty_tpl);?>
</div>
						</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['delete_button'][0][0]->DeleteButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="renameDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="renameGroupForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Edit'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="form-group has-feedback">
							<label for="groupName"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Name'),$_smarty_tpl);?>
</label>
							<input type="text" id="groupName" class="form-control required" required <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'GROUP_NAME'),$_smarty_tpl);?>
 />
							<i class="glyphicon glyphicon-asterisk form-control-feedback" data-bv-icon-for="groupName"></i>
						</div>
						<div class="form-group">
							<label for="groupColor_"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Color'),$_smarty_tpl);?>
</label>
							<div class="input-group">
								<span class="input-group-addon">#</span>
								<input type="text" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'GROUP_COLOR'),$_smarty_tpl);?>
 id="groupColor_" maxlength="6"
									class="form-control" placeholder="FFFFFF">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</form>
		</div>
	</div>

	<?php if ($_smarty_tpl->tpl_vars['CanChangeRoles']->value) {?>
		<div class="modal fade" id="rolesDialog" tabindex="-1" role="dialog" aria-labelledby="rolesDialogLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form id="rolesForm" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="rolesDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'WhatRolesApplyToThisGroup'),$_smarty_tpl);?>
</h4>
						</div>
						<div class="modal-body">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Roles']->value, 'role');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
?>
								<div class="checkbox">
									<input type="checkbox" id="role<?php echo $_smarty_tpl->tpl_vars['role']->value->Id;?>
" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'ROLE_ID','multi'=>true),$_smarty_tpl);?>
" value="<?php echo $_smarty_tpl->tpl_vars['role']->value->Id;?>
" />
									<label for="role<?php echo $_smarty_tpl->tpl_vars['role']->value->Id;?>
"><?php echo $_smarty_tpl->tpl_vars['role']->value->Name;?>
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
				</form>
			</div>
		</div>
	<?php }?>

	<div class="modal fade" id="groupAdminDialog" tabindex="-1" role="dialog" aria-labelledby="groupAdminDialogLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="groupAdminForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="groupAdminDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'WhoCanManageThisGroup'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="form-group has-feedback">
							<label for="groupAdmin" class="off-screen"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'WhoCanManageThisGroup'),$_smarty_tpl);?>
</label>
							<select <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'GROUP_ADMIN'),$_smarty_tpl);?>
 class="form-control" id="groupAdmin">
								<option value="">-- <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>
 --</option>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AdminGroups']->value, 'adminGroup');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['adminGroup']->value) {
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['adminGroup']->value->Id;?>
"><?php echo $_smarty_tpl->tpl_vars['adminGroup']->value->Name;?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</select>
						</div>
					</div>
					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</form>
		</div>
	</div>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>


	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"autocomplete.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"admin/group.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.form-3.09.min.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/colorpicker.js"),$_smarty_tpl);?>


	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function () {

			var actions = {
				activate: '<?php echo ManageGroupsActions::Activate;?>
',
				deactivate: '<?php echo ManageGroupsActions::Deactivate;?>
',
				permissions: '<?php echo ManageGroupsActions::Permissions;?>
',
				password: '<?php echo ManageGroupsActions::Password;?>
',
				removeUser: '<?php echo ManageGroupsActions::RemoveUser;?>
',
				addUser: '<?php echo ManageGroupsActions::AddUser;?>
',
				addGroup: '<?php echo ManageGroupsActions::AddGroup;?>
',
				renameGroup: '<?php echo ManageGroupsActions::RenameGroup;?>
',
				deleteGroup: '<?php echo ManageGroupsActions::DeleteGroup;?>
',
				roles: '<?php echo ManageGroupsActions::Roles;?>
',
				groupAdmin: '<?php echo ManageGroupsActions::GroupAdmin;?>
'
			};

			var dataRequests = {
				permissions: 'permissions',
				roles: 'roles',
				groupMembers: 'groupMembers'
			};

			var groupOptions = {
				userAutocompleteUrl: "../ajax/autocomplete.php?type=<?php echo AutoCompleteType::User;?>
",
				groupAutocompleteUrl: "../ajax/autocomplete.php?type=<?php echo AutoCompleteType::Group;?>
",
				groupsUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
",
				permissionsUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				rolesUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				submitUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				saveRedirect: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
				selectGroupUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
?gid=',
				actions: actions,
				dataRequests: dataRequests
			};

			var groupManagement = new GroupManagement(groupOptions);
			groupManagement.init();

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
			var group = {
				id: <?php echo $_smarty_tpl->tpl_vars['group']->value->Id;?>
,
				name: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['group']->value->Name);?>
',
				color: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['group']->value->Color);?>
'
			};
			groupManagement.addGroup(group);
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


			$('#add-group-panel').showHidePanel();

			$('#groupColor').ColorPicker({
				onSubmit: function (hsb, hex, rgb, el) {
					$(el).val(hex);
					$(el).ColorPickerHide();
				}, onBeforeShow: function () {
					$(this).ColorPickerSetColor(this.value);
				}
			});

			$('#groupColor_').ColorPicker({
				onSubmit: function (hsb, hex, rgb, el) {
					$(el).val(hex);
					$(el).ColorPickerHide();
				}, onBeforeShow: function () {
					$(this).ColorPickerSetColor(this.value);
				}
			});
		});
	<?php echo '</script'; ?>
>
</div>
<?php }
}
