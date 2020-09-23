<?php
/* Smarty version 3.1.30, created on 2019-12-13 16:20:17
  from "/var/www/html/booking/tpl/Reservation/edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df357d1469f02_53612640',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27daaff52253dae30e677017e579824965c982f6' => 
    array (
      0 => '/var/www/html/booking/tpl/Reservation/edit.tpl',
      1 => 1552892317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Reservation/create.tpl' => 1,
    'file:globalheader.tpl' => 1,
  ),
),false)) {
function content_5df357d1469f02_53612640 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15143144915df357d135da85_43052150', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4161263685df357d136f979_44615105', 'reservationHeader');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4164169995df357d14139d2_75249466', 'submitButtons');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7171232405df357d1426294_44034250', "ajaxMessage");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4113148645df357d1460766_20557803', 'attachments');
?>


<?php if ($_smarty_tpl->tpl_vars['AutoReleaseMinutes']->value != null) {?>
    <input type="hidden" id="autoReleaseMinutes" value="<?php echo $_smarty_tpl->tpl_vars['AutoReleaseMinutes']->value;?>
"/>
<?php }
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:Reservation/create.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'header'} */
class Block_15143144915df357d135da85_43052150 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Validator'=>true,'TitleKey'=>'EditReservationHeading','TitleArgs'=>'','Qtip'=>true,'printCssFiles'=>'css/reservation.print.css'), 0, false);
?>

<?php
}
}
/* {/block 'header'} */
/* {block 'reservationHeader'} */
class Block_4161263685df357d136f979_44615105 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"EditReservationHeading",'args'=>''),$_smarty_tpl);?>

	<?php if ($_smarty_tpl->tpl_vars['RequiresApproval']->value) {?><span class="pendingApproval">(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PendingApproval'),$_smarty_tpl);?>
)<?php }
}
}
/* {/block 'reservationHeader'} */
/* {block 'submitButtons'} */
class Block_4164169995df357d14139d2_75249466 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div class="btn-group btnMore">
		<?php ob_start();
echo Pages::CALENDAR_EXPORT;
$_prefixVariable1=ob_get_clean();
ob_start();
echo QueryStringKeys::REFERENCE_NUMBER;
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('icsUrl', ((string)$_smarty_tpl->tpl_vars['Path']->value)."export/".$_prefixVariable1."?".$_prefixVariable2."=".((string)$_smarty_tpl->tpl_vars['ReferenceNumber']->value));
?>
			<a  class="btn btn-default" href="<?php echo $_smarty_tpl->tpl_vars['icsUrl']->value;?>
" download="<?php echo $_smarty_tpl->tpl_vars['icsUrl']->value;?>
">
				<span class="fa fa-calendar"></span>
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddToOutlook'),$_smarty_tpl);?>

			</a>
			<a  class="btn btn-default btnPrint" href="#" >
				<span class="fa fa-print"></span>
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Print'),$_smarty_tpl);?>

			</a>
		<!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			<span class="hidden-xs"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'More'),$_smarty_tpl);?>
 <span class="caret"></span></span>
			<span class="visible-xs"><i class="fa fa-ellipsis-v"></i> <span class="caret"></span></span>
		</button> --!>
		<ul class="dropdown-menu" role="menu">
			<li>
				<?php ob_start();
echo Pages::CALENDAR_EXPORT;
$_prefixVariable3=ob_get_clean();
ob_start();
echo QueryStringKeys::REFERENCE_NUMBER;
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('icsUrl', ((string)$_smarty_tpl->tpl_vars['Path']->value)."export/".$_prefixVariable3."?".$_prefixVariable4."=".((string)$_smarty_tpl->tpl_vars['ReferenceNumber']->value));
?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['icsUrl']->value;?>
" download="<?php echo $_smarty_tpl->tpl_vars['icsUrl']->value;?>
">
					<span class="fa fa-calendar"></span>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddToOutlook'),$_smarty_tpl);?>
</a>
			</li>
			<li>
				<a href="#" class="btnPrint">
					<span class="fa fa-print"></span>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Print'),$_smarty_tpl);?>
</a>
			</li>
			<li>
				<a href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;
echo Pages::RESERVATION;?>
?<?php echo QueryStringKeys::SOURCE_REFERENCE_NUMBER;?>
=<?php echo $_smarty_tpl->tpl_vars['ReferenceNumber']->value;?>
&<?php echo QueryStringKeys::REDIRECT;?>
=<?php echo urlencode($_smarty_tpl->tpl_vars['ReturnUrl']->value);?>
">
					<span class="fa fa-copy"></span>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DuplicateReservation'),$_smarty_tpl);?>
</a>
			</li>

			<li class="divider"></li>
			<li>
			<?php if ($_smarty_tpl->tpl_vars['IsRecurring']->value) {?>
			    <a href="#" class="delete prompt">
					<span class="fa fa-remove remove icon"></span>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>

				</a>
            <?php } else { ?>
				<a href="#" class="triggerDeletePrompt delete prompt-single">
                    <span class="fa fa-remove remove icon"></span>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>

                </a>
			<?php }?>
			</li>
		</ul>
	</div>

	<?php if ($_smarty_tpl->tpl_vars['CheckInRequired']->value) {?>
		<button type="button" class="btn btn-warning btnCheckin"><i class="fa fa-sign-in"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CheckIn'),$_smarty_tpl);?>
<span class="autoReleaseButtonMessage" data-autorelease-minutes="<?php echo $_smarty_tpl->tpl_vars['AutoReleaseMinutes']->value;?>
"> - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReleasedIn'),$_smarty_tpl);?>
 <span class="autoReleaseMinutes"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'minutes'),$_smarty_tpl);?>
