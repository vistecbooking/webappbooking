<?php
/* Smarty version 3.1.30, created on 2019-06-14 13:00:01
  from "/var/www/html/booking/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d0337e1047b32_66221901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4a952b05eb78448f6535e52599a00803ad913d4' => 
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
function content_5d0337e1047b32_66221901 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
