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
		$fname = Trim(stripslashes($_POST['fname'][$x]));
		$lname = Trim(stripslashes($_POST['lname'][$x]));
		$passport = Trim(stripslashes($_POST['passportname'][$x]));
		$dob = Trim(stripslashes($_POST['dbdate'][$x]));
		$sex = Trim(stripslashes($_POST['sex'][$x]));
		$occ = Trim(stripslashes($_POST['occupation'][$x]));
		$qual = Trim(stripslashes($_POST['qualification'][$x]));
		$nat = Trim(stripslashes($_POST['nationality'][$x]));
		$updatevol->updatePersonal($id, $fname, $lname, $passport, $dob, $sex, $occ, $qual, $nat);
	}
}
if(isset($_POST['cancel'])){
	header('Location:../views/hvnVolunteers.php');
}
?>