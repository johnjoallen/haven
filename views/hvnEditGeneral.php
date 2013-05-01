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
			<form method="POST" class="form1" action="../logic/editGeneral.php">
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
				<label for="lastcontacted" class="textarea">Last Contacted:</label>
				<input type="text" class="input" name=vlcdate[] value="<? echo($vol->getLastContacted()); ?>" />
				</div>
				<div>
				<label for="onlinedonation" class="textarea">Online Donation:</label>
				<select name=onlinedonation[] class="select">
					<option value="<? echo($vol->getOnlineDonation()); ?>"><? echo($vol->getOnlineDonation()); ?></option>
					<option>-- -- --</option>
					<option name="yes">Yes</option>
					<option name="no">No</option>
				</select>
				</div>
				<div>
				<label for="tshirtsize class="textarea">T-Shirt Size:</label>
				<select name=tshirtsize[] class="select">
				<option value="<? echo($vol->getTShirt()); ?>"><? echo($vol->getTShirt()); ?></option>
					<option>-- -- --</option>
					<option name="s">S</option>
					<option name="m">M</option>
					<option name="l">L</option>
					<option name="xl">XL</option>
					<option name="xxl">XXL</option>
				</select>
				<input type="hidden" name=id[] value="<? echo($value); ?>" />
				</div>
				<div>
				<label for="onsite" class="textarea">Onsite Trade:</label>
				<select name=onsite[] class="select">
					<option value="<? echo($vol->getOnsiteTrade()); ?>"><? echo($vol->getOnsiteTrade()); ?></option>
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
				<select name=driverl[] class="select">
					<option value="<? echo($vol->getDriverL()); ?>"><? echo($vol->getDriverL()); ?></option>
					<option>-- -- --</option>
					<option name="y">Yes</option>
					<option name="n">No</option>
				</select>
				</div>
				<div>
				<label for="trade" class="textarea">Trade:</label>
				<input type="text" class="input" name=trade[] id="trade" value="<? echo($vol->getTrade()); ?>" />
				</div>
				<div>
				<label for="safepass" class="textarea">Safepass:</label>
				<select name=safepass[] class="select">
					<option value="<? echo($vol->getSafePass()); ?>"><? echo($vol->getSafePass()); ?></option>
					<option>-- -- --</option>
					<option name="y">Yes</option>
					<option name="n">No</option>
				</select>
				<div>
				<label for="heardofhaven" class="textarea">Heard Of Haven:</label>
				<select name=heardofhaven[] class="select">
					<option value="<? echo($vol->getHeardOfHaven()); ?>"><? echo($vol->getHeardOfHaven()); ?></option>
					<option>-- -- --</option>
					<option value="Through a Friend">Through A Friend</option>
					<option value="Website">Website</option>
				</select>
				</div>
				<div>
				<label for="tripsexyear" class="textarea">Trips:</label>
				<select name=tripsexyear[] class="select">
					<option value="<? echo($vol->getTrips()); ?>"><? echo($vol->getTrips()); ?></option>
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
				<?php
				}
				?>
			</form>
			</p>
		</div>
<?php
include('footer.php');
?>