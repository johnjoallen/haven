<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
//parse posted data
if(isset($_POST['email'])){
$email = Trim(stripslashes($_POST['email']));
$pwd = Trim(stripslashes($_POST['pwd']));
	if(isset($_SESSION['deleteevent'])){
		if(($email == $_SESSION['uemail']) && ($pwd == $_SESSION['upwd'])){
			$delete = new Event();
			$delete->setC_ID(Trim(stripslashes($_SESSION['deleteevent'])));
			$delete->deleteEvent();
		} else {
			header('Location:../views/deleteEvent.php?&nodelete=set');
		}
	}
} else {
	header('Location:../views/hvnEvents.php');
}
?>