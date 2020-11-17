<?php
/* Smarty version 3.1.30, created on 2020-11-16 07:22:49
  from "/var/www/html/booking/tpl/Calendar/mycalendar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fb1c65927c406_90945529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fa2b5ce94be15a5a301d1edf52989edf8afca50' => 
    array (
      0 => '/var/www/html/booking/tpl/Calendar/mycalendar.tpl',
      1 => 1605479944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Calendar/calendar-page-base.tpl' => 1,
  ),
),false)) {
function content_5fb1c65927c406_90945529 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php ob_start();
echo Pages::MY_CALENDAR;
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('pageUrl', $_prefixVariable1);
$_smarty_tpl->_assignInScope('pageIdSuffix', "my-calendar");
$_smarty_tpl->_assignInScope('subscriptionTpl', "mycalendar.subscription.tpl");
$_smarty_tpl->_subTemplateRender("file:Calendar/calendar-page-base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
