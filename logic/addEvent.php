<?php
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit'])){
//read in data 
$name_of_event = Trim(stripslashes($_POST['name_of_event'])); 
$description = Trim(stripslashes($_POST['description'])); 
$evday = Trim(stripslashes($_POST['evday'])); 
$evmonth = Trim(stripslashes($_POST['evmonth'])); 
$year = Trim(stripslashes($_POST['evyear'])); 
$evhour = Trim(stripslashes($_POST['evhour']));
$evminutes = Trim(stripslashes($_POST['evminutes']));
$loc = Trim(stripslashes($_POST['loc']));

//parse for MySQL compatibility
$evdate = $year . "-" . $evmonth . "-" . $evday ;
$evtime = $evhour . ":" . $evminutes . ":" . "00";
//create Contact object
$eventobj = new Events();
//create SETS for the data
$eventobj->setNameOfEvent($name_of_event);
$eventobj->setDescription($description);
$eventobj->setDate($evdate);
$eventobj->setTime($evtime);
$eventobj->setLocation($loc);
$eventobj->insertEvent();

} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/hvnEvents.php");
}
?>