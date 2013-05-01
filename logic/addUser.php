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
$ufname = Trim(stripslashes($_POST['fname'])); 
$ulname = Trim(stripslashes($_POST['lname'])); 
$username = Trim(stripslashes($_POST['username'])); 
$password = Trim(stripslashes($_POST['password'])); 
$email = Trim(stripslashes($_POST['email']));
$userlevel = Trim(stripslashes($_POST['userlevel']));
//create User object
$userobj = new Users();
//create SETS for the data
$userobj->setUFname($ufname);
$userobj->setULastname($ulname);
$userobj->setUserName($username);
$userobj->setPassword($password);
$userobj->setEmail($email);
$userobj->setULevel($userlevel);
$userobj->insertUser();
} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/index.php");
}
?>
