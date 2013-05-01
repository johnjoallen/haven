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
				<form method="POST" class="form1" action="../logic/addUser.php">
				<fieldset>
				<legend>Add User Details</legend>
				<table>
				<tr><td align="right" class="textarea">
				First Name:</td><td>
				<input type="text" name="fname" id="fname" class="input" />
				</td></tr>
				<tr><td align="right" class="textarea">
				Last Name:</td><td>
				<input type="text" name="lname" id="lname" class="input" />
				</td></tr>
				<tr><td align="right" class="textarea">
				Username:</td><td>
				<input type="text" name="username" id="username" class="input" />
				</td></tr>
				<tr><td align="right" class="textarea">
				Password:</td><td>
				<input type="text" name="password" id="password" class="input" />
				</td></tr>
				<tr><td align="right" class="textarea">
				Email:</td><td>
				<input type="text" name="email" id="email" class="input" />
				</td></tr>
				<tr><td align="right" class="textarea">
				User Level:</td><td>
				<select name="userlevel" class="select">
				  <option value="general">general</option>
				  <option value="administrator">administrator</option>
				</select>
				</td></tr>
				<tr><td align="right">
				 <input type="submit" value="Submit" name="submit" />
				</td><td align="left">
				 <input type="submit" value="Cancel" name="cancel" />
				</table>
				</fieldset>
				</form>
			</p>
		</div>
<?php
include("footer.php");
?>