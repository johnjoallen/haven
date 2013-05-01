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
	    $mobile = Trim(stripslashes($_POST['mobile'][$x]));
	    $landline = Trim(stripslashes($_POST['landline'][$x]));
		$email = Trim(stripslashes($_POST['email'][$x]));
		$updatevol->updateContact($id, $mobile, $landline, $email);
	}
}
if(isset($_POST['cancel'])){
	header('Location:../views/hvnVolunteers.php');
}
?>