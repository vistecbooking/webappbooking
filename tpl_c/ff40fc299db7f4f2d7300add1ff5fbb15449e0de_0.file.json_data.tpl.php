<?php
/* Smarty version 3.1.30, created on 2020-11-18 02:51:55
  from "/var/www/html/booking/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fb429db7624b0_54342607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff40fc299db7f4f2d7300add1ff5fbb15449e0de' => 
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
function content_5fb429db7624b0_54342607 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
