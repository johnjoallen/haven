<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//check what button is pressed on the main Volunteers page
if(isset($_POST['volunteers'])){
	$c = $_POST['volunteers'];
	if(isset($_POST['action'])){
		if(count($c) == 1 && ($_POST['edit'] == "view" || $_POST['edit'] == "editall" || $_POST['edit'] == "delete")) {
			if($_POST['edit'] == "view"){
				$_SESSION['viewvolunteer'] = "";
				$_SESSION['viewvolunteer'] = Trim(stripslashes($_POST['volunteers'][0]));
				header('Location:../views/hvnViewVolunteer.php');
			} else if($_POST['edit'] == "editall"){
				$_SESSION['editvolunteer'] = Trim(stripslashes($_POST['volunteers'][0]));
				header('Location:../views/hvnEditVolunteer.php');
			} else if($_POST['edit'] == "delete"){
				$_SESSION['deletevolunteer'] = Trim(stripslashes($_POST['volunteers'][0]));
				header('Location:../views/deleteVolunteer.php');
			}
		} else if(count($c) >= 1 && ($_POST['edit'] == "finances" || $_POST['edit'] == "personal" || $_POST['edit'] == "general" || $_POST['edit'] == "travel" || $_POST['edit'] == "nok" || $_POST['edit'] == "address" || $_POST['edit'] == "contacts")){
			if($_POST['edit'] == "finances"){
				//edit Financial Information
				$var_arr = $_POST['volunteers'];
				$_SESSION['values'] = $var_arr;
				header('Location:../views/hvnFinanceHistory.php');
			} else if($_POST['edit'] == "personal"){
				$var_arr = $_POST['volunteers'];
				$_SESSION['values'] = $var_arr;
				header('Location:../views/hvnEditPersonal.php');
			} else if($_POST['edit'] == "general"){
				$var_arr = $_POST['volunteers'];
				$_SESSION['values'] = $var_arr;
				header('Location:../views/hvnEditGeneral.php');
			} else if($_POST['edit'] == "travel"){
				$var_arr = $_POST['volunteers'];
				$_SESSION['values'] = $var_arr;
				header('Location:../views/hvnEditTravel.php');
			} else if($_POST['edit'] == "nok"){
				$var_arr = $_POST['volunteers'];
				$_SESSION['values'] = $var_arr;
				header('Location:../views/hvnEditNOK.php');
			} else if($_POST['edit'] == "address"){
				$var_arr = $_POST['volunteers'];
				$_SESSION['values'] = $var_arr;
				header('Location:../views/hvnEditAddress.php');
			} else if($_POST['edit'] == "contacts"){
				$var_arr = $_POST['volunteers'];
				$_SESSION['values'] = $var_arr;
				header('Location:../views/hvnEditContactDetails.php');
			} 
		} else {
			$_SESSION['error'] = "You Can only select One Volunteer to View \ Edit \ Delete";
			header('Location:../views/index.php');
		}
	}
} else if(isset($_POST['onevol'])){
	if(isset($_POST['email'])){
		$_SESSION['addemail'] = "";
		$_SESSION['addemail'] = Trim(stripslashes($_POST['onevol']));
		$notefor = Trim(stripslashes($_POST['onevol']));
		header('Location:../views/hvnEmailperson.php?&name=' . $notefor);
	} else if(isset($_POST['note'])){
		$_SESSION['addnote'] = "";
		$_SESSION['addnote'] = Trim(stripslashes($_POST['onevol']));
		$notefor = Trim(stripslashes($_POST['onevol']));
		header('Location:../views/hvnNoteAdd.php?&name=' . $notefor);
	}  else if(isset($_POST['onecsv'])){ 
		$csvone = new Volunteer();
		$csvone->setV_ID($_SESSION['viewvolunteer']);
		$csvone->downloadOne();
	}
} else if(isset($_POST['csv'])){
		$csv = new Volunteer();
		$csv->downloadEntireDataSet();
} else if(isset($_POST['add'])) {
	header('Location:../views/hvnVolunteersAdd.php');
} else {
	$_SESSION['error'] = "Please select a Volunteer first";
	header('Location:../views/hvnVolunteers.php');
}
?>