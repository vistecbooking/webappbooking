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
{include file='globalheader.tpl'}

{if $Enabled}

<div id="forgotbox">
	<form class="forgot" method="post" action="{$smarty.server.SCRIPT_NAME}">
		<div class="forgot_pwdHeader">
			<h1>{translate key='ForgotPassword'}</h1>
		</div>
		<div>
			<p class="forgot">{translate key='YouWillBeEmailedANewPassword'}</p>
			<br />
			<p>
				<label class="forgot">{translate key='RegisteredEmailAddress'}<br />
					{textbox name="EMAIL" class="input" size="20" tabindex="10"}</label>
			</p>
			<p class="resetpassword">
				<button type="submit" class="btn btn-default" name="{Actions::RESET}" value="{Actions::RESET}">{translate key='Send'}</button>
				<button type="button" class="btn btn-default" onclick="onCancelClicked()">{translate key='Cancel'}</button>
			</p>
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

<script type="text/javascript">
	function onCancelClicked(){
		var url = '{$Path}{Pages::LOGIN}';
		window.location.href = url;
	}
</script>

{include file='globalfooter.tpl'}
