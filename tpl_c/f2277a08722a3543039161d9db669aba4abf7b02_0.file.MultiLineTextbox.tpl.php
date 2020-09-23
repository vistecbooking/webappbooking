<?php
/* Smarty version 3.1.30, created on 2019-09-10 11:02:55
  from "/var/www/html/booking/tpl/Controls/Attributes/MultiLineTextbox.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d77206f481641_63275927',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2277a08722a3543039161d9db669aba4abf7b02' => 
    array (
      0 => '/var/www/html/booking/tpl/Controls/Attributes/MultiLineTextbox.tpl',
      1 => 1551196421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d77206f481641_63275927 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="form-group <?php if (!$_smarty_tpl->tpl_vars['searchmode']->value && $_smarty_tpl->tpl_vars['attribute']->value->Required()) {?>has-feedback<?php }?> <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
">
<label class="customAttribute" for="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['attribute']->value->Label();?>
</label>
<?php if ($_smarty_tpl->tpl_vars['readonly']->value) {?>
	<span class="attributeValue <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['attribute']->value->Value());?>
</span>
<?php } else { ?>
	<textarea id="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['attributeName']->value;?>
" rows="2" class="customAttribute form-control <?php echo $_smarty_tpl->tpl_vars['inputClass']->value;?>
" 
		<?php if ($_smarty_tpl->tpl_vars['attribute']->value->Required() && !$_smarty_tpl->tpl_vars['searchmode']->value) {?>required="required" data-bv-notempty="true"<?php }?>>
		<?php echo $_smarty_tpl->tpl_vars['attribute']->value->Value();?>

	</textarea>
<?php }?>
</div><?php }
}
