<?php
/* Smarty version 3.1.30, created on 2019-12-13 15:12:11
  from "/var/www/html/booking/tpl/Controls/Attributes/Checkbox.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df347dbc7cab7_77801662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2148d8a06cbc3976604e339453ecdeed491e042d' => 
    array (
      0 => '/var/www/html/booking/tpl/Controls/Attributes/Checkbox.tpl',
      1 => 1551196421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df347dbc7cab7_77801662 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="form-group <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
">
    <?php if ($_smarty_tpl->tpl_vars['readonly']->value) {?>
        <label class="customAttribute" for="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['attribute']->value->Label();?>
</label>
        <span class="attributeValue <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['attribute']->value->Value() == "1") {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'True'),$_smarty_tpl);
} else {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'False'),$_smarty_tpl);
}?></span>
    <?php } elseif ($_smarty_tpl->tpl_vars['searchmode']->value) {?>
        <label class="customAttribute" for="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['attribute']->value->Label();?>
</label>
        <select id="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['attributeName']->value;?>
" class="customAttribute form-control <?php echo $_smarty_tpl->tpl_vars['inputClass']->value;?>
">
            <option value=""><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SelectItem'),$_smarty_tpl);?>
</option>
            <option value="0" <?php if ($_smarty_tpl->tpl_vars['attribute']->value->Value() == "0") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'No'),$_smarty_tpl);?>
</option>
            <option value="1" <?php if ($_smarty_tpl->tpl_vars['attribute']->value->Value() == "1") {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Yes'),$_smarty_tpl);?>
</option>
        </select>
    <?php } else { ?>
        <div class="form-check">
            <input type="checkbox" value="1" id="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['attributeName']->value;?>
" 
                   <?php if ($_smarty_tpl->tpl_vars['attribute']->value->Value() == "1") {?>checked="checked"<?php }?> class="form-check-input <?php echo $_smarty_tpl->tpl_vars['inputClass']->value;?>
"/>
            <label class="customAttribute form-check-label" for="<?php echo $_smarty_tpl->tpl_vars['attributeId']->value;?>
">
                <?php echo $_smarty_tpl->tpl_vars['attribute']->value->Label();?>

            </label>
        </div>
    <?php }?>
</div>
<?php }
}
