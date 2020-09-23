<?php
/* Smarty version 3.1.30, created on 2019-12-13 16:38:16
  from "/var/www/html/booking/tpl/Schedule/schedule.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df35c08368681_51880995',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '526a4cc6756969c979590202a1839e0e747b81f1' => 
    array (
      0 => '/var/www/html/booking/tpl/Schedule/schedule.tpl',
      1 => 1552989184,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5df35c08368681_51880995 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'displayGeneralReserved' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayGeneralReserved_16729278195df35c07f05924_58445081',
  ),
  'displayMyReserved' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayMyReserved_16729278195df35c07f05924_58445081',
  ),
  'displayMyParticipating' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayMyParticipating_16729278195df35c07f05924_58445081',
  ),
  'displayReserved' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayReserved_16729278195df35c07f05924_58445081',
  ),
  'displayPastTime' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayPastTime_16729278195df35c07f05924_58445081',
  ),
  'displayReservable' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayReservable_16729278195df35c07f05924_58445081',
  ),
  'displayRestricted' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayRestricted_16729278195df35c07f05924_58445081',
  ),
  'displayUnreservable' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayUnreservable_16729278195df35c07f05924_58445081',
  ),
  'displaySlot' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displaySlot_16729278195df35c07f05924_58445081',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
























<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20820311065df35c080d4189_85899478', "header");
?>

<?php if (!isset($_smarty_tpl->tpl_vars['rid']->value)) {?>
				
<div id="globalError" class="error no-show"></div>
<div class="panel panel-default admin-panel" id="list-resources-panel">
<?php echo '<script'; ?>
>
$(document).ready(function(){	
	initResources();

	$( "#search_btn" ).click(function() {
		var s = $("#s").val()
		var hostname = window.location.hostname;
		var path = window.location.pathname;
		var rootFolder = '';
		var pathindex = path.toLowerCase().indexOf('/web');
		if(pathindex > 0)
		{
			rootFolder = path.substring(0, pathindex);
		}
		hostname += rootFolder;
		if(s){
		//   alert(hostname);
			if($('select[name=category]').val() != ""){
				window.location.replace("http://"+hostname+"/Web/schedule.php?bs="+$('select[name=category]').val()+"&&s="+s); // online
			}else{
				window.location.replace("http://"+hostname+"/Web/schedule.php?s="+s); // online
			}
		}
		else{
			if($('select[name=category]').val() != ""){
				window.location.replace("http://"+hostname+"/Web/schedule.php?bs="+$('select[name=category]').val()); // online
			}else{
				window.location.replace("http://"+hostname+"/Web/schedule.php"); // online
			}
		}
	});

	$( "#category" ).change(function() {
		var str = "";	 
		if($('select[name=category]').val() != ""){
			str = '?bs='+$('select[name=category]').val();
		}else{
			str = "";	
		}

		var hostname = window.location.hostname;
		var path = window.location.pathname;
		var rootFolder = '';
		var pathindex = path.toLowerCase().indexOf('/web');
		if(pathindex > 0)
		{
			rootFolder = path.substring(0, pathindex);
		}
		hostname += rootFolder;

		var s = $("#s").val()
		if( s != "" &&  $('select[name=category]').val() != ""){
			str += '&s='+s;
		}else if($('select[name=category]').val() == "" && s != ""){
			str += '?s='+s;
		}

	   window.location.replace("http://"+hostname+"/Web/schedule.php"+str); // online
	});
});

function initResources() {
	$('.resourceNameSelector').each(function () {
		$(this).attachResourceFindATimePopup($(this).attr('resourceId'), false);
	});
}

function onBookingClick(url, resource_id){
	if(resource_id == 2 || resource_id == 24){
		if(resource_id == 2 && $("#mode-2").val() != ""){
			window.location.replace(url+"&mode="+$("#mode-2").val());
		}
		else if(resource_id == 24 && $("#mode-24").val() != ""){
			window.location.replace(url+"&mode="+$("#mode-24").val());
		}
		else{
			$('#dialogSelectMode').modal();
			return;
		}
	}
	else{
		 window.location.replace(url);
	}
}
<?php echo '</script'; ?>
>
		<div class="panel-heading" style="padding-bottom: 45px;"><div style="float: left;">Instrument filter by 
			<select id="category" name="category" class="inline-block">
				<option value=""><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllResourceTypes'),$_smarty_tpl);?>
</option>
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['object_html_options'][0][0]->ObjectHtmlOptions(array('options'=>$_smarty_tpl->tpl_vars['ResourceTypes']->value,'key'=>'Id','label'=>"Name",'selected'=>$_smarty_tpl->tpl_vars['get_bs']->value),$_smarty_tpl);?>

			</select>
		</div>
		
			<div class="participationText" style="float:right;">
				<span class="hidden-xs">Search</span>
				<span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="s" value="<?php echo $_smarty_tpl->tpl_vars['get_s']->value;?>
" class="form-control inline-block user-search ui-autocomplete-input" placeholder="search" autocomplete="off">
				<button type="button" class="btn btn-success save create btnCreate" id="search_btn">
								<span class="glyphicon glyphicon-search"></span>
								Search
							</button>
			</div>
		</div>
		<div class="panel-body no-padding" id="resourceList">

		<div class="row row-eq-height" style="margin-right: 0px; margin-left: 0px; display: flex;
  flex-wrap: wrap;">
			<?php $_smarty_tpl->_assignInScope('i', 0);
?>
			<?php if (count($_smarty_tpl->tpl_vars['resources']->value) > 0) {?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resources']->value, 'resource');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
			
				<?php if (($_smarty_tpl->tpl_vars['i']->value%3) == 0&$_smarty_tpl->tpl_vars['i']->value != 0) {?>
						</div><div class="row row-eq-height" style="margin-right: 0px; margin-left: 0px; display: flex;
	  flex-wrap: wrap;">
				<?php }?>
			<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);
?>
					<div id="main" class="container-fluid col-xs-12 col-sm-4" style="padding-top: 20px; border: 1px solid #dcdcdc;">
						<div  class="container-fluid col-xs-12 col-sm-12">
							<center>
								<?php if ($_smarty_tpl->tpl_vars['resource']->value['status_id'] == 1) {?>
									<p style="font-size: 26px">
										<b><?php echo $_smarty_tpl->tpl_vars['resource']->value['name'];?>
</b> <sup style="vertical-align: super !important"><span class="label label-success">Available</span></sup>
									</p>
								<?php } else { ?>
									<p style="font-size: 26px">
										<?php echo $_smarty_tpl->tpl_vars['resource']->value['name'];?>
 <sup style="vertical-align: super !important"><span class="label label-danger">Unavailable</span></sup>
									</p>
								<?php }?>
							</center>
						</div>
						<div class="container-fluid col-xs-12 col-sm-12">
							<br />
							<center>
								<img src="../Web/uploads/images/<?php echo $_smarty_tpl->tpl_vars['resource']->value['image_name'];?>
" alt="Resource Image" class="image resourceNameSelector" style="width: auto;max-height: 204px;" resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value['resource_id'];?>
">
							</center>  
						</div>
						<div  class="container-fluid col-xs-12 col-sm-12">
							<center>
								<?php if ($_smarty_tpl->tpl_vars['resource']->value['status_id'] == 1) {?>
									<?php if ($_smarty_tpl->tpl_vars['resource']->value['resource_id'] == 2) {?>
										<br />
										<div class="row col-sm-8 col-sm-offset-2">
											<select name="mode-2" id="mode-2" class="form-control">
												<option value="" selected="">-- Select Mode --</option>
												<option value="Powder mode">Powder mode</option>
												<option value="Modified mode">Modified mode</option>
											</select>
										</div>
										<br />
									<?php } elseif ($_smarty_tpl->tpl_vars['resource']->value['resource_id'] == 24) {?>
										<br />
										<div class="row col-sm-8 col-sm-offset-2">
											<select name="mode-24" id="mode-24" class="form-control">
												<option value="" selected="">-- Select Mode --</option>
												<option value="LC coupled with QTOF-MS/MS">LC coupled with QTOF-MS/MS</option>
												<option value="ES-QTOF mode">ES-QTOF mode</option>
											</select>
										</div>
										<br />
									<?php }?>
									<br />
									<p style="padding-top:  10px; font-size: 20px"><a style="cursor: pointer" onclick="onBookingClick('../Web/schedule.php?id=<?php echo $_smarty_tpl->tpl_vars['resource']->value['resource_id'];?>
&sid=<?php echo $_smarty_tpl->tpl_vars['resource']->value['schedule_id'];?>
', <?php echo $_smarty_tpl->tpl_vars['resource']->value['resource_id'];?>
)" >Click to booking</a></p>
								<?php } else { ?>
									<br />
									<p style="padding-top:  10px; font-size: 20px"><a href="../Web/schedule.php?id=<?php echo $_smarty_tpl->tpl_vars['resource']->value['resource_id'];?>
&sid=<?php echo $_smarty_tpl->tpl_vars['resource']->value['schedule_id'];?>
&unavailable=true">Click to view</a></p>
								<?php }?>
							</center>
						</div>
					</div><!-- close main-->	
					<?php if ($_smarty_tpl->tpl_vars['i']->value >= count($_smarty_tpl->tpl_vars['resources']->value)) {?>
					<?php $_smarty_tpl->_assignInScope('j', 3-($_smarty_tpl->tpl_vars['i']->value%3));
?>
						<?php if ($_smarty_tpl->tpl_vars['j']->value == 1) {?>
							<div id="main" class="container-fluid col-xs-12 col-sm-4" style="padding-top: 40px;    border: 1px solid #dcdcdc;">
							
							</div>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['j']->value == 2) {?>
							<div id="main" class="container-fluid col-xs-12 col-sm-4" style="padding-top: 40px;    border: 1px solid #dcdcdc;">
							
							</div>
							<div id="main" class="container-fluid col-xs-12 col-sm-4" style="padding-top: 40px;    border: 1px solid #dcdcdc;">
							
							</div>
						<?php }?>
					<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php } else { ?>
				<div class="container h-100">
				  <div class="row h-100 justify-content-center align-items-center">
				    <center><h1 style=" margin: 50px 0px; color: #9c9c9c;"><b>Instruments not found.</b></h1></center> 
				  </div>  
				</div>
			<?php }?>
		</div>
</div></div>
<style type="text/css">
	.isDisabled {
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
}
</style>
	<center>
		<ul class="pagination" style="margin-top: 0px;">
			<li><a class="page <?php if (count($_smarty_tpl->tpl_vars['pagination']->value) == 0) {?> isDisabled<?php }?>" <?php if (count($_smarty_tpl->tpl_vars['pagination']->value) != 0) {?> href="/Web/schedule.php?page=1"<?php }?>>«</a></li>
			<li class="active"><a  >1</a></li>
			<?php $_smarty_tpl->_assignInScope('i', 0);
?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagination']->value, 'page');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
?>
				<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);
?>
				<li class="<?php echo $_smarty_tpl->tpl_vars['page']->value['class'];?>
"><a class="page" href="/Web/schedule.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value['count'];?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value['count'];?>
</a></li>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<li><a class="page <?php if (count($_smarty_tpl->tpl_vars['pagination']->value) == 0) {?> isDisabled<?php }?>" <?php if (count($_smarty_tpl->tpl_vars['pagination']->value) != 0) {?> href="/Web/schedule.php?page=<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
"<?php }?>>»</a></li>
		</ul>
	</center>
</div></div></div></div>

<div class="modal fade" id="dialogSelectMode" tabindex="-1" role="dialog" aria-labelledby="dialogSelectModeLabel"
		 aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h3>Please Select Mode.</h3>
				<br />
				<center>
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				</center>
				<br />
			</div>
		</div>
	</div>
</div>

<?php } else { ?>
	<div id="page-schedule">

	<?php if ($_smarty_tpl->tpl_vars['ShowResourceWarning']->value) {?>
		<div class="alert alert-warning no-resource-warning"><span class="fa fa-warning"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoResources'),$_smarty_tpl);?>
 <a
					href="admin/manage_resources.php"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddResource'),$_smarty_tpl);?>
</a></div>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['IsAccessible']->value) {?>

	<div id="defaultSetMessage" class="alert alert-success hidden">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DefaultScheduleSet'),$_smarty_tpl);?>

	</div>

	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12055032535df35c08240ea6_18801586', "schedule_control");
?>


			<?php echo '<script'; ?>
 type="text/javascript">
				$( document ).ready(function() {
					$(function () {
						$('[data-toggle="tooltip"]').tooltip();
					});
					$('#tooltip').tooltip('show');

					var numTabs = 0;
				  //alert("Loaded");
				  	$(".title_str").each(function(){
				  		numTabs = numTabs+1;
				  		if(numTabs == 1){
				  			$(this).css('display','block');
				  		}
					});
					//alert(numTabs);
				});

				document.getElementById("tooltip").onclick = function () {
					$('#tooltip').tooltip('toggle');
				};
			<?php echo '</script'; ?>
>
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9109964375df35c0826b2b4_40219910', "legend");
?>


	<div class="row-fluid">
		<div id="reservations" class="col-md-12 col-sm-12">
			<div>
				<a href="#" id="restore-sidebar" title="Show Reservation Filter" class="hidden toggle-sidebar"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceFilter'),$_smarty_tpl);?>
 <i
							class="glyphicon glyphicon-filter"></i> <i
							class="glyphicon glyphicon-chevron-right"></i></a>
			</div>
			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10186425105df35c083135f5_02173647', "reservations");
?>

			<?php } else { ?>
			<div class="error"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoResourcePermission'),$_smarty_tpl);?>
</div>
			<?php }?>
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>
	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ScheduleId']->value;?>
" id="scheduleId"/>

	<div class="row-fluid no-margin">
		<div class="col-xs-9 visible-md visible-lg">&nbsp;</div>
		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_navigation');?>

	</div>
	
</div>

<form id="moveReservationForm">
	<input id="moveReferenceNumber" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'REFERENCE_NUMBER'),$_smarty_tpl);?>
 />
	<input id="moveStartDate" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'BEGIN_DATE'),$_smarty_tpl);?>
 />
	<input id="moveResourceId" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'RESOURCE_ID'),$_smarty_tpl);?>
 />
	<input id="moveSourceResourceId" type="hidden" <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0][0]->GetFormName(array('key'=>'ORIGINAL_RESOURCE_ID'),$_smarty_tpl);?>
 />
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>

</form>

<div class="modal fade" id="dialogNotReserv" tabindex="-1" role="dialog" aria-labelledby="dialogNotReservLabel"
		 aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h3>Your reservation could not be made.</h3>
				<br />
				<center>
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				</center>
				<br />
			</div>
		</div>
	</div>
</div>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18134594195df35c08322724_20560779', "scripts-before");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4350560295df35c0834baf3_63773346', "scripts-common");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17799460255df35c0834fc80_66797625', "scripts-after");
?>



<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0][0]->DisplayControl(array('type'=>"DatePickerSetupControl",'ControlId'=>'datepicker','DefaultDate'=>$_smarty_tpl->tpl_vars['FirstDate']->value,'NumberOfMonths'=>$_smarty_tpl->tpl_vars['PopupMonths']->value,'ShowButtonPanel'=>'true','OnSelect'=>'dpDateChanged','FirstDay'=>$_smarty_tpl->tpl_vars['FirstWeekday']->value),$_smarty_tpl);?>

<?php }?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/tree.jquery.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.cookie.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"resourceFindAtimePopup.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ($_smarty_tpl->tpl_vars['quota_limit']->value == 0) {?>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function () {
			if($(".reservations td").hasClass("reservable")){
				$( ".reservations td" ).removeClass( "reservable clickres slot ui-selectee" );
				//$( ".reservations td" ).addClass( "restricted" );
			}
			$( ".reservations td").removeAttr("data-href");
			$( ".reservations td").removeAttr("data-start");
			$( ".reservations td").removeAttr("data-end");
			
			//$( ".reservations td").attr("draggable");
			$( ".reservations td").attr("resid");
		});	
	<?php echo '</script'; ?>
>
<?php }?>
<style>
	td.resourcename span {
		color: #000 !important;
	}
	.tooltip {
		z-index: 1040 !important;
	}
</style><?php }
/* smarty_template_function_displayGeneralReserved_16729278195df35c07f05924_58445081 */
if (!function_exists('smarty_template_function_displayGeneralReserved_16729278195df35c07f05924_58445081')) {
function smarty_template_function_displayGeneralReserved_16729278195df35c07f05924_58445081($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php if ($_smarty_tpl->tpl_vars['Slot']->value->IsPending()) {?>
		<?php $_smarty_tpl->_assignInScope('class', 'pending');
?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['Slot']->value->HasCustomColor()) {?>
		<?php $_smarty_tpl->_assignInScope('color', (((('style="background-color:').($_smarty_tpl->tpl_vars['Slot']->value->Color())).(' !important;color:')).($_smarty_tpl->tpl_vars['Slot']->value->TextColor())).(' !important;"'));
?>
	<?php }?>
	<td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" class="reserved <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['OwnershipClass']->value;?>
 clickres slot"
		resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
" <?php echo $_smarty_tpl->tpl_vars['color']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['Draggable']->value) {?>draggable="true"<?php }?> data-resourceId="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
"
		id="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
|<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Date()->Format('Ymd');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escapequotes'][0][0]->EscapeQuotes($_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value));?>
</td>
<?php
}}
/*/ smarty_template_function_displayGeneralReserved_16729278195df35c07f05924_58445081 */
/* smarty_template_function_displayMyReserved_16729278195df35c07f05924_58445081 */
if (!function_exists('smarty_template_function_displayMyReserved_16729278195df35c07f05924_58445081')) {
function smarty_template_function_displayMyReserved_16729278195df35c07f05924_58445081($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReserved', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'mine','Draggable'=>true,'ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displayMyReserved_16729278195df35c07f05924_58445081 */
/* smarty_template_function_displayMyParticipating_16729278195df35c07f05924_58445081 */
if (!function_exists('smarty_template_function_displayMyParticipating_16729278195df35c07f05924_58445081')) {
function smarty_template_function_displayMyParticipating_16729278195df35c07f05924_58445081($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReserved', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'participating','ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displayMyParticipating_16729278195df35c07f05924_58445081 */
/* smarty_template_function_displayReserved_16729278195df35c07f05924_58445081 */
if (!function_exists('smarty_template_function_displayReserved_16729278195df35c07f05924_58445081')) {
function smarty_template_function_displayReserved_16729278195df35c07f05924_58445081($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReserved', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'','Draggable'=>((string)$_smarty_tpl->tpl_vars['CanViewAdmin']->value),'ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displayReserved_16729278195df35c07f05924_58445081 */
/* smarty_template_function_displayPastTime_16729278195df35c07f05924_58445081 */
if (!function_exists('smarty_template_function_displayPastTime_16729278195df35c07f05924_58445081')) {
function smarty_template_function_displayPastTime_16729278195df35c07f05924_58445081($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" ref="<?php echo $_smarty_tpl->tpl_vars['SlotRef']->value;?>
"
		class="pasttime slot" Draggable="<?php echo $_smarty_tpl->tpl_vars['CanViewAdmin']->value;?>
" resid="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->Id();?>
" data-resourceId="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escapequotes'][0][0]->EscapeQuotes($_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value));?>
</td>
<?php
}}
/*/ smarty_template_function_displayPastTime_16729278195df35c07f05924_58445081 */
/* smarty_template_function_displayReservable_16729278195df35c07f05924_58445081 */
if (!function_exists('smarty_template_function_displayReservable_16729278195df35c07f05924_58445081')) {
function smarty_template_function_displayReservable_16729278195df35c07f05924_58445081($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" ref="<?php echo $_smarty_tpl->tpl_vars['SlotRef']->value;?>
" class="reservable clickres slot" data-href="<?php echo $_smarty_tpl->tpl_vars['Href']->value;?>
"
		data-start="<?php echo rawurlencode($_smarty_tpl->tpl_vars['Slot']->value->BeginDate()->Format('Y-m-d H:i:s'));?>
" data-end="<?php echo rawurlencode($_smarty_tpl->tpl_vars['Slot']->value->EndDate()->Format('Y-m-d H:i:s'));?>
"
		data-resourceId="<?php echo $_smarty_tpl->tpl_vars['ResourceId']->value;?>
">&nbsp;</td>
<?php
}}
/*/ smarty_template_function_displayReservable_16729278195df35c07f05924_58445081 */
/* smarty_template_function_displayRestricted_16729278195df35c07f05924_58445081 */
if (!function_exists('smarty_template_function_displayRestricted_16729278195df35c07f05924_58445081')) {
function smarty_template_function_displayRestricted_16729278195df35c07f05924_58445081($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" class="restricted slot">&nbsp;</td>
<?php
}}
/*/ smarty_template_function_displayRestricted_16729278195df35c07f05924_58445081 */
/* smarty_template_function_displayUnreservable_16729278195df35c07f05924_58445081 */
if (!function_exists('smarty_template_function_displayUnreservable_16729278195df35c07f05924_58445081')) {
function smarty_template_function_displayUnreservable_16729278195df35c07f05924_58445081($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
"
		class="unreservable slot"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['Slot']->value->Label($_smarty_tpl->tpl_vars['SlotLabelFactory']->value), ENT_QUOTES, 'UTF-8', true);?>
</td>
<?php
}}
/*/ smarty_template_function_displayUnreservable_16729278195df35c07f05924_58445081 */
/* smarty_template_function_displaySlot_16729278195df35c07f05924_58445081 */
if (!function_exists('smarty_template_function_displaySlot_16729278195df35c07f05924_58445081')) {
function smarty_template_function_displaySlot_16729278195df35c07f05924_58445081($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php if ($_smarty_tpl->tpl_vars['quota_limit']->value > 0 || $_smarty_tpl->tpl_vars['CanViewAdmin']->value == true) {?>
		<?php $_smarty_tpl->_assignInScope('hasQuota', true);
?>
	<?php } else { ?>
		<?php $_smarty_tpl->_assignInScope('hasQuota', false);
?>
	<?php }?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, $_smarty_tpl->tpl_vars['DisplaySlotFactory']->value->GetFunction($_smarty_tpl->tpl_vars['Slot']->value,$_smarty_tpl->tpl_vars['AccessAllowed']->value,$_smarty_tpl->tpl_vars['Unavailable']->value,$_smarty_tpl->tpl_vars['hasQuota']->value), array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displaySlot_16729278195df35c07f05924_58445081 */
/* {block "header"} */
class Block_20820311065df35c080d4189_85899478 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Qtip'=>true,'Select2'=>true,'FloatThead'=>true,'cssFiles'=>'scripts/css/jqtree.css','printCssFiles'=>'css/schedule.print.css'), 0, false);
?>

<?php
}
}
/* {/block "header"} */
/* {block "schedule_control"} */
class Block_12055032535df35c08240ea6_18801586 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="row-fluid">
			<div class="btn-search">
				<button id="backlistpage" type="button" class="btn btn-primary btn-sm"><i class="fa fa-th" aria-hidden="true"></i> Back to tools list page</button>
				<?php echo '<script'; ?>
 type="text/javascript">
					document.getElementById("backlistpage").onclick = function () {
						location.href = "schedule.php";
					};
				<?php echo '</script'; ?>
>
				<div style="float: right; right:0">
					<button type="button" id="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left" 
						title="How to book an instrument: Click and drag on table as your preferred time.">
						<i class="fa fa-2 fa-info"></i>
					</button>
				</div>
			</div>

			<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "date_navigation", null, null);
?>

				<div class="row-fluid">
				<div class="schedule-dates col-lg-12 col-md-12">
					<div class="title_str" style="display: none;" >
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value, 'resource', false, NULL, 'resource_loop', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
							<?php if ($_smarty_tpl->tpl_vars['resource']->value->Id == $_smarty_tpl->tpl_vars['rid']->value) {?>
								<?php $_smarty_tpl->_assignInScope('resourceNameTitle', $_smarty_tpl->tpl_vars['resource']->value->Name);
?>
							<?php }?>	
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'ES-QTOF mode') {?>
								<h1>ES-QTOF-MS/MS <?php if (!$_smarty_tpl->tpl_vars['CanViewAdmin']->value) {?> <br /> (Remaining time: <?php echo $_smarty_tpl->tpl_vars['quota_limit_txt']->value;?>
 hrs left) <?php }?> </h1>
							<?php } elseif ($_smarty_tpl->tpl_vars['mode']->value == 'Modified mode') {?>
								<h1><?php echo $_smarty_tpl->tpl_vars['resourceNameTitle']->value;?>
 <?php if (!$_smarty_tpl->tpl_vars['CanViewAdmin']->value) {?> <br /> (Remaining time: no limit) <?php }?> </h1>
							<?php } else { ?>
								<h1><?php echo $_smarty_tpl->tpl_vars['resourceNameTitle']->value;?>
 <?php if (!$_smarty_tpl->tpl_vars['CanViewAdmin']->value) {?> <br /> (Remaining time: <?php echo $_smarty_tpl->tpl_vars['quota_limit_txt']->value;?>
 hrs left) <?php }?> </h1>
							<?php }?>
						
					</div>
					<?php $_smarty_tpl->_assignInScope('TodaysDate', Date::Now());
?>
					<a href="#" class="change-date btn-link btn-success" data-year="<?php echo $_smarty_tpl->tpl_vars['TodaysDate']->value->Year();?>
" data-month="<?php echo $_smarty_tpl->tpl_vars['TodaysDate']->value->Month();?>
" data-day="<?php echo $_smarty_tpl->tpl_vars['TodaysDate']->value->Day();?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Today'),$_smarty_tpl);?>
"><i class="fa fa-home"></i></a>
					<?php $_smarty_tpl->_assignInScope('FirstDate', $_smarty_tpl->tpl_vars['DisplayDates']->value->GetBegin());
?>
					<?php $_smarty_tpl->_assignInScope('LastDate', $_smarty_tpl->tpl_vars['DisplayDates']->value->GetEnd()->AddDays(-1));
?>
					<a href="#" class="change-date" data-year="<?php echo $_smarty_tpl->tpl_vars['PreviousDate']->value->Year();?>
" data-month="<?php echo $_smarty_tpl->tpl_vars['PreviousDate']->value->Month();?>
"
					   data-day="<?php echo $_smarty_tpl->tpl_vars['PreviousDate']->value->Day();?>
"><?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Back'),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"arrow_large_left.png",'alt'=>$_prefixVariable1),$_smarty_tpl);?>
</a>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['FirstDate']->value),$_smarty_tpl);?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['LastDate']->value),$_smarty_tpl);?>

					<a href="#" class="change-date" data-year="<?php echo $_smarty_tpl->tpl_vars['NextDate']->value->Year();?>
