<?php
/* Smarty version 3.1.30, created on 2019-12-13 15:12:52
  from "/var/www/html/booking/tpl/Controls/Attributes/MultiLineTextbox.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df34804f27aa1_17233129',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f6ae93b36238c56ca527d1e3b1644a8e18f0f61' => 
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
function content_5df34804f27aa1_17233129 (Smarty_Internal_Template $_smarty_tpl) {
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
