<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
if(isset($_SESSION['editevent'])){
	$view = $_SESSION['editevent'];
	$detailobj = New Events();
	$detailobj->setE_ID($view);
	$detailobj->eventDetail();
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
				<form method="POST" class="form1" action="../logic/editEvent.php">
				<fieldset>
				<legend>Event Details</legend>
				<div>
				<br />
				<label for="name_of_event" class="textarea" >Name Of Event:</label>
				<input type="text" class="input" name="name_of_event" value="<? echo ($detailobj->getNameOfEvent()); ?>" />
				</div>
				<div>
				<label for="description" class="textarea" >Description:</label>
				<input type="text" class="input" name="description" value="<? echo ($detailobj->getDescription()); ?>" />
				</div>				
				<div>
				<label for="date" class="textarea" >Date:</label>
				<input type="text" class="input" name="evdate" value="<? echo ($detailobj->getDate()); ?>" />
				</div>
				<div>
				<label for="time" class="textarea" >Time:</label>
				<input type="text" class="input" name="evtime" value="<? echo ($detailobj->getTime()); ?>" />
				</div>
				<div>
				<label for="loc" class="textarea" >Location:</label>
				<input type="text" class="input" name="loc" value="<? echo ($detailobj->getLocation()); ?>" />
				</div>
				</fieldset>
				<div align="left">
				 <input type="submit" value="Submit" name="submit" /> <input type="submit" value="Cancel" name="cancel" /> 
				</div>
				</form>
			</p>
		</div>
<?
} else {
	header("Location:hvnEvents.php");
}
include('footer.php');
?>