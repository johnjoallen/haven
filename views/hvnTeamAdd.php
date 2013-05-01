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
				<form method="POST" action="../logic/addTeam.php">
				<table>
				<tr><td align="right">
				Team:</td><td>
				<input type="text" name="team" id="team" />
				</td></tr>
				<tr><td align="right">
				Foreman:</td><td>
				<input type="text" name="foreman" id="foreman" />
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