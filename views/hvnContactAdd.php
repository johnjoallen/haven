<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
?>
<style type="text/css">
<!--
.style5 {font-family: "Trebuchet MS", Arial, Helvetica; font-size: 14px; }
-->
</style>
		<div id="main">
			<p class="text">
			<?php if(isset($_GET['error'])){
				echo("<h2>Error: " . $_GET['error'] . "</h2>");
			}
			if(isset($_GET['success'])){
				echo($_GET['success']);
			}
			?>
				<form method="POST" class="form1" style="font-family:"Trebuchet MS", Arial, Helvetica" action="../logic/addContact.php">
				<p> Please fill in the form below to add a new Contact to the database<p>
				<fieldset>
				<legend>Personal Details</legend>
				<br />
				<div>
				<label for="fname" class="textarea" >First Name:</label>
				<input type="text" name="fname" id="fname" class="input"/>
				</div>
				<div>
				<label for="lname" class="textarea">Last Name:</label>
				<input type="text" name="lname" id="lname" class="input"/>
				</div>
				<div>
				<label for="occ" class="textarea">Occupation:</label>
				<input type="text" name="occ" id="occ" class="input"/>
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
				<legend>General Details</legend>
				<br />
				<div>
				<label for="lastcontacted" class="textarea">Last Contacted:</label>
				<select name="lcday" class="select">
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
				<select name="lcmonth" class="select">
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
				<select name="lcyear" class="select">
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
				<label for="hoh" class="textarea">Heard Of Haven:</label>
				<select name="hoh" class="select">
					<option value="Through a Friend">Through A Friend</option>
					<option value="Website">Website</option>
				</select>
				</div>
				<div>
				<label for="status" class="textarea">Status:</label>
				<select name="status" class="select">
				  <option value="app">Application Pending</option>
				  <option value="hot">hot</option>
				  <option value="warm">warm</option>
				  <option value="cold">cold</option>
				</select>
				</div>
				<div>
				<label for="trip" class="textarea">Trip:</label>
				<input type="text" name="trip" id="trip" class="input"/>
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
include("footer.php");
?>