</span></button>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['CheckOutRequired']->value) {?>
		<button type="button" class="btn btn-warning btnCheckout"><i class="fa fa-sign-out"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CheckOut'),$_smarty_tpl);?>
</button>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['IsRecurring']->value) {?>
		<?php if ($_smarty_tpl->tpl_vars['ReservationAction']->value == "update" && $_smarty_tpl->tpl_vars['CanEditDateTime']->value) {?>
			<button type="button" class="btn btn-danger triggerDeletePrompt delete prompt-single">
				<span class="glyphicon glyphicon-remove-circle"></span>
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationCancel'),$_smarty_tpl);?>

			</button>
		<?php }?>
		<button type="button" class="btn btn-success update prompt">
			<span class="glyphicon glyphicon-ok-circle"></span>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Update'),$_smarty_tpl);?>

		</button>
		<div class="modal fade" id="updateButtons" tabindex="-1" role="dialog" aria-labelledby="updateButtonsLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="updateButtonsLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ApplyUpdatesTo'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<button type="button" class="btn btn-success save btnUpdateThisInstance">
							<span class="fa fa-check"></span>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ThisInstance'),$_smarty_tpl);?>

						</button>
						<button type="button" class="btn btn-success save btnUpdateAllInstances">
							<span class="fa fa-check-square"></span>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllInstances'),$_smarty_tpl);?>

						</button>
						<button type="button" class="btn btn-success save btnUpdateFutureInstances">
							<span class="fa fa-check-square-o"></span>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'FutureInstances'),$_smarty_tpl);?>

						</button>
						<button type="button" class="btn btn-default">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>

						</button>
					</div>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<?php if ($_smarty_tpl->tpl_vars['ReservationAction']->value == "update" && $_smarty_tpl->tpl_vars['CanEditDateTime']->value) {?>
			<button type="button" class="btn btn-danger triggerDeletePrompt delete prompt-single">
				<span class="glyphicon glyphicon-remove-circle"></span>
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservationCancel'),$_smarty_tpl);?>

			</button>
		<?php }?>
		<button type="button" class="btn btn-success save update btnEdit">
			<span class="glyphicon glyphicon-ok-circle"></span>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Update'),$_smarty_tpl);?>

		</button>
	<?php }?>
    <div id="deleteButtonPrompt" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteReminderWarning'),$_smarty_tpl);?>
</h3>
                 </div>
                <div class="modal-footer">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array('id'=>"cancelDelete",'class'=>"cancel"),$_smarty_tpl);?>

					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['delete_button'][0][0]->DeleteButton(array('id'=>"confirmDelete",'class'=>"delete save"),$_smarty_tpl);?>

               </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block 'submitButtons'} */
/* {block "ajaxMessage"} */
class Block_7171232405df357d1426294_44034250 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UpdatingReservation'),$_smarty_tpl);?>
...
<?php
}
}
/* {/block "ajaxMessage"} */
/* {block 'attachments'} */
class Block_4113148645df357d1460766_20557803 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if (count($_smarty_tpl->tpl_vars['Attachments']->value) > 0) {?>
		<div class="col-xs-12">
		<div id="attachmentDiv" class="res-attachments">
			<span class="heading"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Attachments'),$_smarty_tpl);?>
 (<?php echo count($_smarty_tpl->tpl_vars['Attachments']->value);?>
)</span>
			<a href="#" class="remove" id="btnRemoveAttachment">(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Remove"),$_smarty_tpl);?>
)</a>
			<br/>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attachments']->value, 'attachment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->value) {
?>
				<?php ob_start();
echo Pages::RESERVATION_FILE;
$_prefixVariable5=ob_get_clean();
ob_start();
echo QueryStringKeys::ATTACHMENT_FILE_ID;
$_prefixVariable6=ob_get_clean();
ob_start();
echo QueryStringKeys::REFERENCE_NUMBER;
$_prefixVariable7=ob_get_clean();
$_smarty_tpl->_assignInScope('attachmentUrl', "attachments/".$_prefixVariable5."?".$_prefixVariable6."=".((string)$_smarty_tpl->tpl_vars['attachment']->value->FileId())."&".$_prefixVariable7."=".((string)$_smarty_tpl->tpl_vars['ReferenceNumber']->value));
?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['attachmentUrl']->value;?>
" download="<?php echo $_smarty_tpl->tpl_vars['attachmentUrl']->value;?>
"
				   target="_blank"><?php echo $_smarty_tpl->tpl_vars['attachment']->value->FileName();?>
</a>
				&nbsp;
				<input style='display: none;' type="checkbox" name="<?php echo FormKeys::REMOVED_FILE_IDS;?>
[<?php echo $_smarty_tpl->tpl_vars['attachment']->value->FileId();?>
]"/>
				&nbsp;
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</div>
		</div>
	<?php }
}
}
/* {/block 'attachments'} */
}
