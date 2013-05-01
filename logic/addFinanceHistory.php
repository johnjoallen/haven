<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit'])){
//read in data 
$amount = Trim(stripslashes($_POST['amount']));
$day = Trim(stripslashes($_POST['day']));
$month = Trim(stripslashes($_POST['month']));
$year = Trim(stripslashes($_POST['year'])); 
$comment = Trim(stripslashes($_POST['comment']));
$refkey = Trim(stripslashes($_SESSION['viewvolunteer']));

//parse for MySQL compatibility
$fhdate = $year . "-" . $month . "-" . $day;
//create CFinanceHistory object
$financehistoryobj = new FinanceHistory();
//create SETS for the data
$financehistoryobj->setAmt($amount);
$financehistoryobj->setDateOfPayment($fhdate);
$financehistoryobj->setComment($comment);
$financehistoryobj->setRefKey($refkey);
$financehistoryobj->insertFinanceHistory();
} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/hvnVolunteers.php");
}
?>