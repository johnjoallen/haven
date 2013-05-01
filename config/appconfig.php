<?php
//include program class files
include("../classes/hvnVolunteersClass.php");
include("../classes/hvnContactsClass.php");
include("../classes/hvnNotesClass.php");
include("../classes/hvnUsersClass.php");
include("../classes/hvnDocumentationClass.php");
include("../classes/hvnTeamClass.php");
include("../classes/hvnEventsClass.php");
include("../classes/hvnFinanceHistoryClass.php");
include("../classes/class.phpmailer.php");
include("../classes/hvnGroupClass.php");

//UI work
//Array to store the onsite trades
$trades_array = array("carpenter","builder","electrician","plumber","engineer","HQ","foreman","f labourer","skilled labourer","media","catering","medical","painter","plasterer","staff","Health and Safety","water");

//SMTP server Details
$MAIL_HOST = "mail.johnjoallen.com";
$MAIL_USER = "";
$MAIL_PASS = "";
?>