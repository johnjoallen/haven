<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
require_once('../config/appconfig.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>HAVEN DATABASE - BETA INTERFACE</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="global">
	<div id="container">
		<div id="loginbox">
			<h1>Confirm Volunteer Deletion</h1>
			<h3>Enter Your User Details</h3>
			<?php if($_GET['nodelete'] == true){
				echo("<h2>Email or Password field wrong</h2>");
			}
			?>
			<form method="POST" action="../logic/deleteVolunteer.php">
			<table><tr><td align="right">
				<label for="">Email:</label>
			</td><td>
				<input type="text" name="email" id="email" class="textbox" />
			</td></tr>
			<tr><td align="right">
				<label for="">Password:</label>
			</td><td>
				<input type="password" name="password" id="password" class="textbox" />
			</td></tr>
			<tr><td>&nbsp;
			</td><td>
			<input type="submit" name="submit" id="submit" value="Confirm" />
			</td></tr>
			</table>
			</form>
		</div>
	</div>
</div>
</body>
</html>