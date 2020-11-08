<?php
/* Smarty version 3.1.30, created on 2020-11-08 17:03:14
  from "/var/www/html/booking/tpl/Dashboard/resource_availability.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa7c262711f94_66361550',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4642006f9090657bcf9b63655785bb42dea25d37' => 
    array (
      0 => '/var/www/html/booking/tpl/Dashboard/resource_availability.tpl',
      1 => 1600849228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Dashboard/calendar-page-base.tpl' => 1,
  ),
),false)) {
function content_5fa7c262711f94_66361550 (Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
td.fc-today {
    background: #fcf8e3;
}
</style>
<div class="dashboard dashboard availabilityDashboard" id="availabilityDashboard">
	<div class="dashboardHeader">
		<div class="pull-left">My calendar</div>
		<div class="pull-right">
			<a href="#" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ShowHide'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"ResourceAvailability"),$_smarty_tpl);?>
">
				<i class="glyphicon"></i>
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="dashboardContents" style="display: block;">
		<?php ob_start();
echo Pages::MY_CALENDAR;
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('pageUrl', $_prefixVariable2);
?>
		<?php $_smarty_tpl->_assignInScope('pageIdSuffix', "calendar");
?>
		<?php $_smarty_tpl->_assignInScope('subscriptionTpl', "calendar.subscription.tpl");
?>
		<?php $_smarty_tpl->_subTemplateRender("file:Dashboard/calendar-page-base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</div>
</div>
</div><?php }
}
