{*
Copyright 2012-2017 Nick Korbel

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
{include file='globalheader.tpl' cssFiles="scripts/js/jqplot/jquery.jqplot.min.css"}


<div id="page-common-reports">

	<div class="container">
    <div class="box box-lg mb-4">
      <h2>Common reports</h2>
	  <div id="report-list">
		<div class="table-responsive mb-3">
				<table class="table table-report">
				<tbody>
					<tr>
					<td>Reserved Instruments</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::RESERVATIONS_TODAY}">Today</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::RESERVATIONS_THISWEEK}">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::RESERVATIONS_THISMONTH}">Current Month</a>
					</td>
					</tr>
					<tr>
					<td>Reserved Accessories</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::ACCESSORIES_TODAY}">Today</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::ACCESSORIES_THISWEEK}">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::ACCESSORIES_THISMONTH}">Current Month</a>
					</td>
					</tr>
					<tr>
					<td>Instrument Usage - Time Booked</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::RESOURCE_TIME_ALLTIME}">Alltime</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::RESOURCE_TIME_THISWEEK}">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::RESOURCE_TIME_THISMONTH}">Current Month</a>
					</td>
					</tr>
					<tr>
					<td>Instrument Usage - Reservation Count</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::RESOURCE_COUNT_ALLTIME}">Alltime</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::RESOURCE_COUNT_THISWEEK}">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::RESOURCE_COUNT_THISMONTH}">Current Month</a>
					</td>
					</tr>
					<tr>
					<td>Top 20 Users - Time Booked</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::USER_TIME_ALLTIME}">Alltime</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::USER_TIME_THISWEEK}">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::USER_TIME_THISMONTH}">Current Month</a>
					</td>
					</tr>
					<tr>
					<td>Top 20 Users - Reservation Count</td>
					<td>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::USER_COUNT_ALLTIME}">Alltime</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::USER_COUNT_THISWEEK}">Current Week</a>
						<span> | </span>
						<a href="#" class="report report-action runNow" reportId="{CannedReport::USER_COUNT_THISMONTH}">Current Month</a>
					</td>
					</tr>
				</tbody>
				</table>
			</div>
      </div>
    </div>
  </div>
</div>


<div id="resultsDiv">
</div>

<div id="indicator" style="display:none; text-align: center;">
	<h3>{translate key=Working}</h3>
	{html_image src="admin-ajax-indicator.gif"}
</div>

{csrf_token}

{include file="Reports/chart.tpl"}

{jsfile src="ajax-helpers.js"}
{jsfile src="reports/canned-reports.js"}
{jsfile src="reports/chart.js"}
{jsfile src="reports/common.js"}

<script type="text/javascript">
	$(document).ready(function () {
		var reportOptions = {
			generateUrl: "{$smarty.server.SCRIPT_NAME}?{QueryStringKeys::ACTION}={ReportActions::Generate}&{QueryStringKeys::REPORT_ID}=",
			emailUrl: "{$smarty.server.SCRIPT_NAME}?{QueryStringKeys::ACTION}={ReportActions::Email}&{QueryStringKeys::REPORT_ID}=",
			deleteUrl: "{$smarty.server.SCRIPT_NAME}?{QueryStringKeys::ACTION}={ReportActions::Delete}&{QueryStringKeys::REPORT_ID}=",
			printUrl: "{$smarty.server.SCRIPT_NAME}?{QueryStringKeys::ACTION}={ReportActions::PrintReport}&{QueryStringKeys::REPORT_ID}=",
			csvUrl: "{$smarty.server.SCRIPT_NAME}?{QueryStringKeys::ACTION}={ReportActions::Csv}&{QueryStringKeys::REPORT_ID}="
		};

		var reports = new CannedReports(reportOptions);
		reports.init();

		var common = new ReportsCommon(
				{
					scriptUrl: '{$ScriptUrl}'
				}
		);
		common.init();
	});
</script>

{include file='globalfooter.tpl'}