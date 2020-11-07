<?php
/* Smarty version 3.1.30, created on 2020-11-07 19:19:45
  from "/var/www/html/booking/tpl/Admin/manage_schedules.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa690e1d2d042_07665628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ec0bee1cf9d18be61db3dcb5f1090c36fcd95a5' => 
    array (
      0 => '/var/www/html/booking/tpl/Admin/manage_schedules.tpl',
      1 => 1604751569,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:Admin/Schedules/manage_peak_times.tpl' => 2,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5fa690e1d2d042_07665628 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'display_periods' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/1ec0bee1cf9d18be61db3dcb5f1090c36fcd95a5_0.file.manage_schedules.tpl.php',
    'uid' => '1ec0bee1cf9d18be61db3dcb5f1090c36fcd95a5',
    'call_name' => 'smarty_template_function_display_periods_4203742855fa690e1335311_49350826',
  ),
  'display_slot_inputs' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/1ec0bee1cf9d18be61db3dcb5f1090c36fcd95a5_0.file.manage_schedules.tpl.php',
    'uid' => '1ec0bee1cf9d18be61db3dcb5f1090c36fcd95a5',
    'call_name' => 'smarty_template_function_display_slot_inputs_4203742855fa690e1335311_49350826',
  ),
));
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/booking/lib/external/Smarty/plugins/function.html_options.php';
?>

<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('InlineEdit'=>true), 0, false);
?>


<div class="container">
    <h1>
        <span class="mr-3"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ManageSchedules'),$_smarty_tpl);?>
</span>
        <a href="#" class="btn btn-success add-link pull-right" id="add-schedule">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"AddSchedule"),$_smarty_tpl);?>

        </a>
    </h1>

    <div class="table-responsive table-shadow mb-3">
      <table class="table table-md table-vistec table-highlight" style="white-space:unset">
        <thead>
          <tr>
            <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"AllSchedules"),$_smarty_tpl);?>
</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Schedules']->value, 'schedule');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['schedule']->value) {
?>
            <?php $_smarty_tpl->_assignInScope('id', $_smarty_tpl->tpl_vars['schedule']->value->GetId());
?>
            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'daysVisible', null, null);
?>

                <span class='propertyValue daysVisible inlineUpdate' data-type='number' data-pk='<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
' data-name='<?php echo FormKeys::SCHEDULE_DAYS_VISIBLE;?>
' data-min='0'><?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetDaysVisible();?>
</span>
            <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

            <?php $_smarty_tpl->_assignInScope('dayOfWeek', $_smarty_tpl->tpl_vars['schedule']->value->GetWeekdayStart());
?>
            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'dayName', null, null);
?>

                <span class='propertyValue dayName inlineUpdate' data-type='select' data-pk='<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
' data-name='<?php echo FormKeys::SCHEDULE_WEEKDAY_START;?>
' data-value='<?php echo $_smarty_tpl->tpl_vars['dayOfWeek']->value;?>
'><?php if ($_smarty_tpl->tpl_vars['dayOfWeek']->value == Schedule::Today) {
echo $_smarty_tpl->tpl_vars['Today']->value;
} else {
echo $_smarty_tpl->tpl_vars['DayNames']->value[$_smarty_tpl->tpl_vars['dayOfWeek']->value];
}?></span>
            <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

          <tr class="scheduleDetails" data-schedule-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
            <td>
              <input type="hidden" class="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
              <input type="hidden" class="daysVisible" value="<?php echo $_smarty_tpl->tpl_vars['daysVisible']->value;?>
"/>
              <input type="hidden" class="dayOfWeek" value="<?php echo $_smarty_tpl->tpl_vars['dayOfWeek']->value;?>
"/>
              <div class="title scheduleName h5 mb-0" data-type="text" data-pk="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-name="<?php echo FormKeys::SCHEDULE_NAME;?>
">
                <?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetName();?>

                <a class="update renameButton" href="#">
                    <span class="custom-icon icon-edit ml-3">
                </a>
              </div>
              <p class="my-1">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"LayoutDescription",'args'=>((string)$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'dayName')).", ".((string)$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'daysVisible'))),$_smarty_tpl);?>
<br>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Resources'),$_smarty_tpl);?>

                <span class="propertyValue">
                    <?php if (array_key_exists($_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl->tpl_vars['Resources']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value[$_smarty_tpl->tpl_vars['id']->value], 'r', false, NULL, 'resources_loop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['iteration'] == $_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['total'];
?>
                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value->GetName(), ENT_QUOTES, 'UTF-8', true);
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['last'] : null)) {?>, <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>

                    <?php }?>
                </span>
                <br>
                <?php if ($_smarty_tpl->tpl_vars['CreditsEnabled']->value) {?>
                    <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PeakTimes'),$_smarty_tpl);?>
</span>
                    <a class="update changePeakTimes" href="#"><span class="fa fa-pencil-square-o"></span></a>
                    <div class="peakPlaceHolder">
                        <?php $_smarty_tpl->_subTemplateRender("file:Admin/Schedules/manage_peak_times.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Layout'=>$_smarty_tpl->tpl_vars['Layouts']->value[$_smarty_tpl->tpl_vars['id']->value],'Months'=>$_smarty_tpl->tpl_vars['Months']->value,'DayNames'=>$_smarty_tpl->tpl_vars['DayNames']->value), 0, true);
?>

                    </div>
                <?php }?>
              </p>
                <div style="display:none;">
                    

                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ScheduleLayout','args'=>$_smarty_tpl->tpl_vars['schedule']->value->GetTimezone()),$_smarty_tpl);?>
:<br/>
                    <input type="hidden" class="timezone" value="<?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetTimezone();?>
"/>

                    <?php if (!$_smarty_tpl->tpl_vars['Layouts']->value[$_smarty_tpl->tpl_vars['id']->value]->UsesDailyLayouts()) {?>
                        <input type="hidden" class="usesDailyLayouts" value="false"/>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservableTimeSlots'),$_smarty_tpl);?>

                        <div class="reservableSlots" id="reservableSlots" ref="reservableEdit">
                            <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_periods', array('showReservable'=>true,'day'=>null), true);?>

                        </div>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BlockedTimeSlots'),$_smarty_tpl);?>

                        <div class="blockedSlots" id="blockedSlots" ref="blockedEdit">
                            <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_periods', array('showReservable'=>false,'day'=>null), true);?>

                        </div>
                    <?php } else { ?>
                        <input type="hidden" class="usesDailyLayouts" value="true"/>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'LayoutVariesByDay'),$_smarty_tpl);?>
 -
                        <a href="#" class="showAllDailyLayouts"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ShowHide'),$_smarty_tpl);?>
</a>
                        <div class="allDailyLayouts">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, DayOfWeek::Days(), 'day');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
?>
                                <?php echo $_smarty_tpl->tpl_vars['DayNames']->value[$_smarty_tpl->tpl_vars['day']->value];?>

                                <div class="reservableSlots" id="reservableSlots_<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
"
                                        ref="reservableEdit_<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
">
                                    <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_periods', array('showReservable'=>true,'day'=>$_smarty_tpl->tpl_vars['day']->value), true);?>

                                </div>
                                <div class="blockedSlots" id="blockedSlots_<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
" ref="blockedEdit_<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
">
                                    <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_periods', array('showReservable'=>false,'day'=>$_smarty_tpl->tpl_vars['day']->value), true);?>

                                </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </div>
                    <?php }?>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['schedule']->value->GetIsDefault()) {?>
                    <i class="note"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ThisIsTheDefaultSchedule'),$_smarty_tpl);?>
</i>
                <?php } else { ?>
                    <a class="link-primary update makeDefaultButton" href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'MakeDefault'),$_smarty_tpl);?>
</a>
                <?php }?>
                <span class="mx-1">|</span>
              <a class="link-primary update changeLayoutButton" href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ChangeLayout'),$_smarty_tpl);?>
</a>
              <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array('id'=>"action-indicator"),$_smarty_tpl);?>

            </td>
            <td class="text-right">
                <?php if ($_smarty_tpl->tpl_vars['schedule']->value->GetIsDefault()) {?>
                    &nbsp;
                <?php } else { ?>
                    <a class="update deleteScheduleButton" href="#"><span class="custom-icon icon-delete"></span></a>
                <?php }?>
            </td>
          </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
      </table>
    </div>
    <div class="panel panel-default admin-panel" id="list-schedules-panel">
        <div class="panel-body no-padding" id="scheduleList">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Schedules']->value, 'schedule');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['schedule']->value) {
?>
                <?php $_smarty_tpl->_assignInScope('id', $_smarty_tpl->tpl_vars['schedule']->value->GetId());
?>
                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'daysVisible', null, null);
?>
<span class='propertyValue daysVisible inlineUpdate' data-type='number'
                                                data-pk='<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'
                                                data-name='<?php echo FormKeys::SCHEDULE_DAYS_VISIBLE;?>
'
                                                data-min='0'><?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetDaysVisible();?>
</span><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

                <?php $_smarty_tpl->_assignInScope('dayOfWeek', $_smarty_tpl->tpl_vars['schedule']->value->GetWeekdayStart());
?>
                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'dayName', null, null);
?>
<span class='propertyValue dayName inlineUpdate' data-type='select'
                                            data-pk='<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'
                                            data-name='<?php echo FormKeys::SCHEDULE_WEEKDAY_START;?>
'
                                            data-value='<?php echo $_smarty_tpl->tpl_vars['dayOfWeek']->value;?>
'><?php if ($_smarty_tpl->tpl_vars['dayOfWeek']->value == Schedule::Today) {
echo $_smarty_tpl->tpl_vars['Today']->value;
} else {
echo $_smarty_tpl->tpl_vars['DayNames']->value[$_smarty_tpl->tpl_vars['dayOfWeek']->value];
}?></span><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

                <div class="scheduleDetails" data-schedule-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                    <div class="col-xs-12 col-sm-12">
                        <input type="hidden" class="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
                        <input type="hidden" class="daysVisible" value="<?php echo $_smarty_tpl->tpl_vars['daysVisible']->value;?>
"/>
                        <input type="hidden" class="dayOfWeek" value="<?php echo $_smarty_tpl->tpl_vars['dayOfWeek']->value;?>
"/>

                        <div>
					<span class="title scheduleName" data-type="text" data-pk="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
                          data-name="<?php echo FormKeys::SCHEDULE_NAME;?>
"><?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetName();?>
</span>
                            <a class="update renameButton" href="#"><span class="fa fa-pencil-square-o"></span></a>
                        </div>

                        <div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"LayoutDescription",'args'=>((string)$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'dayName')).", ".((string)$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'daysVisible'))),$_smarty_tpl);?>
</div>

                        <!-- <div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ScheduleAdministrator'),$_smarty_tpl);?>

                            <span class="propertyValue scheduleAdmin"
                                  data-type="select" data-pk="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-value="<?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetAdminGroupId();?>
"
                                  data-name="<?php echo FormKeys::SCHEDULE_ADMIN_GROUP_ID;?>
"><?php echo $_smarty_tpl->tpl_vars['GroupLookup']->value[$_smarty_tpl->tpl_vars['schedule']->value->GetAdminGroupId()]->Name;?>
</span>
                            <?php if (count($_smarty_tpl->tpl_vars['AdminGroups']->value) > 0) {?>
                                <a class="update changeScheduleAdmin" href="#"><span
                                            class="fa fa-pencil-square-o"></span></a>
                            <?php }?>
                        </div> --!>

                        <div><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Resources'),$_smarty_tpl);?>

                            <span class="propertyValue">
                            <?php if (array_key_exists($_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl->tpl_vars['Resources']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value[$_smarty_tpl->tpl_vars['id']->value], 'r', false, NULL, 'resources_loop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['iteration'] == $_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['total'];
?>
                                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value->GetName(), ENT_QUOTES, 'UTF-8', true);
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_resources_loop']->value['last'] : null)) {?>, <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            <?php } else { ?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>

                            <?php }?>
                            </span>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['CreditsEnabled']->value) {?>
                            <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PeakTimes'),$_smarty_tpl);?>
</span>
                            <a class="update changePeakTimes" href="#"><span class="fa fa-pencil-square-o"></span></a>
                            <div class="peakPlaceHolder">
                                <?php $_smarty_tpl->_subTemplateRender("file:Admin/Schedules/manage_peak_times.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Layout'=>$_smarty_tpl->tpl_vars['Layouts']->value[$_smarty_tpl->tpl_vars['id']->value],'Months'=>$_smarty_tpl->tpl_vars['Months']->value,'DayNames'=>$_smarty_tpl->tpl_vars['DayNames']->value), 0, true);
?>

                            </div>
                        <?php }?>
                    </div>

                    <div class="layout col-xs-12 col-sm-6" style="display:none;">
                        

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ScheduleLayout','args'=>$_smarty_tpl->tpl_vars['schedule']->value->GetTimezone()),$_smarty_tpl);?>
:<br/>
                        <input type="hidden" class="timezone" value="<?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetTimezone();?>
"/>

                        <?php if (!$_smarty_tpl->tpl_vars['Layouts']->value[$_smarty_tpl->tpl_vars['id']->value]->UsesDailyLayouts()) {?>
                            <input type="hidden" class="usesDailyLayouts" value="false"/>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservableTimeSlots'),$_smarty_tpl);?>

                            <div class="reservableSlots" id="reservableSlots" ref="reservableEdit">
                                <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_periods', array('showReservable'=>true,'day'=>null), true);?>

                            </div>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BlockedTimeSlots'),$_smarty_tpl);?>

                            <div class="blockedSlots" id="blockedSlots" ref="blockedEdit">
                                <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_periods', array('showReservable'=>false,'day'=>null), true);?>

                            </div>
                        <?php } else { ?>
                            <input type="hidden" class="usesDailyLayouts" value="true"/>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'LayoutVariesByDay'),$_smarty_tpl);?>
 -
                            <a href="#" class="showAllDailyLayouts"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ShowHide'),$_smarty_tpl);?>
</a>
                            <div class="allDailyLayouts">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, DayOfWeek::Days(), 'day');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
?>
                                    <?php echo $_smarty_tpl->tpl_vars['DayNames']->value[$_smarty_tpl->tpl_vars['day']->value];?>

                                    <div class="reservableSlots" id="reservableSlots_<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
"
                                         ref="reservableEdit_<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
">
                                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_periods', array('showReservable'=>true,'day'=>$_smarty_tpl->tpl_vars['day']->value), true);?>

                                    </div>
                                    <div class="blockedSlots" id="blockedSlots_<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
" ref="blockedEdit_<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
">
                                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_periods', array('showReservable'=>false,'day'=>$_smarty_tpl->tpl_vars['day']->value), true);?>

                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </div>
                        <?php }?>
                    </div>
                    <div class="actions col-xs-12">
                        <?php if ($_smarty_tpl->tpl_vars['schedule']->value->GetIsDefault()) {?>
                            <span class="note"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ThisIsTheDefaultSchedule'),$_smarty_tpl);?>
</span>
                            |
                            <span class="note"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DefaultScheduleCannotBeDeleted'),$_smarty_tpl);?>
</span>
                            |
                        <?php } else { ?>
                            <a class="update makeDefaultButton" href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'MakeDefault'),$_smarty_tpl);?>
</a>
                            |
                            <a class="update deleteScheduleButton" href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</a>
                            |
                        <?php }?>
                        <a class="update changeLayoutButton" href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ChangeLayout'),$_smarty_tpl);?>
</a> <!--|
                        <?php if ($_smarty_tpl->tpl_vars['schedule']->value->GetIsCalendarSubscriptionAllowed()) {?>
                            <a class="update disableSubscription"
                               href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'TurnOffSubscription'),$_smarty_tpl);?>
</a>
                        <?php } else { ?>
                            <a class="update enableSubscription" href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'TurnOnSubscription'),$_smarty_tpl);?>
</a>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['schedule']->value->GetIsCalendarSubscriptionAllowed()) {?>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"feed.png"),$_smarty_tpl);?>

                            <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetSubscriptionUrl()->GetAtomUrl();?>
">Atom</a>
                            |
                            <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['schedule']->value->GetSubscriptionUrl()->GetWebcalUrl();?>
">iCalendar</a>
                        <?php }?> --!>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array('id'=>"action-indicator"),$_smarty_tpl);?>

                        <div class="clear"></div>
                    </div>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    </div>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['pagination'][0][0]->CreatePagination(array('pageInfo'=>$_smarty_tpl->tpl_vars['PageInfo']->value),$_smarty_tpl);?>


    <div id="addDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addScheduleDialogLabel"
         aria-hidden="true">
        <form id="addScheduleForm" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="addScheduleDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddSchedule'),$_smarty_tpl);?>
</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group has-feedback">
                            <label for="addName"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Name'),$_smarty_tpl);?>
</label>
                            <input type="text" id="addName"
                                   class="form-control required" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SCHEDULE_NAME'),$_smarty_tpl);?>
 />
                            <i class="glyphicon glyphicon-asterisk form-control-feedback"
                               data-bv-icon-for="addName"></i>
                        </div>
                        <div class="form-group">
                            <label for="addStartsOn"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'StartsOn'),$_smarty_tpl);?>
</label>
                            <select <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SCHEDULE_WEEKDAY_START'),$_smarty_tpl);?>
 class="form-control" id="addStartsOn">
                                <option value="<?php echo Schedule::Today;?>
"><?php echo $_smarty_tpl->tpl_vars['Today']->value;?>
</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DayNames']->value, 'dayName', false, 'dayIndex');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dayIndex']->value => $_smarty_tpl->tpl_vars['dayName']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['dayIndex']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['dayName']->value;?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="addNumDaysVisible"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NumberOfDaysVisible'),$_smarty_tpl);?>
</label>
                            <input type="number" min="1" max="100" class="form-control required" id="addNumDaysVisible"
                                   value="7" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SCHEDULE_DAYS_VISIBLE'),$_smarty_tpl);?>
 />
                        </div>
                        <style>
                            .tooltipd {
                                position: relative;
                                display: inline-block;
                                border-bottom: 1px dotted black;
                                opacity: 1;
                            }

                            .tooltipd .tooltiptext {
                                visibility: hidden;
                                width: 220px;
                                background-color: black;
                                color: #fff;
                                border-radius: 6px;
                                padding: 10px ;

                                /* Position the tooltip */
                                position: absolute;
                                z-index: 1;
                            }

                            .tooltipd:hover .tooltiptext {
                                visibility: visible;
                            }
                        </style>
                        <div class="form-group">
                            <label for="addSameLayoutAs"  title="text"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UseSameLayoutAs'),$_smarty_tpl);?>
