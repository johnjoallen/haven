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
			<form method="POST" class="form1" action="../logic/editAddress.php">
			<input type="submit" name="save" value="Save" /> <input type="submit" name="cancel" value="Cancel" />
				<?php
				$vol = new Volunteer();
				foreach($var_arr as $value){				
					$vol->setV_ID($value);
					$vol->volunteerDetail();
				?>
				<fieldset>
				<legend><? echo($vol->getPassPortName()); ?></legend>
				<div>
				<br />
				<label for="street" class="textarea">Street:</label>
				<input type="text" class="input" name=street[] id="street" value="<? echo($vol->getAddress1()); ?>" /> 
				</div>
				<div>
				<label for="area" class="textarea">Area:</label>
				<input type="text" class="input" name=area[] id="area" value="<? echo($vol->getAddress2()); ?>" />
				</div>
				<div>
				<label for="town" class="textarea">Town:</label>
				<input type="text" class="input" name=town[] id="town" value="<? echo($vol->getAddress3()); ?>" />
				</div>
				<div>
				<label for="county" class="textarea">County:</label>
				<input type="text" class="input" name=county[] id="county" value="<? echo($vol->getCounty()); ?>" />
				</div>
				<div>
				<label for="country" class="textarea">Country:</label>
				<input type="text" class="input" name=country[] id="country" value="<? echo($vol->getCountry()); ?>" />
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