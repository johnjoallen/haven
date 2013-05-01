<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
if(isset($_SESSION['editvolunteer'])){
	$view = $_SESSION['editvolunteer'];
	$editobj = New Volunteer();
	$editobj->setV_ID($view);
	$editobj->volunteerDetail();
?>
		<div id="main">
			<p class="text">
			<?php if(!empty($_SESSION['error'])){
				echo("<h2>Error: " . $_SESSION['error'] . "</h2>");
			}
			if(!empty($_SESSION['success'])){
				echo("<h2>" . $_SESSION['success'] . "</h2>");
			}
			$_SESSION['success'] = "";
			$_SESSION['error'] = "";
			?>
			<div class="tabber">
			<div class="tabbertab">
			<h2>Edit Volunteer <? echo($editobj->getPassportName()); ?></h2>
				<form method="POST" class="form1" action="../logic/editVolunteer.php">
				<p></p>
				<table>
				<fieldset>
				<legend>Personal Details</legend>
				<div>
				<br />
				<label for="fname" class="textarea" >First Name:</label>
				<input type="text" class="input" name="fname" id="fname" value="<? echo($editobj->getFname()); ?>" />
				</div>
				<div>
				<label for="lname" class="textarea">Last Name:</label>
				<input type="text" class="input" name="lname" id="lname" value="<? echo($editobj->getLname()); ?>" />
				</div>
				<div>
				<label for="passportname" class="textarea">Passport Name:</label>
				<input type="text" class="input" name="passportname" id="passportname" value="<? echo($editobj->getPassportName()); ?>" />
				</div>
				<div>
				<label for="dob" class="textarea">Date Of Birth:</label>
				<input type="text"class="input" name="dbdate" id="dbdate" value="<? echo($editobj->getDob()); ?>" />
				</div>
				<label for="sex" class="textarea">Sex:</label>
				<select name="sex" class="select">
				<option value="<? echo($editobj->getSex()); ?>" ><? echo($editobj->getSex()); ?></option>
				<option>-- --</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				</select>
				</div>
				<div>
				<label for="occ" class="textarea">Occupation:</label>
				<input type="text" class="input" name="occupation" id="occupation" value="<? echo($editobj->getOccupation()); ?>"/>
				</div>
				<div>
				<label for="qualification" class="textarea">Qualification:</label>
				<input type="text" class="input" name="qualification" id="qualification" value="<? echo($editobj->getQualification()); ?>" />
				</div>
				<div>
				<label for="nationality" class="textarea" >Nationality:</label>
				<input type="text" class="input" name="nationality" id="nationality" value="<? echo($editobj->getQualification()); ?>" />
				</div>
				</fieldset>
				<fieldset>
				<legend>Address</legend>
				<div>
				<br />
				<label for="street" class="textarea">Street:</label>
				<input type="text" class="input" name="street" id="street" value="<? echo($editobj->getAddress1()); ?>" /> 
				</div>
				<div>
				<label for="area" class="textarea">Area:</label>
				<input type="text" class="input" name="area" id="area" value="<? echo($editobj->getAddress2()); ?>" />
				</div>
				<div>
				<label for="town" class="textarea">Town:</label>
				<input type="text" class="input" name="town" id="town" value="<? echo($editobj->getAddress3()); ?>" />
				</div>
				<div>
				<label for="county" class="textarea">County:</label>
				<input type="text" class="input" name="county" id="county" value="<? echo($editobj->getCounty()); ?>" />
				</div>
				<div>
				<label for="country" class="textarea">Country:</label>
				<input type="text" class="input" name="country" id="country" value="<? echo($editobj->getCountry()); ?>" />
				</div>
				</fieldset>
				<fieldset>
				<legend>Contact Information</legend>
				<br />
				<div>
				<label for="landline" class="textarea">Landline:</label>
				<input type="text" name="landline" class="input" id="landline" value="<? echo($editobj->getLandline()); ?>"/>
				</div>
				<div>
				<label for="mobile" class="textarea">Mobile:</label>
				<input type="text" name="mobile" class="input" id="mobile" value="<? echo($editobj->getMobile()); ?>"/>
				</div>
				<div>
				<label for="email" class="textarea">Email:</label>
				<input type="text" name="email" class="input" id="email" value="<? echo($editobj->getEmail()); ?>"/>
				</div>
				</fieldset>
				<fieldset>
				<legend>General Details</legend>
				<br />
				<div>
				<label for="lastcontacted" class="textarea">Last Contacted:</label>
				<input type="text" class="input" name="vlcdate" value="<? echo($editobj->getLastContacted()); ?>" />
				</div>
				<div>
				<label for="onlinedonation" class="textarea">Online Donation:</label>
				<select name="onlinedonation" class="select">
					<option value="<? echo($editobj->getOnlineDonation()); ?>"><? echo($editobj->getOnlineDonation()); ?></option>
					<option>-- -- --</option>
					<option name="yes">Yes</option>
					<option name="no">No</option>
				</select>
				</div>
				<div>
				<label for="tshirtsize class="textarea">T-Shirt Size:</label>
				<select name="tshirtsize" class="select">
				<option value="<? echo($editobj->getTShirt()); ?>"><? echo($editobj->getTShirt()); ?></option>
					<option>-- -- --</option>
					<option name="s">S</option>
					<option name="m">M</option>
					<option name="l">L</option>
					<option name="xl">XL</option>
					<option name="xxl">XXL</option>
				</select>
				</div>
				<div>
				<label for="onsite" class="textarea">Onsite Trade:</label>
				<select name="onsite" class="select">
					<option value="<? echo($editobj->getOnsiteTrade()); ?>"><? echo($editobj->getOnsiteTrade()); ?></option>
					<option>-- -- --</option>
					<option name="carpenter">Carpenter</option>
					<option name="builder">Builder</option>
					<option name="electrician">Electrician</option>
					<option name="plumber">Plumber</option>
					<option name="electricale">Electrical Engineer</option>
					<option name="engineer">Engineer</option>
					<option name="machine driver">Machine Driver</option>
					<option name="handy man">Handy Man</option>
					<option name="labourer">Labourer</option>
				</select>
				</div>
				<div>
				<label for="driverl" class="textarea">Drivers License:</label>
				<select name="driverl" class="select">
					<option value="<? echo($editobj->getDriverL()); ?>"><? echo($editobj->getDriverL()); ?></option>
					<option>-- -- --</option>
					<option name="y">Yes</option>
					<option name="n">No</option>
				</select>
				</div>
				<div>
				<label for="trade" class="textarea">Trade:</label>
				<input type="text" class="input" name="trade" id="trade" value="<? echo($editobj->getTrade()); ?>" />
				</div>
				<div>
				<label for="safepass" class="textarea">Safepass:</label>
				<select name="safepass" class="select">
					<option value="<? echo($editobj->getSafePass()); ?>"><? echo($editobj->getSafePass()); ?></option>
					<option>-- -- --</option>
					<option name="y">Yes</option>
					<option name="n">No</option>
				</select>
				<div>
				<label for="heardofhaven" class="textarea">Heard Of Haven:</label>
				<select name="heardofhaven" class="select">
					<option value="<? echo($editobj->getHeardOfHaven()); ?>"><? echo($editobj->getHeardOfHaven()); ?></option>
					<option>-- -- --</option>
					<option value="Through a Friend">Through A Friend</option>
					<option value="Website">Website</option>
				</select>
				</div>
				<div>
				<label for="tripsexyear" class="textarea">Trips:</label>
				<select name="tripsexyear" class="select">
					<option value="<? echo($editobj->getTrips()); ?>"><? echo($editobj->getTrips()); ?></option>
					<option>-- -- --</option>
					<?php
					for($x = 0;$x <= 5; $x++){
						if($x > 5){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				</div>
				</fieldset>
				<fieldset>
				<legend>Medical Details</legend>
				<br />
				<div>
				<label for="medicalconditions" class="textarea">Medical Conditions:</label>
				<select name="medicalconditions" class="select">
					<option value="<? echo($editobj->getMedicalConditions()); ?>"><? echo($editobj->getMedicalConditions()); ?></option>
					<option>-- -- --</option>
					<option name="y">Yes</option>
					<option name="n">No</option>
				</select>
				</div>
				<div>
				<label for="medicalreq" class="textarea">Medical Requirements: </label>
				<input type="text" name="medicalreq" class="input" id="medicalreq" value="<? echo($editobj->getMedicalReq()); ?>"/>
				</div>
				<div>
				<label for="smoker" class="textarea">Smoker:</label>
				<select name="smoker" class="select">
					<option value="<? echo($editobj->getSmoker()); ?>"><? echo($editobj->getSmoker()); ?></option>
					<option>-- -- --</option>
					<option name="y">Yes</option>
					<option name="n">No</option>
				</select>
				</div>
				<div>
				<label for="dietaryreq" class="textarea">Dietary Requirements:</label>
				<input type="text" name="dietaryreq" class="input" id="dietaryreq" value="<? echo($editobj->getDietaryReq()); ?>"/>
				</div>
				</fieldset>
				<fieldset>
				<legend>Travel Details</legend>
				<br />
				<div>
				<label for="advanceparty" class="textarea">Advance Party:</label>
				<input type="text" class="input" name="advanceparty" id="advanceparty" value="<? echo($editobj->getAdvanceParty()); ?>" />
				</div>
				<div>
				<label for="houseno" class="textarea">House Number:</label>
				<input type="text" class="input" name="houseno" class="input" id="houseno" value="<? echo($editobj->getHouseNo()); ?>" />
				</div>
				<div>
				<label for="roomshare" class="textarea">Room Share:</label>
				<input type="text" class="input" name="roomshare" id="roomshare" value="<? echo($editobj->getRoomShare()); ?>" />
				</div>
				<div>
				<label for="roomno" class="textarea">Room Number:</label>
				<input type="text" class="input" name="roomnumber" class="input" id="roomnumber" value="<? echo($editobj->getRoomNo()); ?>" />
				</div>
				<div>
				<label for="outboundflight1" class="textarea">Outbound Flight 1:</label>
				<input type="text" class="input" name="outboundflight1" id="outboundflight1" value="<? echo($editobj->getOutboundFlight1()); ?>" />
				</div>
				<div>
				<label for="outboundflight2" class="textarea">Outbound Flight 2:</label>
				<input type="text" class="input" name="outboundflight2" id="outboundflight2" value="<? echo($editobj->getOutboundFlight2()); ?>" />
				</div>
				<div>
				<label for="returnflight1" class="textarea">Return Flight 1:</label>
				<input type="text" class="input" name="returnflight1" id="returnflight1" value="<? echo($editobj->getReturnFlight1()); ?>" />
				</div>
				<div>
				<label for="returnflight2" class="textarea">Return Flight 2:</label>
				<input type="text" class="input" name="returnflight2" id="returnflight2" value="<? echo($editobj->getReturnFlight2()); ?>" />
				</div>
				<div>
				<label for="coachno" class="textarea">Coach Number:</label>
				<input type="text" name="coachno" class="input" id="coachno" value="<? echo($editobj->getCoachNo()); ?>" />
				</div>
				<div>
				<label for="volunteercoordinator" class="textarea">Volunteer Coordinator:</label>
				<input type="text" class="input" name="volunteercoordinator" id="volunteercoordinator" value="<? echo($editobj->getVolunteerCoordinator()); ?>" />
				</div>
				<div>
				<label for="passportno" class="textarea">Passport Number:</label>
				<input type="text" class="input" name="passportno" id="passportno" value="<? echo($editobj->getPassportNo()); ?>" />
				</div>
				<div>
				<label for="passportexpiry" class="textarea">Passport Expiry:</label>
				<input type="text" class="input" name="pexdate" value="<? echo($editobj->getPassportExpiry()); ?>" />
				</div>
				<div>
				<label for="visano" class="textarea">Visa Number:</label>
				<input type="text" class="input" name="visano" id="visano" value="<? echo($editobj->getVisaNo()); ?>"/>
				</div>
				<div>
				<label for="groupname" class="textarea">Group:</label>
				<select name="groupname" class="select">
					<option value="<? echo($editobj->getGroupName()); ?>"><? echo($editobj->getGroupName()); ?></option>
					<option>--Select Group--</option>
						<?php 
							$grp = new Group();
							$grp->GroupNames();
						?>
					</select>
				</div>
				<div>
				<label for="team" class="textarea">Team:</label>
				<select class="select" name="team" />
					<option value="<? echo($editobj->getTeam()); ?>"><? echo($editobj->getTeam()); ?></option>
					<option>-- --</option>
					<? $grp->SubGroupNames(); ?>
				</select>
				</div>
				</fieldset>
				<fieldset>
				<legend>NOK1's Details</legend>
				<br />
				<div>
				<label for="nok1fname" class="textarea">NOK 1 First Name:</label>
				<input type="text" class="input" name="nok1fname" id="nok1fname" value="<? echo($editobj->getNOK1Fname()); ?>" />
				</div>
				<div>
				<label for="nok1lname" class="textarea">NOK 1 Last Name:</label>
				<input type="text" class="input" name="nok1lname" id="nok1lname" value="<? echo($editobj->getNOK1Lname()); ?>" />
				</div>
				<div>
				<label for="nok1landline" class="textarea">NOK 1 Landline:</label>
				<input type="text" class="input" name="nok1landline" id="nok1landline" value="<? echo($editobj->getNOK1Landline()); ?>" />
				</div>
				<div>
				<label for="nok1mobile" class="textarea">NOK 1 Mobile:</label>
				<input type="text" class="input" name="nok1mobile" id="nok1mobile" value="<? echo($editobj->getNOK1Mobile()); ?>" />
				</div>
				<div>
				<label for="nok1rel" class="textarea">NOK 1 Relationship:</label>
				<select name="nok1rel" class="select">
					<option value="<? echo($editobj->getNOK1Rel()); ?>"><? echo($editobj->getNOK1Rel()); ?></option>
					<option>-- -- --</option>
					<option name="mother">Mother</option>
					<option name="father">Father</option>
					<option name="brother">Brother</option>
					<option name="sister">Sister</option>
					<option name="guardian">Guardian</option>
				</select>
				</div>
				</fieldset>
				<fieldset>
				<legend>NOK2's Details</legend>
				<br />
				<div>
				<label for="nok2fname" class="textarea">NOK 2 First Name:</label>
				<input type="text" class="input" name="nok2fname" id="nok2fname" value="<? echo($editobj->getNOK2Fname()); ?>" />
				</div>
				<label for="nok2lname" class="textarea">NOK 2 Last Name:</label>
				<input type="text" class="input" name="nok2lname" id="nok2lname" value="<? echo($editobj->getNOK2Lname()); ?>" />
				</div>
				<div>
				<label for="nok2landline" class="textarea">NOK 2 LandLine:</label>
				<input type="text" class="input" name="nok2landline" id="nok2landline" value="<? echo($editobj->getNOK2Landline()); ?>" />
				</div>
				<div>
				<label for="nok2mobile" class="textarea">NOK 2 Mobile:</label>
				<input type="text" class="input" name="nok2mobile" id="nok2mobile" value="<? echo($editobj->getNOK2Mobile()); ?>" />
				</div>
				<div>
				<label for="nok2rel" class="textarea">NOK 2 Relationship:</label>
				<select name="nok2rel" class="select">
					<option value="<? echo($editobj->getNOK2Rel()); ?>"><? echo($editobj->getNOK2Rel()); ?></option>
					<option>-- -- --</option>
					<option name="mother">Mother</option>
					<option name="father">Father</option>
					<option name="brother">Brother</option>
					<option name="sister">Sister</option>
					<option name="guardian">Guardian</option>
				</select>
				</div>
				</fieldset>
				<div align="left">
				 <input type="submit" value="Submit" name="submit" />
				 <input type="submit" value="Cancel" name="cancel" />
				 </div>
				</table>
				</form>
				</div>
				<div class="tabbertab">
				<h3>Edit Financial Information</h3>
				<table border='0' class="vol_table vol_table th" width="450">
				<form method="POST" action="../logic/financeSelect.php">
				<input type="submit" name="edit1" value="Edit" /> <input type="submit" name="delete1" value="Delete" />
				<tr><td>
				<?php
					$finance = new FinanceHistory();
					$finance->setRefkey($view);
					$finance->editFinance();
				?>
				</form>
				</td></tr></table>
				</div>
				<div class="tabbertab">
				<table border='0' class="vol_table vol_table th" width="450">
				<h3>Edit Documentation</h3>
				<form method="post" enctype="multipart/form-data" action="../logic/addPassport.php">
				<tr>
				<td>Passport: <input type="file" name="passport" id="passport" />
				<input type="hidden" name="copyof" value="passport" /></td>
				</tr>
				<tr>
				<td><input type="submit" name="submit" value="submit" /></td>
				</td>
				</tr>
				</form>
				<form method="post" enctype="multipart/form-data" action="../logic/addSafepass.php">
				<tr>
				<td>Safe Pass: <input type="file" name="safepass" id="safepass" />
				<input type="hidden" name="copyof" value="safepass" /></td>
				</tr>
				<tr>
				<td><input type="submit" name="submit" value="Submit" /></td>
				</td>
				</tr>
				</form>
				<form method="post" enctype="multipart/form-data" action="../logic/addInsurance.php">
				<tr>
				<td>Insurance: <input type="file" name="insurance" id="insurance" />
				<input type="hidden" name="copyof" value="insurance" /></td>
				</tr>
				<tr>
				<td><input type="submit" name="submit" value="Submit" /></td>
				</td>
				</tr>
				</form>
				<form method="post" enctype="multipart/form-data" action="../logic/addTermsAndConditions.php">
				<tr>
				<td>Terms and Conditions: <input type="file" name="tc" id="tc" />
				<input type="hidden" name="copyof" value="tc" /></td>
				</tr>
				<tr>
				<td><input type="submit" name="submit" value="Submit" /></td>
				</td>
				</tr>
				</form>
				<form method="post" enctype="multipart/form-data" action="../logic/addDeclaration.php">
				<tr>
				<td>Declaration: <input type="hidden" name="copyof" value="declaration" />
				<input type="file" name="declaration" id="declaration" /></td>
				</tr>
				<tr>
				<td><input type="submit" name="submit" value="Submit" /></td>
				</td>
				</tr>
				</form>
				<form method="post" enctype="multipart/form-data" action="../logic/addOriginalApplication.php">
				<tr>
				<td>Original Application: <input type="hidden" name="copyof" value="oa" />
				<input type="file" name="oa" id="oa" /></td>
				</tr>
				<tr>
				<td><input type="submit" name="submit" value="Submit" /></td>
				</td>
				</tr>
				</form>
				<form method="post" enctype="multipart/form-data" action="../logic/addMedicalCert.php">
				<tr>
				<td>Medical Cert: <input type="hidden" name="copyof" value="medical" />
				<input type="file" name="medical" id="medical" /></td>
				</tr>
				<tr>
				<td><input type="submit" name="submit" value="Submit" /></td>
				</td>
				</tr>
				</form>
				<form method="post" enctype="multipart/form-data" action="../logic/addMedicalHistory.php">
				<tr>
				<td>Medical History: <input type="hidden" name="copyof" value="medicalh" />
				<input type="file" name="medicalh" id="medicalh" /></td>
				</tr>
				<tr>
				<td><input type="submit" name="submit" value="Submit" /></td>
				</td>
				</tr>
				</form>
				<form method="post" enctype="multipart/form-data" action="../logic/addCodeConduct.php">
				<tr>
				<td>Code of Conduct: <input type="hidden" name="copyof" value="conduct" />
				<input type="file" name="conduct" id="conduct" /></td>
				</tr>
				<tr>
				<td><input type="submit" name="submit" value="Submit" /></td>
				</td>
				</tr>
				</form>
				</td></tr></table>
				</div>
				</div>
			</p>
		</div>
<?
} else {
	header("Location:hvnVolunteers.php");
}
include('footer.php');
?>