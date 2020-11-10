<?php
/* Smarty version 3.1.30, created on 2020-11-10 09:12:35
  from "/var/www/html/booking/tpl/Ajax/reservation/reservation_attributes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa9f71369c7c1_43517798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e6acd96cfc6e5333a52b44e9d233fad3dcc0d36' => 
    array (
      0 => '/var/www/html/booking/tpl/Ajax/reservation/reservation_attributes.tpl',
      1 => 1600849228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa9f71369c7c1_43517798 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if (count($_smarty_tpl->tpl_vars['Attributes']->value) > 0) {?>
    <div class="customAttributes">
        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attributes']->value, 'attribute', false, NULL, 'attributes', array (
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['index']++;
?>
                <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['index'] : null)%3 == 0) {?>
                    </div>
                    <div class="row">
                <?php }?>
                <div class="customAttribute col-sm-4 col-xs-12">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['attribute']->value,'readonly'=>$_smarty_tpl->tpl_vars['ReadOnly']->value),$_smarty_tpl);?>

                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    </div>
    <div class="clear">&nbsp;</div>
<?php }
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/bootstrapvalidator/bootstrapValidator.min.js"),$_smarty_tpl);?>

<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function () {
		var reservationForm = $('#form-reservation');
        if(reservationForm)
        {
            reservationForm.on('init.field.bv', function (e, data) {
                var $parent = data.element.parents('.form-group');
                var $icon = $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]');
                var validators = data.bv.getOptions(data.field).validators;
                if (validators.notEmpty)
                {
                    $icon.addClass('glyphicon glyphicon-asterisk').show();
                }
            })
            .off('success.form.bv')
            .on('success.form.bv', function (e) {
                e.preventDefault();
            });
            reservationForm.bootstrapValidator();
        }
    });
<?php echo '</script'; ?>
><?php }
}