" data-month="<?php echo $_smarty_tpl->tpl_vars['NextDate']->value->Month();?>
"
					   data-day="<?php echo $_smarty_tpl->tpl_vars['NextDate']->value->Day();?>
"><?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Forward'),$_smarty_tpl);
$_prefixVariable2=ob_get_clean();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0][0]->PrintImage(array('src'=>"arrow_large_right.png",'alt'=>$_prefixVariable2),$_smarty_tpl);?>
</a>

					<?php if ($_smarty_tpl->tpl_vars['ShowFullWeekLink']->value) {?>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['add_querystring'][0][0]->AddQueryString(array('key'=>'SHOW_FULL_WEEK','value'=>1),$_smarty_tpl);?>
"
						   id="showFullWeek">(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ShowFullWeek'),$_smarty_tpl);?>
)</a>
					<?php }?>
				</div>
				</div>
			<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>


			<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_navigation');?>

		</div>
		<div type="text" id="datepicker" style="display:none;"></div>
	<?php
}
}
/* {/block "schedule_control"} */
/* {block "legend"} */
class Block_9109964375df35c0826b2b4_40219910 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="hidden-xs row-fluid col-sm-12 schedule-legend">
			<div class="center">
				<div class="legend reservable"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Reservable'),$_smarty_tpl);?>
