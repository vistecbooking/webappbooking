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

{* All of the slot display formatting *}

{function name=displayGeneralReserved}
	{if $Slot->IsPending()}
		{assign var=class value='pending'}
	{/if}
	{if $Slot->HasCustomColor()}
		{assign var=color value='style="background-color:'|cat:$Slot->Color()|cat:' !important;color:'|cat:$Slot->TextColor()|cat:' !important;"'}
	{/if}
	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}" class="reserved {$class} {$OwnershipClass} clickres slot"
		resid="{$Slot->Id()}" {$color} {if $Draggable}draggable="true"{/if} data-resourceId="{$ResourceId}"
		id="{$Slot->Id()}|{$Slot->Date()->Format('Ymd')}">{$Slot->Label($SlotLabelFactory)|escapequotes}</td>
{/function}

{function name=displayMyReserved}
	{call name=displayGeneralReserved Slot=$Slot Href=$Href SlotRef=$SlotRef OwnershipClass='mine' Draggable=true ResourceId=$ResourceId}
{/function}

{function name=displayMyParticipating}
	{call name=displayGeneralReserved Slot=$Slot Href=$Href SlotRef=$SlotRef OwnershipClass='participating' ResourceId=$ResourceId}
{/function}

{function name=displayReserved}
	{call name=displayGeneralReserved Slot=$Slot Href=$Href SlotRef=$SlotRef OwnershipClass='' Draggable="{$CanViewAdmin}" ResourceId=$ResourceId}
{/function}

{function name=displayPastTime}
	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}" ref="{$SlotRef}"
		class="pasttime slot" Draggable="{$CanViewAdmin}" resid="{$Slot->Id()}" data-resourceId="{$ResourceId}">{$Slot->Label($SlotLabelFactory)|escapequotes}</td>
{/function}

{function name=displayReservable}
	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}" ref="{$SlotRef}" class="reservable clickres slot" data-href="{$Href}"
		data-start="{$Slot->BeginDate()->Format('Y-m-d H:i:s')|escape:url}" data-end="{$Slot->EndDate()->Format('Y-m-d H:i:s')|escape:url}"
		data-resourceId="{$ResourceId}">&nbsp;</td>
{/function}

{function name=displayRestricted}
	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}" class="restricted slot">&nbsp;</td>
{/function}

{function name=displayUnreservable}
	<td {$spantype|default:'col'}span="{$Slot->PeriodSpan()}"
		class="unreservable slot">{$Slot->Label($SlotLabelFactory)|escape}</td>
{/function}

{function name=displaySlot}
	{if $quota_limit > 0 || $CanViewAdmin == true}
		{assign var=hasQuota value=true}
	{else}
		{assign var=hasQuota value=false}
	{/if}
	{call name=$DisplaySlotFactory->GetFunction($Slot, $AccessAllowed, $Unavailable, $hasQuota) Slot=$Slot Href=$Href SlotRef=$SlotRef ResourceId=$ResourceId}
{/function}

{* End slot display formatting *}

{block name="header"}
	{include file='globalheader.tpl' Qtip=true Select2=true FloatThead=true cssFiles='scripts/css/jqtree.css' printCssFiles='css/schedule.print.css'}
{/block}

{*

███████╗ ██████╗ ██╗   ██╗██╗██████╗ ███╗   ███╗███████╗███╗   ██╗████████╗
██╔════╝██╔═══██╗██║   ██║██║██╔══██╗████╗ ████║██╔════╝████╗  ██║╚══██╔══╝
█████╗  ██║   ██║██║   ██║██║██████╔╝██╔████╔██║█████╗  ██╔██╗ ██║   ██║
██╔══╝  ██║▄▄ ██║██║   ██║██║██╔═══╝ ██║╚██╔╝██║██╔══╝  ██║╚██╗██║   ██║
███████╗╚██████╔╝╚██████╔╝██║██║     ██║ ╚═╝ ██║███████╗██║ ╚████║   ██║
╚══════╝ ╚══▀▀═╝  ╚═════╝ ╚═╝╚═╝     ╚═╝     ╚═╝╚══════╝╚═╝  ╚═══╝   ╚═╝

*}

{if !isset($rid)}

