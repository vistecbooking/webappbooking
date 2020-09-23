<?php
/* Smarty version 3.1.30, created on 2019-12-12 04:54:32
  from "/var/www/html/booking/tpl/Schedule/schedule-mobile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df165981ad972_79042847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93ca289e0d85bd992662f53ebaef62372810f2d3' => 
    array (
      0 => '/var/www/html/booking/tpl/Schedule/schedule-mobile.tpl',
      1 => 1551196418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Schedule/schedule.tpl' => 1,
  ),
),false)) {
function content_5df165981ad972_79042847 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'displayGeneralReservedMobile' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/93ca289e0d85bd992662f53ebaef62372810f2d3_0.file.schedule-mobile.tpl.php',
    'uid' => '93ca289e0d85bd992662f53ebaef62372810f2d3',
    'call_name' => 'smarty_template_function_displayGeneralReservedMobile_5410759785df1659803ee67_11485335',
  ),
  'displayMyReservedMobile' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/93ca289e0d85bd992662f53ebaef62372810f2d3_0.file.schedule-mobile.tpl.php',
    'uid' => '93ca289e0d85bd992662f53ebaef62372810f2d3',
    'call_name' => 'smarty_template_function_displayMyReservedMobile_5410759785df1659803ee67_11485335',
  ),
  'displayMyParticipatingMobile' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/93ca289e0d85bd992662f53ebaef62372810f2d3_0.file.schedule-mobile.tpl.php',
    'uid' => '93ca289e0d85bd992662f53ebaef62372810f2d3',
    'call_name' => 'smarty_template_function_displayMyParticipatingMobile_5410759785df1659803ee67_11485335',
  ),
  'displayReservedMobile' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/93ca289e0d85bd992662f53ebaef62372810f2d3_0.file.schedule-mobile.tpl.php',
    'uid' => '93ca289e0d85bd992662f53ebaef62372810f2d3',
    'call_name' => 'smarty_template_function_displayReservedMobile_5410759785df1659803ee67_11485335',
  ),
  'displayPastTimeMobile' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/93ca289e0d85bd992662f53ebaef62372810f2d3_0.file.schedule-mobile.tpl.php',
    'uid' => '93ca289e0d85bd992662f53ebaef62372810f2d3',
    'call_name' => 'smarty_template_function_displayPastTimeMobile_5410759785df1659803ee67_11485335',
  ),
  'displayReservableMobile' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/93ca289e0d85bd992662f53ebaef62372810f2d3_0.file.schedule-mobile.tpl.php',
    'uid' => '93ca289e0d85bd992662f53ebaef62372810f2d3',
    'call_name' => 'smarty_template_function_displayReservableMobile_5410759785df1659803ee67_11485335',
  ),
  'displayRestrictedMobile' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/93ca289e0d85bd992662f53ebaef62372810f2d3_0.file.schedule-mobile.tpl.php',
    'uid' => '93ca289e0d85bd992662f53ebaef62372810f2d3',
    'call_name' => 'smarty_template_function_displayRestrictedMobile_5410759785df1659803ee67_11485335',
  ),
  'displayUnreservableMobile' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/93ca289e0d85bd992662f53ebaef62372810f2d3_0.file.schedule-mobile.tpl.php',
    'uid' => '93ca289e0d85bd992662f53ebaef62372810f2d3',
    'call_name' => 'smarty_template_function_displayUnreservableMobile_5410759785df1659803ee67_11485335',
  ),
  'displaySlotMobile' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/93ca289e0d85bd992662f53ebaef62372810f2d3_0.file.schedule-mobile.tpl.php',
    'uid' => '93ca289e0d85bd992662f53ebaef62372810f2d3',
    'call_name' => 'smarty_template_function_displaySlotMobile_5410759785df1659803ee67_11485335',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9423112805df16598054126_07977867', "legend");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16995422655df165981ab3b1_72701546', "reservations");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:Schedule/schedule.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "legend"} */