</div>
				<div class="legend unreservable"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Unreservable'),$_smarty_tpl);?>
</div>
				<div class="legend reserved"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Reserved'),$_smarty_tpl);?>
</div>
				<?php if ($_smarty_tpl->tpl_vars['LoggedIn']->value) {?>
				<div class="legend reserved mine"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'MyReservation'),$_smarty_tpl);?>
</div>
				<div class="legend reserved participating"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Participant'),$_smarty_tpl);?>
</div>
				<?php }?>
				<div class="legend reserved pending"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Pending'),$_smarty_tpl);?>
</div>
				<div class="legend pasttime"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Past'),$_smarty_tpl);?>
</div>
				<div class="legend restricted"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Restricted'),$_smarty_tpl);?>
</div>
			</div>
		</div>
	<?php
}
}
/* {/block "legend"} */
/* {block "reservations"} */
class Block_10186425105df35c083135f5_02173647 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<?php $_smarty_tpl->_assignInScope('TodaysDate', Date::Now());
?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BoundDates']->value, 'date');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value) {
?>
					<?php $_smarty_tpl->_assignInScope('ts', $_smarty_tpl->tpl_vars['date']->value->Timestamp());
?>
					<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['periods']) ? $_smarty_tpl->tpl_vars['periods']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['ts']->value] = $_smarty_tpl->tpl_vars['DailyLayout']->value->GetPeriods($_smarty_tpl->tpl_vars['date']->value,true);
