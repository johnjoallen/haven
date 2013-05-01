<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit']) && $_FILES['conduct']['size'] > 0){
//read in data 
	
	$filename = $_FILES['conduct']['name'];
	$tmpname = $_FILES['conduct']['tmp_name'];
	$filetype  = $_FILES['conduct']['type'];
	$filesize = $_FILES['conduct']['size'];
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