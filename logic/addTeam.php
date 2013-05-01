<?php
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit'])){
//read in data 
$team = Trim(stripslashes($_POST['team'])); 
$foreman = Trim(stripslashes($_POST['foreman'])); 

//create Team object
$teamobj = new Team();
//create SETS for the data
$teamobj->setTeam($team);
$teamobj->setForeman($foreman);

} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/index.php");
}
?>
