<?php
/* Smarty version 3.1.30, created on 2020-11-10 20:48:31
  from "/var/www/html/booking/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5faa9a2f2faad3_79993630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ebbd3cea49d35b27bbb1f8876daaf775e5d9448' => 
    array (
      0 => '/var/www/html/booking/tpl/json_data.tpl',
      1 => 1604742064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5faa9a2f2faad3_79993630 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
