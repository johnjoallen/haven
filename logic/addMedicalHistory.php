<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit']) && $_FILES['medicalh']['size'] > 0){
//read in data 
	
	$filename = $_FILES['medicalh']['name'];
	$tmpname = $_FILES['medicalh']['tmp_name'];
	$filetype  = $_FILES['medicalh']['type'];
	$filesize = $_FILES['medicalh']['size'];
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
	$tcobj = new Documentation();
	$tcobj->setFileName($filename);
	$tcobj->setFileSize($filesize);
	$tcobj->setFileType($filetype);
	$tcobj->setFileContent($filecontent);
	$tcobj->setRefKey($_SESSION['editvolunteer']);
	$tcobj->setCopyOf($copyof);
	$tcobj->insertDoc();
	
}else {
	$_SESSION['error'] = "Upload Error Try Again";
	header("Location:../views/hvnEditVolunteer.php");
}
?>