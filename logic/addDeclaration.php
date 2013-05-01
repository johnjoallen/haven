<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit']) && $_FILES['declaration']['size'] > 0){
//read in data 
	$filename = $_FILES['declaration']['name'];
	$tmpname = $_FILES['declaration']['tmp_name'];
	$filetype  = $_FILES['declaration']['type'];
	$filesize = $_FILES['declaration']['size'];
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
	
	$declarationobj = new Documentation();
	$declarationobj->setFileName($filename);
	$declarationobj->setFileSize($filesize);
	$declarationobj->setFileType($filetype);
	$declarationobj->setFileContent($filecontent);
	$declarationobj->setRefKey($_SESSION['editvolunteer']);
	$declarationobj->setCopyOf($copyof);
	$declarationobj->insertDoc();
	
}else {
	//redirect to dashboard 
	$_SESSION['error'] = "Upload Error Try Again";
	header("Location:../views/hvnEditVolunteer.php");
}