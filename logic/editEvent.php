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
$name_of_event = Trim(stripslashes($_POST['name_of_event'])); 
$description = Trim(stripslashes($_POST['description'])); 
$evdate = Trim(stripslashes($_POST['evdate'])); 
$evtime = Trim(stripslashes($_POST['evtime'])); 

$loc = Trim(stripslashes($_POST['loc']));

//create Contact object
$eventobj = new Events();
//create SETS for the data
$eventobj->setE_ID($_SESSION['editevent']);
$eventobj->setNameOfEvent($name_of_event);
$eventobj->setDescription($description);
$eventobj->setDate($evdate);
$eventobj->setTime($evtime);
$eventobj->setLocation($loc);
$eventobj->updateEvent();

} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/hvnEvents.php");
}
?>