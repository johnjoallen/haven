<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit']) && $_FILES['passport']['size'] > 0){
//read in data 
	
	$filename = $_FILES['passport']['name'];
	$tmpname = $_FILES['passport']['tmp_name'];
	$filetype  = $_FILES['passport']['type'];
	$filesize = $_FILES['passport']['size'];
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
	$passportobj = new Documentation();
	$passportobj->setFileName($filename);
	$passportobj->setFileSize($filesize);
	$passportobj->setFileType($filetype);
	$passportobj->setFileContent($filecontent);
	$passportobj->setRefKey($_SESSION['editvolunteer']);
	$passportobj->setCopyOf($copyof);
	$passportobj->insertDoc();

} else {
	$_SESSION['error'] = "Upload Error Try Again";
	header("Location:../views/hvnEditVolunteer.php");
}
?>