</label> <i class="fa fa-question-circle tooltipd"><span class="tooltiptext">Use format schedule form that you have it before.</span></i>
                            <select class="form-control" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SCHEDULE_ID'),$_smarty_tpl);?>
 id="addSameLayoutAs">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SourceSchedules']->value, 'schedule');
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['add_button'][0][0]->AddButton(array('submit'=>true),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <input type="hidden" id="activeId" value=""/>

    <div id="deleteDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteScheduleDialogLabel"
         aria-hidden="true">
        <form id="deleteForm" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="deleteScheduleDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Delete'),$_smarty_tpl);?>
</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            <div>This action will be make some instrument not have schedule. You must move that instrument to new schedule!</div>
                        </div>
                        <div class="form-group">
                            <label for="targetScheduleId"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'MoveResourcesAndReservations'),$_smarty_tpl);?>
</label>
                            <select id="targetScheduleId" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'SCHEDULE_ID'),$_smarty_tpl);?>
 class="form-control required">
                                <option value="">-- <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Schedule'),$_smarty_tpl);?>
 --</option>
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['delete_button'][0][0]->DeleteButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="changeLayoutDialog" class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="changeLayoutDialogLabel" aria-hidden="true">
        <form id="changeLayoutForm" method="post" role="form" class="form-inline">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="changeLayoutDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ChangeLayout'),$_smarty_tpl);?>
