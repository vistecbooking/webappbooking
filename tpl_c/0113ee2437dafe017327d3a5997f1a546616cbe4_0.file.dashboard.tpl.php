<?php
/* Smarty version 3.1.30, created on 2020-11-16 07:21:54
  from "/var/www/html/booking/tpl/dashboard.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fb1c622a7bf43_44088299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0113ee2437dafe017327d3a5997f1a546616cbe4' => 
    array (
      0 => '/var/www/html/booking/tpl/dashboard.tpl',
      1 => 1605477467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_5fb1c622a7bf43_44088299 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Select2'=>true,'Qtip'=>true,'Fullcalendar'=>true,'cssFiles'=>'scripts/css/jqtree.css'), 0, false);
?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cssfile'][0][0]->IncludeCssFile(array('src'=>"scripts/newcss/dashboard.css",'rel'=>"stylesheet"),$_smarty_tpl);?>


<div id="page-dashboard">
	<div class="container-fluid" style="padding-top:0">
		<div class="row">
			<main class="col-md-8 order-1 order-md-0">
				<section class="mb-3">
					<h1 class="h5">Your Queue</h1>
					<div class="overflow-x">
						<div class="d-flex">
							<div class="queue-card">
								<div class="queue-body">
									<span class="title">RC-QTOF</span>
									<span>waiting for 2 people</span>
								</div>
								<div class="queue-number">03</div>
							</div>
							<div class="queue-card">
								<div class="queue-body">
									<span class="title">RC-QTOF</span>
									<span>waiting for 2 people</span>
								</div>
								<div class="queue-number">03</div>
							</div>
							<div class="queue-card">
								<div class="queue-body">
									<span class="title">RC-QTOF</span>
									<span>waiting for 2 people</span>
								</div>
								<div class="queue-number">03</div>
							</div>
							<div class="queue-card">
								<div class="queue-body">
									<span class="title">RC-QTOF</span>
									<span>waiting for 2 people</span>
								</div>
								<div class="queue-number">03</div>
							</div>
							<div class="queue-card">
								<div class="queue-body">
									<span class="title">RC-QTOF</span>
									<span>waiting for 2 people</span>
								</div>
								<div class="queue-number">03</div>
							</div>
						</div>
					</div>
				</section>
				<section>
					<h1 class="h5">Your Booking Calendar</h1>
					<div class="overflow-h radius-lg table-shadow">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'dashboardItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dashboardItem']->value) {
?>
							<div><?php echo $_smarty_tpl->tpl_vars['dashboardItem']->value->PageLoad();?>
</div>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</div>
				</section>
			</main>
			<aside class="col-md-4 order-0 order-md-1 mb-3">
				<h1 class="h5">Announcement</h1>
				<div class="list-group">
					<article class="list-group-item">
						<div class="media">
							<img src="img/calendar.svg" width="20%" style="margin-right:.75rem">
							<div class="media-body align-self-center">
								<h5 class="mt-0 mb-2">XRD, WDXRF</h5>
								<p class="mb-0">[Black out] 1st Preventive Maintenance (PM)</p>
								<p class="text-danger mb-0">Mon, 08/24 09:00 AM - Wed, 08/26 05:00 PM</p>
							</div>
						</div>
					</article>
					<article class="list-group-item">
						<div class="media">
							<img src="img/calendar.svg" width="20%" style="margin-right:.75rem">
							<div class="media-body align-self-center">
								<h5 class="mt-0 mb-2">XRD, WDXRF</h5>
								<p class="mb-0">[Black out] 1st Preventive Maintenance (PM)</p>
								<p class="text-danger mb-0">Mon, 08/24 09:00 AM - Wed, 08/26 05:00 PM</p>
							</div>
						</div>
					</article>
					<article class="list-group-item">
						<div class="media">
							<img src="img/calendar.svg" width="20%" style="margin-right:.75rem">
							<div class="media-body align-self-center">
								<h5 class="mt-0 mb-2">XRD, WDXRF</h5>
								<p class="mb-0">[Black out] 1st Preventive Maintenance (PM)</p>
								<p class="text-danger mb-0">Mon, 08/24 09:00 AM - Wed, 08/26 05:00 PM</p>
							</div>
						</div>
					</article>
					<article class="list-group-item">
						<div class="media">
							<img src="img/calendar.svg" width="20%" style="margin-right:.75rem">
							<div class="media-body align-self-center">
								<h5 class="mt-0 mb-2">XRD, WDXRF</h5>
								<p class="mb-0">[Black out] 1st Preventive Maintenance (PM)</p>
								<p class="text-danger mb-0">Mon, 08/24 09:00 AM - Wed, 08/26 05:00 PM</p>
							</div>
						</div>
					</article>
					<article class="list-group-item">
						<div class="media">
							<img src="img/calendar.svg" width="20%" style="margin-right:.75rem">
							<div class="media-body align-self-center">
								<h5 class="mt-0 mb-2">XRD, WDXRF</h5>
								<p class="mb-0">[Black out] 1st Preventive Maintenance (PM)</p>
								<p class="text-danger mb-0">Mon, 08/24 09:00 AM - Wed, 08/26 05:00 PM</p>
							</div>
						</div>
					</article>
				</div>
			</aside>
		</div>
	</div>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"dashboard.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"resourcePopup.js"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>


	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function () {

			var dashboardOpts = {
				reservationUrl: "<?php echo Pages::RESERVATION;?>
?<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=",
				summaryPopupUrl: "ajax/respopup.php",
				scriptUrl: '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
'
			};

			var dashboard = new Dashboard(dashboardOpts);
			dashboard.init();
		});
	<?php echo '</script'; ?>
>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
