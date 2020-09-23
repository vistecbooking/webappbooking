<?php
/* Smarty version 3.1.30, created on 2019-12-06 21:03:56
  from "/var/www/html/booking/lang/en_us/ResetPassword.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5dea5fcc2ac736_38001862',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a0522b9faac56cddade6ee28c3e351b8cdd85cd' => 
    array (
      0 => '/var/www/html/booking/lang/en_us/ResetPassword.tpl',
      1 => 1551196457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dea5fcc2ac736_38001862 (Smarty_Internal_Template $_smarty_tpl) {
?>

Here is your temporary Booked Scheduler password: <?php echo $_smarty_tpl->tpl_vars['TemporaryPassword']->value;?>


<br/>

Your old password will no longer work.
<br/>
<br/>

Please <a href="<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
">Log in to Booked Scheduler</a> and change your password as soon as possible.<?php }
}
