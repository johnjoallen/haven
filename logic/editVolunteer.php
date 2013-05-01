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
$vFname = Trim(stripslashes($_POST['fname'])); 
$vLname = Trim(stripslashes($_POST['lname'])); 
$passportname = Trim(stripslashes($_POST['passportname'])); 
$dbday = Trim(stripslashes($_POST['dbday']));
$dbmonth = Trim(stripslashes($_POST['dbmonth']));
$dbyear = Trim(stripslashes($_POST['dbyear']));
$sex = Trim(stripslashes($_POST['sex']));
$vStreet = Trim(stripslashes($_POST['street']));
$vArea = Trim(stripslashes($_POST['area']));
$vTown = Trim(stripslashes($_POST['town']));
$vCounty = Trim(stripslashes($_POST['county']));
$vCountry = Trim(stripslashes($_POST['country']));
$vLandline = Trim(stripslashes($_POST['landline']));
$vMobile = Trim(stripslashes($_POST['mobile']));
$vEmail = Trim(stripslashes($_POST['email']));
$vOccupation = Trim(stripslashes($_POST['occupation']));
$qualification = Trim(stripslashes($_POST['qualification']));
$passportno = Trim(stripslashes($_POST['passportno'])); 
$nationality = Trim(stripslashes($_POST['nationality']));
$pexmonth = Trim(stripslashes($_POST['pexmonth']));
$pexyear = Trim(stripslashes($_POST['pexyear']));
$onsite = Trim(stripslashes($_POST['onsite']));
$driverl = Trim(stripslashes($_POST['driverl']));
$trade = Trim(stripslashes($_POST['trade']));
$safepass = Trim(stripslashes($_POST['safepass']));
$visano = Trim(stripslashes($_POST['visano']));
$medicalconditions = Trim(stripslashes($_POST['medicalconditions']));
$medicalreq = Trim(stripslashes($_POST['medicalreq']));
$smoker = Trim(stripslashes($_POST['smoker']));
$dietaryreq = Trim(stripslashes($_POST['dietaryreq']));
$nok1fname = Trim(stripslashes($_POST['nok1fname']));
$nok1lname = Trim(stripslashes($_POST['nok1lname']));
$nok1mobile = Trim(stripslashes($_POST['nok1mobile']));
$nok1landline = Trim(stripslashes($_POST['nok1landline']));
$nok1rel= Trim(stripslashes($_POST['nok1rel']));
$nok2fname = Trim(stripslashes($_POST['nok2fname']));
$nok2lname = Trim(stripslashes($_POST['nok2lname']));
$nok2mobile = Trim(stripslashes($_POST['nok2mobile']));
$nok2landline= Trim(stripslashes($_POST['nok2landline']));
$nok2rel= Trim(stripslashes($_POST['nok2rel']));
$onlinedonation = Trim(stripslashes($_POST['onlinedonation']));
$tshirtsize = Trim(stripslashes($_POST['tshirtsize']));
$groupname = Trim(stripslashes($_POST['groupname']));
$team = Trim(stripslashes($_POST['team']));
$trips = Trim(stripslashes($_POST['tripsexyear']));
$advanceparty = Trim(stripslashes($_POST['advanceparty']));
$houseno = Trim(stripslashes($_POST['houseno']));
$roomshare = Trim(stripslashes($_POST['roomshare']));
$roomno = Trim(stripslashes($_POST['roomno']));
$outboundflight1 = Trim(stripslashes($_POST['outboundflight1']));
$outboundflight2 = Trim(stripslashes($_POST['outboundflight2']));
$returnflight1 = Trim(stripslashes($_POST['returnflight1']));
$returnflight2 = Trim(stripslashes($_POST['returnflight2']));
$coachno = Trim(stripslashes($_POST['coachno']));
$volunteercoordinator = Trim(stripslashes($_POST['volunteercoordinator']));
$vlcday = Trim(stripslashes($_POST['vlcday']));
$vlcmonth = Trim(stripslashes($_POST['vlcmonth']));
$vlcyear = Trim(stripslashes($_POST['vlcyear']));
$vcbday = Trim(stripslashes($_POST['vcbday']));
$vcbmonth = Trim(stripslashes($_POST['vcbmonth']));
$vcbyear = Trim(stripslashes($_POST['vcbyear']));
$vHeardofhaven = Trim(stripslashes($_POST['heardofhaven']));

