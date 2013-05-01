<?php
include("../config/appconfig.php");

$newobj = new Volunteer();
$num = 6;
$newobj->setV_ID($num);
$newobj->volunteerDetail();


?>