class Block_9423112805df16598054126_07977867 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "legend"} */
/* smarty_template_function_displayGeneralReservedMobile_5410759785df1659803ee67_11485335 */
if (!function_exists('smarty_template_function_displayGeneralReservedMobile_5410759785df1659803ee67_11485335')) {
function smarty_template_function_displayGeneralReservedMobile_5410759785df1659803ee67_11485335($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php if ($_smarty_tpl->tpl_vars['Slot']->value->IsPending()) {?>
		<?php $_smarty_tpl->_assignInScope('class', 'pending');
?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['Slot']->value->HasCustomColor()) {?>
		<?php $_smarty_tpl->_assignInScope('color', (((('style="background-color:').($_smarty_tpl->tpl_vars['Slot']->value->Color())).(' !important;color:')).($_smarty_tpl->tpl_vars['Slot']->value->TextColor())).(' !important;"'));
?>
	<?php }?>
	<div class="reserved <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['OwnershipClass']->value;?>
 clickres"
		resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
" <?php echo $_smarty_tpl->tpl_vars['color']->value;?>

		id="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
|<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Date()->Format('Ymd');?>
"><i class="fa fa-info-circle"></i>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['Slot']->value->BeginDate(),'key'=>'period_time'),$_smarty_tpl);?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['Slot']->value->EndDate(),'key'=>'period_time'),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escapequotes'][0][0]->EscapeQuotes($_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value));?>
</div>
<?php
}}
/*/ smarty_template_function_displayGeneralReservedMobile_5410759785df1659803ee67_11485335 */
/* smarty_template_function_displayMyReservedMobile_5410759785df1659803ee67_11485335 */
if (!function_exists('smarty_template_function_displayMyReservedMobile_5410759785df1659803ee67_11485335')) {
function smarty_template_function_displayMyReservedMobile_5410759785df1659803ee67_11485335($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReservedMobile', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'mine'), true);?>

<?php
}}
/*/ smarty_template_function_displayMyReservedMobile_5410759785df1659803ee67_11485335 */
/* smarty_template_function_displayMyParticipatingMobile_5410759785df1659803ee67_11485335 */
if (!function_exists('smarty_template_function_displayMyParticipatingMobile_5410759785df1659803ee67_11485335')) {
function smarty_template_function_displayMyParticipatingMobile_5410759785df1659803ee67_11485335($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReservedMobile', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'participating'), true);?>

<?php
}}
/*/ smarty_template_function_displayMyParticipatingMobile_5410759785df1659803ee67_11485335 */
/* smarty_template_function_displayReservedMobile_5410759785df1659803ee67_11485335 */
if (!function_exists('smarty_template_function_displayReservedMobile_5410759785df1659803ee67_11485335')) {
function smarty_template_function_displayReservedMobile_5410759785df1659803ee67_11485335($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReservedMobile', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>''), true);?>

<?php
}}
/*/ smarty_template_function_displayReservedMobile_5410759785df1659803ee67_11485335 */
/* smarty_template_function_displayPastTimeMobile_5410759785df1659803ee67_11485335 */
if (!function_exists('smarty_template_function_displayPastTimeMobile_5410759785df1659803ee67_11485335')) {
function smarty_template_function_displayPastTimeMobile_5410759785df1659803ee67_11485335($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
}}
/*/ smarty_template_function_displayPastTimeMobile_5410759785df1659803ee67_11485335 */
/* smarty_template_function_displayReservableMobile_5410759785df1659803ee67_11485335 */
if (!function_exists('smarty_template_function_displayReservableMobile_5410759785df1659803ee67_11485335')) {
function smarty_template_function_displayReservableMobile_5410759785df1659803ee67_11485335($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
}}
/*/ smarty_template_function_displayReservableMobile_5410759785df1659803ee67_11485335 */
/* smarty_template_function_displayRestrictedMobile_5410759785df1659803ee67_11485335 */
if (!function_exists('smarty_template_function_displayRestrictedMobile_5410759785df1659803ee67_11485335')) {
function smarty_template_function_displayRestrictedMobile_5410759785df1659803ee67_11485335($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
}}
/*/ smarty_template_function_displayRestrictedMobile_5410759785df1659803ee67_11485335 */
/* smarty_template_function_displayUnreservableMobile_5410759785df1659803ee67_11485335 */
if (!function_exists('smarty_template_function_displayUnreservableMobile_5410759785df1659803ee67_11485335')) {
function smarty_template_function_displayUnreservableMobile_5410759785df1659803ee67_11485335($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
    <div class="unreservable"
         resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
" <?php echo $_smarty_tpl->tpl_vars['color']->value;?>

         id="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
|<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Date()->Format('Ymd');?>
"><i class="fa fa-info-circle"></i>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['Slot']->value->BeginDate(),'key'=>'period_time'),$_smarty_tpl);?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['Slot']->value->EndDate(),'key'=>'period_time'),$_smarty_tpl);?>

        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escapequotes'][0][0]->EscapeQuotes($_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value));?>
</div>
<?php
}}
/*/ smarty_template_function_displayUnreservableMobile_5410759785df1659803ee67_11485335 */
/* smarty_template_function_displaySlotMobile_5410759785df1659803ee67_11485335 */
if (!function_exists('smarty_template_function_displaySlotMobile_5410759785df1659803ee67_11485335')) {
function smarty_template_function_displaySlotMobile_5410759785df1659803ee67_11485335($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, $_smarty_tpl->tpl_vars['DisplaySlotFactory']->value->GetFunction($_smarty_tpl->tpl_vars['Slot']->value,$_smarty_tpl->tpl_vars['AccessAllowed']->value,'Mobile'), array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value), true);?>

<?php
}}
/*/ smarty_template_function_displaySlotMobile_5410759785df1659803ee67_11485335 */
/* {block "reservations"} */
class Block_16995422655df165981ab3b1_72701546 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




















	<?php $_smarty_tpl->_assignInScope('TodaysDate', Date::Now());
