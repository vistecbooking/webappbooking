<?php
/* Smarty version 3.1.30, created on 2020-11-10 20:24:09
  from "/var/www/html/booking/tpl/Reports/generate-report.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5faa9479d77dc9_77576793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71529e6e5564517f01e8494c912e0b0fd0db4288' => 
    array (
      0 => '/var/www/html/booking/tpl/Reports/generate-report.tpl',
      1 => 1605014645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:Reports/chart.tpl' => 1,
  ),
),false)) {
function content_5faa9479d77dc9_77576793 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('cssFiles'=>"scripts/js/jqplot/jquery.jqplot.min.css",'Select2'=>true), 0, false);
?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cssfile'][0][0]->IncludeCssFile(array('src'=>'scripts/newcss/create-report.css'),$_smarty_tpl);?>


<div class="container">
    <div class="box box-lg mb-4">
      <h2 class="mb-4">Create new report</h2>
      <form role="form" id="customReportInput">
        <div class="form-group">
          <div class="row mb-3">
            <div class="col-lg-2">
              <label>Select</label>
            </div>
            <div class="col-lg-auto">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="Select" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RESULTS'),$_smarty_tpl);?>
 value="<?php echo Report_ResultSelection::FULL_LIST;?>
"id="results_list"
                  checked />
                <label class="form-check-label" for="List">List</label>
              </div>
            </div>
            <div class="col-lg-auto">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="Select" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RESULTS'),$_smarty_tpl);?>
 value="<?php echo Report_ResultSelection::TIME;?>
" id="results_time" />
                <label class="form-check-label" for="Total Time">Total Time</label>
              </div>
            </div>
            <div class="col-lg-auto">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="Select" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RESULTS'),$_smarty_tpl);?>
 value="<?php echo Report_ResultSelection::COUNT;?>
" id="results_count" />
                <label class="form-check-label" for="Count">Count</label>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2">
              <label>Usage</label>
            </div>
            <div class="col-lg-auto">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="Usage" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_USAGE'),$_smarty_tpl);?>
 value="<?php echo Report_Usage::RESOURCES;?>
" id="usage_resources"
                  checked />
                <label class="form-check-label" for="Equipments">Equipments</label>
              </div>
            </div>
            <div class="col-lg-auto">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="Usage" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_USAGE'),$_smarty_tpl);?>
 value="<?php echo Report_Usage::ACCESSORIES;?>
" id="usage_accessories"/>
                <label class="form-check-label" for="Accessories">Accessories</label>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2"><label>Range</label></div>
            <div class="col-lg-10">
              <div class="row">
                <div class="col-lg-auto">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="Range" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RANGE'),$_smarty_tpl);?>
 value="<?php echo Report_Range::ALL_TIME;?>
" id="range_all"
                      checked />
                    <label class="form-check-label" for="All Time">All Time</label>
                  </div>
                </div>
                <div class="col-lg-auto">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="Range" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RANGE'),$_smarty_tpl);?>
 value="<?php echo Report_Range::CURRENT_MONTH;?>
" id="current_month"/>
                    <label class="form-check-label" for="Current mount">Current
                      mount</label>
                  </div>
                </div>
                <div class="col-lg-auto">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="Range" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RANGE'),$_smarty_tpl);?>
 value="<?php echo Report_Range::CURRENT_WEEK;?>
" id="current_week" />
                    <label class="form-check-label" for="Current week">Current
                      week</label>
                  </div>
                </div>
                <div class="col-lg-auto">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="Range" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RANGE'),$_smarty_tpl);?>
 value="<?php echo Report_Range::TODAY;?>
" id="today" />
                    <label class="form-check-label" for="Today">Today</label>
                  </div>
                </div>
                <div class="col-lg-auto">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="Range" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_RANGE'),$_smarty_tpl);?>
 value="<?php echo Report_Range::DATE_RANGE;?>
" id="range_within" />
                    <label class="form-check-label" for="Between">Between</label>
                    <input
                      class="form-text-input"
                      type="text" id="startDate"
                      placeholder="dd/mm/yyyy" />
					<input type="hidden" id="formattedBeginDate" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_START'),$_smarty_tpl);?>
/>
                    <span class="to">-</span>
                    <input
                      class="form-text-input"
                      type="text" id="endDate"
                      placeholder="dd/mm/yyyy" />
					<input type="hidden" id="formattedEndDate" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_END'),$_smarty_tpl);?>
 />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2">
              <label>Filter by</label>
            </div>
            <div class="col-lg-10">
              	<select class="filter-by-input" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_ID','multi'=>true),$_smarty_tpl);?>
 multiple="multiple" id="resourceId"> 
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value, 'resource');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetId();?>
"><?php echo $_smarty_tpl->tpl_vars['resource']->value->GetName();?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</select>
				<select class="filter-by-input" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_TYPE_ID','multi'=>true),$_smarty_tpl);?>
 multiple="multiple" id="resourceTypeId">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ResourceTypes']->value, 'resourceType');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resourceType']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['resourceType']->value->Id();?>
"><?php echo $_smarty_tpl->tpl_vars['resourceType']->value->Name();?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</select>
				<select class="filter-by-input" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'ACCESSORY_ID','multi'=>true),$_smarty_tpl);?>
 multiple="multiple" id="accessoryId">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Accessories']->value, 'accessory');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['accessory']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['accessory']->value->Id;?>
"><?php echo $_smarty_tpl->tpl_vars['accessory']->value->Name;?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</select>
				<select class="filter-by-input" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SCHEDULE_ID','multi'=>true),$_smarty_tpl);?>
 multiple="multiple" id="scheduleId">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Schedules']->value, 'schedule');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['schedule']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetId();?>
"><?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetName();?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</select>
				<select class="filter-by-input" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'GROUP_ID','multi'=>true),$_smarty_tpl);?>
 multiple="multiple" id="groupId">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Groups']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->Id;?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value->Name;?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</select>
				<input
                class="filter-by-input"
                type="text"
				id="user-filter"
                placeholder="All Users" style="display: inline;" />
				<input id="user_id" class="filter-id" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'USER_ID'),$_smarty_tpl);?>
/>
              	<input
                class="filter-by-input"
				id="participant-filter"
                type="text"
                placeholder="All Paticipants" />
				<input id="participant_id" class="filter-id" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PARTICIPANT_ID'),$_smarty_tpl);?>
/>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="Range" id="chkIncludeDeleted" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'INCLUDE_DELETED'),$_smarty_tpl);?>
 />
                <label
                  class="form-check-label"
                  for="Include deleted reservations">Include deleted reservations</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 text-center">
              <button type="submit" class="btn btn-success" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'GetReport'),$_smarty_tpl);?>
" id="btnCustomReport" asyncAction="" >
                Get report
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>



<div id="saveMessage" class="alert alert-success no-show">
	<strong><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReportSaved'),$_smarty_tpl);?>
</strong> <a
			href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
reports/<?php echo Pages::REPORTS_SAVED;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'MySavedReports'),$_smarty_tpl);?>
</a>
</div>

<div id="resultsDiv">
</div>

<div id="indicator" style="display:none; text-align: center;"><h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Working'),$_smarty_tpl);?>

	</h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"admin-ajax-indicator.gif"),$_smarty_tpl);?>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:Reports/chart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="modal fade" id="saveDialog" tabindex="-1" role="dialog" aria-labelledby="saveDialogLabel"
	 aria-hidden="true">
	<div class="modal-dialog">
		<form id="saveReportForm" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="saveDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SaveThisReport'),$_smarty_tpl);?>
</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="savereportname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Name'),$_smarty_tpl);?>
</label>
						<input type="text" id="saveReportName" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REPORT_NAME'),$_smarty_tpl);?>
 class="form-control"
							   placeholder="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoTitleLabel'),$_smarty_tpl);?>
"/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default cancel"
							data-dismiss="modal"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>
</button>
					<button type="button" id="btnSaveReport" class="btn btn-success"><span
								class="glyphicon glyphicon-ok-circle"></span>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SaveThisReport'),$_smarty_tpl);?>

					</button>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

				</div>
			</div>
		</form>
	</div>
</div>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"autocomplete.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/generate-reports.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/common.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reports/chart.js"),$_smarty_tpl);?>


<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function () {
		var reportOptions = {
			userAutocompleteUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
ajax/autocomplete.php?type=<?php echo AutoCompleteType::User;?>
",
			groupAutocompleteUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
ajax/autocomplete.php?type=<?php echo AutoCompleteType::Group;?>
",
			customReportUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::Generate;?>
",
			printUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::PrintReport;?>
&",
			csvUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::Csv;?>
&",
			saveUrl: "<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo ReportActions::Save;?>
"
		};

		var reports = new GenerateReports(reportOptions);
		reports.init();

		var common = new ReportsCommon({
			scriptUrl: '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
'
		});
		common.init();

        $('#resourceId').select2({
            placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllResources'),$_smarty_tpl);?>
'
        });
        $('#resourceTypeId').select2({
            placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllResourceTypes'),$_smarty_tpl);?>
'
        });
        $('#accessoryId').select2({
            placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllAccessories'),$_smarty_tpl);?>
'
        });
        $('#scheduleId').select2({
            placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllSchedules'),$_smarty_tpl);?>
'
        });
        $('#groupId').select2({
            placeholder: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllGroups'),$_smarty_tpl);?>
'
        });
	});

	$('#report-filter-panel').showHidePanel();


	$('#user-filter, #participant-filter').clearable();
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"startDate",'AltId'=>"formattedBeginDate"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>"endDate",'AltId'=>"formattedEndDate"),$_smarty_tpl);?>


</div><?php }
}