$_smarty_tpl->_assignInScope('periods', $_tmp_array);
?>
					<?php if (count($_smarty_tpl->tpl_vars['periods']->value[$_smarty_tpl->tpl_vars['ts']->value]) == 0) {
continue 1;
}?>
					<div style="position:relative;">
						<table class="reservations" border="1" cellpadding="0" width="100%">
							<thead>
                            <?php if ($_smarty_tpl->tpl_vars['date']->value->DateEquals($_smarty_tpl->tpl_vars['TodaysDate']->value)) {?>
							<tr class="today"> 
								<?php } else { ?>
							<tr> 
								<?php }?>
								<td class="resdate"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>"schedule_daily"),$_smarty_tpl);?>
</td>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['periods']->value[$_smarty_tpl->tpl_vars['ts']->value], 'period');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['period']->value) {
?>
									<td class="reslabel" colspan="<?php echo $_smarty_tpl->tpl_vars['period']->value->Span();?>
"><?php echo $_smarty_tpl->tpl_vars['period']->value->Label($_smarty_tpl->tpl_vars['date']->value);?>
</td>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</tr>
                            </thead>
                            <tbody>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value, 'resource', false, NULL, 'resource_loop', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
							<?php if ($_smarty_tpl->tpl_vars['resource']->value->Id == $_smarty_tpl->tpl_vars['rid']->value) {?>
								<?php $_smarty_tpl->_assignInScope('resourceId', $_smarty_tpl->tpl_vars['resource']->value->Id);
?>
								<?php $_smarty_tpl->_assignInScope('slots', $_smarty_tpl->tpl_vars['DailyLayout']->value->GetLayout($_smarty_tpl->tpl_vars['date']->value,$_smarty_tpl->tpl_vars['resourceId']->value));
?>
								<?php ob_start();
echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['date']->value,'key'=>'url'),$_smarty_tpl);
$_prefixVariable3=ob_get_clean();
ob_start();
if (isset($_smarty_tpl->tpl_vars['mode']->value)) {
echo "&mode=";
echo (string)$_smarty_tpl->tpl_vars['mode']->value;
}
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('href', ((string)$_smarty_tpl->tpl_vars['CreateReservationPage']->value)."?rid=".((string)$_smarty_tpl->tpl_vars['resource']->value->Id)."&sid=".((string)$_smarty_tpl->tpl_vars['ScheduleId']->value)."&rd=".$_prefixVariable3.$_prefixVariable4);
?>
								<tr class="slots">
									<td class="resourcename" <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="background-color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetColor();?>