</h4>
                    </div>
                    <div class="modal-body">
                        <div class="validationSummary alert alert-danger no-show">
                            <ul><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"layoutValidator",'key'=>"ValidLayoutRequired"),$_smarty_tpl);?>
</ul>
                        </div>

                        <div class="col-xs-12">
                            <div class="checkbox">
                                <input type="checkbox" id="usesSingleLayout" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'USING_SINGLE_LAYOUT'),$_smarty_tpl);?>
>
                                <label for="usesSingleLayout"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UseSameLayoutForAllDays'),$_smarty_tpl);?>
</label>
                            </div>
                        </div>

                        

                        <div class="col-xs-12" id="dailySlots">
                            <div role="tabpanel" id="tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tabs-0" aria-controls="tabs-0"
                                                                              role="tab"
                                                                              data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['DayNames']->value[0];?>
</a></li>
                                    <li role="presentation"><a href="#tabs-1" aria-controls="tabs-1" role="tab"
                                                               data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['DayNames']->value[1];?>
</a></li>
                                    <li role="presentation"><a href="#tabs-2" aria-controls="tabs-2" role="tab"
                                                               data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['DayNames']->value[2];?>
</a></li>
                                    <li role="presentation"><a href="#tabs-3" aria-controls="tabs-3" role="tab"
                                                               data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['DayNames']->value[3];?>
