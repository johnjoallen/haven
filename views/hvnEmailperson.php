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
				echo("<h2>Error: " . $_SESSION['error'] . "</h2>");
			}
			if(!empty($_SESSION['success'])){
				echo("<h3>" . $_SESSION['success'] . "</h3>");
			}
			?>
				<form method="POST" action="../logic/sendPersonalEmail.php">
				<?php if(isset($_GET['name'])){
				echo("<h3>Email for: " . $_GET['name'] . "</h3>");
				} ?>
				<table>
				<tr><td align="right">
				Subject:</td><td>
				<input type="text" name="subject" id="subject" /></td></tr>
				<tr valign="top"><td align="right">
				Email Body:</td><td>
				<textarea class="mytextarea" name="message"></textarea>
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