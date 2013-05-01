<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
if(isset($_POST['noteid'])){
	$viewnote = new Notes();
	$viewnote->setN_ID(Trim(stripslashes($_POST['noteid'])));
	$viewnote->pullOneNote();
}
?>