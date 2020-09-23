<?php
/* Smarty version 3.1.30, created on 2019-12-13 15:12:49
  from "/var/www/html/booking/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df34801e20072_57106951',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ebbd3cea49d35b27bbb1f8876daaf775e5d9448' => 
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
function content_5df34801e20072_57106951 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
