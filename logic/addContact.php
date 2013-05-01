<?php
include("../config/appconfig.php");
//take in data
if(isset($_POST['submit'])){
//read in data 
$cFname = Trim(stripslashes($_POST['fname'])); 
$cLname = Trim(stripslashes($_POST['lname'])); 
$cStatus = Trim(stripslashes($_POST['status']));
$occ = Trim(stripslashes($_POST['occ']));
$street = Trim(stripslashes($_POST['street']));
$area = Trim(stripslashes($_POST['area']));
$town = Trim(stripslashes($_POST['town']));
$county = Trim(stripslashes($_POST['county']));
$country = Trim(stripslashes($_POST['country']));
$landline = Trim(stripslashes($_POST['landline']));
$mobile = Trim(stripslashes($_POST['mobile']));
$email = Trim(stripslashes($_POST['email']));
$cbday = Trim(stripslashes($_POST['cbday']));
$cbmonth = Trim(stripslashes($_POST['cbmonth']));
$cbyear = Trim(stripslashes($_POST['cbyear']));
$hoh = Trim(stripslashes($_POST['hoh']));
$lcday = Trim(stripslashes($_POST['lcday']));
$lcmonth = Trim(stripslashes($_POST['lcmonth']));
$lcyear = Trim(stripslashes($_POST['lcyear']));
$cTrip = Trim(stripslashes($_POST['trip']));
//parse for MySQL compatibility
$cbdate = $cbyear . "-" . $cbmonth . "-" . $cbday;
$lcdate = $lcyear . "-" . $lcmonth . "-" . $lcday;
//create Contact object
$contactobj = new Contact();
//create SETS for the data
$contactobj->setFname($cFname);
$contactobj->setLname($cLname);
$contactobj->setStatus($cStatus);
$contactobj->setEmail($email);
$contactobj->setAddr1($street);
$contactobj->setAddr2($area);
$contactobj->setAddr3($town);
$contactobj->setCounty($county);
$contactobj->setCountry($country);
$contactobj->setOccupation($occ);
$contactobj->setMobile($mobile);
$contactobj->setLandline($landline);
$contactobj->setHOH($hoh);
$contactobj->setLastContacted($lcdate);
$contactobj->setCallback($cbdate);
$contactobj->setTrip($cTrip);
$contactobj->insertContact();

} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/hvnContacts.php");
}
?>