<?php
/* Smarty version 3.1.30, created on 2019-12-10 10:06:42
  from "/var/www/html/booking/tpl/Ajax/reservation/save_failed.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5def0bc22e8e78_63409759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e8733a6765a04d8b7895761996180db6e931716' => 
    array (
      0 => '/var/www/html/booking/tpl/Ajax/reservation/save_failed.tpl',
      1 => 1551196419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5def0bc22e8e78_63409759 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="reservation-failed" class="reservationResponseMessage">
	<div id="reservation-response-image">
		<span class="fa fa-warning fa-5x error"></span>
	</div>

	<div id="failed-message" class="reservation-message"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationFailed'),$_smarty_tpl);?>
</div>

	<div class="error">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Errors']->value, 'each');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['each']->value) {
?>
			<div><?php echo nl2br($_smarty_tpl->tpl_vars['each']->value);?>
</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</div>

	<div style="margin-top:10px;">
		<button id="btnSaveFailed" class="btn btn-warning"><span
					class="fa fa-arrow-circle-left"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationErrors'),$_smarty_tpl);?>
</button>

        <?php if ($_smarty_tpl->tpl_vars['CanJoinWaitList']->value) {?>
            <button id="btnWaitList" class="btn btn-info"><span
					class="fa fa-bell-o"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NotifyWhenAvailable'),$_smarty_tpl);?>
</button>
        <?php }?>

		<?php if ($_smarty_tpl->tpl_vars['CanBeRetried']->value) {?>
			<div id="retryParams" class="no-show">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RetryParameters']->value, 'retryParam');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['retryParam']->value) {
?>
					<input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['retryParam']->value->Name();?>
"
						   name="<?php echo FormKeys::RESERVATION_RETRY_PREFIX;?>
[<?php echo $_smarty_tpl->tpl_vars['retryParam']->value->Name();?>
]"
						   value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['retryParam']->value->Value(), ENT_QUOTES, 'UTF-8', true);?>
"/>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</div>
			<div id="retryMessages" class="no-show">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RetryMessages']->value, 'each');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['each']->value) {
?>
					<div><?php echo nl2br($_smarty_tpl->tpl_vars['each']->value);?>
</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</div>
			<button id="btnRetry" class="btn btn-success"><span class="fa fa-refresh"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RetrySkipConflicts'),$_smarty_tpl);?>

			</button>
		<?php }?>
	</div>
</div>


<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function () {
		$('#reservation-failed').trigger('loaded');
	});
<?php echo '</script'; ?>
><?php }
}
