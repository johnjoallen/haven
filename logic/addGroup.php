<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
if(isset($_POST['submit'])){
//read in data 
$user = $_SESSION['fname'] . " " . $_SESSION['lname']; 
$group = Trim(stripslashes($_POST['group']));
$grouptype = Trim(stripslashes($_POST['grouptype'])); 

//create Team object
$teamobj = new Group();
//create SETS for the data
$teamobj->setGroup($group);
$teamobj->setGroupType($grouptype);
$teamobj->setUser($user);
$teamobj->setDateCreated(date("Y-m-d"));
//insert data
$teamobj->insertGroup();

} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/index.php");
}
?>
