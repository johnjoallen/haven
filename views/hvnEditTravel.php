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
			<form method="POST" class="form1" action="../logic/editTravel.php">
			<input type="submit" name="save" value="Save" /> <input type="submit" name="cancel" value="Cancel" />
				<?php
				$vol = new Volunteer();
				foreach($var_arr as $value){				
					$vol->setV_ID($value);
					$vol->volunteerDetail();
				?>
				<fieldset>
				<legend><? echo($vol->getPassportName()); ?></legend>
				<div>
				<label for="advanceparty" class="textarea">Advance Party:</label>
				<input type="text" class="input" name=advanceparty[] id="advanceparty" value="<? echo($vol->getAdvanceParty()); ?>" />
				</div>
				<div>
				<label for="houseno" class="textarea">House Number:</label>
				<input type="text" class="input" name=houseno[] class="input" id="houseno" value="<? echo($vol->getHouseNo()); ?>" />
				</div>
				<div>
				<label for="roomshare" class="textarea">Room Share:</label>
				<input type="text" class="input" name=roomshare[] id="roomshare" value="<? echo($vol->getRoomShare()); ?>" />
				</div>
				<div>
				<label for="roomno" class="textarea">Room Number:</label>
				<input type="text" class="input" name=roomnumber[] class="input" id="roomnumber" value="<? echo($vol->getRoomNo()); ?>" />
				</div>
				<div>
				<label for="outboundflight1" class="textarea">Outbound Flight 1:</label>
				<input type="text" class="input" name=outboundflight1[] id="outboundflight1" value="<? echo($vol->getOutboundFlight1()); ?>" />
				</div>
				<div>
				<label for="outboundflight2" class="textarea">Outbound Flight 2:</label>
				<input type="text" class="input" name=outboundflight2[] id="outboundflight2" value="<? echo($vol->getOutboundFlight2()); ?>" />
				</div>
				<div>
				<label for="returnflight1" class="textarea">Return Flight 1:</label>
				<input type="text" class="input" name=returnflight1[] id="returnflight1" value="<? echo($vol->getReturnFlight1()); ?>" />
				</div>
				<div>
				<label for="returnflight2" class="textarea">Return Flight 2:</label>
				<input type="text" class="input" name=returnflight2[] id="returnflight2" value="<? echo($vol->getReturnFlight2()); ?>" />
				</div>
				<div>
				<label for="coachno" class="textarea">Coach Number:</label>
				<input type="text" name=coachno[] class="input" id="coachno" value="<? echo($vol->getCoachNo()); ?>" />
				</div>
				<div>
				<label for="volunteercoordinator" class="textarea">Volunteer Coordinator:</label>
				<input type="text" class="input" name=volunteercoordinator[] id="volunteercoordinator" value="<? echo($vol->getVolunteerCoordinator()); ?>" />
				</div>
				<div>
				<label for="passportno" class="textarea">Passport Number:</label>
				<input type="text" class="input" name=passportno[] id="passportno" value="<? echo($vol->getPassportNo()); ?>" />
				</div>
				<div>
				<label for="passportexpiry" class="textarea">Passport Expiry:</label>
				<input type="text" class="input" name=pexdate[] value="<? echo($vol->getPassportExpiry()); ?>" />
				</div>
				<div>
				<label for="visano" class="textarea">Visa Number:</label>
				<input type="text" class="input" name=visano[] id="visano" value="<? echo($vol->getVisaNo()); ?>"/>
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