<div id="globalError" class="error no-show"></div>
<script>
$(document).ready(function(){
	initResources();

	$("#s").change(function() {
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
	})

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
</script>

<div class="container-fluid">
	<div class="row mx-0">
		<div class="col-lg-3 mb-3 d-none d-lg-block">
			<aside class="aside">
				<h2>Find an equipment</h2>
				<div class="form-group">
					<label for="Search" style="font-weight:bold">Search</label>
					<input
						type="text"
						id="s"
						value="{$get_s}"
						class="form-control ui-autocomplete-input"
						placeholder="Searching for equipment"
						autocomplete="off">
				</div>
				<div class="form-group">
					<label for="category" style="font-weight:bold">Categories</label>
					<select id="category" name="category" class="form-control">
						<option value="">{translate key=AllResourceTypes}</option>
						{object_html_options options=$ResourceTypes key='Id' label="Name" selected=$get_bs}
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
			</aside>
		</div>
		<main class="col-lg-9">
			<div class="row">
				<div class="col">
					<h1 class="text-center">Equipment</h1>
				</div>
				<div class="col-auto d-lg-none">
					<button type="button" class="btn btn-light" data-toggle="modal"
						data-target="#filterModal">
						<span class="material-icons">filter_alt</span>
					</button>
				</div>
			</div>
			{$i=0}
			{if count($resources)>0}
			<div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4">
				{foreach from=$resources item=resource}
					{$i = $i+1}
					<div class="col">
						<div class="eq-card">
							<img class="card-image" src="../Web/uploads/images/{$resource['image_name']}" alt="{$resource['name']}" resourceId="{$resource['resource_id']}"/>
							<div class="card-tag">
								{if $resource['status_id'] ==1}
									<div class="badge badge-danger">Queue</div>
									<div class="badge badge-primary">Book</div>
								{else}
									<div class="badge badge-secondary">Unavailable</div>
								{/if}
							</div>
							<div class="card-body">
								<div class="card-title">{$resource['name']}</div>
								<!-- <p>In queue: 8</p> -->
								{if $resource['status_id'] ==1}
									{if $resource['resource_id'] == 2}
										<select name="mode-2" id="mode-2" class="form-control mb-3">
											<option value="" selected="">-- Select Mode --</option>
											<option value="Powder mode">Powder mode</option>
											<option value="Modified mode">Modified mode</option>
										</select>
									{elseif $resource['resource_id'] == 24}
										<select name="mode-24" id="mode-24" class="form-control mb-3">
											<option value="" selected="">-- Select Mode --</option>
											<option value="LC coupled with QTOF-MS/MS">LC coupled with QTOF-MS/MS</option>
											<option value="ES-QTOF mode">ES-QTOF mode</option>
										</select>
									{/if}
									<a class="btn btn-block btn-success" onclick="onBookingClick('../Web/schedule.php?id={$resource['resource_id']}&sid={$resource['schedule_id']}', {$resource['resource_id']})">Reserve</a>
								{else}
									<a class="btn btn-block btn-secondary" href="../Web/schedule.php?id={$resource['resource_id']}&sid={$resource['schedule_id']}&unavailable=true">View Information</a>
								{/if}
							</div>
						</div>
					</div>
				{/foreach}
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
			{else}
				<div class="container h-100">
					<div class="row h-100 justify-content-center align-items-center">
						<center><h1 style=" margin: 50px 0px; color: #9c9c9c;"><b>Instruments not found.</b></h1></center>
					</div>
				</div>
			{/if}
		</main>
	</div>
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			<li class="page-item">
				<a class="page-link {if count($pagination) == 0} isDisabled{/if}" {if count($pagination) != 0} href="/Web/schedule.php?page=1"{/if}>Previous</a>
			</li>
			<li class="page-item active">
				<a class="page-link">1</a>
			</li>
			{$i=0}
			{foreach from=$pagination item=page}
				{$i = $i+1}
				<li class="{$page['class']} page-item">
					<a class="page-link" href="/Web/schedule.php?page={$page['count']}">{$page['count']}</a>
				</li>
			{/foreach}
			<li class="page-item">
				<a class="page-link {if count($pagination) == 0} isDisabled{/if}" {if count($pagination) != 0} href="/Web/schedule.php?page={$nextPage}"{/if}>Next</a>
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



{*

████████╗██╗███╗   ███╗███████╗████████╗ █████╗ ██████╗ ██╗     ███████╗
╚══██╔══╝██║████╗ ████║██╔════╝╚══██╔══╝██╔══██╗██╔══██╗██║     ██╔════╝
   ██║   ██║██╔████╔██║█████╗     ██║   ███████║██████╔╝██║     █████╗
   ██║   ██║██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██╔══██╗██║     ██╔══╝
   ██║   ██║██║ ╚═╝ ██║███████╗   ██║   ██║  ██║██████╔╝███████╗███████╗
   ╚═╝   ╚═╝╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝╚═════╝ ╚══════╝╚══════╝

*}

{else}

<div id="page-schedule">

	{if $ShowResourceWarning}
		<div class="alert alert-warning no-resource-warning">
			<span class="fa fa-warning"></span> {translate key=NoResources}
			<a href="admin/manage_resources.php">{translate key=AddResource}</a>
		</div>
	{/if}

	{if $IsAccessible}

	<div id="defaultSetMessage" class="alert alert-success hidden">
		{translate key=DefaultScheduleSet}
	</div>

	{block name="schedule_control"}
		<div class="row-fluid">
			<div class="btn-search">
				<button id="backlistpage" type="button" class="btn btn-primary btn-sm"><i class="fa fa-th" aria-hidden="true"></i> Back to tools list page</button>
				<script type="text/javascript">
					document.getElementById("backlistpage").onclick = function () {
						location.href = "schedule.php";
					};
				</script>
				<div style="float: right; right:0">
					<button type="button" id="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="left"
						title="How to book an instrument: Click and drag on table as your preferred time.">
						<i class="fa fa-2 fa-info"></i>
					</button>
				</div>
			</div>

			{capture name="date_navigation"}
				<div class="row-fluid">
				<div class="schedule-dates col-lg-12 col-md-12">
					<div class="title_str" style="display: none;" >
						{foreach from=$Resources item=resource name=resource_loop}
							{if $resource->Id == $rid}
								{assign var=resourceNameTitle value=$resource->Name}
							{/if}
						{/foreach}
							{if $mode == 'ES-QTOF mode' }
								<h1>ES-QTOF-MS/MS {if !$CanViewAdmin} <br /> (Remaining time: {$quota_limit_txt} hrs left) {/if} </h1>
							{else if $mode == 'Modified mode'}
								<h1>{$resourceNameTitle} {if !$CanViewAdmin} <br /> (Remaining time: no limit) {/if} </h1>
							{else}
								<h1>{$resourceNameTitle} {if !$CanViewAdmin} <br /> (Remaining time: {$quota_limit_txt} hrs left) {/if} </h1>
							{/if}

					</div>
					{assign var=TodaysDate value=Date::Now()}
					<a href="#" class="change-date btn-link btn-success" data-year="{$TodaysDate->Year()}" data-month="{$TodaysDate->Month()}" data-day="{$TodaysDate->Day()}" alt="{translate key=Today}"><i class="fa fa-home"></i></a>
					{assign var=FirstDate value=$DisplayDates->GetBegin()}
					{assign var=LastDate value=$DisplayDates->GetEnd()->AddDays(-1)}
					<a href="#" class="change-date" data-year="{$PreviousDate->Year()}" data-month="{$PreviousDate->Month()}"
					   data-day="{$PreviousDate->Day()}">{html_image src="arrow_large_left.png" alt="{translate key=Back}"}</a>
					{formatdate date=$FirstDate} - {formatdate date=$LastDate}
					<a href="#" class="change-date" data-year="{$NextDate->Year()}" data-month="{$NextDate->Month()}"
					   data-day="{$NextDate->Day()}">{html_image src="arrow_large_right.png" alt="{translate key=Forward}"}</a>

					{if $ShowFullWeekLink}
						<a href="{add_querystring key=SHOW_FULL_WEEK value=1}"
						   id="showFullWeek">({translate key=ShowFullWeek})</a>
					{/if}
				</div>
				</div>
			{/capture}

			{$smarty.capture.date_navigation}
		</div>
		<div type="text" id="datepicker" style="display:none;"></div>
	{/block}

	<script type="text/javascript">
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
	</script>

	<div class="row-fluid">
		<div id="reservations" class="col-md-12 col-sm-12">
			<div>
				<a href="#" id="restore-sidebar" title="Show Reservation Filter" class="hidden toggle-sidebar">{translate key=ResourceFilter} <i
					class="glyphicon glyphicon-filter"></i> <i
					class="glyphicon glyphicon-chevron-right"></i></a>
			</div>

			{*

				████████╗ █████╗ ██████╗ ██╗     ███████╗
				╚══██╔══╝██╔══██╗██╔══██╗██║     ██╔════╝
					 ██║   ███████║██████╔╝██║     █████╗
					 ██║   ██╔══██║██╔══██╗██║     ██╔══╝
					 ██║   ██║  ██║██████╔╝███████╗███████╗
					 ╚═╝   ╚═╝  ╚═╝╚═════╝ ╚══════╝╚══════╝

			*}

			{block name="reservations"}

				{assign var=TodaysDate value=Date::Now()}
				{foreach from=$BoundDates item=date}
				{assign var=ts value=$date->Timestamp()}
				{$periods.$ts = $DailyLayout->GetPeriods($date, true)}
				{if $periods[$ts]|count == 0}{continue}{*dont show if there are no slots*}{/if}
				<div style="position:relative;">
					<table class="reservations" border="1" cellpadding="0" width="100%">
						<thead>
							{if $date->DateEquals($TodaysDate)}
								<tr class="today">
							{else}
								<tr>
							{/if}
								<td class="resdate">{formatdate date=$date key="schedule_daily"}</td>
								{foreach from=$periods.$ts item=period}
									<td class="reslabel" colspan="{$period->Span()}">{$period->Label($date)}</td>
								{/foreach}
							</tr>
						</thead>
						<tbody>
							{* foreach from=$Resources item=resource name=resource_loop *}
							{assign var=resource value=$Resources[0]}
							{if $resource->Id == $rid}
							{assign var=resourceId value=$resource->Id}
							{assign var=slots value=$DailyLayout->GetLayout($date, $resourceId)}
							{assign var=href value="{$CreateReservationPage}?rid={$resource->Id}&sid={$ScheduleId}&rd={formatdate date=$date key=url}{if isset($mode)}&mode={$mode}{/if}"}
							<tr class="slots">
								<td class="resourcename" {if $resource->HasColor()}style="background-color:{$resource->GetColor()}"{/if}>
									{if $resource->CanAccess && $DailyLayout->IsDateReservable($date)}
										<a href="{$href}" resourceId="{$resource->Id}" class="resourceNameSelector"
											{if $mode == 'ES-QTOF mode' }
												{if $resource->HasColor()}style="color:{$resource->GetTextColor()}"{/if}>ES-QTOF-MS/MS</a>
											{else}
												{if $resource->HasColor()}style="color:{$resource->GetTextColor()}"{/if}>{$resource->Name}</a>
											{/if}
									{else}
										{if $mode == 'ES-QTOF mode' }
											<span resourceId="{$resource->Id}" resourceId="{$resource->Id}"
												class="resourceNameSelector"
												{if $resource->HasColor()}style="color:{$resource->GetTextColor()}"{/if}>ES-QTOF-MS/MS</span>
										{else}
											<span resourceId="{$resource->Id}" resourceId="{$resource->Id}"
												class="resourceNameSelector"
												{if $resource->HasColor()}style="color:{$resource->GetTextColor()}"{/if}>{$resource->Name}</span>
										{/if}
									{/if}
									{formatdate date=$date key="schedule_daily"}
								</td>
								{foreach from=$slots item=slot}
									{assign var=slotRef value="{$slot->BeginDate()->Format('YmdHis')}{$resourceId}"}
									{displaySlot Slot=$slot Href="$href" AccessAllowed=$resource->CanAccess SlotRef=$slotRef ResourceId=$resourceId}
								{/foreach}
								</tr>
							{/if}
							{* /foreach *}
						</tbody>
					</table>
				</div>
				{flush}
				{/foreach}
			{/block}
		{else}
			<div class="error">{translate key=NoResourcePermission}</div>
		{/if}
	</div>
</div>

	{block name="legend"}
		<div class="hidden-xs row-fluid col-sm-12 schedule-legend">
			<div class="center">
				<div class="legend reservable">{translate key=Reservable}</div>
				<div class="legend unreservable">{translate key=Unreservable}</div>
				<div class="legend reserved">{translate key=Reserved}</div>
				{if $LoggedIn}
				<div class="legend reserved mine">{translate key=MyReservation}</div>
				<div class="legend reserved participating">{translate key=Participant}</div>
				{/if}
				<div class="legend reserved pending">{translate key=Pending}</div>
				<div class="legend pasttime">{translate key=Past}</div>
				<div class="legend restricted">{translate key=Restricted}</div>
			</div>
		</div>
	{/block}

	<div class="clearfix">&nbsp;</div>
	<input type="hidden" value="{$ScheduleId}" id="scheduleId"/>

	<div class="row-fluid no-margin">
		<div class="col-xs-9 visible-md visible-lg">&nbsp;</div>
		{$smarty.capture.date_navigation}
	</div>

</div>

<form id="moveReservationForm">
	<input id="moveReferenceNumber" type="hidden" {formname key=REFERENCE_NUMBER} />
	<input id="moveStartDate" type="hidden" {formname key=BEGIN_DATE} />
	<input id="moveResourceId" type="hidden" {formname key=RESOURCE_ID} />
	<input id="moveSourceResourceId" type="hidden" {formname key=ORIGINAL_RESOURCE_ID} />
	{csrf_token}
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

{block name="scripts-before"}

{/block}

{block name="scripts-common"}

	{jsfile src="js/moment.min.js"}
	{jsfile src="schedule.js"}
	{jsfile src="resourcePopup.js"}
	{jsfile src="js/tree.jquery.js"}
	{jsfile src="js/jquery.cookie.js"}
	{jsfile src="ajax-helpers.js"}

	<script type="text/javascript">

		{if $LoadViewOnly}
			$(document).ready(function () {
					var scheduleOptions = {
						reservationUrlTemplate: "view-reservation.php?{QueryStringKeys::REFERENCE_NUMBER}=[referenceNumber]",
						summaryPopupUrl: "ajax/respopup.php",
						cookieName: "{$CookieName}",
						scheduleId: "{$ScheduleId}",
						scriptUrl: '{$ScriptUrl}',
						selectedResources: [{','|implode:$ResourceIds}],
						specificDates: [{foreach from=$SpecificDates item=d}'{$d->Format('Y-m-d')}',{/foreach}]
					};
					var schedule = new Schedule(scheduleOptions, {$ResourceGroupsAsJson});
					{if $AllowGuestBooking}
					schedule.init();
					schedule.initUserDefaultSchedule(true);
					{else}
					schedule.initNavigation();
					schedule.initRotateSchedule();
					schedule.initReservations();
					schedule.initResourceFilter();
					schedule.initResources();
					schedule.initUserDefaultSchedule(true);
					{/if}
				});
		{else}
			$(document).ready(function () {
					var scheduleOpts = {
						reservationUrlTemplate: "{$Path}{Pages::RESERVATION}?{QueryStringKeys::REFERENCE_NUMBER}=[referenceNumber]",
						summaryPopupUrl: "{$Path}ajax/respopup.php",
						setDefaultScheduleUrl: "{$Path}{Pages::PROFILE}?action=changeDefaultSchedule&{QueryStringKeys::SCHEDULE_ID}=[scheduleId]",
						cookieName: "{$CookieName}",
						scheduleId: "{$ScheduleId|escape:'javascript'}",
						scriptUrl: '{$ScriptUrl}',
						selectedResources: [{','|implode:$ResourceIds}],
						specificDates: [{foreach from=$SpecificDates item=d}'{$d->Format('Y-m-d')}',{/foreach}],
						updateReservationUrl: "{$Path}ajax/reservation_move.php",
		                lockTableHead: {$LockTableHead}
					};

					var schedule = new Schedule(scheduleOpts, {$ResourceGroupsAsJson});
					schedule.init();
				});
		{/if}

	</script>
{/block}

{block name="scripts-after"}

{/block}


{control type="DatePickerSetupControl"
ControlId='datepicker'
DefaultDate=$FirstDate
NumberOfMonths=$PopupMonths
ShowButtonPanel='true'
OnSelect='dpDateChanged'
FirstDay=$FirstWeekday}
{/if}

{jsfile src="js/tree.jquery.js"}
{jsfile src="js/jquery.cookie.js"}
{jsfile src="ajax-helpers.js"}
{jsfile src="resourceFindAtimePopup.js"}

{include file='globalfooter.tpl'}
{if $quota_limit == 0}
	<script type="text/javascript">
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
	</script>
{/if}
<style>
	td.resourcename span {
		color: #000 !important;
	}
	.tooltip {
		z-index: 1040 !important;
	}
</style>