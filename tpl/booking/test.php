<?php if(isset($_GET['something'])){

echo "AAAAAAAA";
 ?>

<div id="globalError" class="error no-show"></div>
<div class="panel panel-default admin-panel" id="list-resources-panel">
		<div class="panel-heading">Resources
			
		</div>
		<div class="panel-body no-padding" id="resourceList">

											<div class="resourceDetails" data-resourceid="1">
					<div class="col-xs-12 col-sm-5">
						<input type="hidden" class="id" value="1">

						<div class="col-sm-3 col-xs-6 resourceImage">
							<div class="margin-bottom-25">
								




    <title>Error</title>
   

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#booked-navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="dashboard.php"><img src="img/vistec_logo.png?2.6" title="Vistec - Schedule" alt="Vistec - Schedule" style="height: 50px"></a>
            </div>
            <div class="collapse navbar-collapse" id="booked-navigation">
                <ul class="nav navbar-nav">
                                            <li id="navDashboard"><a href="dashboard.php">Dashboard</a></li>
                        <li class="dropdown" id="navMyAccountDropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li id="navProfile"><a href="profile.php">Profile</a></li>
                                <li id="navPassword"><a href="password.php">Change Password</a></li>
                                <li id="navNotification">
                                    <a href="notification-preferences.php">Notification Preferences</a>
                                </li>
                                                            </ul>
                        </li>
                        <li class="dropdown" id="navScheduleDropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Schedule <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li id="navBookings"><a href="schedule.php">Bookings</a>
                                </li>
                                <li id="navMyCalendar"><a href="my-calendar.php">My Calendar</a></li>
                                <li id="navResourceCalendar"><a href="calendar.php">Resource Calendar</a></li>
                                <!--<li class="menuitem"><a href="#">?</a></li>-->
                                <li id="navFindATime"><a href="search-availability.php">Find A Time</a></li>
                                <li id="navFindATime"><a href="search-reservations.php">Search Reservations</a></li>
                            </ul>
                        </li>
                                                    <li class="dropdown" id="navApplicationManagementDropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Application Management
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li id="navManageReservations"><a href="admin/manage_reservations.php">Reservations</a>
                                    </li>
                                    <li id="navManageBlackouts"><a href="admin/manage_blackouts.php">Blackout Times</a>
                                    </li>
                                    <li id="navManageQuotas"><a href="admin/manage_quotas.php">Quotas</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li id="navManageSchedules"><a href="admin/manage_schedules.php">Schedules</a>
                                    </li><li id="navManageResources"><a href="admin/manage_resources.php">Resources</a>
                                    </li>
                                    <li id="navManageAccessories"><a href="admin/manage_accessories.php">Accessories</a>
                                    </li>

                                    <li class="divider"></li>
                                    <li id="navManageUsers"><a href="admin/manage_users.php">Users</a>
                                    </li>
                                    <li id="navManageGroups"><a href="admin/manage_groups.php">Groups</a>
                                    </li>

                                    <li id="navManageAnnouncements"><a href="admin/manage_announcements.php">Announcements</a>
                                    </li>
                                    <li class="divider"></li>
                                    
                                    <li id="navManageAttributes"><a href="admin/manage_attributes.php">Custom Attributes</a>
                                    </li>
                                                                            <li id="navManageConfiguration"><a href="admin/manage_configuration.php">Application Configuration</a>
                                        </li>
                                                                        <li id="navLookAndFeel"><a href="admin/manage_theme.php">Look and Feel</a>
                                    </li>
                                    <li id="navImport"><a href="admin/import.php">Import</a>
                                    </li>
                                    <li id="navServerSettings"><a href="admin/server_settings.php">Server Settings</a>
                                    </li>
                                </ul>
                            </li>
                                                                                                    <li class="dropdown" id="navReportsDropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li id="navGenerateReport">
                                        <a href="reports/generate-report.php">Create New Report</a>
                                    </li>
                                    <li id="navSavedReports">
                                        <a href="reports/saved-reports.php">My Saved Reports</a>
                                    </li>
                                    <li id="navCommonReports">
                                        <a href="reports/common-reports.php">Common Reports</a>
                                    </li>
                                </ul>
                            </li>
                                            
                </ul>
                <ul class="nav navbar-nav navbar-right">
                                            <li id="navSignOut"><a href="logout.php">Sign Out</a></li>
                                    </ul>
            </div>
        </div>
    </nav>

<div id="main" class="container-fluid">

<div class="error">
    <h3>Unknown Error</h3>
    <h5><a href="//localhost/vistecweb/Web/schedule.php">Return to the last page that you were on</a></h5>
</div>




	</div><!-- close main-->

	<footer class="footer navbar">
		© 2017 Vistec Thailand <br><a href="http://www.vistec.ac.th">Vistec Page</a>
	</footer>

	

		

</div></div></div></div></div></div>
<?php }else{ ?>

	else condition;
<?php } ?>