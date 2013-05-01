<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
?>
		<div id="main">
			<p class="text">
			<p class="text">
			<?php if(isset($_SESSION['error'])){
				echo("<h3>" . $_SESSION['error'] . "</h2>");
			}
			if(isset($_SESSION['success'])){
				echo("<h3>" . $_SESSION['success'] . "</h2>");
			}
			$_SESSION['success'] = "";
			$_SESSION['error'] = "";
			?>
				<form class="form1" method="POST" action="../logic/addVolunteer.php">
				<p> Please fill in the form below to add a new Volunteer to the database<p>
				<p></p>
				<fieldset>
				<legend>Personal Details</legend>
				<div>
				<br />
				<label for="fname" class="textarea" >First Name:</label>
				<input type="text" name="fname" id="fname" class="input"/>
				</div>
				<div>
				<label for="lname" class="textarea">Last Name:</label>
				<input type="text" name="lname" id="lname" class="input"/>
				</div>
				<div>
				<label for="passportname" class="textarea">Passport Name:</label>
				<input type="text" name="passportname" id="passportname" class="input" />
				</div>
				<div>
				<label for="dob" class="textarea">Date Of Birth:</label>
				<select name="dbday" class="select">
					<option value="<?php echo(date('d')); ?>"><?php echo(date('d')); ?></option>
					<?php
					for($x = 1;$x <= 31; $x++){
						if($x > 31){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				<select name="dbmonth" class="select">
					<option value="<?php echo(date('m')); ?>"><?php echo(date('m')); ?></option>
					<?php
					for($x = 1;$x <= 12; $x++){
						if($x > 12){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				<select name="dbyear" class="select">
				<option value="<?php echo(date('Y')); ?>"><?php echo(date('Y')); ?></option>
					<?php
					for($x = 1920;$x <= 2020; $x++){
						if($x > 2020){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				</div>
				<div>
				<label for="sex" class="textarea">Sex:</label>				
				<select name="sex" class="select">
				  <option value="male">Male</option>
				  <option value="female">Female</option>
				</select>
				</div>
				<div>
				<label for="occupation" class="textarea">Occupation:</label>
				<input type="text" name="occupation" id="occupation" class="input"/>
				</div>
				<div>
				<label for="qualification" class="textarea">Qualification:</label>
				<input type="text" name="qualification" id="qualification" class="input"/></div>
				<div>
				<label for="nationality" class="textarea" >Nationality:</label>
				<input type="text" name="nationality" id="nationality" class="input"/>
				</div>
				</fieldset>
				<fieldset>			
				<legend>Address</legend>
				<br />
				<div>
				<label for="street" class="textarea">Street:</label>
				<input type="text" name="street" id="street" class="input"/>
				</div>
				<div>
				<label for="area" class="textarea">Area:</label>
				<input type="text" name="area" id="area" class="input"/>
				</div>
				<div>
				<label for="town" class="textarea">Town:</label>
				<input type="text" name="town" id="town" class="input"/>				
				</div>
				<div>
				<label for="county" class="textarea">County:</label>
				<input type="text" name="county" id="county" class="input"/>				
				</div>
				<div>
				<label for="country" class="textarea">Country:</label>
				<input type="text" name="country" id="country" class="input"/>				
				</div>
				</fieldset>
				<fieldset>
				<legend>Contact Information</legend>
				<br />
				<div>
				<label for="landline" class="textarea">Landline:</label>
				<input type="text" name="landline" id="landline" class="input"/>
				</div>
				<div>
				<label for="mobile" class="textarea">Mobile:</label>
				<input type="text" name="mobile" id="mobile" class="input"/>
				</div>
				<div>
				<label for="email" class="textarea">Email:</label>
				<input type="text" name="email" id="email"  class="input"/>
				</div>
				</fieldset>
				<fieldset>
				<legend>General Details</legend>
				<br />
				<div>
				<label for="lastcontacted" class="textarea">Last Contacted:</label>
				<select name="vlcday" class="select">
						<option value="<?php echo(date('d')); ?>"><?php echo(date('d')); ?></option>
					<?php
					for($x = 1;$x <= 31; $x++){
						if($x > 31){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				<select name="vlcmonth" class="select">
				<option value="<?php echo(date('m')); ?>"><?php echo(date('m')); ?></option>
					<?php
					for($x = 1;$x <= 12; $x++){
						if($x > 12){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				<select name="vlcyear" class="select">
				<option value="<?php echo(date('Y')); ?>"><?php echo(date('Y')); ?></option>
					<?php
					for($x = 2007;$x <= 2020; $x++){
						if($x > 2020){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				</div>
				<div>
				<label for="onlinedonation" class="textarea">Online Donation:</label>
				<select name="onlinedonation" class="select">
					<option name="yes">Yes</option>
					<option name="no">No</option>
				</select>
				</div>
				<div>
				<label for="tshirtsize class="textarea">T-Shirt Size:</label>
				<select name="tshirtsize" class="select">
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
					<option name="none">none</option>
					<option name="carpenter">Carpenter</option>
					<option name="builder">Builder</option>
					<option name="electrician">Electrician</option>
					<option name="plumber">Plumber</option>
					<option name="engineer">Engineer</option>
					<option name="HQ">HQ</option>
					<option name="foreman">Foreman</option>
					<option name="f labourer">F Labourer</option>
					<option name="skilled labourer">Skilled Labourer</option>
					<option name="media">Media</option>
					<option name="catering">Catering</option>
					<option name="medical">Medial</option>
					<option name="painter">Painter</option>
					<option name="plasterer">Plasterer</option>
					<option name="catering">Catering</option>
					<option name="Staff">Staff</option>
					<option name="Health and Safety">Health &amp; Safety</option>
					<option name="water">Water</option>
					</select>
				</div>
				<div>
				<label for="driverl" class="textarea">Drivers License:</label>
				<select name="driverl" class="select">
					<option name="y">Yes</option>
					<option name="n">No</option>
				</select>
				</div>
				<div>
				<label for="trade" class="textarea">Trade:</label>
				<select name="trade" class="select">
					<option name="y">Yes</option>
					<option name="n">No</option>
					<option name="ss">Semi Skilled</option>
				</select>
				</div>
				<div>
				<label for="safepass" class="textarea">Safepass:</label>
				<select name="safepass" class="select">
					<option name="y">Yes</option>
					<option name="n">No</option>
				</select>
				</div>
				<div>
				<label for="heardofhaven" class="textarea">Heard Of Haven:</label>
				<select name="heardofhaven" class="select">
					<option value="Through a Friend">Through A Friend</option>
					<option value="Website">Website</option>
				</select>
				</div>
				<div>
				<label for="tripsexyear" class="textarea">Trips:</label>
				<select name="tripsexyear" class="select">
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
					<option name="y">Yes</option>
					<option name="n">No</option>
				</select>
				</div>
				<div>
				<label for="medicalreq" class="textarea">Medical Requirements: </label>
				<input type="text" name="medicalreq" id="medicalreq" class="input"/>
				</div>
				<div>
				<label for="smoker" class="textarea">Smoker:</label>
				<select name="smoker" class="select">
					<option name="y">Yes</option>
					<option name="n">No</option>
				</select>
				</div>
				<div>
				<label for="dietaryreq" class="textarea">Dietary Requirements:</label>
				<input type="text" name="dietaryreq" id="dietaryreq" class="input"/>
				</div>
				</fieldset>
				<fieldset>
				<legend>Travel Details</legend>
				<br />
				<div>
				<label for="advanceparty" class="textarea">Advance Party:</label>
				<input type="text" name="advanceparty" id="advanceparty" class="input"/>
				</div>
				<div>
				<label for="houseno" class="textarea">House Number:</label>
				<input type="text" name="houseno" id="houseno" class="input"/>
				</div>
				<div>
				<label for="roomshare" class="textarea">Room Share:</label>
				<input type="text" name="roomshare" id="roomshare" class="input"/>
				</div>
				<div>
				<label for="roomno" class="textarea">Room Number:</label>
				<input type="text" name="roomno" id="roomno" class="input"/>
				</div>
				<div>
				<label for="outboundflight1" class="textarea">Outbound Flight 1:</label>
				<input type="text" name="outboundflight1" id="outboundflight1" class="input"/>
				</div>
				<div>
				<label for="outboundflight1" class="textarea">Outbound Flight 2:</label>
				<input type="text" name="outboundflight2" id="outboundflight2" class="input"/>
				</div>
				<div>
				<label for="returnflight1" class="textarea">Return Flight 1:</label>
				<input type="text" name="returnflight1" id="returnflight1" class="input"/>
				</div>
				<div>
				<label for="returnflight2" class="textarea">Return Flight 2:</label>
				<input type="text" name="returnflight2" id="returnflight2" class="input"/>
				</div>
				<div>
				<label for="coachno" class="textarea">Coach Number:</label>
				<input type="text" name="coachno" id="coachno" class="input"/>
				</div>
				<div>
				<label for="volunteercoordinator" class="textarea">Volunteer Coordinator:</label>
				<input type="text" name="volunteercoordinator" id="volunteercoordinator" class="input"/>
				</div>
				<div>
				<label for="passportno" class="textarea">Passport Number:</label>
				<input type="text" name="passportno" id="passportno" class="input"/>
				</div>
				<div>
				<label for="passportexpiry" class="textarea">Passport Expiry:</label>
				<select name="pexmonth" class="select">
					<?php
					for($x = 1;$x <= 12; $x++){
						if($x > 12){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				<select name="pexyear" class="select">
					<?php
					for($x = 2009;$x <= 2020; $x++){
						if($x > 2020){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				</div>
				<div>
				<label for="visano" class="textarea">Visa Number:</label>
				<input type="text" name="visano" id="visano" class="input"/>
				</div>
				<div>
				<label for="groupname" class="textarea">Group:</label>
				<select name="groupname" class="select">
					<?php 
						$grp = new Group();
						$grp->GroupNames();
					?>
				</select>
				</div>
				<div>
				<label for="team" class="textarea">Team:</label>
				<select name="team" id="team" class="select">
					<?php $grp->SubGroupNames(); ?>
				</select>
				</div>
				</fieldset>
				<fieldset>
				<legend>NOK1's Details</legend>
				<br />
				<div>
				<label for="nok1fname" class="textarea">NOK 1 First Name:</label>
				<input type="text" name="nok1fname" id="nok1fname" class="input"/>
				</div>
				<div>
				<label for="nok1lname" class="textarea">NOK 1 Last Name:</label>
				<input type="text" name="nok1lname" id="nok1lname" class="input"/>
				</div>
				<div>
				<label for="nok1landline" class="textarea">NOK 1 Landline:</label>
				<input type="text" name="nok1landline" id="nok1landline" class="input"/>
				</div>
				<div>
				<label for="nok1mobile" class="textarea">NOK 1 Mobile:</label>
				<input type="text" name="nok1mobile" id="nok1mobile" class="input"/>
				</div>
				<div>
				<label for="nok1rel" class="textarea">NOK 1 Relationship:</label>
				<select name="nok1rel" class="select">
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
				<input type="text" name="nok2fname" id="nok2fname" class="input"/>
				</div>
				<div>
				<label for="nok2lname" class="textarea">NOK 2 Last Name:</label>
				<input type="text" name="nok2lname" id="nok2lname" class="input"/>
				</div>
				<div>
				<label for="nok2landline" class="textarea">NOK 2 LandLine:</label>
				<input type="text" name="nok2landline" id="nok2landline" class="input"/>
				</div>
				<div>
				<label for="nok2mobile" class="textarea">NOK 2 Mobile:</label>
				<input type="text" name="nok2mobile" id="nok2mobile" class="input"/>
				</div>
				<div>
				<label for="nok2rel" class="textarea">NOK 2 Relationship:</label>
				<select name="nok2rel" class="select">
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
				</form>
			</p>
		</div>
<?php
include('footer.php');
?>