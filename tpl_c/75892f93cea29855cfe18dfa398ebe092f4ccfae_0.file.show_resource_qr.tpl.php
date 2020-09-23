<?php
/* Smarty version 3.1.30, created on 2019-12-10 07:20:40
  from "/var/www/html/booking/tpl/Admin/Resources/show_resource_qr.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5deee4d8535357_15824800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75892f93cea29855cfe18dfa398ebe092f4ccfae' => 
    array (
      0 => '/var/www/html/booking/tpl/Admin/Resources/show_resource_qr.tpl',
      1 => 1551196425,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5deee4d8535357_15824800 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>

<h1><?php echo $_smarty_tpl->tpl_vars['ResourceName']->value;?>
</h1>
<img src="<?php echo $_smarty_tpl->tpl_vars['QRImageUrl']->value;?>
" />

<?php echo '<script'; ?>
 type="text/javascript">
    window.print();
<?php echo '</script'; ?>
>
</html><?php }
}
