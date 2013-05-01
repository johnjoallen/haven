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
$text = Trim(stripslashes($_POST['text']));
//timestamp note
$timestamp = date("Y-m-d");
$status = Trim(stripslashes($_POST['status'])); 
$author = $_SESSION['fname'] . " " . $_SESSION['lname'];
$type = $_SESSION['type'];
//create Contact object
$noteobj = new Notes();
//create SETS for the data
if(!empty($_SESSION['viewcontact'])){
	$noteobj->setN_ID($_SESSION['viewcontact']);
} else if (!empty($_SESSION['viewvolunteer'])) {
	$noteobj->setN_ID($_SESSION['viewvolunteer']);
}
$noteobj->setTextOfNote($text);
$noteobj->setDateOfNote($timestamp);
$noteobj->setStatus($status);
$noteobj->setAuthor($author);
$noteobj->setType($type);
$noteobj->insertNote();
} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/hvnVolunteers.php");
}
?>