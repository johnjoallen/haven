<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//parse data
$filter = Trim(stripslashes($_POST['filter']));
$operator = Trim(stripslashes($_POST['operator']));
$field = Trim(stripslashes($_POST['field']));
$criteria =  Trim(stripslashes($_POST['criteria']));

if(($field == 'fname') && ($filter == 'vol')){
	$field = 'V_First_Name';
}
if(($field == 'sex') && ($filter == 'vol')){
	$field = 'Sex';
}
if(($field == 'trade') && ($filter == 'vol')){
	$field = 'Onsite_Trade';
}
if(($field == 'occ') && ($filter == 'vol')){
	$field = 'V_Occupation';
}
//contact condition parsing
if(($field == 'fname') && ($filter == 'con')){
	$field = 'C_First_Name';
}
if(($field == 'sex') && ($filter == 'con')){
	$_SESSION['error'] = 'Only volunteers can seleted with the SEX field';
	header('Location:../views/adhoc-reporting');
}
if(($field == 'trade') && ($filter == 'con')){
	$_SESSION['error'] = 'Only volunteers can seleted with the TRADE field';
	header('Location:../views/adhoc-reporting');
}
if(($field == 'occ') && ($filter == 'con')){
	$field = 'C_Occupation';
}

//Is it CSV or PDF
if(isset($_POST['csv'])){
	if($filter == 'con'){
		$contact = new Contact();
		$contact->AdHocCSVbasic($field, $criteria);
	}
	if($filter == 'vol'){
		$volunteer = new Volunteer();
		$volunteer->AdHocCSVbasic($field, $criteria);
	}
}
if(isset($_POST['pdf'])){
	if($filter == 'con'){
		$contact = new Contact();
		$contact->AdHocPDF($field, $criteria);
	}
	if($filter == 'vol'){
		$volunteer = new Volunteer();
		$volunteer->AdHocPDF($field, $criteria);
	}
}
?>