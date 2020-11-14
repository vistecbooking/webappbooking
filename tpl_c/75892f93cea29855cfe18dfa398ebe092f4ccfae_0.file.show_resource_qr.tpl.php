<?php
/* Smarty version 3.1.30, created on 2020-11-10 21:25:06
  from "/var/www/html/booking/tpl/Admin/Resources/show_resource_qr.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5faaa2c25540b8_74735293',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75892f93cea29855cfe18dfa398ebe092f4ccfae' => 
    array (
      0 => '/var/www/html/booking/tpl/Admin/Resources/show_resource_qr.tpl',
      1 => 1600849228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5faaa2c25540b8_74735293 (Smarty_Internal_Template $_smarty_tpl) {
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
