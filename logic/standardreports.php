<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//parse data
$criteria =  Trim(stripslashes($_POST['report']));
$v = new Volunteer();
$fh = new FinanceHistory();
//check if CSV was requested
if(isset($_POST['csv'])){

}
if(isset($_POST['pdf']) && $_POST['report'] == "cStatus"){
	$c = new Contact();
	$c->ContactStatus();
}
//check if PDF was request
if(isset($_POST['pdf']) && isset($_POST['groups'])){
	//sanitise vars
	$group =  Trim(stripslashes($_POST['groups']));

	if($_POST['report'] == "trades"){
		$v->TradeCount($group);
	}
	if($_POST['report'] == "vfinances"){
		//download reprot
		$fh->VolunteerFinancesPDF($group);
	}
	if($_POST['report'] == "vdem"){
		//downloadreport
		$v->VolunteerDemograph($group);
	}
	if($_POST['report'] == "geo"){
		//download report
		$v->VolunteerGeo($group);
	}
	if($_POST['report'] == "medical"){
		//download report
		$v->VolunteerMed($group);
	}
	if($_POST['report'] == "diet"){
		//download report
		$v->VolunteerDiets($group);
	}
	if($_POST['report'] == "travel"){
		//download report
		$v->TravelDetails($group);
	}
}


?>