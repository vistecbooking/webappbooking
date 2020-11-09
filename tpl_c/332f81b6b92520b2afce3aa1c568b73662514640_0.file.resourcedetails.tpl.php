<?php
/* Smarty version 3.1.30, created on 2020-11-08 22:23:41
  from "/var/www/html/booking/tpl/Ajax/resourcedetails.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa80d7d5f6ab1_50460889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '332f81b6b92520b2afce3aa1c568b73662514640' => 
    array (
      0 => '/var/www/html/booking/tpl/Ajax/resourcedetails.tpl',
      1 => 1600849228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa80d7d5f6ab1_50460889 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="resourceDetailsPopup">
    <h4<?php if (!empty($_smarty_tpl->tpl_vars['color']->value)) {?> style="background-color:<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
;color:<?php echo $_smarty_tpl->tpl_vars['textColor']->value;?>
;padding:5px 3px;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['resourceName']->value;?>
</h4>
    <a href="#" class="visible-sm hideResourceDetailsPopup"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Close'),$_smarty_tpl);?>
</a>
    
    <?php if ($_smarty_tpl->tpl_vars['isFullDetail']->value == 'full') {?>
        <?php if ($_smarty_tpl->tpl_vars['imageUrl']->value != '') {?>
            <div class="resourceImage">
                <img src="<?php echo $_smarty_tpl->tpl_vars['imageUrl']->value;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['resourceName']->value, ENT_QUOTES, 'UTF-8', true);?>
"/>
            </div>
        <?php }?>
        <div class="description">
            <span class="bold"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Description'),$_smarty_tpl);?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['description']->value != '') {?>
                <?php echo nl2br($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['url2link'][0][0]->CreateUrl(html_entity_decode($_smarty_tpl->tpl_vars['description']->value)));?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoDescriptionLabel'),$_smarty_tpl);?>

            <?php }?>
            <br/>
            <span class="bold"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Contact'),$_smarty_tpl);?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['contactInformation']->value != '') {?>
                <div style="white-space: pre-wrap"><?php echo $_smarty_tpl->tpl_vars['contactInformation']->value;?>
</div>
            <?php } else { ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoContactLabel'),$_smarty_tpl);?>

            <?php }?>
            <span class="bold"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Location'),$_smarty_tpl);?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['locationInformation']->value != '') {?>
                <?php echo $_smarty_tpl->tpl_vars['locationInformation']->value;?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoLocationLabel'),$_smarty_tpl);?>

            <?php }?>
            <br/>
            <span class="bold"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Room'),$_smarty_tpl);?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['notes']->value != '') {?>
                <?php echo $_smarty_tpl->tpl_vars['notes']->value;?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoRoomLabel'),$_smarty_tpl);?>

            <?php }?>
            <br/>
            <span class="bold"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceType'),$_smarty_tpl);?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['resourceType']->value != '') {?>
                <?php echo $_smarty_tpl->tpl_vars['resourceType']->value;?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoResourceTypeLabel'),$_smarty_tpl);?>

            <?php }?>
            <?php if (count($_smarty_tpl->tpl_vars['Attributes']->value) > 0) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attributes']->value, 'attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
?>
                    <div>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['attribute']->value,'readonly'=>true),$_smarty_tpl);?>

                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php }?>
            <?php if (count($_smarty_tpl->tpl_vars['ResourceTypeAttributes']->value) > 0) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ResourceTypeAttributes']->value, 'attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
?>
                    <div>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['attribute']->value,'readonly'=>true),$_smarty_tpl);?>

                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php }?>
        </div>
        <div class="attributes">
            <div>
                <?php if ($_smarty_tpl->tpl_vars['minimumDuration']->value != '') {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMinLength','args'=>$_smarty_tpl->tpl_vars['minimumDuration']->value),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMinLengthNone'),$_smarty_tpl);?>

                <?php }?>
            </div>
            <div>
                <?php if ($_smarty_tpl->tpl_vars['maximumDuration']->value != '') {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMaxLength','args'=>$_smarty_tpl->tpl_vars['maximumDuration']->value),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMaxLengthNone'),$_smarty_tpl);?>

                <?php }?>
            </div>
            <div>
                <?php if ($_smarty_tpl->tpl_vars['requiresApproval']->value) {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceRequiresApproval'),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceRequiresApprovalNone'),$_smarty_tpl);?>

                <?php }?>
            </div>
            <div>
                <?php if ($_smarty_tpl->tpl_vars['minimumNotice']->value != '') {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMinNotice','args'=>$_smarty_tpl->tpl_vars['minimumNotice']->value),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMinNoticeNone'),$_smarty_tpl);?>

                <?php }?>
            </div>
            <div>
                <?php if ($_smarty_tpl->tpl_vars['maximumNotice']->value != '') {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMaxNotice','args'=>$_smarty_tpl->tpl_vars['maximumNotice']->value),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceMaxNoticeNone'),$_smarty_tpl);?>

                <?php }?>
            </div>
            <div>
                <?php if ($_smarty_tpl->tpl_vars['allowMultiday']->value) {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceAllowMultiDay'),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceNotAllowMultiDay'),$_smarty_tpl);?>

                <?php }?>
            </div>
            <div>
                <?php if ($_smarty_tpl->tpl_vars['maxParticipants']->value != '') {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceCapacity','args'=>$_smarty_tpl->tpl_vars['maxParticipants']->value),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceCapacityNone'),$_smarty_tpl);?>

                <?php }?>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['autoReleaseMinutes']->value != '') {?>
                <div>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AutoReleaseNotification','args'=>$_smarty_tpl->tpl_vars['autoReleaseMinutes']->value),$_smarty_tpl);?>

                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['isCheckInEnabled']->value != '') {?>
                <div>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RequiresCheckInNotification'),$_smarty_tpl);?>

                </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['creditsEnabled']->value) {?>
                <div>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'CreditUsagePerSlot','args'=>$_smarty_tpl->tpl_vars['offPeakCredits']->value),$_smarty_tpl);?>

                </div>
                <div>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'PeakCreditUsagePerSlot','args'=>$_smarty_tpl->tpl_vars['peakCredits']->value),$_smarty_tpl);?>

                </div>
            <?php }?>
        </div>
    <?php } else { ?>
        <div class="description">
            <span class="bold"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Contact'),$_smarty_tpl);?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['contactInformation']->value != '') {?>
                <div style="white-space: pre-wrap"><?php echo $_smarty_tpl->tpl_vars['contactInformation']->value;?>
</div>
            <?php } else { ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoContactLabel'),$_smarty_tpl);?>

            <?php }?>
            <br/>
            <span class="bold">Instrument Information</span>
            <br/>
            <span class="bold">Location: </span>
            <?php if ($_smarty_tpl->tpl_vars['locationInformation']->value != '') {?>
                <?php echo $_smarty_tpl->tpl_vars['locationInformation']->value;?>
 building <?php if ($_smarty_tpl->tpl_vars['notes']->value != '') {?> (<?php echo $_smarty_tpl->tpl_vars['notes']->value;?>
) <?php }?>
            <?php } else { ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoLocationLabel'),$_smarty_tpl);?>

            <?php }?>
            <br/>
            <?php if (count($_smarty_tpl->tpl_vars['Attributes']->value) > 0) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attributes']->value, 'attribute');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
?>
                    <div>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['attribute']->value,'readonly'=>true),$_smarty_tpl);?>

                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php }?>
        </div>
    <?php }?>
    <div style="clearfix">&nbsp;</div>
</div><?php }
}
