<?php
/* Smarty version 3.1.30, created on 2020-11-09 12:32:45
  from "/var/www/html/booking/tpl/Reports/saved-reports.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa8d47debfa59_04252887',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45cbb86b4127c0c99b6d7f7130d4b3bb6756847b' => 
    array (
      0 => '/var/www/html/booking/tpl/Reports/saved-reports.tpl',
      1 => 1604846656,
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
function content_5fa8d47debfa59_04252887 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/var/www/html/booking/lib/external/Smarty/plugins/function.cycle.php';
?>

<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('cssFiles'=>"scripts/js/jqplot/jquery.jqplot.min.css"), 0, false);
?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cssfile'][0][0]->IncludeCssFile(array('src'=>'scripts/newcss/my-reports.css'),$_smarty_tpl);?>


<div class="container">
    <div class="box box-lg mb-4">
      <div class="my-reports-header">
        <h2>My save reports</h2>
        <div class="status">
          <p><?php echo count($_smarty_tpl->tpl_vars['ReportList']->value);?>
</p>
        </div>
      </div>
      <fieldset>
	  	<?php if (count($_smarty_tpl->tpl_vars['ReportList']->value) == 0) {?>
        	<h3>You have no save report.</h3>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
reports/<?php echo Pages::REPORTS_GENERATE;?>
">+ Create new report</a>
		<?php } else { ?>
			<div id="report-list">
					<table class="table">
						<tbody>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ReportList']->value, 'report');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['report']->value) {
?>
							<?php smarty_function_cycle(array('values'=>',alt','assign'=>'rowCss'),$_smarty_tpl);?>

							<tr reportId="<?php echo $_smarty_tpl->tpl_vars['report']->value->Id();?>
" class="<?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
">
								<td><span class="report-title"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['report']->value->ReportName())===null||$tmp==='' ? $_smarty_tpl->tpl_vars['untitled']->value : $tmp);?>
</span></td>
								<td class="right"><span
											class="report-created-date"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['report']->value->DateCreated()),$_smarty_tpl);?>
</span>
								</td>
								<td class="report-action"><a href="#" class="runNow report"><span
												class="fa fa-play-circle-o icon add"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RunReport'),$_smarty_tpl);?>

									</a></td>
								<td class="report-action"><a href="#" class="emailNow report"><span
												class="fa fa-envelope-o icon"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EmailReport'),$_smarty_tpl);?>
</a>
								</td>
								<td class="report-action"><a href="#" class="delete report"><span
												class="fa fa-trash icon remove"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</a></td>
								
							</tr>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</tbody>
					</table>
				</div>	
		<?php }?>
      </fieldset>
    </div>
  </div>

<div id="page-saved-reports">

	<div id="resultsDiv">
	</div>

	<div id="emailSent" class="alert alert-success no-show">
		<strong><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReportSent'),$_smarty_tpl);?>
</strong>N
	</div>

	<div class="modal fade" id="emailDiv" tabindex="-1" role="dialog" aria-labelledby="emailDialogLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<form id="emailForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="emailDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EmailReport'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="emailTo"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Email'),$_smarty_tpl);?>
</label>
							<input id="emailTo" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'EMAIL'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['UserEmail']->value;?>
" class="form-control"/>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default cancel"
									data-dismiss="modal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>
</button>
							<button id="btnSendEmail" type="button" class="btn btn-success save"><span
										class="fa fa-envelope-o"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EmailReport'),$_smarty_tpl);?>

							</button>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="deleteDiv" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="deleteForm" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="deleteLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-danger">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DeleteWarning'),$_smarty_tpl);?>

						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default cancel"
								data-dismiss="modal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>
</button>
						<button type="button" class="btn btn-danger save"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</button>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>

			</form>
		</div>
	</div>

	<div id="indicator" style="display:none; text-align: center;">
		<h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Working'),$_smarty_tpl);?>
</h3>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"admin-ajax-indicator.gif"),$_smarty_tpl);?>

	</div>

	<?php $_smarty_tpl->_subTemplateRender("file:Reports/chart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/saved-reports.js"),$_smarty_tpl);?>

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

			var reports = new SavedReports(reportOptions);
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
</div>
<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
