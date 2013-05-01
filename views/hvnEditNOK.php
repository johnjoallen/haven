<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
$var_arr = $_SESSION['values'];
?>
		<div id="main">
			<p class="text">
			<?php 
			if(isset($_SESSION['error'])){
			}
			if(isset($_SESSSION['success'])){
				echo($_SESSION['success']);
			}
			$_SESSION['error'] = '';
			$_SESSION['success'] = '';
			?>
			<form method="POST" class="form1" action="../logic/editNOK.php">
			<input type="submit" name="save" value="Save" /> <input type="submit" name="cancel" value="Cancel" />
				<?php
				$vol = new Volunteer();
				foreach($var_arr as $value){				
					$vol->setV_ID($value);
					$vol->volunteerDetail();
				?>
				<fieldset>
				<legend><? echo($vol->getPassPortName()); ?></legend>
				<br />
				<div>NOK1's Details</div>
				<div>
				<label for="nok1fname" class="textarea">NOK 1 First Name:</label>
				<input type="text" class="input" name=nok1fname[] id="nok1fname" value="<? echo($vol->getNOK1Fname()); ?>" />
				</div>
				<div>
				<label for="nok1lname" class="textarea">NOK 1 Last Name:</label>
				<input type="text" class="input" name=nok1lname[] id="nok1lname" value="<? echo($vol->getNOK1Lname()); ?>" />
				</div>
				<div>
				<label for="nok1landline" class="textarea">NOK 1 Landline:</label>
				<input type="text" class="input" name=nok1landline[] id="nok1landline" value="<? echo($vol->getNOK1Landline()); ?>" />
				</div>
				<div>
				<label for="nok1mobile" class="textarea">NOK 1 Mobile:</label>
				<input type="text" class="input" name=nok1mobile[] id="nok1mobile" value="<? echo($vol->getNOK1Mobile()); ?>" />
				</div>
				<div>
				<label for="nok1rel" class="textarea">NOK 1 Relationship:</label>
				<select name=nok1rel[] class="select">
					<option value="<? echo($vol->getNOK1Rel()); ?>"><? echo($vol->getNOK1Rel()); ?></option>
					<option>-- -- --</option>
					<option name="mother">Mother</option>
					<option name="father">Father</option>
					<option name="brother">Brother</option>
					<option name="sister">Sister</option>
					<option name="guardian">Guardian</option>
				</select>
				</div>
				<div>NOK2's Details</div>
				<br />
				<div>
				<label for="nok2fname" class="textarea">NOK 2 First Name:</label>
				<input type="text" class="input" name=nok2fname[] id="nok2fname" value="<? echo($vol->getNOK2Fname()); ?>" />
				</div>
				<div>
				<label for="nok2lname" class="textarea">NOK 2 Last Name:</label>
				<input type="text" class="input" name=nok2lname[] id="nok2lname" value="<? echo($vol->getNOK2Lname()); ?>" />
				</div>
				<div>
				<label for="nok2landline" class="textarea">NOK 2 LandLine:</label>
				<input type="text" class="input" name=nok2landline[] id="nok2landline" value="<? echo($vol->getNOK2Landline()); ?>" />
				</div>
				<div>
				<label for="nok2mobile" class="textarea">NOK 2 Mobile:</label>
				<input type="text" class="input" name=nok2mobile"[] id="nok2mobile" value="<? echo($vol->getNOK2Mobile()); ?>" />
				</div>
				<div>
				<label for="nok2rel" class="textarea">NOK 2 Relationship:</label>
				<select name=nok2rel[] class="select">
					<option value="<? echo($vol->getNOK2Rel()); ?>"><? echo($vol->getNOK2Rel()); ?></option>
					<option>-- -- --</option>
					<option name="mother">Mother</option>
					<option name="father">Father</option>
					<option name="brother">Brother</option>
					<option name="sister">Sister</option>
					<option name="guardian">Guardian</option>
				</select>
				<input type="hidden" name=id[] value="<? echo($value); ?>" />
				</div>
				</fieldset>
				<?php
				}
				?>
			</form>
			</p>
		</div>
<?php
include('footer.php');
?>