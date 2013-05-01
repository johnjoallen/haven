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
			$_SESSION['error'] = "";
			$_SESSION['success'] = "";
			?>
				<form method="POST" action="../logic/sendEmail.php">
				<table class="inputform">
				<p></p>
				<tr valign="top"><td align="right">
				To:</td><td><input type="text" name="to" id="to" class="emailtext" /> or <select name="toall" class="select2"><option value="none">--</option>
				<option value="emaillist">Email List</option>
				<option value="contacts">All Contacts</option>
				<option value="volunteers">All Volunteers</option>
				</select></td></tr>
				<tr valign="top"><td align="right">CC:</td><td>
				<input type="text" class="emailtext" name="cc" id="cc" />
				</td></tr>
				<tr valign="top"><td align="right">BCC:</td><td>
				<input type="text" class="emailtext" name="bcc" id="bcc" /></td></tr>
				<tr><td colspan="2">&nbsp;</td></tr>
				<tr valign="top"><td align="right">Subject
				</td><td><input type="text" class="emailtext" name="subject" id="subject" /></td></tr>
				<tr><td colspan="2">&nbsp;</td></tr>
				<tr valign="top"><td>Message</td><td><textarea name="message" class="messagetext"></textarea></td></tr>
				<tr><td align="right">
				 <input type="submit" value="Send" name="send" />
				</td><td align="left">
				 <input type="submit" value="Cancel" name="cancel" />
				</tr></table>
				</form>
			</p>
		</div>
<?php
include("footer.php");
?>