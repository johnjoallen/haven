<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//parse posted data
if(isset($_POST['submit'])){
$email = Trim(stripslashes($_POST['email']));
$pwd = Trim(stripslashes($_POST['password']));
	if(isset($_SESSION['deletecontact'])){
		if(($email == $_SESSION['uemail'])  && ($pwd == $_SESSION['upwd'])){
			$delete = new Contact();
			$delete->setC_ID(Trim(stripslashes($_SESSION['deletecontact'])));
			$delete->deleteContact();
		} else {
			header('Location:../views/deleteContact.php?&nodelete=set');
		}
	}
} else {
	hheader('Location:../views/deleteContact.php');
}
?>