"<?php }?>>
										<?php if ($_smarty_tpl->tpl_vars['resource']->value->CanAccess && $_smarty_tpl->tpl_vars['DailyLayout']->value->IsDateReservable($_smarty_tpl->tpl_vars['date']->value)) {?>
											<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value->Id;?>
"
											   class="resourceNameSelector"
											   <?php if ($_smarty_tpl->tpl_vars['mode']->value == 'ES-QTOF mode') {?>
													<?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
"<?php }?>>ES-QTOF-MS/MS</a>
											   <?php } else { ?>
													<?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['resource']->value->Name;?>
</a>
											   <?php }?>
											   
										<?php } else { ?>
											<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'ES-QTOF mode') {?>
												<span resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value->Id;?>
" resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value->Id;?>
"
												  class="resourceNameSelector"
												  <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
"<?php }?>>ES-QTOF-MS/MS</span>
											<?php } else { ?>
												<span resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value->Id;?>
" resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value->Id;?>
"
												  class="resourceNameSelector"
												  <?php if ($_smarty_tpl->tpl_vars['resource']->value->HasColor()) {?>style="color:<?php echo $_smarty_tpl->tpl_vars['resource']->value->GetTextColor();?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['resource']->value->Name;?>
</span>
											<?php }?>
										<?php }?>
									</td>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slots']->value, 'slot');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['slot']->value) {
