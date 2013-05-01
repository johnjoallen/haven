<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
require_once('../config/config.php');
include("../classes/hvnVolunteersClass.php");
//parse posted data
if(isset($_POST['submit'])){
$email = Trim(stripslashes($_POST['email']));
$pwd = Trim(stripslashes($_POST['password']));
	if(isset($_SESSION['deletevolunteer'])){
		if(($email == $_SESSION['uemail'])  && ($pwd == $_SESSION['upwd'])){
			$delete = new Volunteer();
			$delete->setV_ID(Trim(stripslashes($_SESSION['deletevolunteer'])));
			$delete->deleteVolunteer();
		} else {
			header('Location:../views/deleteVolunteer.php?&nodelete=set');
		}
	}
} else {
	hheader('Location:../views/deleteContact.php');
}
?>