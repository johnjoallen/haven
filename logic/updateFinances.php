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
	//create a new Finance history object
	$updateFinance = new FinanceHistory();
	for( $x=0; $x <= $size; $x++){
		$date = $_POST['year'][$x] . "-" . $_POST['month'][$x] . "-" . $_POST['day'][$x]; 
		$updateFinance->insertFinanceHistoryById($_POST['amount'][$x],$date,$_POST['comment'][$x], $_POST['id'][$x]);
	}
}
if(isset($_POST['cancelf'])){
	header('Location:../views/hvnVolunteers.php');
}
?>