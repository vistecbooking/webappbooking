<?php
/* Smarty version 3.1.30, created on 2020-11-18 11:25:25
  from "/var/www/html/booking/tpl/forgot_pwd.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fb4a235b71886_88731991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76d495f794c1c308226b2e39dd4844bc1a9dffd1' => 
    array (
      0 => '/var/www/html/booking/tpl/forgot_pwd.tpl',
      1 => 1605673510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb4a235b71886_88731991 (Smarty_Internal_Template $_smarty_tpl) {
?>

<title>Forgot Password</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
favicon.ico"/>
<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
favicon.ico"/>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cssfile'][0][0]->IncludeCssFile(array('src'=>'scripts/newcss/style.css','rel'=>"stylesheet"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cssfile'][0][0]->IncludeCssFile(array('src'=>'scripts/newcss/login.css','rel'=>"stylesheet"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['Enabled']->value) {?>

<body class="login-background" style="background-image: url(img/background/1.png);">
	<div class="mx-4 my-4">
		<div class="container" id="forgotbox">
			<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>
">
				<div class="login-box shadow bg-white rounded">
					<img src="img/logo.png" height="50" alt="VISTEC">
					<p class="mt-4" style="font-size: 20px; margin-bottom: 0;">Forgot Password</p>
					<p>You will be emailed a new randomly generated password</p>
					<input type="text" name="EMAIL" placeholder="Your registered email address" id="email" size="20" tabindex="10" required>
					<br>
					<a href="#" onclick="onCancelClicked()">Back to Sign in</a>
					<button type="submit" name="<?php echo Actions::RESET;?>
" value="<?php echo Actions::RESET;?>
">Send</button>
				</div>
			</form>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['ShowResetEmailSent']->value) {?>
		<br />
		<div class="alert alert-success">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ForgotPasswordEmailSent'),$_smarty_tpl);?>
<br/>
			<a href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;
echo Pages::LOGIN;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"LogIn"),$_smarty_tpl);?>
</a>
		</div>
		<?php }?>

		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['setfocus'][0][0]->SetFocus(array('key'=>'EMAIL'),$_smarty_tpl);?>

		<?php } else { ?>
		<div class="error">Disabled</div>
		<?php }?>
	</div>
	<?php echo '<script'; ?>
 type="text/javascript">
	function onCancelClicked(){
		var url = '<?php echo $_smarty_tpl->tpl_vars['Path']->value;
echo Pages::LOGIN;?>
';
		window.location.href = url;
	}
	<?php echo '</script'; ?>
>
</body>
<?php }
}
