<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//check what button is pressed on the main Volunteers page
if(isset($_POST['add'])){
	header('Location:../views/hvnUsersAdd.php');
}
if(isset($_POST['user'])){
	$c = $_POST['user'];
	if(count($c) == 1){
		if(isset($_POST['view'])){
			$_SESSION['viewuser'] = "";
			$_SESSION['viewuser'] = Trim(stripslashes($_POST['user'][0]));
			header('Location:../views/hvnViewUser.php');
		} else if(isset($_POST['edit'])){
			$_SESSION['edituser'] = "";
			$_SESSION['edituser'] = Trim(stripslashes($_POST['user'][0]));
			header('Location:../views/hvnEditUser.php');
		} else if(isset($_POST['delete'])){
			$_SESSION['deleteuser'] = "";
			$_SESSION['deleteuser'] = Trim(stripslashes($_POST['user'][0]));
			header('Location:../views/deleteUser.php');
		}
	}
}
?>