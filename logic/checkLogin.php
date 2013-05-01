<?php
include("../config/appconfig.php");
/*************
	CHECK USER LOGIN
*****************/
$uEmail = Trim(stripslashes($_POST['email'])); 
$uPassword = Trim(stripslashes($_POST['password'])); 

if(isset($uEmail, $uPassword)){
	//create user object
	$userinstance = new Users();
	//set username and password
	$userinstance->setEmail($uEmail);
	$userinstance->setPassword($uPassword);
	$userinstance->checkLogin();
} else {
	header("Location:../index.php?&error=true");
	exit;
	//echo ("Didnt pass check");
}
?>