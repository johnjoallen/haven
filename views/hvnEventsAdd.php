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
			<?php if(isset($_GET['error'])){
				echo("<h2>Error: " . $_GET['error'] . "</h2>");
			}
			if(isset($_GET['success'])){
				echo($_GET['success']);
			}
			?>
				<form method="POST" class="form1" action="../logic/addEvent.php">
				<p> Please fill in the form below to add a new Event to the database<p>
				<p></p>
				<fieldset>
				<legend>Event Details</legend>
				<div>
				<br />
				<label for="name_of_event" class="textarea" >Name Of Event:</label>
				<input type="text" class="input" name="name_of_event" id="name_of_event" />
				</div>
				<div>
				<label for="description" class="textarea" >Description:</label>
				<input type="text" class="input" name="description" id="description" />
				</div>
				<div>
				<label for="date" class="textarea" >Date:</label>
				<select name="evday" class="select">
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
				<select name="evmonth" class="select">
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
				<select name="evyear" class="select">
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
				<label for="time" class="textarea" >Time:</label>
				<select name="evhour" class="select">
					<?php
					for($x = 00;$x <= 23; $x++){
						if($x > 23){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				<select name="evminutes" class="select">
					<?php
					for($x = 00;$x <= 59; $x++){
						if($x > 59){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				</div>
				<div>
				<label for="loc" class="textarea" >Location:</label>
				<input type="text" name="loc" class="input" id="loc" />
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