</a></li>
                                    <li role="presentation"><a href="#tabs-4" aria-controls="tabs-4" role="tab"
                                                               data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['DayNames']->value[4];?>
</a></li>
                                    <li role="presentation"><a href="#tabs-5" aria-controls="tabs-5" role="tab"
                                                               data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['DayNames']->value[5];?>
</a></li>
                                    <li role="presentation"><a href="#tabs-6" aria-controls="tabs-6" role="tab"
                                                               data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['DayNames']->value[6];?>
</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tabs-0">
                                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_slot_inputs', array('day'=>'0'), true);?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tabs-1">
                                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_slot_inputs', array('day'=>'1'), true);?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tabs-2">
                                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_slot_inputs', array('day'=>'2'), true);?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tabs-3">
                                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_slot_inputs', array('day'=>'3'), true);?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tabs-4">
                                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_slot_inputs', array('day'=>'4'), true);?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tabs-5">
                                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_slot_inputs', array('day'=>'5'), true);?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tabs-6">
                                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_slot_inputs', array('day'=>'6'), true);?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_slot_inputs', array('id'=>"staticSlots",'day'=>null), true);?>

                        <!--
                        <div class="row">
                        <div class="slotTimezone col-xs-12">
                            <label for="layoutTimezone"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Timezone'),$_smarty_tpl);?>
