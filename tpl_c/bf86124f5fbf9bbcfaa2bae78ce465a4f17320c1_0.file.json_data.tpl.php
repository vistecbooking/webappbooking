<?php
/* Smarty version 3.1.30, created on 2020-09-23 14:47:25
  from "/var/www/html/booking2/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f6afd8e0042d1_50469910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf86124f5fbf9bbcfaa2bae78ce465a4f17320c1' => 
    array (
      0 => '/var/www/html/booking2/tpl/json_data.tpl',
      1 => 1576231140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6afd8e0042d1_50469910 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
