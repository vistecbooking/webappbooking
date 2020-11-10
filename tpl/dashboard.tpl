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
	<div class="container-fluid">
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
						{foreach from=$items item=dashboardItem}
							<div>{$dashboardItem->PageLoad()}</div>
						{/foreach}
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