</label>
                            <select <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'TIMEZONE'),$_smarty_tpl);?>
 id="layoutTimezone" class="form-control">
                                <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['TimezoneValues']->value,'output'=>$_smarty_tpl->tpl_vars['TimezoneOutput']->value),$_smarty_tpl);?>

                            </select>
                        </div>
                        </div>
                        --!>
                        <div class="row" style="margin-top: 15px;">
                        <div class="slotWizard col-xs-12">
                            <h5>
                                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "layoutConfig", "layoutConfig", null);
?>

                                    <input type='number' min='0' step='15' value='30' id='quickLayoutConfig' size=5'
                                           title='Minutes' class='form-control'/>
                                <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

                                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "layoutStart", "layoutStart", null);
?>

                                    <input type='text' value='08:00' id='quickLayoutStart' size='10' title='From time'
                                           class='form-control' maxlength='5'/>
                                <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

                                <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "layoutEnd", "layoutEnd", null);
?>

                                    <input type='text' value='18:00' id='quickLayoutEnd' size='10' title='End time'
                                           class='form-control' maxlength='5'/>
                                <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'QuickSlotCreation','args'=>((string)$_smarty_tpl->tpl_vars['layoutConfig']->value).",".((string)$_smarty_tpl->tpl_vars['layoutStart']->value).",".((string)$_smarty_tpl->tpl_vars['layoutEnd']->value)),$_smarty_tpl);?>

                                <a class="btn btn-info" style="color: #ffffff;" href="#" id="createQuickLayout"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Create'),$_smarty_tpl);?>
