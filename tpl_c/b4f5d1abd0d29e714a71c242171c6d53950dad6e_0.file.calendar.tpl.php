<?php
/* Smarty version 3.1.30, created on 2019-04-19 10:25:27
  from "/var/www/html/booking/tpl/Calendar/calendar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cb93fa7259f02_16985717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4f5d1abd0d29e714a71c242171c6d53950dad6e' => 
    array (
      0 => '/var/www/html/booking/tpl/Calendar/calendar.tpl',
      1 => 1551196422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Calendar/calendar-page-base.tpl' => 1,
  ),
),false)) {
function content_5cb93fa7259f02_16985717 (Smarty_Internal_Template $_smarty_tpl) {
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
