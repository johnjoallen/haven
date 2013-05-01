<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
if(isset($_POST['submit'])){
//read in data 
$group = Trim(stripslashes($_POST['group']));
$grouptype = Trim(stripslashes($_POST['group']));

//create Team object
$gbj = new Group();
//create SETS for the data
$gbj->setGroup($group);
$gbj->setGroupType($grouptype);
$gbj->setG_ID($_SESSION['editGroup']);
//insert data
$gbj->updateGroup();
} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/index.php");
}
?>