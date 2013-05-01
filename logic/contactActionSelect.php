<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");

if(isset($_POST['add'])){
	header("Location:../views/hvnContactAdd.php");
}
if(isset($_POST['emaillist'])){
	$cnt = $_SESSION['emaillist'];
	if(count($cnt) > 0){
		$_SESSION['emaillist'] = $_POST['contacts'];
		$_SESSION['success'] = "Contacts Added to  Email List";
		header("Location:../views/hvnContacts.php");
	} else {
		$_SESSION['emaillist'] .= $_POST['list'];
		$_SESSION['success'] = "Contacts Added to  Email List";
		header("Location:../views/hvnContacts.php");
	}
}
//check what button is pressed on the main Contacts page
if(isset($_POST['contacts'])){
	if(isset($_POST['view'])){
		$_SESSION['viewcontact'] = "";
		$_SESSION['viewcontact'] = Trim(stripslashes($_POST['contacts']));
		header('Location:../views/hvnViewContact.php');
	} else if(isset($_POST['edit'])){
		$_SESSION['editcontact'] = Trim(stripslashes($_POST['contacts']));
		header('Location:../views/hvnEditContact.php');
	} else if(isset($_POST['delete'])){
		$_SESSION['deletecontact'] = Trim(stripslashes($_POST['contacts']));
		header('Location:../views/deleteContact.php');
	}
} else if(isset($_POST['individual']) || isset($_POST['list'])){
	if(isset($_POST['email'])){
		$_SESSION['addemail'] = "";
		$_SESSION['addemail'] = Trim(stripslashes($_POST['individual']));
		$notefor = Trim(stripslashes($_POST['name']));
		header('Location:../views/hvnEmailperson.php?&name=' . $notefor);
	} else if(isset($_POST['note'])){
		$_SESSION['addnote'] = "";
		$_SESSION['addnote'] = Trim(stripslashes($_POST['individual']));
		$notefor = Trim(stripslashes($_POST['name']));
		header('Location:../views/hvnNoteAdd.php?&name=' . $notefor);
	} else if(isset($_POST['onecsv']) || isset($_POST['list'])){ 
		$csvone = new Contact();
		$csvone->setC_ID($_SESSION['viewcontact']);
		$csvone->downloadOne();
	}
} else if(isset($_POST['csv'])){
		$csv = new Contact();
		$csv->downloadEntireDataSet();
}  

?>