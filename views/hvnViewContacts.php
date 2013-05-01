<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
if(isset($_SESSION['viewcontacts'])){
	$view = $_SESSION['viewcontacts'];
	$detailobj = New Contact();
	$detailobj->setC_ID($view);
	$detailobj->contactDetail();
	?><div id='main'>
			<p class='text'>
			<table border='1'>
				<tr>
					<td colspan="3"><strong>Status:</strong><? echo($detailobj->getStatus()); ?></td>
				</tr>
				<tr valign="top">
					<td><strong>Name:<br /></strong><? echo($detailobj->getFname()); ?><br /><? echo($detailobj->getLname()); ?></td>
					<td><strong>Address:<br /></strong>
					<? echo($detailobj->getAddr1()); ?><br />
					<? echo($detailobj->getAddr2()); ?><br />
					<? echo($detailobj->getAddr3()); ?><br />
					<? echo($detailobj->getCounty()); ?><br />
					</td>
					<td><strong>Email:</strong><? echo($detailobj->getEmail()); ?><br />
					<strong>Mobile:</strong><? echo($detailobj->getMobile()); ?><br />
					<strong>Landline:</strong><? echo($detailobj->getLandline()); ?><br />
					</td>
				</tr>
				<tr valign="top">
					<td><strong>Occupation:</strong><? echo($detailobj->getOccupation()); ?></td>
					<td><strong>LastContacted:</strong><? echo($detailobj->getLastContacted()); ?></td>
					<td><strong>Call Back Date:</strong><? echo($detailobj->getCallback()); ?></td>
					<td><strong>Trip:</strong><? echo($detailobj->getTrip()); ?></td>
				</tr>
			</table>
			</p></div>
<?
} else {
?><div id='main'>
		<div id='sidebar'>
			<?php include('sidebar.php'); ?>
		</div>
			<p class="text">
				An Error Occured <a href="hvnContacts.php">click here</a> to return <
			</p>
</div>
<?
}
include('footer.php');
?>