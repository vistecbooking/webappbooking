<?php
/* Smarty version 3.1.30, created on 2019-12-13 16:19:42
  from "/var/www/html/booking/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df357aec0a828_90292871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdada478e023e7e0e9f897835b3d507b911cf7f3' => 
    array (
      0 => '/var/www/html/booking/tpl/json_data.tpl',
      1 => 1551196417,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df357aec0a828_90292871 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
