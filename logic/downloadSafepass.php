<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
if(isset($_GET['id'])){
	$id = Trim(stripslashes($_GET['id']));
	$download = new Documentation();
	$download->setDID($id);
	$download->downloadDoc();
}
?>