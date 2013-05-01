<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//check what button is pressed on the main Events page
if(isset($_POST['events']) || isset($_POST['add'])){
	if(isset($_POST['add'])){
		header("Location:../views/hvnEventsAdd.php");
	}
	if(isset($_POST['view'])){
		$_SESSION['viewevent'] = "";
		$_SESSION['viewevent'] = Trim(stripslashes($_POST['events']));
		header('Location:../views/hvnViewEvents.php');
	} else if(isset($_POST['edit'])){
		$_SESSION['editevent'] = Trim(stripslashes($_POST['events']));
		header('Location:../views/hvnEditEvent.php');
	} else if(isset($_POST['delete'])){
		$_SESSION['deleteevent'] = Trim(stripslashes($_POST['events']));
		$delete = new Events();
		$delete->setE_ID(Trim(stripslashes($_SESSION['deleteevent'])));
		$delete->deleteEvent();
	}
} else {
	$_SESSION['error'] = "You need to select an event first";
	header("Location:../views/hvnEvents.php");
}
?>