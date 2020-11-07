<!DOCTYPE html>
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
<html lang="{$HtmlLang}" dir="{$HtmlTextDirection}">
<head>
    {* Title *}
    <title>{if $TitleKey neq ''}{translate key=$TitleKey args=$TitleArgs}{else}{$Title}{/if}</title>

    {* Important Meta *}
    <meta http-equiv="Content-Type" content="text/html; charset={$Charset}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="{$Charset}"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="robots" content="noindex"/>

    {if $ShouldLogout}
        <!--meta http-equiv="REFRESH"
            content="{$SessionTimeoutSeconds};URL={$Path}logout.php?{QueryStringKeys::REDIRECT}={$smarty.server.REQUEST_URI|urlencode}"-->
    {/if}
    <link rel="shortcut icon" href="{$Path}favicon.ico"/>
    <link rel="icon" href="{$Path}favicon.ico"/>

    {* JS Files *}
    {*
        <!-- JavaScript -->
        {if $UseLocalJquery}
            {jsfile src="js/jquery-2.1.1.min.js"}
            {jsfile src="js/jquery-ui-1.10.4.custom.min.js"}
            {jsfile src="bootstrap/js/bootstrap.min.js"}
            {jsfile src="js/lodash.4.6.13.min.js"}
            {jsfile src="js/moment.min.js"}
            {jsfile src="js/jquery.form-3.09.min.js"}
            {jsfile src="js/jquery.blockUI-2.66.0.min.js"}
            {if $Qtip}
                {jsfile src="js/jquery.qtip.min.js"}
            {/if}
            {if $Validator}
                {jsfile src="js/bootstrapvalidator/bootstrapValidator.min.js"}
            {/if}
            {if $InlineEdit}
                {jsfile src="js/x-editable/js/bootstrap-editable.min.js"}
                {jsfile src="js/x-editable/wysihtml5/wysihtml5.js"}
                {jsfile src="js/wysihtml5/bootstrap3-wysihtml5.all.min.js"}
            {/if}
        {else}
    *}

    <!-- <script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <!-- <script type="text/javascript"
            src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- <script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script> -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous"></script>
    <!-- <script type="text/javascript"
            src="https://cdn.jsdelivr.net/lodash/4.16.3/lodash.min.js"></script> -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js"
        integrity="sha512-90vH1Z83AJY9DmlWa8WkjkV79yfS2n2Oxhsi2dZbIv0nC4E6m5AbH8Nh156kkM7JePmqD6tcZsfad1ueoaovww=="
        crossorigin="anonymous"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.50/jquery.form.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js"></script>
    {if $Qtip}
        <script type="text/javascript"
                src="https://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.js"></script>
    {/if}
    {if $Validator}
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    {/if}
    {if $InlineEdit}
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/inputs-ext/wysihtml5/wysihtml5.js"></script>
        {jsfile src="js/wysihtml5/bootstrap3-wysihtml5.all.min.js"}
    {/if}

    {*
        {/if}
    *}

    {if $Select2}
        {jsfile src="js/select2.min.js"}
    {/if}
    {if $Timepicker}
        {jsfile src="js/jquery.timePicker.min.js"}
    {/if}
    {if $FloatThead}
        {jsfile src="js/jquery.floatThead.min.js"}
    {/if}
    {jsfile src="js/jquery-ui-timepicker-addon.js"}
    {jsfile src="phpscheduleit.js"}
    <!-- End JavaScript -->

    <!-- CSS -->
    {*
        {if $UseLocalJquery}
            {cssfile src="scripts/css/smoothness/jquery-ui-1.10.4.custom.min.css"}
            {cssfile src="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"}
            {cssfile src="scripts/bootstrap/css/bootstrap.css" rel="stylesheet"}
            {if $Qtip}
                {cssfile src="css/jquery.qtip.min.css" rel="stylesheet"}
            {/if}
            {if $Validator}
                {cssfile src="css/bootstrapValidator.min.css" rel="stylesheet"}
            {/if}
            {if $InlineEdit}
                {cssfile src="scripts/js/x-editable/css/bootstrap-editable.css" rel="stylesheet"}
                {cssfile src="scripts/js/wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet"}
            {/if}
        {else}
    *}

    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
            type="text/css"/> -->
    {cssfile src="scripts/newcss/style.css" rel="stylesheet"}

    <link rel="stylesheet"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/smoothness/jquery-ui.css"
            type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            type="text/css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.css"
            type="text/css"/>
    {if $Validator}
        <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"
                type="text/css"/>
    {/if}
    {if $InlineEdit}
        <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css"
                type="text/css"/>
        {cssfile src="scripts/js/wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet"}
    {/if}

    {*
        {/if}
    *}

    {if $Select2}
        {cssfile src="scripts/css/select2/select2.min.css"}
        {cssfile src="scripts/css/select2/select2-bootstrap.min.css"}
    {/if}
    {if $Timepicker}
        {cssfile src="scripts/css/timePicker.css" rel="stylesheet"}
    {/if}
    {if $Fullcalendar}
        {cssfile src="scripts/css/fullcalendar.min.css"}
        <link rel='stylesheet' type='text/css' href='scripts/css/fullcalendar.print.css' media='print'/>
        {jsfile src="js/fullcalendar.js"}
        {jsfile src="js/fullcalendarLang/$HtmlLang.js"}
    {/if}
    {cssfile src="scripts/css/jquery-ui-timepicker-addon.css"}
    {* cssfile src="booked.css" *}
    {if $cssFiles neq ''}
        {assign var='CssFileList' value=','|explode:$cssFiles}
        {foreach from=$CssFileList item=cssFile}
            {cssfile src=$cssFile}
        {/foreach}
    {/if}
    {if $CssUrl neq ''}
		{cssfile src=$CssUrl}
	{/if}
    {if $CssExtensionFile neq ''}
        {cssfile src=$CssExtensionFile}
    {/if}

    {if $printCssFiles neq ''}
        {assign var='PrintCssFileList' value=','|explode:$printCssFiles}
        {foreach from=$PrintCssFileList item=cssFile}
            <link rel='stylesheet' type='text/css' href='{$Path}{$cssFile}' media='print'/>
        {/foreach}
    {/if}
    <!-- End CSS -->
