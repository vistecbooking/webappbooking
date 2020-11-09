<?php
/* Smarty version 3.1.30, created on 2020-11-10 03:20:39
  from "/var/www/html/booking/tpl/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa9a497ac6715_87880214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fee536aa91c664054f093c79cdef9979d5cfdd1e' => 
    array (
      0 => '/var/www/html/booking/tpl/login.tpl',
      1 => 1604761644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:javascript-includes.tpl' => 1,
  ),
),false)) {
function content_5fa9a497ac6715_87880214 (Smarty_Internal_Template $_smarty_tpl) {
?>


<title>Login</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
favicon.ico"/>
<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
favicon.ico"/>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cssfile'][0][0]->IncludeCssFile(array('src'=>'scripts/newcss/style.css','rel'=>"stylesheet"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cssfile'][0][0]->IncludeCssFile(array('src'=>'scripts/newcss/login.css','rel'=>"stylesheet"),$_smarty_tpl);?>


<body class="login-background" style="background-image: url(img/background/1.png);">
	<div class="mx-4 my-4">
		<div class="container">
			<?php if ($_smarty_tpl->tpl_vars['ShowLoginError']->value) {?>
				<div id="loginError" class="alert alert-danger">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'LoginError'),$_smarty_tpl);?>

				</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['EnableCaptcha']->value) {?>
				<?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['validation_group'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['validation_group'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'ValidationGroup'))) {
throw new SmartyException('block tag \'validation_group\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('validation_group', array('class'=>"alert alert-danger"));
$_block_repeat1=true;
echo $_block_plugin1->ValidationGroup(array('class'=>"alert alert-danger"), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
?>

				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['validator'][0][0]->Validator(array('id'=>"captcha",'key'=>"CaptchaMustMatch"),$_smarty_tpl);?>

				<?php $_block_repeat1=false;
echo $_block_plugin1->ValidationGroup(array('class'=>"alert alert-danger"), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

			<?php }?>

			<form role="form" name="login" id="login" method="post"
				action="<?php echo $_SERVER['SCRIPT_NAME'];?>
">
				<div id="login-box" class="login-box shadow bg-white rounded">
					<img src="img/logo.png" height="50" alt="VISTEC">
					<p class="mt-4">Welcome Back</p>
					<input type="text" placeholder="Username" id="email" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'EMAIL'),$_smarty_tpl);?>
 required>
					<br>
					<div class="input-with-icon">
						<input type="password" placeholder="Password" id="password"
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PASSWORD'),$_smarty_tpl);?>
 required>
						<span class="input-icon" style="top:.2rem;user-select:none;cursor:pointer"
							onclick="togglePasswordVisibility()"><i
								class="material-icons" id="login-pwd-icon">visibility_off</i></span>
					</div>
					<a href="<?php echo $_smarty_tpl->tpl_vars['ForgotPasswordUrl']->value;?>
">forget password?</a>
					<button type="submit" name="<?php echo Actions::LOGIN;?>
" <?php echo $_smarty_tpl->tpl_vars['ForgotPasswordUrlNew']->value;?>
 value="submit">Sign in</button>
				</div>
			</form>
		</div>
	</div>
	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
    function togglePasswordVisibility() {
      if ($("#password").attr("type") === "password") {
        $("#password").attr("type", "text");
        $("#login-pwd-icon").text("visibility")
      } else {
        $("#password").attr("type", "password");
        $("#login-pwd-icon").text("visibility_off")
      }
    }
  	<?php echo '</script'; ?>
>
</body>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['setfocus'][0][0]->SetFocus(array('key'=>'EMAIL'),$_smarty_tpl);?>


<?php $_smarty_tpl->_subTemplateRender("file:javascript-includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 type="text/javascript">
	var url = 'index.php?<?php echo QueryStringKeys::LANGUAGE;?>
=';
	$(document).ready(function () {
		$('#languageDropDown').change(function () {
			window.location.href = url + $(this).val();
		});

		var langCode = readCookie('<?php echo CookieKeys::LANGUAGE;?>
');

		if (!langCode)
		{
		}
	});
<?php echo '</script'; ?>
><?php }
}
