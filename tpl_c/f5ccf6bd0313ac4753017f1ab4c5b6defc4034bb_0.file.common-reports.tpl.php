<?php
/* Smarty version 3.1.30, created on 2020-11-07 19:32:42
  from "/var/www/html/booking/tpl/Reports/common-reports.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa693eb00f574_43505914',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5ccf6bd0313ac4753017f1ab4c5b6defc4034bb' => 
    array (
      0 => '/var/www/html/booking/tpl/Reports/common-reports.tpl',
      1 => 1604684496,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:Reports/chart.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5fa693eb00f574_43505914 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('cssFiles'=>"scripts/js/jqplot/jquery.jqplot.min.css"), 0, false);
?>



<div id="page-common-reports">

	<div class="container">
    <div class="box box-lg mb-4">
      <h2>Common reports</h2>
	  <div id="report-list">
		<div class="table-responsive mb-3">
				<table class="table table-report">
				<tbody>
					<tr>
					<td>Reserved Instruments</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::RESERVATIONS_TODAY;?>
">Today</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::RESERVATIONS_THISWEEK;?>
">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::RESERVATIONS_THISMONTH;?>
">Current Month</a>
					</td>
					</tr>
					<tr>
					<td>Reserved Accessories</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::ACCESSORIES_TODAY;?>
">Today</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::ACCESSORIES_THISWEEK;?>
">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::ACCESSORIES_THISMONTH;?>
">Current Month</a>
					</td>
					</tr>
					<tr>
					<td>Instrument Usage - Time Booked</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::RESOURCE_TIME_ALLTIME;?>
">Alltime</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::RESOURCE_TIME_THISWEEK;?>
">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::RESOURCE_TIME_THISMONTH;?>
">Current Month</a>
					</td>
					</tr>
					<tr>
					<td>Instrument Usage - Reservation Count</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::RESOURCE_COUNT_ALLTIME;?>
">Alltime</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::RESOURCE_COUNT_THISWEEK;?>
">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::RESOURCE_COUNT_THISMONTH;?>
">Current Month</a>
					</td>
					</tr>
					<tr>
					<td>Top 20 Users - Time Booked</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::USER_TIME_ALLTIME;?>
">Alltime</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::USER_TIME_THISWEEK;?>
">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::USER_TIME_THISMONTH;?>
">Current Month</a>
					</td>
					</tr>
					<tr>
					<td>Top 20 Users - Reservation Count</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::USER_COUNT_ALLTIME;?>
">Alltime</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::USER_COUNT_THISWEEK;?>
">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="<?php echo CannedReport::USER_COUNT_THISMONTH;?>
">Current Month</a>
					</td>
					</tr>
				</tbody>
				</table>
			</div>
      </div>
    </div>
  </div>
</div>


<div id="resultsDiv">
</div>

<div id="indicator" style="display:none; text-align: center;">
	<h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Working'),$_smarty_tpl);?>
</h3>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"admin-ajax-indicator.gif"),$_smarty_tpl);?>

</div>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>


<?php $_smarty_tpl->_subTemplateRender("file:Reports/chart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/canned-reports.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/chart.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/common.js"),$_smarty_tpl);?>


<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function () {
		var reportOptions = {
			generateUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::Generate;?>
&<?php echo QueryStringKeys::REPORT_ID;?>
=",
			emailUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::Email;?>
&<?php echo QueryStringKeys::REPORT_ID;?>
=",
			deleteUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::Delete;?>
&<?php echo QueryStringKeys::REPORT_ID;?>
=",
			printUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::PrintReport;?>
&<?php echo QueryStringKeys::REPORT_ID;?>
=",
			csvUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::Csv;?>
&<?php echo QueryStringKeys::REPORT_ID;?>
="
		};

		var reports = new CannedReports(reportOptions);
		reports.init();

		var common = new ReportsCommon(
				{
					scriptUrl: '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
'
				}
		);
		common.init();
	});
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
