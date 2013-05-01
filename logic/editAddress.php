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
		$addr1 = Trim(stripslashes($_POST['street'][$x]));
		$addr2 = Trim(stripslashes($_POST['area'][$x]));
		$addr3 = Trim(stripslashes($_POST['town'][$x]));
		$county = Trim(stripslashes($_POST['county'][$x]));
		$country = Trim(stripslashes($_POST['country'][$x]));
	    $updatevol->updateAddress($id, $addr1, $addr2, $addr3, $county, $country);
	}
}
if(isset($_POST['cancel'])){
	header('Location:../views/hvnVolunteers.php');
}
?>