<?php
echo "<div class=\"main-nav-wrapper\">\n";
echo "	<nav id=\"main-nav\" class=\"main-nav js-cloak\">\n";
echo "		<ul id=\"menu\">\n";
echo "			<li class=\"nav-dashboards ";

echo "\"><a href=\"index.php\"> <span\n";
echo "					aria-hidden=\"true\" class=\"icon icon_house_alt\"></span> <span\n";
echo "					class=\"nav-label\">Dashboards</span>\n";
echo "			</a></li>\n";

echo "			<li class=\" \"><a href=Item Barcode\"> <span aria-hidden=\"true\"\n";
echo "					class=\"icon icon_documents_alt\"></span> <span class=\"nav-label\">ADvert\n";
echo "						Manager</span>\n";
echo "					<span class=\"fa arrow\"></span>\n";
echo "			</a>\n";
echo "				<ul class=\"sub-menu\">\n";

echo "					<li class=\" \"><a href=\"InstallApk.php\"> <span class=\"nav-label\">\n";
echo "								Install Apps</span>\n";
echo "					</a></li>\n";

echo "					<li class=\" \"><a href=\"notification.php\"> <span class=\"nav-label\">\n";
echo "								Send Notification</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"ForceInstall.php\"> <span class=\"nav-label\">\n";
echo "								Force Install</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"CmdCenter.php\"> <span class=\"nav-label\">\n";
echo "								Send Cmds</span>\n";
echo "					</a></li>\n";

echo "\n";
echo "				</ul></li>\n";

/*
echo "					<li class=\" \"><a href=\"region_add.php\"> <span class=\"nav-label\">\n";
echo "								Add Region</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"create_user.php\"> <span class=\"nav-label\">\n";
echo "								Manage Users</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"adv_settings.php\"> <span class=\"nav-label\">\n";
echo "								Advanced Settings</span>\n";
echo "					</a></li>\n";
*/

echo "			<li class=\" \"><a href=Item Barcode\"> <span aria-hidden=\"true\"\n";
echo "					class=\"icon icon_documents_alt\"></span> <span class=\"nav-label\">Reports\n";
echo "						</span>\n";
echo "					<span class=\"fa arrow\"></span>\n";
echo "			</a>\n";
echo "				<ul class=\"sub-menu\">\n";

echo "					<li class=\" \"><a href=\"Reports.php?re=FILTERS\"> <span class=\"nav-label\">\n";
echo "								Filters Data</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"Reports.php?re=Operator\"> <span class=\"nav-label\">\n";
echo "								Operator Wise Users Data</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"Reports.php?re=Region\"> <span class=\"nav-label\">\n";
echo "								Region Data</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"Reports.php?re=Modals\"> <span class=\"nav-label\">\n";
echo "								Modals Data</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"Reports.php?re=Custom\"> <span class=\"nav-label\">\n";
echo "								Custom Filter Data</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"Reports.php?re=Install\"> <span class=\"nav-label\">\n";
echo "								Imei Wise Install/Uninstall Data</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"Reports.php?re=Campaign\"> <span class=\"nav-label\">\n";
echo "								Campaign Report</span>\n";
echo "					</a></li>\n";
echo "					<li class=\" \"><a href=\"Reports.php?re=UnAuth\"> <span class=\"nav-label\">\n";
echo "								UnAuth Install</span>\n";
echo "					</a></li>\n";
echo "\n";
echo "				</ul></li>\n";

// echo " <li class=\" \"><a href=\"todoList.php\"> <span aria-hidden=\"true\"\n";
// echo " class=\"icon icon_calendar\"></span> <span class=\"nav-label\">To Do List</span>\n";
// echo " </a></li>\n";
// echo "\n";
// echo " <li class=\" \"><a href=\"#\"> <span aria-hidden=\"true\"\n";
// echo " class=\"icon icon_calendar\"></span> <span class=\"nav-label\">Calendars</span>\n";
// echo " </a></li>\n";
// echo " <li class=\" \"><a href=\"#\"> <span aria-hidden=\"true\"\n";
// echo " class=\"icon icon_calendar\"></span> <span class=\"nav-label\">Notifications</span>\n";
// echo " </a></li>\n";
echo "			<li role=\"presentation\" class=\"divider \"></li>\n";
// echo " <li class=\" \"><a href=\"help.php\"> <span aria-hidden=\"true\"\n";
// echo " class=\"icon icon_lifesaver\"></span> <span class=\"nav-label\">Help</span>\n";
// echo " <span class=\"label label-new\">NEW</span>\n";
// echo " </a></li>\n";
echo "		</ul>\n";
echo "	</nav>\n";
echo "</div>";
?>