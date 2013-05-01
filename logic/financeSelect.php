<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//check what button is pressed on the main Events page
if((isset($_POST['record'])) && (isset($_SESSION['editvolunteer']))){
	if(isset($_POST['edit1'])){
		$_SESSION['recordToUpdate'] = Trim(stripslashes($_POST['record']));
		header('Location:../views/hvnEditFinanceHistory.php');
	} else if(isset($_POST['delete1'])){
		$delete = new FinanceHistory();
		$delete->setFH_ID(Trim(stripslashes($_POST['record'])));
		$delete->setRefKey($_SESSION['editvolunteer']);
		$delete->deleteRecord();
	}
} else {
	$_SESSION['error'] = "You need to select a record first";
	header("Location:../views/hvnEditVolunteer.php");
}
?>