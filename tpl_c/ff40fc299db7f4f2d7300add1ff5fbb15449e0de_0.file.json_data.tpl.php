<?php
/* Smarty version 3.1.30, created on 2020-11-10 16:02:13
  from "/var/www/html/booking/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5faa5715b758e5_79055270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff40fc299db7f4f2d7300add1ff5fbb15449e0de' => 
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
function content_5faa5715b758e5_79055270 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
