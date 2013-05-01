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
				<form method="POST" action="../logic/addFinanceHistory.php">
				<table>
				<tr><td align="right">
				Amount Paid:</td><td>
				<input type="text" name="amount" id="amount" />
				</td></tr>
				<tr><td align="right">
				Date Of Payment:</td><td>
				<select name="fhday">
					<?php
					for($x = 1;$x <= 31; $x++){
						if($x > 31){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				<select name="fhmonth">
					<?php
					for($x = 1;$x <= 12; $x++){
						if($x > 12){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				<select name="fhyear">
					<?php
					for($x = 2007;$x <= 2020; $x++){
						if($x > 2020){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				</td></tr>
				<tr><td align="right">
				Transaction Comment:</td><td>
				<input type="text" name="comment" id="comment" />
				</td></tr>
				<tr><td align="right">
				 <input type="submit" value="Submit" name="submit" />
				</td><td align="left">
				 <input type="submit" value="Cancel" name="cancel" />
				</table>
				</form>
			</p>
		</div>
<?php
include("footer.php");
?>