?>
										<?php $_smarty_tpl->_assignInScope('slotRef', ((string)$_smarty_tpl->tpl_vars['slot']->value->BeginDate()->Format('YmdHis')).((string)$_smarty_tpl->tpl_vars['resourceId']->value));
?>
										<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displaySlot', array('Slot'=>$_smarty_tpl->tpl_vars['slot']->value,'Href'=>((string)$_smarty_tpl->tpl_vars['href']->value),'AccessAllowed'=>$_smarty_tpl->tpl_vars['resource']->value->CanAccess,'SlotRef'=>$_smarty_tpl->tpl_vars['slotRef']->value,'ResourceId'=>$_smarty_tpl->tpl_vars['resourceId']->value), true);?>

									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

								</tr>
							<?php }?>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </tbody>
						</table>
					</div>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['flush'][0][0]->Flush(array(),$_smarty_tpl);?>

				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php
}
}
/* {/block "reservations"} */
/* {block "scripts-before"} */
class Block_18134594195df35c08322724_20560779 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "scripts-before"} */
/* {block "scripts-common"} */
class Block_4350560295df35c0834baf3_63773346 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/moment.min.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"schedule.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"resourcePopup.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/tree.jquery.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.cookie.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>


	<?php echo '<script'; ?>
 type="text/javascript">

		<?php if ($_smarty_tpl->tpl_vars['LoadViewOnly']->value) {?>
			$(document).ready(function () {
					var scheduleOptions = {
						reservationUrlTemplate: "view-reservation.php?<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=[referenceNumber]",
						summaryPopupUrl: "ajax/respopup.php",
						cookieName: "<?php echo $_smarty_tpl->tpl_vars['CookieName']->value;?>
",
						scheduleId: "<?php echo $_smarty_tpl->tpl_vars['ScheduleId']->value;?>
",
						scriptUrl: '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
',
						selectedResources: [<?php echo implode(',',$_smarty_tpl->tpl_vars['ResourceIds']->value);?>
],
						specificDates: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SpecificDates']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>'<?php echo $_smarty_tpl->tpl_vars['d']->value->Format('Y-m-d');?>
',<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
]
					};
					var schedule = new Schedule(scheduleOptions, <?php echo $_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value;?>
);
					<?php if ($_smarty_tpl->tpl_vars['AllowGuestBooking']->value) {?>
					schedule.init();
					schedule.initUserDefaultSchedule(true);
					<?php } else { ?>
					schedule.initNavigation();
					schedule.initRotateSchedule();
					schedule.initReservations();
					schedule.initResourceFilter();
					schedule.initResources();
					schedule.initUserDefaultSchedule(true);
					<?php }?>
				});
		<?php } else { ?>
			$(document).ready(function () {
					var scheduleOpts = {
						reservationUrlTemplate: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;
echo Pages::RESERVATION;?>
?<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=[referenceNumber]",
						summaryPopupUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
ajax/respopup.php",
						setDefaultScheduleUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;
echo Pages::PROFILE;?>
?action=changeDefaultSchedule&<?php echo QueryStringKeys::SCHEDULE_ID;?>
=[scheduleId]",
						cookieName: "<?php echo $_smarty_tpl->tpl_vars['CookieName']->value;?>
",
						scheduleId: "<?php echo strtr($_smarty_tpl->tpl_vars['ScheduleId']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
",
						scriptUrl: '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
',
						selectedResources: [<?php echo implode(',',$_smarty_tpl->tpl_vars['ResourceIds']->value);?>
],
						specificDates: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SpecificDates']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>'<?php echo $_smarty_tpl->tpl_vars['d']->value->Format('Y-m-d');?>
',<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
],
						updateReservationUrl: "<?php echo $_smarty_tpl->tpl_vars['Path']->value;?>
ajax/reservation_move.php",
		                lockTableHead: <?php echo $_smarty_tpl->tpl_vars['LockTableHead']->value;?>

					};

					var schedule = new Schedule(scheduleOpts, <?php echo $_smarty_tpl->tpl_vars['ResourceGroupsAsJson']->value;?>
);
					schedule.init();
				});
		<?php }?>

	<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "scripts-common"} */
/* {block "scripts-after"} */
class Block_17799460255df35c0834fc80_66797625 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "scripts-after"} */
}
