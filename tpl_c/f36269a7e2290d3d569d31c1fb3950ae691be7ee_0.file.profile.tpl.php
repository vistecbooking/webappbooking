<?php
/* Smarty version 3.1.30, created on 2019-12-13 09:54:11
  from "/var/www/html/booking/tpl/MyAccount/profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df2fd53b82e09_95524025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f36269a7e2290d3d569d31c1fb3950ae691be7ee' => 
    array (
      0 => '/var/www/html/booking/tpl/MyAccount/profile.tpl',
      1 => 1551196423,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5df2fd53b82e09_95524025 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/booking/lib/external/Smarty/plugins/function.html_options.php';
?>

<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Validator'=>true), 0, false);
?>


<div class="page-profile">

	<div class="hidden col-xs-12 col-sm-8 col-sm-offset-2 alert alert-success" role="alert" id="profileUpdatedMessage">
		<span class="glyphicon glyphicon-ok-sign"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'YourProfileWasUpdated'),$_smarty_tpl);?>

	</div>


	<div id="profile-box" class="default-box col-xs-12 col-sm-8 col-sm-offset-2">


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

			<h1><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'EditProfile'),$_smarty_tpl);?>
</h1>

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

			<?php if ($_smarty_tpl->tpl_vars['IsUser']->value) {?>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<center>
							<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['profile_image'][0][0]->GetProfileImage(array('image'=>$_smarty_tpl->tpl_vars['ProfileImg']->value),$_smarty_tpl);?>
" alt="Profile Image"
									class="img-circle" width="200px" height="200px" />
							<br/>
							<a class="update imageButton" id="changeImage" href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Change'),$_smarty_tpl);?>
</a>
							<?php if ($_smarty_tpl->tpl_vars['ProfileImg']->value != "noimg.png") {?>
								|
								<a class="update removeImageButton" id="removeImage" href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Remove'),$_smarty_tpl);?>
</a>
							<?php }?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array('id'=>'removeImageIndicator'),$_smarty_tpl);?>

						</center>
					</div>
				</div>
				<br />
			<?php }?>

			<div class="row">
				<div class="col-xs-12 col-sm-6">
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
				</div>
				<div class="col-xs-12 col-sm-6">
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
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
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
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
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
			</div>

			<?php if ($_smarty_tpl->tpl_vars['IsUser']->value) {?>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<label class="reg" for="nickname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"NickName"),$_smarty_tpl);?>
</label>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('type'=>"text",'name'=>"NICKNAME",'class'=>"input",'value'=>"NickName"),$_smarty_tpl);?>

						</div>
					</div>
				</div>
			<?php }?>

			<div class="row">
				<div class="col-xs-12 col-sm-6">
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
				<?php if ($_smarty_tpl->tpl_vars['IsUser']->value) {?>
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<label class="reg" for="line_ID"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"LineID"),$_smarty_tpl);?>
</label>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('name'=>"LINE_ID",'class'=>"input",'value'=>"LineID"),$_smarty_tpl);?>

						</div>
					</div>
				<?php }?>
			</div>

			<?php if ($_smarty_tpl->tpl_vars['IsUser']->value) {?>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<label class="reg" for="advisor_name"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"AdvisorName"),$_smarty_tpl);?>
</label>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('name'=>"ADVISOR_NAME",'class'=>"input",'value'=>"AdvisorName"),$_smarty_tpl);?>

						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<label class="reg" for="student_ID"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"StudentID"),$_smarty_tpl);?>
</label>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0][0]->Textbox(array('name'=>"STUDENT_ID",'class'=>"input",'value'=>"StudentID"),$_smarty_tpl);?>

						</div>
					</div>
				</div>
			<?php }?>

			<div class="row">
				<div class="col-xs-12 col-sm-6">
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
				</div>
				<div class="col-xs-12 col-sm-6">
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
				</div>
			</div>

			<?php if (count($_smarty_tpl->tpl_vars['Attributes']->value) > 0) {?>
				<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['Attributes']->value)+1 - (1) : 1-(count($_smarty_tpl->tpl_vars['Attributes']->value))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
					<?php if ($_smarty_tpl->tpl_vars['i']->value%2 != 0) {?>
						<div class="row">
					<?php }?>
					<div class="col-xs-12 col-sm-6">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['Attributes']->value[$_smarty_tpl->tpl_vars['i']->value-1]),$_smarty_tpl);?>

					</div>
					<?php if ($_smarty_tpl->tpl_vars['i']->value%2 == 0 || $_smarty_tpl->tpl_vars['i']->value == count($_smarty_tpl->tpl_vars['Attributes']->value)) {?>
						</div>
					<?php }?>
				<?php }
}
?>

			<?php }?>

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label class="reg" for="homepage"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"DefaultPage"),$_smarty_tpl);?>
</label>
						<select <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'DEFAULT_HOMEPAGE'),$_smarty_tpl);?>
 id="homepage" class="form-control">
							<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['HomepageValues']->value,'output'=>$_smarty_tpl->tpl_vars['HomepageOutput']->value,'selected'=>$_smarty_tpl->tpl_vars['Homepage']->value),$_smarty_tpl);?>

						</select>
					</div>
				</div>
			</div>

			<div>
				<button type="button" class="update btn btn-primary col-xs-12" name="<?php echo Actions::SAVE;?>
" id="btnUpdate">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Update'),$_smarty_tpl);?>

				</button>
			</div>
		</form>
	</div>

	<div id="imageDialog" class="modal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
		aria-hidden="true">
		<form id="imageForm" method="post" enctype="multipart/form-data" ajaxAction="<?php echo ProfileActions::ActionChangeImage;?>
">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="imageModalLabel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddImage'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<label for="profileImage" class="off-screen">Image file</label>
						<input id="profileImage" type="file" class="text" size="60" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'PROFILE_IMG'),$_smarty_tpl);?>

							accept="image/*;capture=camera"/>

						<div class="note">.gif, .jpg, or .png</div>
					</div>

					<div class="modal-footer">
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0][0]->CancelButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['update_button'][0][0]->UpdateButton(array(),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

					</div>
				</div>
			</div>
		</form>
	</div>

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

</div>
<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
