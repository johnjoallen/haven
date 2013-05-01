<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit']) && $_FILES['oa']['size'] > 0){
//read in data 
	
	$filename = $_FILES['oa']['name'];
	$tmpname = $_FILES['oa']['tmp_name'];
	$filetype  = $_FILES['oa']['type'];
	$filesize = $_FILES['oa']['size'];
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
	$oaobj = new Documentation();
	$oaobj->setFileName($filename);
	$oaobj->setFileSize($filesize);
	$oaobj->setFileType($filetype);
	$oaobj->setFileContent($filecontent);
	$oaobj->setRefKey($_SESSION['editvolunteer']);
	$oaobj->setCopyOf($copyof);
	$oaobj->insertDoc();
	
}else {
	//redirect to dashboard 
	$_SESSION['error'] = "Upload Error Try Again";
	header("Location:../views/hvnEditVolunteer.php");
}
?>