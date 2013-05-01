<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
if(isset($_SESSION['editcontact'])){
	$view = $_SESSION['editcontact'];
	$detailobj = New Contact();
	$detailobj->setC_ID($view);
	$detailobj->contactDetail();
?>
		<div id="main">
			<p class="text">
			<?php if(isset($_GET['error'])){
				echo("<h2>Error: " . $_GET['error'] . "</h2>");
			}
			if(isset($_GET['success'])){
				echo($_GET['success']);
			}
			?>
				<form method="POST" class="form1" action="../logic/editContact.php">
				<fieldset>
				<legend>Personal Details</legend>
				<br />
				<div>
				<label for="fname" class="textarea" >First Name:</label>
				<input type="text" name="fname" id="fname" class="input" value="<? echo ($detailobj->getFname()); ?>" />
				</div>
				<br />
				<div>
				<label for="lname" class="textarea">Last Name:</label>
				<input type="text" class="input" name="lname" id="lname" value="<? echo ($detailobj->getLname()); ?>" />
				</div>
				<br />
				<div>
				<label for="occ" class="textarea">Occupation:</label>
				<input type="text" class="input" name="occ" id="occ" value="<? echo ($detailobj->getOccupation()); ?>" />
				</div>
				</fieldset>
				<br />
				<fieldset>
				<legend>Contact Information</legend>
				<br />
				<div>
				<label for="landline" class="textarea">Landline:</label>
				<input type="text" name="landline" id="landline" class="input" value="<? echo ($detailobj->getLandline()); ?>" />
				</div>
				<br />
				<div>
				<label for="mobile" class="textarea">Mobile:</label>
				<input type="text" name="mobile" id="mobile" class="input" value="<? echo ($detailobj->getMobile()); ?>" />
				</div>
				<br />
				<div>
				<label for="email" class="textarea">Email:</label>
				<input type="text" name="email" id="email" class="input" value="<? echo ($detailobj->getEmail()); ?>" />
				</div>
				<br />
				</fieldset>
				<br />
				<fieldset>
				<legend>Address</legend>
				<br />
				<div>
				<label for="street" class="textarea">Street:</label>
				<input type="text" name="street" class="input" id="street" value="<? echo ($detailobj->getAddr1()); ?>" />
				</div>
				<br />
				<div>
				<label for="area" class="textarea">Area:</label>
				<input type="text" name="area" class="input" id="area" value="<? echo ($detailobj->getAddr2()); ?>" />
				</div>
				<br />
				<div>
				<label for="town" class="textarea">Town:</label>
				<input type="text" name="town" id="town" class="input" value="<? echo ($detailobj->getAddr3()); ?>" />
				</div>
				<br />
				<div>
				<label for="county" class="textarea">County:</label>
				<input type="text" name="county" id="county" class="input" value="<? echo ($detailobj->getCounty()); ?>"/>
				</div>
				<br />
				<div>
				<label for="country" class="textarea">Country:</label>
				<input type="text" name="country" id="country" class="input" value="<? echo ($detailobj->getCountry()); ?>"/>
				</div>
				<br />
				</fieldset>
				<br />
				<fieldset>
				<legend>General Details</legend>
				<br />
				<div>
				<label for="lastcontacted" class="textarea">Last Contacted:</label>
				<input type="text" class="input" name="lcdate" value="<? echo ($detailobj->getLastcontacted()); ?>" />
				</div>
				<br />
				<div>
				<label for="hoh" class="textarea">Heard Of Haven:</label>
				<select name="hoh" class="select">
					<option value="<? echo ($detailobj->getHOH()); ?>"></option>
					<option value="none">--</option>
					<option value="Through a Friend">Through A Friend</option>
					<option value="Website">Website</option>
				</select>
				</div>
				<br />
				<div>
				<label for="status" class="textarea">Status:</label>
				<select name="status" class="select">
				  <option value="<? echo ($detailobj->getStatus()); ?>"></option>
				  <option value="none">--</option>
				  <option value="app">Application Pending</option>
				  <option value="hot">hot</option>
				  <option value="warm">warm</option>
				  <option value="cold">cold</option>
				</select>
				</div>
				<br />
				<div>
				<label for="trip" class="textarea">Trip:</label>
				<input type="text" name="trip" class="input" id="trip" value="<? echo ($detailobj->getTrip()); ?>" />
				</div>
				<br />
				</fieldset>
				<br />
				<div align="left">
				 <input type="submit" value="Submit" name="submit" />
				 <input type="submit" value="Cancel" name="cancel" />
				</div>
				</form>
			</p>
		</div>
<?
} else {
	header("Location:hvnContacts.php");
}
include('footer.php');
?>