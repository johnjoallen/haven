<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit']) && $_FILES['safepass']['size'] > 0){
//read in data 
	
	$filename = $_FILES['safepass']['name'];
	$tmpname = $_FILES['safepass']['tmp_name'];
	$filetype  = $_FILES['safepass']['type'];
	$filesize = $_FILES['safepass']['size'];
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
	$safepassobj = new Documentation();
	$safepassobj->setFileName($filename);
	$safepassobj->setFileSize($filesize);
	$safepassobj->setFileType($filetype);
	$safepassobj->setFileContent($filecontent);
	$safepassobj->setRefKey($_SESSION['editvolunteer']);
	$safepassobj->setCopyOf($copyof);
	$safepassobj->insertDoc();
	
}else {
	$_SESSION['error'] = "Upload Error Try Again";
	header("Location:../views/hvnEditVolunteer.php");
}
?>