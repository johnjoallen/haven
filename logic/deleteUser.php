<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
require_once('../config/appconfig.php');
//parse posted data
if(isset($_POST['submit'])){
$email = Trim(stripslashes($_POST['email']));
$pwd = Trim(stripslashes($_POST['password']));
	if(isset($_SESSION['deleteuser'])){
		if(($email == $_SESSION['uemail'])  && ($pwd == $_SESSION['upwd'])){
			$delete = new Users();
			$delete->setU_ID($_SESSION['deleteuser']);
			$delete->deleteUser();
		} else {
			$_SESSION['error'] = "Username / Password Incorrect";
			header('Location:../views/deleteUsers.php');
		}
	}
} else {
	header('Location:../views/deleteUser.php');
}
?>