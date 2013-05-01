<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit'])){
//read in data 
	
	$filename = $_FILES['safepass']['filename'];
	$tmpname = $_FILES['safepass']['tmp_name'];
	$filetype  = $_FILES['safepass']['filetype'];
	$filesize = $_FILES['safepass']['filesize'];
	$copyof = "safepass";
	
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
	
} else if(isset($_POST['submit'])){

$filename = $_FILES['passport']['filename'];
$filetype  = $_FILES['passport']['filetype'];
$filesize = $_FILES['passport']['filesize'];
$filecontent = $_FILES['passport']['filecontent'];
$copyof = "passport";
}
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
else if(isset($_POST['submit'])){

$filename = $_FILES['insurance']['filename'];
$filetype  = $_FILES['insurance']['filetype'];
$filesize = $_FILES['insurance']['filesize'];
$filecontent = $_FILES['insurance']['filecontent'];
$copyof = $_FILES['insurance']['copyof'];
$refkey = $_FILES['insurance']['refkey'];
}

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

if(isset($_POST['submit'])){
$filename = $_FILES['tc']['filename'];
$filetype  = $_FILES['tc']['filetype'];
$filesize = $_FILES['tc']['filesize'];
$filecontent = $_FILES['tc']['filecontent'];
$copyof = $_FILES['tc']['copyof'];
$refkey = $_FILES['tc']['refkey'];
}
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
	
	
else if(isset($_POST['submit'])){
$filename = $_FILES['declaration']['filename'];
$filetype  = $_FILES['declaration']['filetype'];
$filesize = $_FILES['declaration']['filesize'];
$filecontent = $_FILES['declaration']['filecontent'];

}

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
	
else if(isset($_POST['submit'])){
$filename = $_FILES['oa']['filename'];
$filetype  = $_FILES['oa']['filetype'];
$filesize = $_FILES['oa']['filesize'];
$filecontent = $_FILES['oa']['filecontent'];

}
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
	
}else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/hvnVolunteers.php");
}
?>