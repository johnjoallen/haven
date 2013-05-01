<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
if(isset($_SESSION['viewevent'])){
	$view = $_SESSION['viewevent'];
	$detailobj = New Events();
	$detailobj->setE_ID($view);
	$detailobj->eventDetail();
	?><div id='main'>
			<p class='text'>
			<table class="vol_table">
			<th height="28">Event Details </th>
				<tr>
					<td><strong>Name Of Event:</strong><? echo($detailobj->getNameOfEvent()); ?><br />
					<strong>Description:</strong><? echo($detailobj->getDescription()); ?><br />
					<strong>Date:</strong><? echo($detailobj->getDate()); ?><br />
					<strong>Time:</strong><? echo($detailobj->getTime()); ?><br />
					<strong>Location:</strong><? echo($detailobj->getLocation()); ?><br />
					</td>
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
				An Error Occured <a href="hvnEvents.php">click here</a> to return <
			</p>
</div>
<?
}
include('footer.php');
?>