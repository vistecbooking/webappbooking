<?php
/* Smarty version 3.1.30, created on 2019-11-30 21:48:16
  from "/var/www/html/booking/tpl/Ajax/reservation/update_successful.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5de281302a5122_68534400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d6c6c71b451f9ee4935a0e31d86065767e0796c' => 
    array (
      0 => '/var/www/html/booking/tpl/Ajax/reservation/update_successful.tpl',
      1 => 1551196420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Ajax/reservation/save_successful.tpl' => 1,
  ),
),false)) {
function content_5de281302a5122_68534400 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:Ajax/reservation/save_successful.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('divId'=>"reservation-updated",'messageKey'=>"ReservationUpdated"), 0, false);
}
}
