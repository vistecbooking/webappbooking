<?php
/* Smarty version 3.1.30, created on 2019-12-11 11:52:30
  from "/var/www/html/booking/tpl/Ajax/reservation/update_successful.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df0760ecf5d19_91157393',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67d15828febd138b178b0d8cd7bfe7f7078c5e52' => 
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
function content_5df0760ecf5d19_91157393 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:Ajax/reservation/save_successful.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('divId'=>"reservation-updated",'messageKey'=>"ReservationUpdated"), 0, false);
}
}
