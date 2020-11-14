<?php
/* Smarty version 3.1.30, created on 2020-11-14 16:51:30
  from "/var/www/html/booking/tpl/Admin/Resources/manage_resources_access.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fafa8a2afe0b6_24107615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b731388eb9d92d9cd073364b0f80d98ad6d9a0b5' => 
    array (
      0 => '/var/www/html/booking/tpl/Admin/Resources/manage_resources_access.tpl',
      1 => 1604978867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fafa8a2afe0b6_24107615 (Smarty_Internal_Template $_smarty_tpl) {
?>


<li class="startNotice"
	data-value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetMinNotice();?>
"
	data-days="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetMinNotice()->Days();?>
"
	data-hours="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetMinNotice()->Hours();?>
"
	data-minutes="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetMinNotice()->Minutes();?>
">
	<?php if ($_smarty_tpl->tpl_vars['resource']->value->HasMinNotice()) {?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMinNotice','args'=>$_smarty_tpl->tpl_vars['resource']->value->GetMinNotice()),$_smarty_tpl);?>

	<?php } else { ?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMinNoticeNone'),$_smarty_tpl);?>

	<?php }?>
</li>
<li class="endNotice"
	data-value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetMaxNotice();?>
"
	data-days="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetMaxNotice()->Days();?>
"
	data-hours="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetMaxNotice()->Hours();?>
"
	data-minutes="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetMaxNotice()->Minutes();?>
">
	<?php if ($_smarty_tpl->tpl_vars['resource']->value->HasMaxNotice()) {?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMaxNotice','args'=>$_smarty_tpl->tpl_vars['resource']->value->GetMaxNotice()),$_smarty_tpl);?>

	<?php } else { ?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMaxNoticeNone'),$_smarty_tpl);?>

	<?php }?>
</li>
<li class="requiresApproval"
	data-value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetRequiresApproval();?>
">
	<?php if ($_smarty_tpl->tpl_vars['resource']->value->GetRequiresApproval()) {?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceRequiresApproval'),$_smarty_tpl);?>

	<?php } else { ?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceRequiresApprovalNone'),$_smarty_tpl);?>

	<?php }?>
</li>
<li class="autoAssign"
	data-value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetAutoAssign();?>
">
	<?php if ($_smarty_tpl->tpl_vars['resource']->value->GetAutoAssign()) {?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourcePermissionAutoGranted'),$_smarty_tpl);?>

	<?php } else { ?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourcePermissionNotAutoGranted'),$_smarty_tpl);?>

	<?php }?>
</li>
<!-- <li class="enableCheckin"
	data-value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->IsCheckInEnabled();?>
">
	<?php if ($_smarty_tpl->tpl_vars['resource']->value->IsCheckInEnabled()) {?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RequiresCheckInNotification'),$_smarty_tpl);?>

	<?php } else { ?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoCheckInRequiredNotification'),$_smarty_tpl);?>

	<?php }?>
</li> --!>
<?php if ($_smarty_tpl->tpl_vars['resource']->value->IsAutoReleased()) {?>
<li class="autoRelease"
	 data-value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetAutoReleaseMinutes();?>
">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AutoReleaseNotification','args'=>$_smarty_tpl->tpl_vars['resource']->value->GetAutoReleaseMinutes()),$_smarty_tpl);?>

</li>
<?php }
}
}