?>
	<table class="reservations mobile" border="1" cellpadding="0" style="width:100%;">

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BoundDates']->value, 'date');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value) {
?>
			<?php $_smarty_tpl->_assignInScope('ts', $_smarty_tpl->tpl_vars['date']->value->Timestamp());
?>
			<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['periods']) ? $_smarty_tpl->tpl_vars['periods']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['ts']->value] = $_smarty_tpl->tpl_vars['DailyLayout']->value->GetPeriods($_smarty_tpl->tpl_vars['date']->value);
$_smarty_tpl->_assignInScope('periods', $_tmp_array);
?>
			<?php if (count($_smarty_tpl->tpl_vars['periods']->value[$_smarty_tpl->tpl_vars['ts']->value]) == 0) {
continue 1;
}?>
			<tr>
				<?php $_smarty_tpl->_assignInScope('class', '');
?>
				<?php if ($_smarty_tpl->tpl_vars['TodaysDate']->value->DateEquals($_smarty_tpl->tpl_vars['date']->value) == true) {?>
					<?php $_smarty_tpl->_assignInScope('class', "today");
?>
				<?php }?>
				<td class="resdate <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" colspan="2"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>"schedule_daily"),$_smarty_tpl);?>
</td>
			</tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value, 'resource', false, NULL, 'resource_loop', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
				<tr>
					<?php $_smarty_tpl->_assignInScope('resourceId', $_smarty_tpl->tpl_vars['resource']->value->Id);
?>
					<?php ob_start();
echo Pages::RESERVATION;
$_prefixVariable1=ob_get_clean();
ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>'url'),$_smarty_tpl);
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('href', $_prefixVariable1."?rid=".((string)$_smarty_tpl->tpl_vars['resourceId']->value)."&sid=".((string)$_smarty_tpl->tpl_vars['ScheduleId']->value)."&rd=".$_prefixVariable2);
?>
					<td class="resourcename" <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="background-color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetColor();?>
"<?php }?>>
						<?php if ($_smarty_tpl->tpl_vars['resource']->value->CanAccess) {?>
							<i resourceId="<?php echo $_smarty_tpl->tpl_vars['resourceId']->value;?>
" class="resourceNameSelector fa fa-info-circle" <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
"<?php }?>></i>
							<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" resourceId="<?php echo $_smarty_tpl->tpl_vars['resourceId']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['resource']->value->Name;?>
</a>
						<?php } else { ?>
							<i resourceId="<?php echo $_smarty_tpl->tpl_vars['resourceId']->value;?>
" class="resourceNameSelector fa fa-info-circle" <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
"<?php }?>></i>
							<span <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['resource']->value->Name;?>
</span>
						<?php }?>
					</td>

					<?php $_smarty_tpl->_assignInScope('slots', $_smarty_tpl->tpl_vars['DailyLayout']->value->GetLayout($_smarty_tpl->tpl_vars['date']->value,$_smarty_tpl->tpl_vars['resourceId']->value));
?>
					<?php $_smarty_tpl->_assignInScope('summary', $_smarty_tpl->tpl_vars['DailyLayout']->value->GetSummary($_smarty_tpl->tpl_vars['date']->value,$_smarty_tpl->tpl_vars['resourceId']->value));
?>
					<?php if ($_smarty_tpl->tpl_vars['summary']->value->NumberOfReservations() > 0) {?>
						<td class="slot">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slots']->value, 'slot');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['slot']->value) {
?>
								<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displaySlotMobile', array('Slot'=>$_smarty_tpl->tpl_vars['slot']->value,'Href'=>((string)$_smarty_tpl->tpl_vars['href']->value),'AccessAllowed'=>$_smarty_tpl->tpl_vars['resource']->value->CanAccess,'SlotRef'=>$_smarty_tpl->tpl_vars['slotRef']->value), true);?>

							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</td>
					<?php } else { ?>
						<?php ob_start();
echo Pages::RESERVATION;
$_prefixVariable3=ob_get_clean();
ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>'url'),$_smarty_tpl);
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('href', $_prefixVariable3."?rid=".((string)$_smarty_tpl->tpl_vars['resource']->value->Id)."&sid=".((string)$_smarty_tpl->tpl_vars['ScheduleId']->value)."&rd=".$_prefixVariable4);
?>
						<td class="reservable clickres slot" data-href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" data-start="<?php echo rawurlencode($_smarty_tpl->tpl_vars['date']->value->Format('Y-m-d H:i:s'));?>
"
								data-resourceId="<?php echo $_smarty_tpl->tpl_vars['resourceId']->value;?>
">
							&nbsp;
							<input type="hidden" class="href" value="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
"/>
						</td>
					<?php }?>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</table>
<?php
}
}
/* {/block "reservations"} */
}
