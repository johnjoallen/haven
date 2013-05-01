<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
if(isset($_POST['submit'])){
//read in data 
$fname = Trim(stripslashes($_POST['fname']));
$lname = Trim(stripslashes($_POST['lname']));
$email = Trim(stripslashes($_POST['email']));
$username = Trim(stripslashes($_POST['username']));
$password = Trim(stripslashes($_POST['password']));
$ulevel = Trim(stripslashes($_POST['ulevel']));
//create Team object
$userobj= new Users();
//create SETS for the data
$userobj->setU_ID($_SESSION['edituser']);
//insert data
$userobj->setUFname($fname);
$userobj->setULastname($lname);
$userobj->setUsername($username);
$userobj->setPassword($password);
$userobj->setEmail($email);
$userobj->setULevel($ulevel);
$userobj->updateUser();


} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/index.php");
}
?>