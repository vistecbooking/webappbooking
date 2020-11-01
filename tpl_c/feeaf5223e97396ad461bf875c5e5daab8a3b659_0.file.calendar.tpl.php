<?php
/* Smarty version 3.1.30, created on 2020-10-05 18:46:35
  from "/var/www/html/booking/tpl/Calendar/calendar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f7b079be456c7_22696226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'feeaf5223e97396ad461bf875c5e5daab8a3b659' => 
    array (
      0 => '/var/www/html/booking/tpl/Calendar/calendar.tpl',
      1 => 1600849228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Calendar/calendar-page-base.tpl' => 1,
  ),
),false)) {
function content_5f7b079be456c7_22696226 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php ob_start();
echo Pages::CALENDAR;
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('pageUrl', $_prefixVariable1);
$_smarty_tpl->_assignInScope('pageIdSuffix', "calendar");
$_smarty_tpl->_assignInScope('subscriptionTpl', "calendar.subscription.tpl");
$_smarty_tpl->_subTemplateRender("file:Calendar/calendar-page-base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
