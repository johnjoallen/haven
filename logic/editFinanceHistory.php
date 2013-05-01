<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['editfinance'])){
//read in data 
$amount = Trim(stripslashes($_POST['amount']));
$comment = Trim(stripslashes($_POST['comment']));
$fhdate = Trim(stripslashes($_POST['fhdate']));
//create CFinanceHistory object
$financehistoryobj = new FinanceHistory();
//create SETS for the data
$financehistoryobj->setFH_ID($_SESSION['recordToUpdate']);
$financehistoryobj->setAmt($amount);
$financehistoryobj->setDateOfPayment($fhdate);
$financehistoryobj->setComment($comment);
$financehistoryobj->setRefKey($_SESSION['editvolunteer']);
$financehistoryobj->updateFinanceHistory();
} else if(isset($_POST['cancelfinance'])){
	$_SESSION['error'] = "Operation Aborted";
	header("Location:../views/hvnVolunteers.php");
}
?>