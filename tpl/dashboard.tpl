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
{include file='globalheader.tpl' Select2=true Qtip=true Fullcalendar=true cssFiles='scripts/css/jqtree.css'}
{cssfile src="scripts/newcss/dashboard.css" rel="stylesheet"}

<div id="page-dashboard">
	<div class="container-fluid" style="padding-top:0">
		<div class="row">
			<main class="col-md-8 order-1 order-md-0">
				<section>
					<h1 class="h5">Your Booking Calendar</h1>
					<div class="overflow-h radius-lg table-shadow">
						{foreach from=$items item=dashboardItem}
							<div>{$dashboardItem->PageLoad()}</div>
						{/foreach}
					</div>
				</section>
			</main>
			<aside class="col-md-4 order-0 order-md-1 mb-3">
			<div>
				<h1 class="h5">Booking</h1>
				<div class="list-group">
					<article class="list-group-item" style="background-color: #865AAE;">
						<div class="media">
							<img src="img/calendar.svg" width="20%" style="margin-right:.75rem">
							<div class="media-body align-self-center" style"background-color:#8669AE !important;">
								<h5 class="mt-0 mb-2" style="color:white;">XRD</h5>
								<p class="mb-0" style="color:white;">Booking 1:00 AM - 3:00 AM</p>
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="margin-top:10px;" id="btnlogin">
								Login
								</button>
								<div style="display:none;" id="logoutzone" style="margin-top:10px;">
									<p style="color:white;" id="loginstamp">Login on 1:01 AM</p>
									<button type="button" class="btn btn-danger" id="btnlogout" style="margin-top:-10px;" onclick="whenlogout();">
									Logout
								</button>
								</div>
								<p style="color:#F2F2F2; display:none;" id="showtime">signed in at 1:01 PM and signed out at 1:10 PM.</p>
							</div>
						</div>
					</article>
					<article class="list-group-item">
						<div class="media">
							<div class="media-body align-self-center">
								<h5 class="mt-0 mb-2">FLS</h5>
								<p class="text-danger mb-0">Today 04:00 AM - Today 05:00 PM</p>
							</div>
						</div>
					</article>
					<article class="list-group-item">
						<div class="media">
							<div class="media-body align-self-center">
								<h5 class="mt-0 mb-2">UV</h5>
								<p class="text-danger mb-0">Mon, 08/24 09:00 AM - Wed, 08/26 05:00 PM</p>
							</div>
						</div>
					</article>
				</div>
			</div>
			<div style="margin-top:50px;">
				<h1 class="h5">Queue</h1>
				<div class="list-group">
					<article class="list-group-item">
						<div class="media">
							<div class="media-body align-self-center">
								<h5 class="mt-0 mb-2" style="color:#023e8a;">Bell Max</h5>
								<p class="mb-0" style="color:#000;">Present Queue &nbsp; &nbsp;&nbsp; &nbsp; No.A001</p>
								<p class="mb-0" style="color:#7D1F83;"><b>Your Queue &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;No.A005</b></p>
								<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#myModalQueueList">
								Queue List
								</button>
							</div>
						</div>
					</article>
				</div>
			</div>
				
			</aside>
			
		</div>
	</div>

	<!-- The Modal -->
	<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header" style="background-color: #865AAE;">
			<h4 class="modal-title" style="color:white;">Booking Login</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>

		<!-- Modal body -->
		<div class="modal-body">
			<div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">Username</label>
					<div class="col-sm-6">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Tanut.cho">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">Booking Time</label>
					<div class="col-sm-6">
					  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="1:00 AM - 3:00 AM">
					</div>
				</div>
			</div>
			<hr>
			<h5 style="text-align:center;">Information</h5>
			<div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">No. Sample</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">Solvent</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">Mode</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">Pressure</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="">
					</div>
				</div>
			</div>


		</div>

		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="button" class="btn btn-primary" onclick="closemodal();">Login</button>
		</div>

		</div>
	</div>
	</div>

	<!-- The Modal -->
	<div class="modal fade" id="myModalQueueList">
	<div class="modal-dialog">
		<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header" style="background-color: #865AAE;">
			<h4 class="modal-title" style="color:white;">Queue List</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>

		<!-- Modal body -->
		<div class="modal-body">
			<div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label text-danger">Queue A001</label>
					<div class="col-sm-6 text-danger">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="sompong.soh">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">Queue A002</label>
					<div class="col-sm-6">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="sudjai.wiw">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">Queue A003</label>
					<div class="col-sm-6">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="patama.ka">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">Queue A004</label>
					<div class="col-sm-6">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="yonlada.kaw">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label text-primary">Queue A005</label>
					<div class="col-sm-6">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="tanut.cho">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">Queue A006</label>
					<div class="col-sm-6">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="peerapon.pim">
					</div>
				</div>
			</div>
		</div>

		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>

		</div>
	</div>
	</div>

	<script type="text/javascript">

	$(document).ready(function(){
			$('[data-toggle="popover"]').popover();   
	});
		
		function closemodal() {
			$('#myModal').modal('toggle');
			$('#btnlogin').hide();
			$('#logoutzone').show();
		}

		function whenlogout() {
			$('#btnlogout').hide();
			$('#showtime').show();
			$('#loginstamp').hide();
		}
	</script>

	{jsfile src="dashboard.js"}
	{jsfile src="resourcePopup.js"}
	{jsfile src="ajax-helpers.js"}

	<script type="text/javascript">
		$(document).ready(function () {

			var dashboardOpts = {
				reservationUrl: "{Pages::RESERVATION}?{QueryStringKeys::REFERENCE_NUMBER}=",
				summaryPopupUrl: "ajax/respopup.php",
				scriptUrl: '{$ScriptUrl}'
			};

			var dashboard = new Dashboard(dashboardOpts);
			dashboard.init();
		});
	</script>
</div>

{include file='globalfooter.tpl'}