<?php
/* Smarty version 3.1.30, created on 2020-11-10 08:02:33
  from "/var/www/html/booking/tpl/Schedule/schedule.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fa9e6a9b7b071_65091628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '526a4cc6756969c979590202a1839e0e747b81f1' => 
    array (
      0 => '/var/www/html/booking/tpl/Schedule/schedule.tpl',
      1 => 1604957821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5fa9e6a9b7b071_65091628 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'displayGeneralReserved' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayGeneralReserved_2294866425fa9e6a882de38_90232869',
  ),
  'displayMyReserved' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayMyReserved_2294866425fa9e6a882de38_90232869',
  ),
  'displayMyParticipating' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayMyParticipating_2294866425fa9e6a882de38_90232869',
  ),
  'displayReserved' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayReserved_2294866425fa9e6a882de38_90232869',
  ),
  'displayPastTime' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayPastTime_2294866425fa9e6a882de38_90232869',
  ),
  'displayReservable' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayReservable_2294866425fa9e6a882de38_90232869',
  ),
  'displayRestricted' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayRestricted_2294866425fa9e6a882de38_90232869',
  ),
  'displayUnreservable' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displayUnreservable_2294866425fa9e6a882de38_90232869',
  ),
  'displaySlot' => 
  array (
    'compiled_filepath' => '/var/www/html/booking/tpl_c/526a4cc6756969c979590202a1839e0e747b81f1_0.file.schedule.tpl.php',
    'uid' => '526a4cc6756969c979590202a1839e0e747b81f1',
    'call_name' => 'smarty_template_function_displaySlot_2294866425fa9e6a882de38_90232869',
  ),
));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
























<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14424435145fa9e6a96074d4_36899673', "header");
?>




<?php if (!isset($_smarty_tpl->tpl_vars['rid']->value)) {?>

<div id="globalError" class="error no-show"></div>
<?php echo '<script'; ?>
>
$(document).ready(function(){
	initResources();

	function moveSearchPanel(){
		if(window.matchMedia('(min-width: 992px)').matches){
			// desktop, move panel to aside
			if(!$('#searchpanel').html().trim()){
				$('#searchpanel').html($("#filter_wrapper").html())
				$("#filter_wrapper").html("")
			}
		}else{
			// mobile, move panel to modal
			if(!$("#filter_wrapper").html().trim()){
				$("#filter_wrapper").html($('#searchpanel').html())
				$('#searchpanel').html("")
			}
		}
	}
	moveSearchPanel();

	window.addEventListener("resize", moveSearchPanel);
	window.addEventListener("orientationchange", moveSearchPanel);
});

var searchBoxTimeout = null;
function searchEq_searchbox() {
	clearTimeout(searchBoxTimeout);
	searchBoxTimeout = setTimeout(function(){
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
	}, 750)
}

function searchEq_selectcatg() {
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
}

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
			Swal.fire({
				icon: 'info',
				title: 'Infufficient Information',
				text: 'Please select mode to book for this equipment.'
			})
			return;
		}
	}
	else{
		 window.location.replace(url);
	}
}
<?php echo '</script'; ?>
>

<div class="container-fluid">
	<div class="row mx-0">
		<div class="col-lg-3 mb-3 d-none d-lg-block">

			

			<aside id="searchpanel" class="aside">
				<h2>Find an equipment</h2>
				<div class="form-group">
					<label for="Search" style="font-weight:bold">Search</label>
					<input
						type="text"
						id="s"
						value="<?php echo $_smarty_tpl->tpl_vars['get_s']->value;?>
"
						class="form-control ui-autocomplete-input"
						placeholder="Searching for equipment"
						autocomplete="off"
						oninput="queryInstrument()">
				</div>
				<div class="form-group">
					<label for="category" style="font-weight:bold">Categories</label>
					<select id="category" name="category" class="form-control" oninput="searchEq_selectcatg()">
						<option value=""><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AllResourceTypes'),$_smarty_tpl);?>
</option>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['object_html_options'][0][0]->ObjectHtmlOptions(array('options'=>$_smarty_tpl->tpl_vars['ResourceTypes']->value,'key'=>'Id','label'=>"Name",'selected'=>$_smarty_tpl->tpl_vars['get_bs']->value),$_smarty_tpl);?>

					</select>
				</div>
				<!--
				<div class="form-group">
					<label for="category" style="font-weight:bold">Categories</label>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="catg_check1" /><label for="catg_check1"
							class="form-check-label">Equipment's group 1</label>
					</div>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="catg_check2" /><label for="catg_check2"
							class="form-check-label">Equipment's group 2</label>
					</div>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="catg_check3" /><label for="catg_check3"
							class="form-check-label">Equipment's group 3</label>
					</div>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="catg_check4" /><label for="catg_check4"
							class="form-check-label">Equipment's group 4</label>
					</div>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="catg_check5" /><label for="catg_check5"
							class="form-check-label">Equipment's group 5</label>
					</div>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="catg_check6" /><label for="catg_check6"
							class="form-check-label">Equipment's group 6</label>
					</div>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="catg_check7" /><label for="catg_check7"
							class="form-check-label">Equipment's group 7</label>
					</div>
				</div>
				<div class="form-group">
					<label style="font-weight:bold">Type</label>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="type_book" /><label for="type_book"
							class="form-check-label">Book</label>
					</div>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="type_queue" /><label for="type_queue"
							class="form-check-label">Queue</label>
					</div>
				</div>
				<div class="form-group">
					<label style="font-weight:bold">Day to use</label>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="dtu_today" /><label for="dtu_today"
							class="form-check-label">Today</label>
					</div>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="dtu_tomorrow" /><label for="dtu_tomorrow"
							class="form-check-label">Tomorrow</label>
					</div>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="dtu_this_week" /><label for="dtu_this_week"
							class="form-check-label">This week</label>
					</div>
					<div class="form-check">
						<input
							type="checkbox"
							class="form-check-input"
							id="dtu_custom_date_range" /><label for="dtu_custom_date_range"
							class="form-check-label">Custom date range</label>
					</div>
				</div>
				-->
				<button type="button" class="btn btn-block btn-success"
					data-toggle="modal" data-target="#queue-detail">
					Simulate Queuing Modal
				</button>
			</aside>
		</div>
		<main class="col-lg-9">
			<div style="position:relative">
				<h1 class="text-center">Equipment</h1>
				<button type="button" class="btn btn-light d-lg-none" data-toggle="modal"
					data-target="#filterModal" style="position:absolute;right:0;top:0">
					<span class="material-icons">filter_alt</span>
				</button>
			</div>
			<?php $_smarty_tpl->_assignInScope('i', 0);
?>
			<?php if (count($_smarty_tpl->tpl_vars['resources']->value) > 0) {?>
			<div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resources']->value, 'resource');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
?>
					<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);
?>
					<div class="col">
						<div class="eq-card">
							<img class="card-image" src="../Web/uploads/images/<?php echo $_smarty_tpl->tpl_vars['resource']->value['image_name'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['resource']->value['name'];?>
" resourceId="<?php echo $_smarty_tpl->tpl_vars['resource']->value['resource_id'];?>
"/>
							<div class="card-tag">
								<?php if ($_smarty_tpl->tpl_vars['resource']->value['status_id'] == 1) {?>
									<div class="badge badge-danger">Queue</div>
									<div class="badge badge-primary">Book</div>
								<?php } else { ?>
									<div class="badge badge-secondary">Unavailable</div>
								<?php }?>
							</div>
							<div class="card-body">
								<div class="card-title"><?php echo $_smarty_tpl->tpl_vars['resource']->value['name'];?>
</div>
								<!-- <p>In queue: 8</p> -->
								<?php if ($_smarty_tpl->tpl_vars['resource']->value['status_id'] == 1) {?>
									<?php if ($_smarty_tpl->tpl_vars['resource']->value['resource_id'] == 2) {?>
										<select name="mode-2" id="mode-2" class="form-control mb-3">
											<option value="" selected="">-- Select Mode --</option>
											<option value="Powder mode">Powder mode</option>
											<option value="Modified mode">Modified mode</option>
										</select>
									<?php } elseif ($_smarty_tpl->tpl_vars['resource']->value['resource_id'] == 24) {?>
										<select name="mode-24" id="mode-24" class="form-control mb-3">
											<option value="" selected="">-- Select Mode --</option>
											<option value="LC coupled with QTOF-MS/MS">LC coupled with QTOF-MS/MS</option>
											<option value="ES-QTOF mode">ES-QTOF mode</option>
										</select>
									<?php }?>
									<a class="btn btn-block btn-success" onclick="onBookingClick('../Web/schedule.php?id=<?php echo $_smarty_tpl->tpl_vars['resource']->value['resource_id'];?>
&sid=<?php echo $_smarty_tpl->tpl_vars['resource']->value['schedule_id'];?>
', <?php echo $_smarty_tpl->tpl_vars['resource']->value['resource_id'];?>
)">Reserve</a>
								<?php } else { ?>
									<a class="btn btn-block btn-secondary" href="../Web/schedule.php?id=<?php echo $_smarty_tpl->tpl_vars['resource']->value['resource_id'];?>
&sid=<?php echo $_smarty_tpl->tpl_vars['resource']->value['schedule_id'];?>
&unavailable=true">View Information</a>
								<?php }?>
							</div>
						</div>
					</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<!--
				<div class="col">
					<div class="eq-card">
						<img class="card-image" src="../assets/eq.jpg" alt="Equipment" />
						<div class="card-tag">
							<div class="badge badge-danger">Queue</div>
							<div class="badge badge-primary">Book</div>
						</div>
						<div class="card-body">
							<div class="card-title">ATR-FTIR</div>
							<p>In queue: 8</p>
							<button type="button" class="btn btn-block btn-success"
								data-toggle="modal" data-target="#queue-detail">
								Reserve
							</button>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="eq-card">
						<img class="card-image" src="../assets/eq.jpg" alt="Equipment" />
						<div class="card-tag">
							<div class="badge badge-danger">Queue</div>
							<div class="badge badge-primary">Book</div>
						</div>
						<div class="card-body">
							<div class="card-title">ATR-FTIR</div>
							<p>In queue: 8</p>
							<button type="button" class="btn btn-block btn-success">
								Reserve
							</button>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="eq-card">
						<img class="card-image" src="../assets/eq.jpg" alt="Equipment" />
						<div class="card-tag">
							<div class="badge badge-danger">Queue</div>
						</div>
						<div class="card-body">
							<div class="card-title">ATR-FTIR</div>
							<p>In queue: 8</p>
							<button type="button" class="btn btn-block btn-success">
								Reserve
							</button>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="eq-card">
						<img class="card-image" src="../assets/eq.jpg" alt="Equipment" />
						<div class="card-tag">
							<div class="badge badge-primary">Book</div>
						</div>
						<div class="card-body">
							<div class="card-title">ATR-FTIR</div>
							<p>In queue: 8</p>
							<button type="button" class="btn btn-block btn-success">
								Reserve
							</button>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="eq-card">
						<img class="card-image" src="../assets/eq.jpg" alt="Equipment" />
						<div class="card-tag">
							<div class="badge badge-secondary">Blackout</div>
							<div class="badge badge-primary">Book</div>
						</div>
						<div class="card-body">
							<div class="card-title">ATR-FTIR</div>
							<p>Blackout reason: ...</p>
							<button type="button" class="btn btn-block btn-success">
								Reserve
							</button>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="eq-card eq-blackout">
						<img class="card-image" src="../assets/eq.jpg" alt="Equipment" />
						<div class="card-tag">
							<div class="badge badge-secondary">Unavailable</div>
						</div>
						<div class="card-body">
							<div class="card-title">ATR-FTIR</div>
							<p>Unavailable</p>
						</div>
					</div>
				</div>
				-->
			</div>
			<?php } else { ?>
				<div class="container h-100">
					<div class="row h-100 justify-content-center align-items-center">
						<center><h1 style=" margin: 50px 0px; color: #9c9c9c;"><b>Instruments not found.</b></h1></center>
					</div>
				</div>
			<?php }?>
		</main>
	</div>
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			<li class="page-item">
				<a class="page-link <?php if (count($_smarty_tpl->tpl_vars['pagination']->value) == 0) {?> isDisabled<?php }?>" <?php if (count($_smarty_tpl->tpl_vars['pagination']->value) != 0) {?> href="/Web/schedule.php?page=1"<?php }?>>Previous</a>
			</li>
			<li class="page-item active">
				<a class="page-link">1</a>
			</li>
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
 page-item">
					<a class="page-link" href="/Web/schedule.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value['count'];?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value['count'];?>
</a>
				</li>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<li class="page-item">
				<a class="page-link <?php if (count($_smarty_tpl->tpl_vars['pagination']->value) == 0) {?> isDisabled<?php }?>" <?php if (count($_smarty_tpl->tpl_vars['pagination']->value) != 0) {?> href="/Web/schedule.php?page=<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
"<?php }?>>Next</a>
			</li>
		</ul>
	</nav>
</div>

<style type="text/css">
	.isDisabled {
  color: currentColor;
  cursor: not-allowed;
  opacity: 0.5;
  text-decoration: none;
}
</style>



<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModal"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<aside id="filter_wrapper"></aside>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="queue-detail" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="max-width:95vw">
		<div class="modal-content">
			<div class="modal-body py-0">
				<div class="row">
					<div class="col-12 order-1 order-sm-0 col-sm-3 py-3">
						<h1>
							ATR-FTIR <span class="badge badge-success">Available</span>
						</h1>
						<img class="img-fluid d-block mx-auto mb-2" src="../assets/eq.jpg"
							alt="Equipment" width="100%">
						<p class="mb-0">
							<span class="text-danger">
								***<br>
								Maximum time: 24 Hrs.<br>
								Available in: Monday - Friday<br>
							</span>
							Person in charge: Mr. Chalantorn New (Chalantorn@gmail.com)
						</p>
					</div>
					<div id="data-app" class="col order-0 order-sm-1 py-3"
						style="background:#F6F4F9;border-left:1px #707070 solid">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h2 class="text-center">QUEUING</h2>
						<p class="lead">In queue: 8 queue(s)</p>
						<div class="overflow-y mb-3"
							style="height:30vh;background:#fff;border-radius:.3rem">
							<table class="table">
								<tbody>
									<tr>
										<td><small>No.</small> <span class="text-primary">07</span></td>
										<td>Mr.Pongpith Sim <small>(Group1)</small></td>
										<td class="text-edit">in use</td>
										<td>Running time : 21 Mins.</td>
									</tr>
									<tr>
										<td><small>No.</small> 08</td>
										<td>Mr.Chalan No <small>(Group7)</small></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td><small>No.</small> 08</td>
										<td>Mr.Chalan No <small>(Group7)</small></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td><small>No.</small> 08</td>
										<td>Mr.Chalan No <small>(Group7)</small></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td><small>No.</small> 08</td>
										<td>Mr.Chalan No <small>(Group7)</small></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td><small>No.</small> 08</td>
										<td>Mr.Chalan No <small>(Group7)</small></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td><small>No.</small> 08</td>
										<td>Mr.Chalan No <small>(Group7)</small></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td><small>No.</small> 08</td>
										<td>Mr.Chalan No <small>(Group7)</small></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td><small>No.</small> 08</td>
										<td>Mr.Chalan No <small>(Group7)</small></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td><small>No.</small> 08</td>
										<td>Mr.Chalan No <small>(Group7)</small></td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td><small>No.</small> 08</td>
										<td>Mr.Chalan No <small>(Group7)</small></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="busy"
								@input="toggleMenu()">
							<label class="form-check-label" for="busy">
								Enter when you're busy
							</label>
						</div>
						<div v-if="is_busy">
							<p class="mb-1">select your busy date & time range</p>
							<div v-for="(item, index) in busy_time" :key="index"
								class="form-row align-items-center mb-2">
								<div class="col">
									<div class="input-with-icon">
										<input v-model="item.start_date" type="date"
											class="form-control"
											placeholder="Date">
										<span class="input-icon">
											<i class="material-icons">calendar_today</i>
										</span>
									</div>
								</div>
								<div class="col">
									<div class="input-with-icon">
										<input v-model="item.start_time" type="time"
											class="form-control"
											placeholder="Time">
										<span class="input-icon">
											<i class="material-icons">schedule</i>
										</span>
									</div>
								</div>
								<div class="col-auto">to</div>
								<div class="col">
									<div class="input-with-icon">
										<input v-model="item.end_date" type="date"
											class="form-control"
											placeholder="date">
										<span class="input-icon">
											<i class="material-icons">calendar_today</i>
										</span>
									</div>
								</div>
								<div class="col">
									<div class="input-with-icon">
										<input v-model="item.end_time" type="time"
											class="form-control"
											placeholder="Time">
										<span class="input-icon">
											<i class="material-icons">schedule</i>
										</span>
									</div>
								</div>
								<div class="col-auto" v-if="busy_time.length > 1">
									<span class="custom-icon icon-delete" style="cursor:pointer"
										@click="removeBusyTime(index)"></span>
								</div>
							</div>
							<div class="text-right" v-if="busy_time.length < 3">
								<a href="javascript:void(0)" style="font-size:0.9rem"
									@click="addBusyTime">
									+ Add more busy time slot
								</a>
							</div>
						</div>
						<div class="text-center">
							<button type="button" class="btn btn-success" @click="callBookSuccess">
								Book A Queue
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 defer>
	new Vue({
		el: "#data-app",
		data() {
			return {
				is_busy: false,
				busy_time: [
					{
						start_date: null,
						start_time: null,
						end_date: null,
						end_time: null,
					}
				]
			}
		},
		methods: {
			toggleMenu() {
				this.is_busy = !this.is_busy
			},
			addBusyTime() {
				this.busy_time.length < 3 && this.busy_time.push({
					start_date: null,
					start_time: null,
					end_date: null,
					end_time: null,
				})
			},
			removeBusyTime(i) {
				this.busy_time.splice(i, 1)
			},
			callBookSuccess(){
				Swal.fire({
					icon: 'success',
					title: 'Queuing Success',
					html: '<div class="box mb-3"><div class="h2">Chalantorn Newviyawong <small>(Group4)</small></div><div class="h3">ATR-FTIR</div><div class="d-inline-block py-3 px-5"style="background:#F6F4F9;border-radius:10px"><div class="h4 mb-0">Queue No.</div><div style="font-size:5rem">15</div></div></div><div class="mb-2">Log in using the face recognize from the tool you booked when your queue arrives</div>',
					customClass: {
						confirmButton: 'btn btn-primary',
					}
				})
			}
		}
	})
<?php echo '</script'; ?>
>



<?php } else { ?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cssfile'][0][0]->IncludeCssFile(array('src'=>"scripts/newcss/booking-table.css",'rel'=>"stylesheet"),$_smarty_tpl);?>

<div id="page-schedule">
<div class="container">
<section class="box py-4">

	<?php if ($_smarty_tpl->tpl_vars['ShowResourceWarning']->value) {?>
		<div class="alert alert-warning no-resource-warning">
			<span class="fa fa-warning"></span> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoResources'),$_smarty_tpl);?>

			<a href="admin/manage_resources.php"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'AddResource'),$_smarty_tpl);?>
</a>
		</div>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['IsAccessible']->value) {?>

	<!--
	<div id="defaultSetMessage" class="alert alert-success hidden">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'DefaultScheduleSet'),$_smarty_tpl);?>

	</div>
	-->

	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1314771145fa9e6a98d62b1_29466506', "schedule_control");
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

	<div class="row-fluid">
		<div id="reservations" class="col-md-12 col-sm-12">
			<!--
			<div>
				<a href="#" id="restore-sidebar" title="Show Reservation Filter" class="hidden toggle-sidebar"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ResourceFilter'),$_smarty_tpl);?>
 <i
					class="glyphicon glyphicon-filter"></i> <i
					class="glyphicon glyphicon-chevron-right"></i></a>
			</div>
			-->

			

			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7921999645fa9e6a9a236f4_85977844', "reservations");
?>


			<section>
				<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_navigation');?>

			</section>

			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17832641665fa9e6a9a44d37_56506087', "legend");
?>

		<?php } else { ?>
			<div class="error"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'NoResourcePermission'),$_smarty_tpl);?>
</div>
		<?php }?>
	</div>

</section>
</div>
</div>

	<div class="clearfix">&nbsp;</div>
	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ScheduleId']->value;?>
" id="scheduleId"/>

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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5706182775fa9e6a9a84435_89279858', "scripts-before");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_283663595fa9e6a9afbdf0_51280450', "scripts-common");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_911967285fa9e6a9b05257_84898822', "scripts-after");
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
/* smarty_template_function_displayGeneralReserved_2294866425fa9e6a882de38_90232869 */
if (!function_exists('smarty_template_function_displayGeneralReserved_2294866425fa9e6a882de38_90232869')) {
function smarty_template_function_displayGeneralReserved_2294866425fa9e6a882de38_90232869($_smarty_tpl,$params) {
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
/*/ smarty_template_function_displayGeneralReserved_2294866425fa9e6a882de38_90232869 */
/* smarty_template_function_displayMyReserved_2294866425fa9e6a882de38_90232869 */
if (!function_exists('smarty_template_function_displayMyReserved_2294866425fa9e6a882de38_90232869')) {
function smarty_template_function_displayMyReserved_2294866425fa9e6a882de38_90232869($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReserved', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'mine','Draggable'=>true,'ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displayMyReserved_2294866425fa9e6a882de38_90232869 */
/* smarty_template_function_displayMyParticipating_2294866425fa9e6a882de38_90232869 */
if (!function_exists('smarty_template_function_displayMyParticipating_2294866425fa9e6a882de38_90232869')) {
function smarty_template_function_displayMyParticipating_2294866425fa9e6a882de38_90232869($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReserved', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'participating','ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displayMyParticipating_2294866425fa9e6a882de38_90232869 */
/* smarty_template_function_displayReserved_2294866425fa9e6a882de38_90232869 */
if (!function_exists('smarty_template_function_displayReserved_2294866425fa9e6a882de38_90232869')) {
function smarty_template_function_displayReserved_2294866425fa9e6a882de38_90232869($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php $_smarty_tpl->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'displayGeneralReserved', array('Slot'=>$_smarty_tpl->tpl_vars['Slot']->value,'Href'=>$_smarty_tpl->tpl_vars['Href']->value,'SlotRef'=>$_smarty_tpl->tpl_vars['SlotRef']->value,'OwnershipClass'=>'','Draggable'=>((string)$_smarty_tpl->tpl_vars['CanViewAdmin']->value),'ResourceId'=>$_smarty_tpl->tpl_vars['ResourceId']->value), true);?>

<?php
}}
/*/ smarty_template_function_displayReserved_2294866425fa9e6a882de38_90232869 */
/* smarty_template_function_displayPastTime_2294866425fa9e6a882de38_90232869 */
if (!function_exists('smarty_template_function_displayPastTime_2294866425fa9e6a882de38_90232869')) {
function smarty_template_function_displayPastTime_2294866425fa9e6a882de38_90232869($_smarty_tpl,$params) {
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
/*/ smarty_template_function_displayPastTime_2294866425fa9e6a882de38_90232869 */
/* smarty_template_function_displayReservable_2294866425fa9e6a882de38_90232869 */
if (!function_exists('smarty_template_function_displayReservable_2294866425fa9e6a882de38_90232869')) {
function smarty_template_function_displayReservable_2294866425fa9e6a882de38_90232869($_smarty_tpl,$params) {
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
/*/ smarty_template_function_displayReservable_2294866425fa9e6a882de38_90232869 */
/* smarty_template_function_displayRestricted_2294866425fa9e6a882de38_90232869 */
if (!function_exists('smarty_template_function_displayRestricted_2294866425fa9e6a882de38_90232869')) {
function smarty_template_function_displayRestricted_2294866425fa9e6a882de38_90232869($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<td <?php echo (($tmp = @$_smarty_tpl->tpl_vars['spantype']->value)===null||$tmp==='' ? 'col' : $tmp);?>
span="<?php echo $_smarty_tpl->tpl_vars['Slot']->value->PeriodSpan();?>
" class="restricted slot">&nbsp;</td>
<?php
}}
/*/ smarty_template_function_displayRestricted_2294866425fa9e6a882de38_90232869 */
/* smarty_template_function_displayUnreservable_2294866425fa9e6a882de38_90232869 */
if (!function_exists('smarty_template_function_displayUnreservable_2294866425fa9e6a882de38_90232869')) {
function smarty_template_function_displayUnreservable_2294866425fa9e6a882de38_90232869($_smarty_tpl,$params) {
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
/*/ smarty_template_function_displayUnreservable_2294866425fa9e6a882de38_90232869 */
/* smarty_template_function_displaySlot_2294866425fa9e6a882de38_90232869 */
if (!function_exists('smarty_template_function_displaySlot_2294866425fa9e6a882de38_90232869')) {
function smarty_template_function_displaySlot_2294866425fa9e6a882de38_90232869($_smarty_tpl,$params) {
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
/*/ smarty_template_function_displaySlot_2294866425fa9e6a882de38_90232869 */
/* {block "header"} */
class Block_14424435145fa9e6a96074d4_36899673 extends Smarty_Internal_Block
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
class Block_1314771145fa9e6a98d62b1_29466506 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="row-fluid mb-3">
			<div class="btn-search">
				<button id="backlistpage" type="button" class="btn btn-primary btn-sm">
					<i class="fa fa-th" aria-hidden="true"></i> Back to tools list page
				</button>
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
				<div class="schedule-dates col-lg-12 col-md-12 p-0" style="font-size:1rem">
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
					<a href="#" class="change-date btn btn-sm btn-success" data-year="<?php echo $_smarty_tpl->tpl_vars['TodaysDate']->value->Year();?>
" data-month="<?php echo $_smarty_tpl->tpl_vars['TodaysDate']->value->Month();?>
" data-day="<?php echo $_smarty_tpl->tpl_vars['TodaysDate']->value->Day();?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Today'),$_smarty_tpl);?>
">
						<i class="fa fa-calendar"></i>
					</a>
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

		</div>
		<div type="text" id="datepicker" style="display:none;"></div>
	<?php
}
}
/* {/block "schedule_control"} */
/* {block "reservations"} */
class Block_7921999645fa9e6a9a236f4_85977844 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<header>
					<div class="container-fluid">
						<div class="row">
							<div class="col-auto">
								<span class="h1"><?php echo $_smarty_tpl->tpl_vars['Resources']->value[0]->Name;?>
</span>
								<section>
									<span class="badge badge-edit">Available</span>
								</section>
							</div>
							<div class="col-sm">
								<p>
									Maximum time : 24 Hrs. Available in : Monday - Friday<br>
									Moderator : Mr. Chalantorn New (Chalantorn@gmail.com)
								</p>
							</div>
						</div>
						<div class="row align-items-end">
							<div class="col-sm">
								<p class="m-0">
									Select time slot to booking. <strong>(Remaining time: 12 Hrs. left)</strong>
								</p>
							</div>
							<div class="col-auto">
								<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'date_navigation');?>

							</div>
						</div>
					</div>
				</header>
				<section class="booking-table-container table-responsive my-3">
					<table id="table" class="table mb-0 table-bordered table-sm">
						<thead>
							<tr>
								<th>
									<span class="d-block d-sm-block d-md-none">&nbsp;</span>
									<?php echo $_smarty_tpl->tpl_vars['BoundDates']->value[0]->Format('F');?>

									<span class="d-block d-sm-block d-md-none">&nbsp;</span>
								</th>
								<th>
									12:00 AM
								</th>
								<th>
									1:00 AM
								</th>
								<th>
									2:00 AM
								</th>
								<th>
									3:00 AM
								</th>
								<th>
									4:00 AM
								</th>
								<th>
									5:00 AM
								</th>
								<th>
									6:00 AM
								</th>
								<th>
									7:00 AM
								</th>
								<th>
									8:00 AM
								</th>
								<th>
									9:00 AM
								</th>
								<th>
									10:00 AM
								</th>
								<th>
									11:00 AM
								</th>
								<th>
									12:00 AM
								</th>
								<th>
									1:00 PM
								</th>
								<th>
									2:00 PM
								</th>
								<th>
									3:00 PM
								</th>
								<th>
									4:00 PM
								</th>
								<th>
									5:00 PM
								</th>
								<th>
									6:00 PM
								</th>
								<th>
									7:00 PM
								</th>
								<th>
									8:00 PM
								</th>
								<th>
									9:00 PM
								</th>
								<th>
									10:00 PM
								</th>
								<th>
									11:00 PM
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $_smarty_tpl->_assignInScope('weekday_classname', array("sun","mon","tue","wed","thu","fri","sat"));
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
							<?php $_smarty_tpl->_assignInScope('resource', $_smarty_tpl->tpl_vars['Resources']->value[0]);
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
							<tr class="list-complete-item <?php echo $_smarty_tpl->tpl_vars['weekday_classname']->value[$_smarty_tpl->tpl_vars['date']->value->Weekday()];?>
">
								<td>
									<span><?php echo $_smarty_tpl->tpl_vars['date']->value->Format('l');?>
</span>
									<span><?php echo $_smarty_tpl->tpl_vars['date']->value->Format('d');?>
</span>
									<span><?php echo $_smarty_tpl->tpl_vars['date']->value->Format('F');?>
</span>
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
							
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['flush'][0][0]->Flush(array(),$_smarty_tpl);?>

							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</tbody>
						<tfoot>
							<tr>
								<th>
									<span class="d-block d-sm-block d-md-none">&nbsp;</span>
									<?php echo $_smarty_tpl->tpl_vars['BoundDates']->value[0]->Format('F');?>

									<span class="d-block d-sm-block d-md-none">&nbsp;</span>
								</th>
								<th>
									12:00 AM
								</th>
								<th>
									1:00 AM
								</th>
								<th>
									2:00 AM
								</th>
								<th>
									3:00 AM
								</th>
								<th>
									4:00 AM
								</th>
								<th>
									5:00 AM
								</th>
								<th>
									6:00 AM
								</th>
								<th>
									7:00 AM
								</th>
								<th>
									8:00 AM
								</th>
								<th>
									9:00 AM
								</th>
								<th>
									10:00 AM
								</th>
								<th>
									11:00 AM
								</th>
								<th>
									12:00 AM
								</th>
								<th>
									1:00 PM
								</th>
								<th>
									2:00 PM
								</th>
								<th>
									3:00 PM
								</th>
								<th>
									4:00 PM
								</th>
								<th>
									5:00 PM
								</th>
								<th>
									6:00 PM
								</th>
								<th>
									7:00 PM
								</th>
								<th>
									8:00 PM
								</th>
								<th>
									9:00 PM
								</th>
								<th>
									10:00 PM
								</th>
								<th>
									11:00 PM
								</th>
							</tr>
						</tfoot>
					</table>
				</section>
			<?php
}
}
/* {/block "reservations"} */
/* {block "legend"} */
class Block_17832641665fa9e6a9a44d37_56506087 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<footer class="booking-table-badges text-right">
					<span class="badge booking-badge-available"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Reservable'),$_smarty_tpl);?>
</span>
					<span class="badge booking-badge-blackout"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Unreservable'),$_smarty_tpl);?>
</span>
					<span class="badge booking-badge-reserved"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Reserved'),$_smarty_tpl);?>
</span>
					<?php if ($_smarty_tpl->tpl_vars['LoggedIn']->value) {?>
					<span class="badge booking-badge-self"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'MyReservation'),$_smarty_tpl);?>
</span>
					<span class="badge booking-badge-participant"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Participant'),$_smarty_tpl);?>
</span>
					<?php }?>
					<span class="badge booking-badge-pending pending"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Pending'),$_smarty_tpl);?>
</span>
					<span class="badge booking-badge-passed"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Past'),$_smarty_tpl);?>
</span>
					<span class="badge booking-badge-restricted"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Restricted'),$_smarty_tpl);?>
</span>
				</footer>
			<?php
}
}
/* {/block "legend"} */
/* {block "scripts-before"} */
class Block_5706182775fa9e6a9a84435_89279858 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "scripts-before"} */
/* {block "scripts-common"} */
class Block_283663595fa9e6a9afbdf0_51280450 extends Smarty_Internal_Block
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
class Block_911967285fa9e6a9b05257_84898822 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "scripts-after"} */
}
