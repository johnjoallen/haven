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
			<?php if(!empty($_SESSION['error'])){
				echo("<h3>Error: " . $_SESSION['error'] . "</h3>");
			}
			if(!empty($_SESSION['success'])){
				echo("<h3>" . $_SESSION['success'] . "</h3>");
			}
			$_SESSION['error'] = "";
			$_SESSION['success'] = "";
			?>
			<form method="POST" class="form2" action="../logic/standardreports.php">
			<fieldset>
				<legend>Standard Reports</legend>
					<p>To pull out a standardised report select an item from the report dropdown list box and select for what Group and choose either download csv or download pdf to retrieve the required report in the appropriate format.</p>
					<select name="report" class="select">
						<option>--- Volunteer Reports ---</option>
						<option value="trades">Trades Report</option>
						<option value="vfinances">Volunteer Finances</option>
						<option value="vdem">Volunteer Demographics</option>
						<option value="geo">Geographical</option>
						<option value="medical">Medical Conditions</option>
						<option value="diet">Dietary Requirements</option>
						<option value="travel">Travel Details</option>
						<option value=""> </option>
						<option>--- Contact Reports ---</option>
						<option value=""> </option>	
						<option value="cStatus">Contact Status<option>
					</select>
					<select name="groups" class="select">
					<option>--Select Group--</option>
						<?php 
							$grp = new Group();
							$grp->GroupNames();
						?>
					</select>
					<!--<input type="submit" name="csv" value="Download CSV"/>-->
					<input type="submit" name="pdf" value="Download PDF"/>
			</fieldset>
			</form>
				</p>
			</p>
		</div>
<?php
include("footer.php");
?>
