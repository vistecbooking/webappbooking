<?php
/* Smarty version 3.1.30, created on 2020-11-07 20:13:03
  from "/var/www/html/booking/tpl/Controls/Attributes/SelectList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa69d5fb425f9_48277979',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcd4dcd5761e5fdd8e96d6d2462e4f6d722aadc1' => 
    array (
      0 => '/var/www/html/booking/tpl/Controls/Attributes/SelectList.tpl',
      1 => 1600849228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa69d5fb425f9_48277979 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="form-group <?php if (!$_smarty_tpl->tpl_vars['searchmode']->value && $_smarty_tpl->tpl_vars['attribute']->value->Required()) {?>has-feedback<?php }?> <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
">
	<label class="customAttribute" for="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['attribute']->value->Label();?>
</label>
	<?php if ($_smarty_tpl->tpl_vars['readonly']->value) {?>
		<span class="attributeValue <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['attribute']->value->Value();?>
</span>
	<?php } else { ?>
		<select id="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['attributeName']->value;?>
" class="customAttribute form-control <?php echo $_smarty_tpl->tpl_vars['inputClass']->value;?>
" 
			<?php if ($_smarty_tpl->tpl_vars['attribute']->value->Required() && !$_smarty_tpl->tpl_vars['searchmode']->value) {?>required="required" data-bv-notempty="true" data-bv-notempty-message="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SelectRequired'),$_smarty_tpl);?>
"<?php }?>>
			<?php if ($_smarty_tpl->tpl_vars['attribute']->value->Required() || $_smarty_tpl->tpl_vars['searchmode']->value) {?>
				<option value=""><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SelectItem'),$_smarty_tpl);?>
</option>
			<?php }?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['attribute']->value->PossibleValueList(), 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"
						<?php if ($_smarty_tpl->tpl_vars['attribute']->value->Value() == $_smarty_tpl->tpl_vars['value']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</option>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</select>
	<?php }?>
</div>
<?php }
}
