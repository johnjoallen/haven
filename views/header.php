<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Haven - Database Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="anylinkmenu.css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="example.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="example-print.css" TYPE="text/css" MEDIA="print">
<script type="text/javascript" src="tabber.js"></script>
<script type="text/javascript" src="menucontents.js"></script>
<script type="text/javascript" src="anylinkmenu.js"></script>
<script type="text/javascript" src="http://www.shawnolson.net/scripts/public_smo_scripts.js"></script>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")
</script>
<script type="text/javascript" src="insertOnDemand.js"></script>
<script type="text/javascript">
/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */
document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>
</head>
<body>
<div id="global">
	<div id="container">
		<div id="header">
			<div id="floatright">
				<div id="userinformation">
					<p class="text">
					 <?php echo'Hi, '.($_SESSION["fname"]);?> | <?php echo($_SESSION["userlevel"]);?> | <a href="../logic/hvnLogout.php">Logout</a>
					</p>
				</div>
			</div>
			<div id="home_link">
				<a class ="hometext" href="index.php"/>home</a>
			</div>
			<div id="floatleft">
				<img src="i/logo.jpg" height="114px" width="100px" /> 
			</div>
			<div id="titleContainer">
				<p class="titletext">
					Database Management System
				</p>
			</div>
<div id="slidetabsmenu">
<ul>
<li><a href="hvnVolunteers.php" title="home"><span>Home</span></a></li>
<?php 
if($_SESSION['userlevel'] == "administrator"){
	echo ("<li><a href='hvnUsers.php' title='Users'><span>Users</span></a></li>");
	echo ("<li><a href='hvnGroup.php' title='Groups'><span>Groups</span></a></li>");
}
?>
<li><a href="hvnEvents.php" title="Events"><span>Events</span></a></li>
<li><a href="hvnContacts.php" title="Contacts"><span>Contacts</span></a></li>
<li><a href="hvnEmail.php" title="Email"><span>Email</span></a></li>
<li><a class="menuanchorclass" rel="anylinkmenu1" title="Reporting"><span>Reporting</span></a></li>	
<li><a href="#" title="Help"><span>Help</span></a></li>
 </ul>
</div>
 <div id="search">
 <form method="post" action="SearchQuery.php"> 
		<input type="text" name="criteria" /> 
		<input type="submit" name="submit" value="Search" />
</form>
</div>
</div>

<br style="clear: left;" />