<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['save'])){
	$volid = Trim(stripslashes($_POST['id']));
	$size = sizeof($volid);
	$updatevol = new Volunteer();
	for($x=0; $x <= $size; $x++){
		$id = Trim(stripslashes($_POST['id'][$x]));
		$onlined = Trim(stripslashes($_POST['onlinedonation'][$x]));
		$tshirt = Trim(stripslashes($_POST['tshirtsize'][$x]));
		$onsite = Trim(stripslashes($_POST['onsite'][$x]));
		$driver = Trim(stripslashes($_POST['driverl'][$x]));
		$trade = Trim(stripslashes($_POST['trade'][$x]));
		$safe = Trim(stripslashes($_POST['safepass'][$x]));
		$numt = Trim(stripslashes($_POST['tripsexyear'][$x]));		
		$last = Trim(stripslashes($_POST['vlcdate'][$x]));
		$hoh = Trim(stripslashes($_POST['heardofhaven'][$x]));
	    $updatevol->updateGeneral($id, $onlined, $tshirt, $onsite, $driver, $trade, $safe, $numt, $last, $hoh);
		
	}
}
if(isset($_POST['cancel'])){
	header('Location:../views/hvnVolunteers.php');
}
?>