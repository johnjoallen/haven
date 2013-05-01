<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit']) && $_FILES['insurance']['size'] > 0){
//read in data 
	
	$filename = $_FILES['insurance']['name'];
	$tmpname = $_FILES['insurance']['tmp_name'];
	$filetype  = $_FILES['insurance']['type'];
	$filesize = $_FILES['insurance']['size'];
	$copyof = $_POST['copyof'];
	
	//file access to read the file content
	$fp = fopen($tmpname, 'r');
	$filecontent = fread($fp, filesize($tmpname));
	$filecontent = addslashes($filecontent);
	fclose($fp);
	
	if(!get_magic_quotes_gpc())
	{
		$filename = addslashes($filename);
	}
	$insuranceobj = new Documentation();
	$insuranceobj->setFileName($filename);
	$insuranceobj->setFileSize($filesize);
	$insuranceobj->setFileType($filetype);
	$insuranceobj->setFileContent($filecontent);
	$insuranceobj->setRefKey($_SESSION['editvolunteer']);
	$insuranceobj->setCopyOf($copyof);
	$insuranceobj->insertDoc();
	
	}else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:..views/index.php");
}