</head>
<body class="body-fixed-navbar">

{if $HideNavBar == false}
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" role="navigation">
        <a class="navbar-brand" href="{$HomeUrl}">
            {html_image src="$LogoUrl?2.6" style="height:30px" alt="$Title"}
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                {if $LoggedIn}
                    <li class="nav-item" id="navDashboard">
                        <a class="nav-link" href="{$Path}{Pages::DASHBOARD}">{translate key="Dashboard"}</a>
                    </li>
                    <li class="nav-item dropdown" id="navScheduleDropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{translate key="Schedule"}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{$Path}{Pages::SCHEDULE}">{translate key="Bookings"}</a>
                            <a class="dropdown-item" href="{$Path}{Pages::MY_CALENDAR}">{translate key="MyCalendar"}</a>
                            <a class="dropdown-item" href="{$Path}{Pages::CALENDAR}">{translate key="ResourceCalendar"}</a>
                            <!--<a class="dropdown-item" href="#">{translate key="Current Status"}</a>-->
                            <a class="dropdown-item" href="{$Path}{Pages::OPENINGS}">{translate key="FindATime"}</a>
                            <a class="dropdown-item" href="{$Path}{Pages::SEARCH_RESERVATIONS}">{translate key="SearchReservations"}</a>
                        </div>
                    </li>
                    {if $CanViewAdmin}
                        <li class="nav-item dropdown" id="navApplicationManagementDropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                {translate key="ApplicationManagement"}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{$Path}admin/manage_reservations.php">{translate key="ManageReservations"}</a>
                                <a class="dropdown-item" href="{$Path}admin/manage_blackouts.php">{translate key="ManageBlackouts"}</a>
                                <a class="dropdown-item" href="{$Path}admin/manage_quotas.php">{translate key="ManageQuotas"}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{$Path}admin/manage_resources.php">{translate key="ManageResources"}</a>
                                <a class="dropdown-item" href="{$Path}admin/manage_accessories.php">{translate key="ManageAccessories"}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{$Path}admin/manage_positions.php">{translate key="ManagePositions"}</a>
                                <a class="dropdown-item" href="{$Path}admin/manage_users.php">{translate key="ManageUsers"}</a>
                                <a class="dropdown-item" href="{$Path}admin/manage_groups.php">{translate key="ManageGroups"}</a>
                                <a class="dropdown-item" href="{$Path}admin/manage_announcements.php">{translate key="ManageAnnouncements"}</a>
                                <div class="dropdown-divider"></div>
                                {*<div class="dropdown-header">{translate key=Customization}</div>*}
                                <a class="dropdown-item" href="{$Path}admin/manage_attributes.php">{translate key="CustomAttributes"}</a>
                            </div>
                        </li>
                    {/if}
                    {if $CanViewResponsibilities}
                        <li class="nav-item dropdown" id="navResponsibilitiesDropdown">
                            <a href="#" class="nav-link dropdown-toggle"
                                data-toggle="dropdown">{translate key="Responsibilities"}</a>
                            <div class="dropdown-menu">
                                {if $CanViewGroupAdmin}
                                    <a class="dropdown-item" href="{$Path}admin/manage_group_users.php">{translate key="ManageUsers"}</a>
                                    <a class="dropdown-item" href="{$Path}admin/manage_group_reservations.php">{translate key="GroupReservations"}</a>
                                    <a class="dropdown-item" href="{$Path}admin/manage_admin_groups.php">{translate key="ManageGroups"}</a>
                                {/if}
                                {if $CanViewResourceAdmin || $CanViewScheduleAdmin}
                                    <a class="dropdown-item" href="{$Path}admin/manage_admin_resources.php">{translate key="ManageResources"}</a>
                                    <a class="dropdown-item" href="{$Path}admin/manage_blackouts.php">{translate key="ManageBlackouts"}</a>
                                {/if}
                                {if $CanViewResourceAdmin}
                                    <a class="dropdown-item" href="{$Path}admin/manage_resource_reservations.php">{translate key="ResourceReservations"}</a>
                                {/if}
                                {if $CanViewScheduleAdmin}
                                    <a class="dropdown-item" href="{$Path}admin/manage_admin_schedules.php">{translate key="ManageSchedules"}</a>
                                    <a class="dropdown-item" href="{$Path}admin/manage_schedule_reservations.php">{translate key="ScheduleReservations"}</a>
                                {/if}
                                <a class="dropdown-item" href="{$Path}admin/manage_announcements.php">{translate key="ManageAnnouncements"}</a>
                            </div>
                        </li>
                    {/if}
                    {if $CanViewReports}
                        <li class="nav-item dropdown" id="navReportsDropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{translate key="Reports"}</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{$Path}reports/{Pages::REPORTS_GENERATE}">{translate key=GenerateReport}</a>
                                <a class="dropdown-item" href="{$Path}reports/{Pages::REPORTS_SAVED}">{translate key=MySavedReports}</a>
                                <a class="dropdown-item" href="{$Path}reports/{Pages::REPORTS_COMMON}">{translate key=CommonReports}</a>
                            </div>
                        </li>
                    {/if}
                {/if}
            </ul>
            <ul class="navbar-nav">
                {if $LoggedIn}
                    <li class="nav-item dropdown" id="navMyAccountDropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{translate key="MyAccount"}</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{$Path}{Pages::PROFILE}">{translate key="Profile"}</a>
                            <a class="dropdown-item" href="{$Path}{Pages::PASSWORD}">{translate key="ChangePassword"}</a>
                            <a class="dropdown-item" href="{$Path}{Pages::NOTIFICATION_PREFERENCES}">{translate key="NotificationPreferences"}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{$Path}logout.php">{translate key="SignOut"}</a>
                        </div>
                    </li>
                {else}
                    <li class="nav-item" id="navLogin">
                        <a class="nav-link" href="{$Path}index.php">{translate key="LogIn"}</a>
                    </li>
                {/if}
            </ul>
        </div>
    </nav>
{/if}

<div id="main" class="container-fluid">
