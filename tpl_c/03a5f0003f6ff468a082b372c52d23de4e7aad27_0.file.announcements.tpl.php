<?php
/* Smarty version 3.1.30, created on 2019-12-13 16:19:42
  from "/var/www/html/booking/tpl/Dashboard/announcements.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df357ae5052f0_21821115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03a5f0003f6ff468a082b372c52d23de4e7aad27' => 
    array (
      0 => '/var/www/html/booking/tpl/Dashboard/announcements.tpl',
      1 => 1551196423,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df357ae5052f0_21821115 (Smarty_Internal_Template $_smarty_tpl) {
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<?php echo '<script'; ?>
 type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"><?php echo '</script'; ?>
>
<style type="text/css">
	#table_id_info{
		display: none;
	}
	.row:before {
	    display: table;
	    content: none;
	}
</style>
<?php echo '<script'; ?>
 src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"><?php echo '</script'; ?>
>
<div class="dashboard" id="announcementsDashboard">
	<div class="dashboardHeader">
		<div class="pull-left"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Announcements"),$_smarty_tpl);?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['Announcements']->value);?>
</span></div>
		<div class="pull-right">
			<a href="#" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ShowHide'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>"Announcements"),$_smarty_tpl);?>
">
				<i class="glyphicon"></i>
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="dashboardContents">
		<table id="table_announ" class="display" style="width: 99% !important">
		    <thead>
		        <tr>
		        	<th style="width: 5% !important;text-align: center !important;"  rowspan="2">No</th>
					<th style="width: 20%% !important;text-align: center !important;"  rowspan="2">Instrument</th>
		            <th style="width: 30% !important;text-align: center !important;"  rowspan="2">Event Title</th>
		            <th style="text-align: center !important;" colspan="2"> Event Period </th>
		            <th style="width: 15% !important;text-align: center !important;" rowspan="2">Announcement date</th>
		        </tr>
				 <tr>
		        	<th style="width: 15% !important;text-align: center !important;">Start </th>
		            <th style="width: 15% !important;text-align: center !important;">End</th>
		        </tr>
		    </thead>
			<tbody>
			<?php $_smarty_tpl->_assignInScope('i', 0);
?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Announcements']->value, 'each');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['each']->value) {
?>
					<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['each']->value->IsBlackout()) {?>
								<?php echo $_smarty_tpl->tpl_vars['each']->value->ResourcesBlackout();?>

							<?php } else { ?>
								-
							<?php }?>
						</td>
						<td>
							<b><?php echo nl2br($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['url2link'][0][0]->CreateUrl(html_entity_decode($_smarty_tpl->tpl_vars['each']->value->Text())));?>
</b>
						</td>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['each']->value->IsBlackout()) {?>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['each']->value->StartBlackout(),'format'=>'D, m/d h:i A'),$_smarty_tpl);?>

							<?php } else { ?>
								-
							<?php }?>
						</td>
						<td>
							<?php if ($_smarty_tpl->tpl_vars['each']->value->IsBlackout()) {?>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['each']->value->EndBlackout(),'format'=>'D, m/d h:i A'),$_smarty_tpl);?>

							<?php } else { ?>
								-
							<?php }?>
						</td>
						<td>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0][0]->FormatDate(array('date'=>$_smarty_tpl->tpl_vars['each']->value->Start(),'format'=>'D, m/d'),$_smarty_tpl);?>
 <?php echo date('h:i A',strtotime($_smarty_tpl->tpl_vars['each']->value->timeStart()));?>

						</td>
					</tr>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</tbody>
		</table>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<?php echo '<script'; ?>
 type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready( function () {
	    $('#table_announ').DataTable();
	} );
<?php echo '</script'; ?>
><?php }
}
