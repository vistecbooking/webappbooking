<?php
/* Smarty version 3.1.30, created on 2020-11-16 07:23:01
  from "/var/www/html/booking/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fb1c66598c4f6_10870590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdada478e023e7e0e9f897835b3d507b911cf7f3' => 
    array (
      0 => '/var/www/html/booking/tpl/json_data.tpl',
      1 => 1600849228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb1c66598c4f6_10870590 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
