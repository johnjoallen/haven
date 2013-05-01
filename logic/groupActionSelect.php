<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//check what button is pressed on the main Contacts page
if(isset($_POST['edit'])){
	$c = $_POST['groups'];
	if(count($c) == 1){
		$_SESSION['editGroup'] = "";
		$_SESSION['editGroup'] = Trim(stripslashes($_POST['groups'][0]));
		header('Location:../views/hvnEditGroup.php');
	} else {
		$_SESSION['error'] = "Only 1 Group Can be Edited at a time";
		header("Location:../views/hvnGroup.php");
	}
}
if(isset($_POST['delete'])){
	$size = $_POST['groups'];
	$count = count($size);
	if($count > 0){
		$grpdel =  new Group();
		for( $x=0; $x <= $count-1; $x++){
			$grpdel->deleteGroup($_POST['groups'][$x]);
		}
		header("Location:../views/hvnGroup.php");
	} else {
		$_SESSION['error'] = "Please select a Group to Delete";
		header('Location:../views/hvnGroup.php');
	}
}
if(isset($_POST['add'])){
	header('Location:../views/hvnGroupAdd.php');
}
?>