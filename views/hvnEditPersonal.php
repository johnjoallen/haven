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
			<form method="POST" class="form1" action="../logic/editPersonal.php">
			<input type="submit" name="save" value="Save" /> <input type="submit" name="cancel" value="Cancel" />
				<?php
				$vol = new Volunteer();
				foreach($var_arr as $value){				
					$vol->editPersonal($value);
				?>
				<fieldset>
				<legend><? echo($vol->getPassportName()); ?></legend>
				<div>
				<br />
				<label for="fname" class="textarea" >First Name:</label>
				<input type="text" class="input" name=fname[] id="fname" value="<? echo($vol->getFname()); ?>" />
				</div>
				<div>
				<label for="lname" class="textarea">Last Name:</label>
				<input type="text" class="input" name=lname[] id="lname" value="<? echo($vol->getLname()); ?>" />
				</div>
				<div>
				<label for="passportname" class="textarea">Passport Name:</label>
				<input type="text" class="input" name=passportname[] id="passportname" value="<? echo($vol->getPassportName()); ?>" />
				</div>
				<div>
				<label for="dob" class="textarea">Date Of Birth:</label>
				<input type="text"class="input" name=dbdate[] id="dbdate" value="<? echo($vol->getDob()); ?>" />
				</div>
				<div>
				<label for="sex" class="textarea">Sex:</label>
				<select name=sex[] class="select">
				<option value="<? echo($vol->getSex()); ?>" ><? echo($vol->getSex()); ?></option>
				<option>-- --</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				</select>
				</div>
				<div>
				<label for="occ" class="textarea">Occupation:</label>
				<input type="text" class="input" name=occupation[] id="occupation" value="<? echo($vol->getOccupation()); ?>"/>
				</div>
				<div>
				<label for="qualification" class="textarea">Qualification:</label>
				<input type="text" class="input" name=qualification[] id="qualification" value="<? echo($vol->getQualification()); ?>" />
				</div>
				<div>
				<label for="nationality" class="textarea" >Nationality:</label>
				<input type="text" class="input" name=nationality[] id="nationality" value="<? echo($vol->getNationality()); ?>" />
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