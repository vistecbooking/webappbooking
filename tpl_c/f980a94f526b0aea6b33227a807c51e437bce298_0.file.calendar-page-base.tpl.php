<?php
/* Smarty version 3.1.30, created on 2020-11-10 13:57:29
  from "/var/www/html/booking/tpl/Dashboard/calendar-page-base.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5faa39d99839c8_84037520',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f980a94f526b0aea6b33227a807c51e437bce298' => 
    array (
      0 => '/var/www/html/booking/tpl/Dashboard/calendar-page-base.tpl',
      1 => 1604742064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5faa39d99839c8_84037520 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div id="page-<?php echo $_smarty_tpl->tpl_vars['pageIdSuffix']->value;?>
">
    <div id="subscriptionContainer">
        <?php $_smarty_tpl->_subTemplateRender("Calendar/".((string)$_smarty_tpl->tpl_vars['subscriptionTpl']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('IsSubscriptionAllowed'=>$_smarty_tpl->tpl_vars['IsSubscriptionAllowed']->value,'IsSubscriptionEnabled'=>$_smarty_tpl->tpl_vars['IsSubscriptionEnabled']->value,'SubscriptionUrl'=>$_smarty_tpl->tpl_vars['SubscriptionUrl']->value), 0, true);
?>

    </div>

    <div id="calendar"></div>

    <div id="dayDialog" class="default-box-shadow">
        <a href="#" id="dayDialogCreate"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"tick.png"),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CreateReservation'),$_smarty_tpl);?>
</a>
        <a href="#" id="dayDialogView"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"search.png"),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ViewDay'),$_smarty_tpl);?>
</a>
        <a href="#" id="dayDialogCancel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"slash.png"),$_smarty_tpl);
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Cancel'),$_smarty_tpl);?>
</a>
    </div>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"reservationPopup.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"calendar.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/tree.jquery.js"),$_smarty_tpl);?>


    <div class="modal fade" id="moveErrorDialog" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="errorModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ErrorMovingReservation'),$_smarty_tpl);?>
</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <ul id="moveErrorsList"></ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ok_button'][0][0]->OkButton(array('id'=>"moveErrorOk"),$_smarty_tpl);?>

                </div>
            </div>
        </div>
    </div>

    <form id="moveReservationForm">
        <input id="moveReferenceNumber" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REFERENCE_NUMBER'),$_smarty_tpl);?>
 />
        <input id="moveStartDate" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'BEGIN_DATE'),$_smarty_tpl);?>
 />
        <input id="moveResourceId" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_ID'),$_smarty_tpl);?>
 value="0" />
        <input id="moveSourceResourceId" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'ORIGINAL_RESOURCE_ID'),$_smarty_tpl);?>
 value="0" />
    </form>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {

            var options = {
                view: '<?php echo strtr($_smarty_tpl->tpl_vars['CalendarType']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                defaultDate: moment('<?php echo $_smarty_tpl->tpl_vars['DisplayDate']->value->Format('Y-m-d');?>
', 'YYYY-MM-DD'),
                todayText: '<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Today'),$_smarty_tpl);
$_prefixVariable3=ob_get_clean();
echo strtr($_prefixVariable3, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                dayText: '<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Day'),$_smarty_tpl);
$_prefixVariable4=ob_get_clean();
echo strtr($_prefixVariable4, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                monthText: '<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Month'),$_smarty_tpl);
$_prefixVariable5=ob_get_clean();
echo strtr($_prefixVariable5, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                weekText: '<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Week'),$_smarty_tpl);
$_prefixVariable6=ob_get_clean();
echo strtr($_prefixVariable6, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                dayClickUrl: '<?php echo $_smarty_tpl->tpl_vars['pageUrl']->value;?>
?ct=<?php echo CalendarTypes::Day;?>
&sid=<?php echo strtr($_smarty_tpl->tpl_vars['ScheduleId']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
&rid=<?php echo strtr($_smarty_tpl->tpl_vars['ResourceId']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
&gid=<?php echo strtr($_smarty_tpl->tpl_vars['GroupId']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                dayClickUrlTemplate: '<?php echo $_smarty_tpl->tpl_vars['pageUrl']->value;?>
?ct=<?php echo CalendarTypes::Day;?>
&sid=[sid]&rid=[rid]&gid=[gid]',
                dayNames: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['js_array'][0][0]->CreateJavascriptArray(array('array'=>$_smarty_tpl->tpl_vars['DayNames']->value),$_smarty_tpl);?>
,
                dayNamesShort: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['js_array'][0][0]->CreateJavascriptArray(array('array'=>$_smarty_tpl->tpl_vars['DayNamesShort']->value),$_smarty_tpl);?>
,
                monthNames: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['js_array'][0][0]->CreateJavascriptArray(array('array'=>$_smarty_tpl->tpl_vars['MonthNames']->value),$_smarty_tpl);?>
,
                monthNamesShort: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['js_array'][0][0]->CreateJavascriptArray(array('array'=>$_smarty_tpl->tpl_vars['MonthNamesShort']->value),$_smarty_tpl);?>
,
                timeFormat: '<?php echo $_smarty_tpl->tpl_vars['TimeFormat']->value;?>
',
                dayMonth: '<?php echo $_smarty_tpl->tpl_vars['DateFormat']->value;?>
',
                firstDay: 1,
                reservationUrl: '<?php echo Pages::RESERVATION;?>
?sid=<?php echo strtr($_smarty_tpl->tpl_vars['ScheduleId']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
&rid=<?php echo strtr($_smarty_tpl->tpl_vars['ResourceId']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                reservationUrlTemplate: '<?php echo Pages::RESERVATION;?>
?sid=[sid]&rid=[rid]',
                reservable: true,
                eventsUrl: '<?php echo $_smarty_tpl->tpl_vars['pageUrl']->value;?>
',
                eventsData: {
                    dr: 'events',
                    sid: '<?php echo strtr($_smarty_tpl->tpl_vars['ScheduleId']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                    rid: '<?php echo strtr($_smarty_tpl->tpl_vars['ResourceId']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
',
                    gid: '<?php echo strtr($_smarty_tpl->tpl_vars['GroupId']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'
                },
                getSubscriptionUrl: '<?php echo $_smarty_tpl->tpl_vars['pageUrl']->value;?>
?dr=subscription',
                subscriptionEnableUrl: '<?php echo $_smarty_tpl->tpl_vars['pageUrl']->value;?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo CalendarActions::ActionEnableSubscription;?>
',
                subscriptionDisableUrl: '<?php echo $_smarty_tpl->tpl_vars['pageUrl']->value;?>
?<?php echo QueryStringKeys::ACTION;?>
=<?php echo CalendarActions::ActionDisableSubscription;?>
',
                moveReservationUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
ajax/reservation_move.php"
            };

            var calendar = new Calendar(options);
            calendar.init();

            calendar.bindResourceGroups(<?php echo $_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['SelectedGroupNode']->value)===null||$tmp==='' ? 0 : $tmp);?>
);

        });
    <?php echo '</script'; ?>
>
</div>
<?php }
}
