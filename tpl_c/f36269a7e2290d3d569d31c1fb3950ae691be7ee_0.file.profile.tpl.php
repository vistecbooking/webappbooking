<?php
/* Smarty version 3.1.30, created on 2020-11-16 06:30:22
  from "/var/www/html/booking/tpl/MyAccount/profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fb1ba0e9b76b7_39385261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f36269a7e2290d3d569d31c1fb3950ae691be7ee' => 
    array (
      0 => '/var/www/html/booking/tpl/MyAccount/profile.tpl',
      1 => 1604978903,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
  ),
),false)) {
function content_5fb1ba0e9b76b7_39385261 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/booking/lib/external/Smarty/plugins/function.html_options.php';
?>

<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Validator'=>true), 0, false);
?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cssfile'][0][0]->IncludeCssFile(array('src'=>'scripts/newcss/my-account.css'),$_smarty_tpl);?>


<div class="page-profile">

	  <div class="container">
    <div class="box box-lg mb-4">
      <h2>My Profile</h2>
	  <form method="post" ajaxAction="<?php echo ProfileActions::Update;?>
" id="form-profile" action="<?php echo $_SERVER['SCRIPT_NAME'];?>
"
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
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"fname",'key'=>"FirstNameRequired"),$_smarty_tpl);?>

				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"lname",'key'=>"LastNameRequired"),$_smarty_tpl);?>

				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"username",'key'=>"UserNameRequired"),$_smarty_tpl);?>

				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"emailformat",'key'=>"ValidEmailRequired"),$_smarty_tpl);?>

				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"uniqueemail",'key'=>"UniqueEmailRequired"),$_smarty_tpl);?>

				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"uniqueusername",'key'=>"UniqueUsernameRequired"),$_smarty_tpl);?>

				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"additionalattributes",'key'=>''),$_smarty_tpl);?>

			</ul>
		</div>
		<div class="row">
			<div class="col-sm">
			<div class="form-group">
				<label class="reg" for="login"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Username"),$_smarty_tpl);?>
</label>
						<?php if ($_smarty_tpl->tpl_vars['AllowUsernameChange']->value) {?>
							<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'UserNameRequired'),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('name'=>"USERNAME",'value'=>"Username",'required'=>"required",'data-bv-notempty'=>"true",'data-bv-notempty-message'=>$_prefixVariable1),$_smarty_tpl);?>

						<?php } else { ?>
							<span><?php echo $_smarty_tpl->tpl_vars['Username']->value;?>
</span>
							<input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'USERNAME'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['Username']->value;?>
"/>
						<?php }?>
			</div>
			<div class="form-group">
				<label class="reg" for="email"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Email"),$_smarty_tpl);?>
</label>
						<?php if ($_smarty_tpl->tpl_vars['AllowEmailAddressChange']->value) {?>
							<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ValidEmailRequired'),$_smarty_tpl);
$_prefixVariable2=ob_get_clean();
ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ValidEmailRequired'),$_smarty_tpl);
$_prefixVariable3=ob_get_clean();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('type'=>"email",'name'=>"EMAIL",'class'=>"input",'value'=>"Email",'required'=>"required",'data-bv-notempty'=>"true",'data-bv-notempty-message'=>$_prefixVariable2,'data-bv-emailaddress'=>"true",'data-bv-emailaddress-message'=>$_prefixVariable3),$_smarty_tpl);?>

						<?php } else { ?>
							<span><?php echo $_smarty_tpl->tpl_vars['Email']->value;?>
</span>
							<input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'EMAIL'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['Email']->value;?>
"/>
						<?php }?>
			</div>
			<div class="form-row">
				<div class="col-sm form-group">
					<label class="reg" for="fname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"FirstName"),$_smarty_tpl);?>
</label>
						<?php if ($_smarty_tpl->tpl_vars['AllowNameChange']->value) {?>
							<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'FirstNameRequired'),$_smarty_tpl);
$_prefixVariable4=ob_get_clean();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('name'=>"FIRST_NAME",'class'=>"input",'value'=>"FirstName",'required'=>"required",'data-bv-notempty'=>"true",'data-bv-notempty-message'=>$_prefixVariable4),$_smarty_tpl);?>

						<?php } else { ?>
							<span><?php echo $_smarty_tpl->tpl_vars['FirstName']->value;?>
</span>
							<input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'FIRST_NAME'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['FirstName']->value;?>
"/>
						<?php }?>	
				</div>
				<div class="col-sm form-group">
					<label class="reg" for="lname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"LastName"),$_smarty_tpl);?>
</label>
						<?php if ($_smarty_tpl->tpl_vars['AllowNameChange']->value) {?>
							<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'LastNameRequired'),$_smarty_tpl);
$_prefixVariable5=ob_get_clean();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('name'=>"LAST_NAME",'class'=>"input",'value'=>"LastName",'required'=>"required",'data-bv-notempty'=>"true",'data-bv-notempty-message'=>$_prefixVariable5),$_smarty_tpl);?>

						<?php } else { ?>
							<span><?php echo $_smarty_tpl->tpl_vars['LastName']->value;?>
</span>
							<input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'LAST_NAME'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['LastName']->value;?>
"/>
						<?php }?>
				</div>
			</div>
			<div class="form-group">
				<label class="reg" for="phone"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Phone"),$_smarty_tpl);?>
</label>
						<?php if ($_smarty_tpl->tpl_vars['AllowPhoneChange']->value) {?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('name'=>"PHONE",'class'=>"input",'value'=>"Phone",'size'=>"20"),$_smarty_tpl);?>

						<?php } else { ?>
							<span><?php echo $_smarty_tpl->tpl_vars['Phone']->value;?>
</span>
							<input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PHONE'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['Phone']->value;?>
"/>
						<?php }?>
			</div>
			</div>
			<div class="col-sm">
			<div class="form-group">
				<label class="reg" for="organization"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Organization"),$_smarty_tpl);?>
</label>
						<?php if ($_smarty_tpl->tpl_vars['AllowOrganizationChange']->value) {?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('name'=>"ORGANIZATION",'class'=>"input",'value'=>"Organization",'size'=>"20"),$_smarty_tpl);?>

						<?php } else { ?>
							<span><?php echo $_smarty_tpl->tpl_vars['Organization']->value;?>
</span>
							<input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'ORGANIZATION'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['Organization']->value;?>
"/>
						<?php }?>
			</div>
			<div class="form-group">
				<label class="reg" for="position"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Position"),$_smarty_tpl);?>
</label>
						<?php if ($_smarty_tpl->tpl_vars['AllowPositionChange']->value) {?>
							<select id="position" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'POSITION_ID'),$_smarty_tpl);?>
 class="form-control">
								<option value="0"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'None'),$_smarty_tpl);?>
</option>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['object_html_options'][0][0]->ObjectHtmlOptions(array('options'=>$_smarty_tpl->tpl_vars['Positions']->value,'label'=>'Name','key'=>'Id','selected'=>$_smarty_tpl->tpl_vars['PositionId']->value),$_smarty_tpl);?>

							</select>
						<?php } else { ?>
							<span><?php echo $_smarty_tpl->tpl_vars['PositionName']->value;?>
</span>
							<input type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'POSITION_ID'),$_smarty_tpl);?>
 value="<?php echo $_smarty_tpl->tpl_vars['PositionId']->value;?>
"/>
						<?php }?>
			</div>
			<div class="form-group">
				<label class="reg" for="homepage"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"DefaultPage"),$_smarty_tpl);?>
</label>
						<select <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'DEFAULT_HOMEPAGE'),$_smarty_tpl);?>
 id="homepage" class="form-control">
							<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['HomepageValues']->value,'output'=>$_smarty_tpl->tpl_vars['HomepageOutput']->value,'selected'=>$_smarty_tpl->tpl_vars['Homepage']->value),$_smarty_tpl);?>

						</select>
			</div>
			<br />
			<div class="text-right">
				<button type="button" class="btn btn-success" name="<?php echo Actions::SAVE;?>
" id="btnUpdate" >
				Save Information
				</button>
			</div>
			</div>
		</div>
	  </form>
    </div>
    <div class="row">
      <div class="col-md-6">
	  <form id="notification-preferences-form" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>
">
        <div class="box box-lg mb-4">
          <h2>Notification Preference</h2>
          <div class="form-group">
            <label>When I create a reservation or a reservation is created on my
              behalf</label>
            <div
              class="btn-group btn-group-toggle d-flex"
              data-toggle="buttons">
              <label class="btn btn-outline-success <?php if ($_smarty_tpl->tpl_vars['Created']->value) {?>active<?php }?>">
                <input
                  type="radio"
				  id="createdYes"
                  name="<?php echo ReservationEvent::Created;?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['Created']->value) {?>checked="checked"<?php }?> autocomplete="off" />
                Send me an email
              </label>
              <label class="btn btn-outline-secondary <?php if (!$_smarty_tpl->tpl_vars['Created']->value) {?>active<?php }?>">
                <input type="radio" id="createdNo" name="<?php echo ReservationEvent::Created;?>
" value="0" <?php if (!$_smarty_tpl->tpl_vars['Created']->value) {?>checked="checked"<?php }?> autocomplete="off" /> Do
                not notify me
              </label>
            </div>
          </div>
          <div class="form-group">
            <label>When I update a reservation or a reservation is created on my
              behalf</label>
            <div
              class="btn-group btn-group-toggle d-flex"
              data-toggle="buttons">
              <label class="btn btn-outline-success <?php if ($_smarty_tpl->tpl_vars['Updated']->value) {?>active<?php }?>">
                <input id="updatedYes" type="radio" name="<?php echo ReservationEvent::Updated;?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['Updated']->value) {?>checked="checked"<?php }?> autocomplete="off" />
                Send me an email
              </label>
              <label class="btn btn-outline-secondary <?php if (!$_smarty_tpl->tpl_vars['Updated']->value) {?>active<?php }?>">
                <input id="updatedNo" type="radio" name="<?php echo ReservationEvent::Updated;?>
" value="0" <?php if (!$_smarty_tpl->tpl_vars['Updated']->value) {?>checked="checked"<?php }?> autocomplete="off" /> Do
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
              <label class="btn btn-outline-success <?php if ($_smarty_tpl->tpl_vars['Deleted']->value) {?>active<?php }?>">
                <input id="deletedYes" type="radio" name="<?php echo ReservationEvent::Deleted;?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['Deleted']->value) {?>checked="checked"<?php }?> autocomplete="off" />
                Send me an email
              </label>
              <label class="btn btn-outline-secondary <?php if (!$_smarty_tpl->tpl_vars['Deleted']->value) {?>active<?php }?>">
                <input id="deletedNo" type="radio" name="<?php echo ReservationEvent::Deleted;?>
" value="0" <?php if (!$_smarty_tpl->tpl_vars['Deleted']->value) {?>checked="checked"<?php }?> autocomplete="off" /> Do
                not notify me
              </label>
            </div>
          </div>
          <div class="form-group">
            <label>When my pending reservation is approved</label>
            <div
              class="btn-group btn-group-toggle d-flex"
              data-toggle="buttons">
              <label class="btn btn-outline-success <?php if ($_smarty_tpl->tpl_vars['Approved']->value) {?>active<?php }?>">
                <input id="approvedYes" type="radio" name="<?php echo ReservationEvent::Approved;?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['Approved']->value) {?>checked="checked"<?php }?> autocomplete="off" />
                Send me an email
              </label>
              <label class="btn btn-outline-secondary <?php if (!$_smarty_tpl->tpl_vars['Approved']->value) {?>active<?php }?>">
                <input id="approvedNo" type="radio" name="<?php echo ReservationEvent::Approved;?>
" value="0" <?php if (!$_smarty_tpl->tpl_vars['Approved']->value) {?>checked="checked"<?php }?> autocomplete="off" /> Do
                not notify me
              </label>
            </div>
          </div>
		  <br />
		 <div class="text-right">
				<button type="submit" class="btn btn-success" name="<?php echo Actions::SAVE;?>
" >
				Update
				</button>
			</div>
        </div>
		</form>
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
  <?php echo '<script'; ?>
>
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
  <?php echo '</script'; ?>
>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>


	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['setfocus'][0][0]->SetFocus(array('key'=>'FIRST_NAME'),$_smarty_tpl);?>


	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"profile.js"),$_smarty_tpl);?>


	<?php echo '<script'; ?>
 type="text/javascript">

		function enableButton() {
			$('#form-profile').find('button').removeAttr('disabled');
		}

		$(document).ready(function () {
			var actions = {
				removeImage: '<?php echo ProfileActions::ActionRemoveImage;?>
'
			};
			var opts = {
				submitUrl: '<?php echo $_SERVER['SCRIPT_NAME'];?>
',
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
	<?php echo '</script'; ?>
>

	<div id="wait-box" class="wait-box">
		<h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Working'),$_smarty_tpl);?>
</h3>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"reservation_submitting.gif"),$_smarty_tpl);?>

	</div>

</div><?php }
}
