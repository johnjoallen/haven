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
				<form method="POST" action="../logic/addNote.php">
				<?php if(isset($_GET['name'])){
				echo("<h3>Note For " . $_SESSION['type']. ": " . $_GET['name'] . "</h3>");
				} ?>
				<table>
				<tr valign="top"><td align="right">
				Text Of Note:</td><td>
				<textarea class="mytextarea" name="text"></textarea>
				</td></tr>
				<tr><td align="right">
				Status:</td><td>
				<input type="text" name="status" id="status" />
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