//parse for MySQL compatibility
$pexdate = Trim(stripslashes($_POST['pexdate']));
$dbdate = Trim(stripslashes($_POST['dbdate']));
$vlcdate = Trim(stripslashes($_POST['vlcdate']));
$vcbdate = Trim(stripslashes($_POST['vcbdate']));

//create Volunteer object
$volunteerobj = new Volunteer();
//create SETS for the data
$volunteerobj->setV_ID(Trim(stripslashes($_SESSION['editvolunteer'])));
$volunteerobj->setFname($vFname);
$volunteerobj->setLname($vLname);
$volunteerobj->setPassportName($passportname);
$volunteerobj->setDob($dbdate);
$volunteerobj->setSex($sex);
$volunteerobj->setAddress1($vStreet);
$volunteerobj->setAddress2($vArea);
$volunteerobj->setAddress3($vTown);
$volunteerobj->setCounty($vCounty);
$volunteerobj->setCountry($vCountry);
$volunteerobj->setLandline($vLandline);
$volunteerobj->setMobile($vMobile);
$volunteerobj->setEmail($vEmail);
$volunteerobj->setOccupation($vOccupation);
$volunteerobj->setQualification($qualification);
$volunteerobj->setPassportNo($passportno);
$volunteerobj->setNationality($nationality);
$volunteerobj->setPassportExpiry($pexdate);
$volunteerobj->setOnsiteTrade($onsite);
$volunteerobj->setDriverL($driverl);
$volunteerobj->setTrade($trade);
$volunteerobj->setSafePass($safepass);
$volunteerobj->setVisaNo($visano);
$volunteerobj->setMedicalConditions($medicalconditions);
$volunteerobj->setMedicalReq($medicalreq);
$volunteerobj->setSmoker($smoker);
$volunteerobj->setDietaryReq($dietaryreq);
$volunteerobj->setNOK1Fname($nok1fname);
$volunteerobj->setNOK1Lname($nok1lname);
$volunteerobj->setNOK1Mobile($nok1mobile);
$volunteerobj->setNOK1Landline($nok1landline);
$volunteerobj->setNOK1Rel($nok1rel);
$volunteerobj->setNOK2Fname($nok2fname);
$volunteerobj->setNOK2Lname($nok2lname);
$volunteerobj->setNOK2Mobile($nok2mobile);
$volunteerobj->setNOK2Landline($nok2landline);
$volunteerobj->setNOK2Rel($nok2rel);
$volunteerobj->setOnlineDonation($onlinedonation);
$volunteerobj->setTShirt($tshirtsize);
$volunteerobj->setGroupName($groupname);
$volunteerobj->setTeam($team);
$volunteerobj->setTrips($trips);
$volunteerobj->setAdvanceParty($advanceparty);
$volunteerobj->setHouseNo($houseno);
$volunteerobj->setRoomShare($roomshare);
$volunteerobj->setRoomNo($roomno);
$volunteerobj->setOutboundFlight1($outboundflight1);
$volunteerobj->setOutboundFlight2($outboundflight2);
$volunteerobj->setReturnFlight1($returnflight1);
$volunteerobj->setReturnFlight2($returnflight2);
$volunteerobj->setCoachNo($coachno);
$volunteerobj->setVolunteerCoordinator($volunteercoordinator);
$volunteerobj->setLastContacted($vlcdate);
$volunteerobj->setCallback($vcbdate);
$volunteerobj->setHeardOfHaven($vHeardofhaven);
$volunteerobj->updateVolunteer();

} else if(isset($_POST['cancel'])){
	//redirect to dashboard 
	header("Location:../views/hvnVolunteers.php");
}
?>