</a>
                            </h5>
                        </div>
                         </div>
                        <div class="row" style="margin-top: 15px;" >
                        <div class="slotHelpText col-xs-12">
                            <label>Instructions for use</label>
                            <p>1.<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Format'),$_smarty_tpl);?>
: <span>HH:MM - HH:MM <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'OptionalLabel'),$_smarty_tpl);?>
</span></p>

                            <p>2.<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'LayoutInstructions'),$_smarty_tpl);?>
</p>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="peakTimesDialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="peakTimesDialogLabel"
         aria-hidden="true">
        <form id="peakTimesForm" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="peakTimesDialogLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PeakTimes'),$_smarty_tpl);?>
</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="checkbox">
                                <input type="checkbox" id="peakAllDay" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PEAK_ALL_DAY'),$_smarty_tpl);?>
 />
                                <label for="peakAllDay"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllDay'),$_smarty_tpl);?>
</label>
                            </div>
                            <div id="peakTimes">
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Between'),$_smarty_tpl);?>

                                <input type="text" id="peakStartTime"
                                       class="form-control input-sm inline-block timeinput timepicker"
                                       value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['DefaultDate']->value,'format'=>'h:i A'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PEAK_BEGIN_TIME'),$_smarty_tpl);?>
/>
                                -
                                <input type="text" id="peakEndTime"
                                       class="form-control input-sm inline-block timeinput timepicker"
                                       value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['DefaultDate']->value->AddHours(9),'format'=>'h:i A'),$_smarty_tpl);?>
" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PEAK_END_TIME'),$_smarty_tpl);?>
/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input type="checkbox" id="peakEveryDay"
                                       checked="checked" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PEAK_EVERY_DAY'),$_smarty_tpl);?>
 />
                                <label for="peakEveryDay"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Everyday'),$_smarty_tpl);?>
</label>
                            </div>
                            <div id="peakDayList" class="no-show">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default btn-sm">
                                        <input type="checkbox" id="peakDay0" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'repeat_sunday'),$_smarty_tpl);?>
 />
                                        <?php echo $_smarty_tpl->tpl_vars['DayNames']->value[0];?>

                                    </label>
                                    <label class="btn btn-default btn-sm">
                                        <input type="checkbox" id="peakDay1" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'repeat_monday'),$_smarty_tpl);?>
 />
                                        <?php echo $_smarty_tpl->tpl_vars['DayNames']->value[1];?>

                                    </label>
                                    <label class="btn btn-default btn-sm">
                                        <input type="checkbox" id="peakDay2" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'repeat_tuesday'),$_smarty_tpl);?>
 />
                                        <?php echo $_smarty_tpl->tpl_vars['DayNames']->value[2];?>

                                    </label>
                                    <label class="btn btn-default btn-sm">
                                        <input type="checkbox" id="peakDay3" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'repeat_wednesday'),$_smarty_tpl);?>
 />
                                        <?php echo $_smarty_tpl->tpl_vars['DayNames']->value[3];?>

                                    </label>
                                    <label class="btn btn-default btn-sm">
                                        <input type="checkbox" id="peakDay4" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'repeat_thursday'),$_smarty_tpl);?>
 />
                                        <?php echo $_smarty_tpl->tpl_vars['DayNames']->value[4];?>

                                    </label>
                                    <label class="btn btn-default btn-sm">
                                        <input type="checkbox" id="peakDay5" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'repeat_friday'),$_smarty_tpl);?>
 />
                                        <?php echo $_smarty_tpl->tpl_vars['DayNames']->value[5];?>

                                    </label>
                                    <label class="btn btn-default btn-sm">
                                        <input type="checkbox" id="peakDay6" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'repeat_saturday'),$_smarty_tpl);?>
 />
                                        <?php echo $_smarty_tpl->tpl_vars['DayNames']->value[6];?>

                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input type="checkbox" id="peakAllYear"
                                       checked="checked" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PEAK_ALL_YEAR'),$_smarty_tpl);?>
 />
                                <label for="peakAllYear"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllYear'),$_smarty_tpl);?>
