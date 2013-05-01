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
		$nok1f = Trim(stripslashes($_POST['nok1fname'][$x]));
		$nok1l = Trim(stripslashes($_POST['nok1lname'][$x]));
		$nok1m = Trim(stripslashes($_POST['nok1mobile'][$x]));
		$nok1land = Trim(stripslashes($_POST['nok1landline'][$x]));
		$nok1rel = Trim(stripslashes($_POST['nok1rel'][$x]));
		$nok2f = Trim(stripslashes($_POST['nok2fname'][$x]));
		$nok2l = Trim(stripslashes($_POST['nok2lname'][$x]));
		$nok2m = Trim(stripslashes($_POST['nok2mobile'][$x]));
		$nok2land = Trim(stripslashes($_POST['nok2landline'][$x]));
		$nok2rel = Trim(stripslashes($_POST['nok2rel'][$x]));
	    $updatevol->updateNOK($id, $nok1f, $nok1l, $nok1m, $nok1land, $nok1rel, $nok2f, $nok2l, $nok2m, $nok2land, $nok2rel);
	}
}
if(isset($_POST['cancel'])){
	header('Location:../views/hvnVolunteers.php');
}
?>