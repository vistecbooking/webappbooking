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
{cssfile src='scripts/newcss/my-account.css'}

<div class="page-profile">

	  <div class="container">
    <div class="box box-lg mb-4">
      <h2>My Profile</h2>
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
		<div class="row">
			<div class="col-sm">
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
			<div class="form-row">
				<div class="col-sm form-group">
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
				<div class="col-sm form-group">
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
			<div class="col-sm">
			<div class="form-group">
				<label class="reg" for="organization">{translate key="Organization"}</label>
						{if $AllowOrganizationChange}
							{textbox name="ORGANIZATION" class="input" value="Organization" size="20"}
						{else}
							<span>{$Organization}</span>
							<input type="hidden" {formname key=ORGANIZATION} value="{$Organization}"/>
						{/if}
			</div>
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
			<div class="form-group">
				<label class="reg" for="homepage">{translate key="DefaultPage"}</label>
						<select {formname key='DEFAULT_HOMEPAGE'} id="homepage" class="form-control">
							{html_options values=$HomepageValues output=$HomepageOutput selected=$Homepage}
						</select>
			</div>
			<br />
			<div class="text-right">
				<button type="button" class="btn btn-success" name="{Actions::SAVE}" id="btnUpdate" >
				Save Information
				</button>
			</div>
			</div>
		</div>
	  </form>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="box box-lg mb-4">
          <h2>Notification Preference</h2>
          <div class="form-group">
            <label>When I create a reservation or a reservation is created on my
              behalf</label>
            <div
              class="btn-group btn-group-toggle d-flex"
              data-toggle="buttons">
              <label class="btn btn-outline-success active">
                <input
                  type="radio"
                  name="options"
                  autocomplete="off"
                  checked />
                Send me an email
              </label>
              <label class="btn btn-outline-secondary">
                <input type="radio" name="options" autocomplete="off" /> Do
                not notify me
              </label>
            </div>
          </div>
          <div class="form-group">
            <label>When I create a reservation or a reservation is created on my
              behalf</label>
            <div
              class="btn-group btn-group-toggle d-flex"
              data-toggle="buttons">
              <label class="btn btn-outline-success active">
                <input
                  type="radio"
                  name="options"
                  autocomplete="off"
                  checked />
                Send me an email
              </label>
              <label class="btn btn-outline-secondary">
                <input type="radio" name="options" autocomplete="off" /> Do
                not notify me
              </label>
            </div>
          </div>
          <div class="form-group">
            <label>When I delete a reservation or a reservation is deleted on my
              behalf</label>
            <div
              class="btn-group btn-group-toggle d-flex"
              data-toggle="buttons">
              <label class="btn btn-outline-success active">
                <input
                  type="radio"
                  name="options"
                  autocomplete="off"
                  checked />
                Send me an email
              </label>
              <label class="btn btn-outline-secondary">
                <input type="radio" name="options" autocomplete="off" /> Do
                not notify me
              </label>
            </div>
          </div>
          <div class="form-group">
            <label>When my pending reservation is approved</label>
            <div
              class="btn-group btn-group-toggle d-flex"
              data-toggle="buttons">
              <label class="btn btn-outline-success active">
                <input
                  type="radio"
                  name="options"
                  autocomplete="off"
                  checked />
                Send me an email
              </label>
              <label class="btn btn-outline-secondary">
                <input type="radio" name="options" autocomplete="off" /> Do
                not notify me
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 change-pwd-box">
        <div class="box box-lg mb-4">
          <h2>Change Password</h2>
          <div class="form-row">
            <div class="col-sm form-group">
              <label for="old-pwd">Your old password</label>
              <div class="input-with-icon">
                <input
                  type="password"
                  class="form-control"
                  id="old-pwd"
                  placeholder="********" />
                <span
                  class="input-icon"
                  onclick="togglePasswordVisibility_old()"><i class="material-icons"
                    id="old-pwd-icon">visibility_off</i></span>
              </div>
            </div>
            <div class="col-sm form-group"></div>
          </div>
          <div class="form-row">
            <div class="col-sm form-group">
              <label for="new-pwd">New password</label>
              <div class="input-with-icon">
                <input
                  type="password"
                  class="form-control"
                  id="new-pwd"
                  placeholder="Enter your new password"
                  oninput="validation(document.getElementById('new-pwd'))" />
                <span
                  class="input-icon"
                  onclick="togglePasswordVisibility_new()"><i class="material-icons"
                    id="new-pwd-icon">visibility_off</i></span>
              </div>
            </div>
            <div class="col-sm form-group">
              <label for="pwd-check"></label>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="check-char"
                  id="check-char"
                  value="check1"
                  disabled />
                <label class="form-check-label" for="check-pwd-char">
                  At least 6 characters
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="check-num"
                  id="check-num"
                  value="check2"
                  disabled />
                <label class="form-check-label" for="check-pwd-num">
                  Contain number and alphabet
                </label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-sm form-group">
              <input
                type="password"
                class="form-control"
                id="re-pwd"
                placeholder="Re-enter your new password" />
            </div>
            <div class="col-sm form-group"></div>
          </div>
          <div class="text-right">
            <button type="button" class="btn btn-success">
              Save new password
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="box box-lg mb-4">
      <h2>Background Picture</h2>
      <div class="row">
        <div class="col-md">
          <div class="bg-pic">
            <img
              src="img/vistec_login_box_ratio.png"
              id="bg-pic"
              alt="login-box-png"
              class="login-box-png" />
          </div>
        </div>
        <div class="col-md">
          <div class="bg-select">
            <h6>Choose your picture</h6>
            <img
              src="img/background/1.png"
              alt="1.png"
              id="1"
              onclick="selected(document.getElementById('1'))" />
            <img
              src="img/background/2.png"
              alt="2.png"
              id="2"
              onclick="selected(document.getElementById('2'))" />
            <img
              src="img/background/3.png"
              alt="3.png"
              id="3"
              onclick="selected(document.getElementById('3'))" />
            <img
              src="img/background/4.png"
              alt="4.png"
              id="4"
              onclick="selected(document.getElementById('4'))" />
            <img
              src="img/background/5.png"
              alt="5.png"
              id="5"
              onclick="selected(document.getElementById('5'))" />
            <div class="select-box">
              <span class="material-icons add"> add </span>
              <p>Add new pictures</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    // function to see old password
    function togglePasswordVisibility_old() {
      if ($("#old-pwd").attr("type") === "password") {
        $("#old-pwd").attr("type", "text");
        $("#old-pwd-icon").text("visibility");
      } else {
        $("#old-pwd").attr("type", "password");
        $("#old-pwd-icon").text("visibility_off");
      }
    }
    // function to see new password
    function togglePasswordVisibility_new() {
      if ($("#new-pwd").attr("type") === "password") {
        $("#new-pwd").attr("type", "text");
        $("#new-pwd-icon").text("visibility");
      } else {
        $("#new-pwd").attr("type", "password");
        $("#new-pwd-icon").text("visibility_off");
      }
    }
    // function to check password validation

    function validation(pwd) {
      if (pwd.value.match(char)) {
        $("#check-char").prop("disabled", false);
        $("#check-char").prop("checked", true);
      } else {
        $("#check-char").prop("disabled", true);
        $("#check-char").prop("checked", false);
      }
      if (pwd.value.match(num_alp)) {
        $("#check-num").prop("disabled", false);
        $("#check-num").prop("checked", true);
      } else {
        $("#check-num").prop("disabled", true);
        $("#check-num").prop("checked", false);
      }
    }
    // function to select background picture
    var select = document.getElementById("1");
    selected(select);
    function unselect(id) {
      $("#" + id).css("border", "none");
    }
    async function selected(img) {
      unselect(select.id);
      // console.log(select);
      select = img;
      $("#" + img.id).css("border", "4px solid #28A745");
      // console.log(select);
      $("#bg-pic").css(
        "background-image",
        "url(img/background/" + img.alt + ")"
      );
    }
  </script>

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