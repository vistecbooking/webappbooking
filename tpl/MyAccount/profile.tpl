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
{include file='globalheader.tpl' Validator=true}

<div class="page-profile">

	<div class="hidden col-xs-12 col-sm-8 col-sm-offset-2 alert alert-success" role="alert" id="profileUpdatedMessage">
		<span class="glyphicon glyphicon-ok-sign"></span> {translate key=YourProfileWasUpdated}
	</div>


	<div id="profile-box" class="default-box col-xs-12 col-sm-8 col-sm-offset-2">


		<form method="post" ajaxAction="{ProfileActions::Update}" id="form-profile" action="{$smarty.server.SCRIPT_NAME}"
			  role="form"
			  data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
			  data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
			  data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
			  data-bv-feedbackicons-required="glyphicon glyphicon-asterisk"
			  data-bv-submitbuttons='button[type="submit"]'
			  data-bv-onerror="enableButton"
			  data-bv-onsuccess="enableButton"
			  data-bv-live="enabled">

			<h1>{translate key=EditProfile}</h1>

			<div class="validationSummary alert alert-danger no-show" id="validationErrors">
				<ul>
					{async_validator id="fname" key="FirstNameRequired"}
					{async_validator id="lname" key="LastNameRequired"}
					{async_validator id="username" key="UserNameRequired"}
					{async_validator id="emailformat" key="ValidEmailRequired"}
					{async_validator id="uniqueemail" key="UniqueEmailRequired"}
					{async_validator id="uniqueusername" key="UniqueUsernameRequired"}
					{async_validator id="additionalattributes" key=""}
				</ul>
			</div>

			{if $IsUser}
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<center>
							<img src="{profile_image image=$ProfileImg}" alt="Profile Image"
									class="img-circle" width="200px" height="200px" />
							<br/>
							<a class="update imageButton" id="changeImage" href="#">{translate key='Change'}</a>
							{if $ProfileImg != "noimg.png"}
								|
								<a class="update removeImageButton" id="removeImage" href="#">{translate key='Remove'}</a>
							{/if}
							{indicator id=removeImageIndicator}
						</center>
					</div>
				</div>
				<br />
			{/if}

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label class="reg" for="login">{translate key="Username"}</label>
						{if $AllowUsernameChange}
							{textbox name="USERNAME" value="Username" required="required"
							data-bv-notempty="true"
							data-bv-notempty-message="{translate key=UserNameRequired}"}
						{else}
							<span>{$Username}</span>
							<input type="hidden" {formname key=USERNAME} value="{$Username}"/>
						{/if}
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label class="reg" for="email">{translate key="Email"}</label>
						{if $AllowEmailAddressChange}
							{textbox type="email" name="EMAIL" class="input" value="Email" required="required"
							data-bv-notempty="true"
							data-bv-notempty-message="{translate key=ValidEmailRequired}"
							data-bv-emailaddress="true"
							data-bv-emailaddress-message="{translate key=ValidEmailRequired}" }
						{else}
							<span>{$Email}</span>
							<input type="hidden" {formname key=EMAIL} value="{$Email}"/>
						{/if}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label class="reg" for="fname">{translate key="FirstName"}</label>
						{if $AllowNameChange}
							{textbox name="FIRST_NAME" class="input" value="FirstName" required="required"
							data-bv-notempty="true"
							data-bv-notempty-message="{translate key=FirstNameRequired}"}
						{else}
							<span>{$FirstName}</span>
							<input type="hidden" {formname key=FIRST_NAME} value="{$FirstName}"/>
						{/if}
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label class="reg" for="lname">{translate key="LastName"}</label>
						{if $AllowNameChange}
							{textbox name="LAST_NAME" class="input" value="LastName" required="required" data-bv-notempty="true"
							data-bv-notempty-message="{translate key=LastNameRequired}"}
						{else}
							<span>{$LastName}</span>
							<input type="hidden" {formname key=LAST_NAME} value="{$LastName}"/>
						{/if}
					</div>
				</div>
			</div>

			{if $IsUser}
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<label class="reg" for="nickname">{translate key="NickName"}</label>
							{textbox type="text" name="NICKNAME" class="input" value="NickName"}
						</div>
					</div>
				</div>
			{/if}

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label class="reg" for="phone">{translate key="Phone"}</label>
						{if $AllowPhoneChange}
							{textbox name="PHONE" class="input" value="Phone" size="20"}
						{else}
							<span>{$Phone}</span>
							<input type="hidden" {formname key=PHONE} value="{$Phone}"/>
						{/if}
					</div>
				</div>
				{if $IsUser}
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<label class="reg" for="line_ID">{translate key="LineID"}</label>
							{textbox name="LINE_ID" class="input" value="LineID"}
						</div>
					</div>
				{/if}
			</div>

			{if $IsUser}
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<label class="reg" for="advisor_name">{translate key="AdvisorName"}</label>
							{textbox name="ADVISOR_NAME" class="input" value="AdvisorName"}
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<label class="reg" for="student_ID">{translate key="StudentID"}</label>
							{textbox name="STUDENT_ID" class="input" value="StudentID"}
						</div>
					</div>
				</div>
			{/if}

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label class="reg" for="organization">{translate key="Organization"}</label>
						{if $AllowOrganizationChange}
							{textbox name="ORGANIZATION" class="input" value="Organization" size="20"}
						{else}
							<span>{$Organization}</span>
							<input type="hidden" {formname key=ORGANIZATION} value="{$Organization}"/>
						{/if}
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label class="reg" for="position">{translate key="Position"}</label>
						{if $AllowPositionChange}
							<select id="position" {formname key='POSITION_ID'} class="form-control">
								<option value="0">{translate key=None}</option>
								{object_html_options options=$Positions label=Name key=Id selected=$PositionId}
							</select>
						{else}
							<span>{$PositionName}</span>
							<input type="hidden" {formname key=POSITION_ID} value="{$PositionId}"/>
						{/if}
					</div>
				</div>
			</div>

			{if $Attributes|count > 0}
				{for $i=1 to $Attributes|count}
					{if $i%2!=0}
						<div class="row">
					{/if}
					<div class="col-xs-12 col-sm-6">
						{control type="AttributeControl" attribute=$Attributes[$i-1]}
					</div>
					{if $i%2==0 || $i==$Attributes|count}
						</div>
					{/if}
				{/for}
			{/if}

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label class="reg" for="homepage">{translate key="DefaultPage"}</label>
						<select {formname key='DEFAULT_HOMEPAGE'} id="homepage" class="form-control">
							{html_options values=$HomepageValues output=$HomepageOutput selected=$Homepage}
						</select>
					</div>
				</div>
			</div>

			<div>
				<button type="button" class="update btn btn-primary col-xs-12" name="{Actions::SAVE}" id="btnUpdate">
					{translate key='Update'}
				</button>
			</div>
		</form>
	</div>

	<div id="imageDialog" class="modal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
		aria-hidden="true">
		<form id="imageForm" method="post" enctype="multipart/form-data" ajaxAction="{ProfileActions::ActionChangeImage}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="imageModalLabel">{translate key=AddImage}</h4>
					</div>
					<div class="modal-body">
						<label for="profileImage" class="off-screen">Image file</label>
						<input id="profileImage" type="file" class="text" size="60" {formname key=PROFILE_IMG}
							accept="image/*;capture=camera"/>

						<div class="note">.gif, .jpg, or .png</div>
					</div>

					<div class="modal-footer">
						{cancel_button}
						{update_button}
						{indicator}
					</div>
				</div>
			</div>
		</form>
	</div>

	{csrf_token}

	{setfocus key='FIRST_NAME'}

	{jsfile src="ajax-helpers.js"}
	{jsfile src="profile.js"}

	<script type="text/javascript">

		function enableButton() {
			$('#form-profile').find('button').removeAttr('disabled');
		}

		$(document).ready(function () {
			var actions = {
				removeImage: '{ProfileActions::ActionRemoveImage}'
			};
			var opts = {
				submitUrl: '{$smarty.server.SCRIPT_NAME}',
				actions: actions
			};

			var profilePage = new Profile(opts);
			profilePage.init();

			var profileForm = $('#form-profile');

			profileForm
					.on('init.field.bv', function (e, data) {
						var $parent = data.element.parents('.form-group');
						var $icon = $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]');
						var validators = data.bv.getOptions(data.field).validators;

						if (validators.notEmpty)
						{
							$icon.addClass('glyphicon glyphicon-asterisk').show();
						}
					})
					.off('success.form.bv')
					.on('success.form.bv', function (e) {
						e.preventDefault();
					});

			profileForm.bootstrapValidator();
		});
	</script>

	<div id="wait-box" class="wait-box">
		<h3>{translate key=Working}</h3>
		{html_image src="reservation_submitting.gif"}
	</div>

</div>
{include file='globalfooter.tpl'}