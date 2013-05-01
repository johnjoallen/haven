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
		$adv = Trim(stripslashes($_POST['advanceparty'][$x]));
		$house= Trim(stripslashes($_POST['houseno'][$x]));
		$roomshare = Trim(stripslashes($_POST['roomshare'][$x]));
		$roomnum = Trim(stripslashes($_POST['roomnumber'][$x]));
		$out1 = Trim(stripslashes($_POST['outboundflight1'][$x]));
		$out2 = Trim(stripslashes($_POST['outboundflight2'][$x]));
		$ret1= Trim(stripslashes($_POST['returnflight1'][$x]));
		$ret2= Trim(stripslashes($_POST['returnflight2'][$x]));
		$coach = Trim(stripslashes($_POST['coachno'][$x]));
		$vc = Trim(stripslashes($_POST['volunteercoordinator'][$x]));
		$pass = Trim(stripslashes($_POST['passportno'][$x]));
		$passex = Trim(stripslashes($_POST['pexdate'][$x]));
		$visa = Trim(stripslashes($_POST['visano'][$x]));
	    $updatevol->updateTravel($id, $adv, $house, $roomshare, $roomnum, $out1, $out2, $ret1, $ret2, $coach, $vc, $pass, $passex, $visa);
	}
}
if(isset($_POST['cancel'])){
	header('Location:../views/hvnVolunteers.php');
}
?>