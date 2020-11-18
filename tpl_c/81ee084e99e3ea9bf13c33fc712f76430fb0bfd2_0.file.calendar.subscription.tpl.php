<?php
/* Smarty version 3.1.30, created on 2020-11-18 11:28:43
  from "/var/www/html/booking/tpl/Calendar/calendar.subscription.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fb4a2fb7a2c12_18778126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81ee084e99e3ea9bf13c33fc712f76430fb0bfd2' => 
    array (
      0 => '/var/www/html/booking/tpl/Calendar/calendar.subscription.tpl',
      1 => 1604742064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb4a2fb7a2c12_18778126 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="calendarSubscription" class="calendar-subscription">
    <?php if ($_smarty_tpl->tpl_vars['IsSubscriptionAllowed']->value && $_smarty_tpl->tpl_vars['IsSubscriptionEnabled']->value) {?>
        <a id="subscribeToCalendar"
           href="<?php echo $_smarty_tpl->tpl_vars['SubscriptionUrl']->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"calendar-share.png"),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'SubscribeToCalendar'),$_smarty_tpl);?>
</a>
        <br/>
        URL:
        <span class="note"><?php echo $_smarty_tpl->tpl_vars['SubscriptionUrl']->value;?>
</span>
    <?php }?>
</div>

<?php }
}