</label>
                            </div>
                            <div id="peakDateRange" class="no-show">
                                <label for="peakBeginMonth" class="col-xs-2"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BeginDate'),$_smarty_tpl);?>
</label>
                                <div class="col-xs-5">
                                    <select id="peakBeginMonth"
                                            class="form-control input-sm" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PEAK_BEGIN_MONTH'),$_smarty_tpl);?>
>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Months']->value, 'month', false, NULL, 'startMonths', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['month']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_startMonths']->value['iteration']++;
?>
                                            <option value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_startMonths']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_startMonths']->value['iteration'] : null);?>
"><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <select id="peakBeginDay"
                                            class="form-control input-sm" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PEAK_BEGIN_DAY'),$_smarty_tpl);?>
>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DayList']->value, 'day');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                                <div class="col-xs-3">&nbsp;</div>
                                <div class="clearfix"></div>
                                <label for="peakEndMonth" class="col-xs-2"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EndDate'),$_smarty_tpl);?>
</label>
                                <div class="col-xs-5">
                                    <select id="peakEndMonth"
                                            class="form-control input-sm" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PEAK_END_MONTH'),$_smarty_tpl);?>
>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Months']->value, 'month', false, NULL, 'endMonths', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['month']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_endMonths']->value['iteration']++;
?>
                                            <option value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_endMonths']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_endMonths']->value['iteration'] : null);?>
"><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <select id="peakEndDay" class="form-control input-sm" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PEAK_END_DAY'),$_smarty_tpl);?>
>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DayList']->value, 'day');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                                <div class="col-xs-3">&nbsp;</div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PEAK_DELETE'),$_smarty_tpl);?>
 id="deletePeakTimes" value=""/>
                    </div>
                    <div class="modal-footer">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['delete_button'][0][0]->DeleteButton(array('class'=>'pull-left','id'=>"deletePeakBtn"),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array(),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"admin/schedule.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.form-3.09.min.js"),$_smarty_tpl);?>


    <?php echo '<script'; ?>
 type="text/javascript">

        function setUpEditables() {
            $.fn.editable.defaults.mode = 'popup';
            $.fn.editable.defaults.toggle = 'manual';
            $.fn.editable.defaults.emptyclass = '';
            $.fn.editable.defaults.params = function (params) {
                params.CSRF_TOKEN = $('#csrf_token').val();
                return params;
            };

            var updateUrl = '<?php echo $_SERVER['SCRIPT_NAME'];?>
?action=';

            $('.scheduleName').editable({
                url: updateUrl + '<?php echo ManageSchedules::ActionRename;?>
', validate: function (value) {
                    if ($.trim(value) == '') {
                        return '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>strtr('RequiredValue', array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ))),$_smarty_tpl);?>
';
                    }
                }
            });

            $('.daysVisible').editable({
                url: updateUrl + '<?php echo ManageSchedules::ActionChangeDaysVisible;?>
'
            });

            $('.dayName').editable({
                url: updateUrl + '<?php echo ManageSchedules::ActionChangeStartDay;?>
', source: [{
                    value: '<?php echo Schedule::Today;?>
', text: '<?php echo strtr($_smarty_tpl->tpl_vars['Today']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'
                },
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DayNames']->value, 'dayName', false, 'dayIndex');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dayIndex']->value => $_smarty_tpl->tpl_vars['dayName']->value) {
?>
                    {
                        value:<?php echo $_smarty_tpl->tpl_vars['dayIndex']->value;?>
, text: '<?php echo strtr($_smarty_tpl->tpl_vars['dayName']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'
                    },
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                ]
            });

            $('.scheduleAdmin').editable({
                url: updateUrl + '<?php echo ManageSchedules::ChangeAdminGroup;?>
',
                emptytext: '<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo strtr($_prefixVariable1, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                source: [{
                    value: '0', text: ''
                },
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AdminGroups']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
                    {
                        value:<?php echo $_smarty_tpl->tpl_vars['group']->value->Id();?>
, text: '<?php echo strtr($_smarty_tpl->tpl_vars['group']->value->Name(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'
                    },
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                ]
            });
        }

        $(document).ready(function () {
            setUpEditables();

            var opts = {
                submitUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
                saveRedirect: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
                changeLayoutAction: '<?php echo ManageSchedules::ActionChangeLayout;?>
',
                addAction: '<?php echo ManageSchedules::ActionAdd;?>
',
                peakTimesAction: '<?php echo ManageSchedules::ActionChangePeakTimes;?>
',
                makeDefaultAction: '<?php echo ManageSchedules::ActionMakeDefault;?>
',
                deleteAction: '<?php echo ManageSchedules::ActionDelete;?>
',
                enableSubscriptionAction: '<?php echo ManageSchedules::ActionEnableSubscription;?>
',
                disableSubscriptionAction: '<?php echo ManageSchedules::ActionDisableSubscription;?>
'
            };

            var scheduleManagement = new ScheduleManagement(opts);
            scheduleManagement.init();

            $('.timepicker').timepicker({
                timeFormat: '<?php echo $_smarty_tpl->tpl_vars['TimeFormat']->value;?>
'
            });
        });

    <?php echo '</script'; ?>
