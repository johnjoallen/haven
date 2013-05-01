<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
if(isset($_SESSION['viewuser'])){
	$view = $_SESSION['viewuser'];
	$detailobj = New Users();
	$detailobj->setU_ID($view);
	$detailobj->userDetail();
	$_SESSION['type'] = "";
	$_SESSION['type'] = "user";
?><div id='main'>
			<p class='text'>
			<?php if(!empty($_SESSION['error'])){
				echo("<h3>" . $_SESSION['error'] . "</h3>");
			}
			if(!empty($_SESSION['success'])){
				echo("<h3>" . $_SESSION['success'] . "</h3>");
			}
			$_SESSION['error'] = "";
			$_SESSION['success'] = "";
			?>
			<fieldset><legend>Details</legend>
			<table border="1" class="vol_table smalltbl" >
			<tr><th width="243" height="26" colspan="0">Contact Details </th></tr>
			<tr><td><strong>Name: </strong><? echo($detailobj->getUFname()); ?>&nbsp;<? echo($detailobj->getULastname()); ?><br/>
			<strong>Email: </strong><? echo($detailobj->getEmail()); ?><br />					<br />
					</td></tr>
				  <tr><td width="406"><strong>Username: </strong><? echo($detailobj->getUsername()); ?><br />
                    <strong>User level: </strong><? echo($detailobj->getUlevel()); ?><br />
                 </td>
				</tr>
			</table>
			</fieldset>
<?
} else {
	header("Location:hvnUsers.php");
}
include('footer.php');
?>