<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//parse data
$filter = Trim(stripslashes($_POST['filter']));
$field = Trim(stripslashes($_POST['where']));
$condition = Trim(stripslashes($_POST['condition']));
$criteria =  Trim(stripslashes($_POST['criteria']));
//volunteer condition parsing
$contact = new Contact();
$volunteer = new Volunteer();
if(($field == 'callback') && ($filter == 'vol')){
	$field = 'V_Call_Back_Date';
}
if(($field == 'lastcontacted') && ($filter == 'vol')){
	$field = 'V_Last_Contacted';
}
if(($field == 'age') && ($filter == 'vol')){
	$volunteer->AdHocAge($criteria);
}
if(($field == 'county') && ($filter == 'vol')){
	$field = 'V_County';
}
//contact condition parsing
if($field == 'callback' && $filter == 'con'){
	$field = 'C_Call_Back_Date';
}
if($field == 'lastcontacted' && $filter == 'con'){
	$field = 'C_Last_Contacted';
}
if($field == 'age' && $filter == 'con'){
	$_SESSION['error'] = 'Only volunteers can seleted with the AGE field';
	header('Location:../views/adhoc-reporting');
}
if($field == 'county' && $filter == 'con'){
	$field = 'C_County';
}
//Is it CSV or PDF
if(isset($_POST['csv'])){
	if($filter == 'con'){
	$contact->AdHocCSVAdv($field, $condition, $criteria);
	
	}
	if($filter == 'vol'){
	$volunteer->AdHocCSVAdv($field, $condition, $criteria);
	}
}
if(isset($_POST['pdf'])){
	if($filter == 'con'){
		$contact->AdHocAdvanced($field, $condition, $criteria);
	}
	if($filter == 'vol'){
		$volunteer->AdHocAdvanced($field, $condition, $criteria);
	}
}
?>