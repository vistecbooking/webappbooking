<?php
/* Smarty version 3.1.30, created on 2020-11-07 23:10:41
  from "/var/www/html/booking/tpl/Reports/results-custom.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa6c7019956a7_71606127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f095d11d946377a4b66f511ec357cd7a7192cbf' => 
    array (
      0 => '/var/www/html/booking/tpl/Reports/results-custom.tpl',
      1 => 1604742064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa6c7019956a7_71606127 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/var/www/html/booking/lib/external/Smarty/plugins/function.cycle.php';
?>

<?php if ($_smarty_tpl->tpl_vars['Report']->value->ResultCount() > 0) {?>
	<div id="report-actions">
		<a href="#" id="btnChart"><span class="fa fa-bar-chart"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ViewAsChart'),$_smarty_tpl);?>
</a> |
		<?php if (!$_smarty_tpl->tpl_vars['HideSave']->value) {?>
			<a href="#" id="btnSaveReportPrompt"><span class="fa fa-save"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SaveThisReport'),$_smarty_tpl);?>
</a> |
		<?php }?>

		<a href="#" id="btnCsv"><span class="fa fa-download"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ExportToCSV'),$_smarty_tpl);?>
</a> |
		<a href="#" id="btnPrint"><span class="fa fa-print"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Print'),$_smarty_tpl);?>
</a> |
		<a href="#" id="btnCustomizeColumns"><span class="fa fa-filter"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Columns'),$_smarty_tpl);?>
</a>

		<form id="saveSelectedColumns" method="post" role="form" action="<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::SaveColumns;?>
">
			<input <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SELECTED_COLUMNS'),$_smarty_tpl);?>
 id="selectedColumns" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SelectedColumns']->value;?>
" />
		</form>
	</div>
	<div id="customize-columns"></div>
	<table width="100%" id="report-results" chart-type="<?php echo $_smarty_tpl->tpl_vars['Definition']->value->GetChartType();?>
">
		<tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Definition']->value->GetColumnHeaders(), 'column');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['column']->value) {
?>
				<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "columnTitle", null, null);
if ($_smarty_tpl->tpl_vars['column']->value->HasTitle()) {
echo $_smarty_tpl->tpl_vars['column']->value->Title();
} else {
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>$_smarty_tpl->tpl_vars['column']->value->TitleKey()),$_smarty_tpl);
}
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

				<th data-columnTitle="<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'columnTitle');?>
">
					<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'columnTitle');?>

				</th>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tr>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Report']->value->GetData()->Rows(), 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
			<?php smarty_function_cycle(array('values'=>',alt','assign'=>'rowCss'),$_smarty_tpl);?>

			<tr class="<?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Definition']->value->GetRow($_smarty_tpl->tpl_vars['row']->value), 'cell');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cell']->value) {
?>
					<td chart-value="<?php echo $_smarty_tpl->tpl_vars['cell']->value->ChartValue();?>
" chart-column-type="<?php echo $_smarty_tpl->tpl_vars['cell']->value->GetChartColumnType();?>
"
						chart-group="<?php echo $_smarty_tpl->tpl_vars['cell']->value->GetChartGroup();?>
"><?php echo $_smarty_tpl->tpl_vars['cell']->value->Value();?>
</td>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</table>
	<h4><?php echo $_smarty_tpl->tpl_vars['Report']->value->ResultCount();?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Rows'),$_smarty_tpl);?>

		<?php if ($_smarty_tpl->tpl_vars['Definition']->value->GetTotal() != '') {?>
			| <?php echo $_smarty_tpl->tpl_vars['Definition']->value->GetTotal();?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Total'),$_smarty_tpl);?>

		<?php }?>
	</h4>
<?php } else { ?>
	<h2 id="report-no-data" class="no-data" style="text-align: center;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoResultsFound'),$_smarty_tpl);?>
</h2>
<?php }?>

<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function () {
		$('#report-no-data, #report-results').trigger('loaded');
	});
<?php echo '</script'; ?>
><?php }
}
