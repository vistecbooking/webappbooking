{*
Copyright 2011-2017 Nick Korbel

This file is part of Booked Scheduler.

Booked Scheduler is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Booked Scheduler is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
*}

<title>Login</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="shortcut icon" href="{$Path}favicon.ico"/>
<link rel="icon" href="{$Path}favicon.ico"/>
{cssfile src='scripts/newcss/style.css' rel="stylesheet"}
{cssfile src='scripts/newcss/login.css' rel="stylesheet"}

<body class="login-background" style="background-image: url(img/background/1.png);">
	<div class="mx-4 my-4">
		<div class="container">
			{if $ShowLoginError}
				<div id="loginError" class="alert alert-danger">
					{translate key='LoginError'}
				</div>
			{/if}

			{if $EnableCaptcha}
				{validation_group class="alert alert-danger"}
				{validator id="captcha" key="CaptchaMustMatch"}
				{/validation_group}
			{/if}

			<form role="form" name="login" id="login" method="post"
				action="{$smarty.server.SCRIPT_NAME}">
				<div id="login-box" class="login-box shadow bg-white rounded">
					<img src="img/logo.png" height="50" alt="VISTEC">
					<p class="mt-4">Welcome Back</p>
					<input type="text" placeholder="Username" id="email" {formname key=EMAIL} required>
					<br>
					<div class="input-with-icon">
						<input type="password" placeholder="Password" id="password" 
						{formname key=PASSWORD} required>
						<span class="input-icon" style="top:.2rem;user-select:none;cursor:pointer"
							onclick="togglePasswordVisibility()"><i
								class="material-icons" id="login-pwd-icon">visibility_off</i></span>
					</div>
					<a href="{$ForgotPasswordUrl}">forget password?</a>
					<button type="submit" name="{Actions::LOGIN}" {$ForgotPasswordUrlNew} value="submit">Sign in</button>
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
	<script>
    function togglePasswordVisibility() {
      if ($("#password").attr("type") === "password") {
        $("#password").attr("type", "text");
        $("#login-pwd-icon").text("visibility")
      } else {
        $("#password").attr("type", "password");
        $("#login-pwd-icon").text("visibility_off")
      }
    }
  	</script>
</body>

{setfocus key='EMAIL'}

{include file="javascript-includes.tpl"}

<script type="text/javascript">
	var url = 'index.php?{QueryStringKeys::LANGUAGE}=';
	$(document).ready(function () {
		$('#languageDropDown').change(function () {
			window.location.href = url + $(this).val();
		});

		var langCode = readCookie('{CookieKeys::LANGUAGE}');

		if (!langCode)
		{
		}
	});
</script>