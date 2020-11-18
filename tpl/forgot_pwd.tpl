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
<title>Forgot Password</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="shortcut icon" href="{$Path}favicon.ico"/>
<link rel="icon" href="{$Path}favicon.ico"/>
{cssfile src='scripts/newcss/style.css' rel="stylesheet"}
{cssfile src='scripts/newcss/login.css' rel="stylesheet"}

{if $Enabled}

<body class="login-background" style="background-image: url(img/background/1.png);">
	<div class="mx-4 my-4">
		<div class="container" id="forgotbox">
			<form method="post" action="{$smarty.server.SCRIPT_NAME}">
				<div class="login-box shadow bg-white rounded">
					<img src="img/logo.png" height="50" alt="VISTEC">
					<p class="mt-4" style="font-size: 20px; margin-bottom: 0;">Forgot Password</p>
					<p>You will be emailed a new randomly generated password</p>
					<input type="text" name="EMAIL" placeholder="Your registered email address" id="email" size="20" tabindex="10" required>
					<br>
					<a href="#" onclick="onCancelClicked()">Back to Sign in</a>
					<button type="submit" name="{Actions::RESET}" value="{Actions::RESET}">Send</button>
				</div>
			</form>
		</div>
		{if $ShowResetEmailSent}
		<br />
		<div class="alert alert-success">
			{translate key=ForgotPasswordEmailSent}<br/>
			<a href="{$Path}{Pages::LOGIN}">{translate key="LogIn"}</a>
		</div>
		{/if}

		{setfocus key='EMAIL'}
		{else}
		<div class="error">Disabled</div>
		{/if}
	</div>
	<script type="text/javascript">
	function onCancelClicked(){
		var url = '{$Path}{Pages::LOGIN}';
		window.location.href = url;
	}
	</script>
</body>