>

</div>
<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
/* smarty_template_function_display_periods_4203742855fa690e1335311_49350826 */
if (!function_exists('smarty_template_function_display_periods_4203742855fa690e1335311_49350826')) {
function smarty_template_function_display_periods_4203742855fa690e1335311_49350826($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Layouts']->value[$_smarty_tpl->tpl_vars['id']->value]->GetSlots($_smarty_tpl->tpl_vars['day']->value), 'period', false, NULL, 'layouts', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['period']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['iteration'] == $_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['total'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['period']->value->IsReservable() == $_smarty_tpl->tpl_vars['showReservable']->value) {?>
                                <?php echo $_smarty_tpl->tpl_vars['period']->value->Start->Format("H:i");?>
 - <?php echo $_smarty_tpl->tpl_vars['period']->value->End->Format("H:i");?>

                                <?php if ($_smarty_tpl->tpl_vars['period']->value->IsLabelled()) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['period']->value->Label;?>

                                <?php }?>
                                <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['last'] : null)) {?>, <?php }?>
                            <?php }?>
                            <?php
}
} else {
?>

                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>

                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php
}}
/*/ smarty_template_function_display_periods_4203742855fa690e1335311_49350826 */
/* smarty_template_function_display_periods_4203742855fa690e1335311_49350826 */
if (!function_exists('smarty_template_function_display_periods_4203742855fa690e1335311_49350826')) {
function smarty_template_function_display_periods_4203742855fa690e1335311_49350826($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Layouts']->value[$_smarty_tpl->tpl_vars['id']->value]->GetSlots($_smarty_tpl->tpl_vars['day']->value), 'period', false, NULL, 'layouts', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['period']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['iteration'] == $_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['total'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['period']->value->IsReservable() == $_smarty_tpl->tpl_vars['showReservable']->value) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['period']->value->Start->Format("H:i");?>
 - <?php echo $_smarty_tpl->tpl_vars['period']->value->End->Format("H:i");?>

                                    <?php if ($_smarty_tpl->tpl_vars['period']->value->IsLabelled()) {?>
                                        <?php echo $_smarty_tpl->tpl_vars['period']->value->Label;?>

                                    <?php }?>
                                    <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_layouts']->value['last'] : null)) {?>, <?php }?>
                                <?php }?>
                                <?php
}
} else {
?>

                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>

                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <?php
}}
/*/ smarty_template_function_display_periods_4203742855fa690e1335311_49350826 */
/* smarty_template_function_display_slot_inputs_4203742855fa690e1335311_49350826 */
if (!function_exists('smarty_template_function_display_slot_inputs_4203742855fa690e1335311_49350826')) {
function smarty_template_function_display_slot_inputs_4203742855fa690e1335311_49350826($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
                            <div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="col-xs-12">
                                <?php $_smarty_tpl->_assignInScope('suffix', '');
?>
                                <?php if ($_smarty_tpl->tpl_vars['day']->value != null) {?>
                                    <?php $_smarty_tpl->_assignInScope('suffix', "_".((string)$_smarty_tpl->tpl_vars['day']->value));
?>
                                <?php }?>
                                <div class="col-xs-6">
                                    <label for="reservableEdit<?php echo $_smarty_tpl->tpl_vars['suffix']->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ReservableTimeSlots'),$_smarty_tpl);?>
</label>
                                    <textarea class="reservableEdit form-control" id="reservableEdit<?php echo $_smarty_tpl->tpl_vars['suffix']->value;?>
"
                                              name="<?php echo FormKeys::SLOTS_RESERVABLE;
echo $_smarty_tpl->tpl_vars['suffix']->value;?>
"></textarea>
                                </div>
                                <div class="col-xs-6">
                                    <label for="blockedEdit<?php echo $_smarty_tpl->tpl_vars['suffix']->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'BlockedTimeSlots'),$_smarty_tpl);?>
</label> <a
                                            href="#" class="autofillBlocked" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Autofill'),$_smarty_tpl);?>
"><i
                                                class="fa fa-magic"></i></a>
                                    <textarea class="blockedEdit form-control" id="blockedEdit<?php echo $_smarty_tpl->tpl_vars['suffix']->value;?>
"
                                              name="<?php echo FormKeys::SLOTS_BLOCKED;
echo $_smarty_tpl->tpl_vars['suffix']->value;?>
"></textarea>
                                </div>
                            </div>
                        <?php
}}
/*/ smarty_template_function_display_slot_inputs_4203742855fa690e1335311_49350826 */
}
