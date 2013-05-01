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
			<form method="POST" class="form1" action="../logic/editContactDetails.php">
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
				<div>
				<label for="landline" class="textarea">Landline:</label>
				<input type="text" name=landlinep[] class="input" id="landline" value="<? echo($vol->getLandline()); ?>"/>
				</div>
				<div>
				<label for="mobile" class="textarea">Mobile:</label>
				<input type="text" name=mobile[] class="input" id="mobile" value="<? echo($vol->getMobile()); ?>"/>
				</div>
				<div>
				<label for="email" class="textarea">Email:</label>
				<input type="text" name=email[] class="input" id="email" value="<? echo($vol->getEmail()); ?>"/>
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