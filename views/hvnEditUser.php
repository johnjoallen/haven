<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
if(isset($_SESSION['edituser'])){
$val = $_SESSION['edituser'];
$grp = new Users();
$grp->setU_ID($val);
$grp->userDetail();
?>
		<div id="main">
			<?php if(isset($_SESSION['error'])){
				echo("<h2>" . $_SESSION['error'] . "</h2>");
			}
			if(isset($_SESSION['success'])){
				echo("<h2>" . $_SESSION['success'] . "</h2>");
			}
			$_SESSION['success'] = "";
			$_SESSION['error'] = "";
			?>
				<form method="POST" class="form1" action="../logic/editUser.php">
				<fieldset><legend>Edit User</legend>
				<table>
				<tr><td align="right" class="textarea">
				First Name:</td><td>
				<input type="text" name="fname" class="input" value="<? echo($grp->getUFname()); ?>" />
				</td></tr>
				<tr><td align="right" class="textarea">
				Last Name:</td><td>
				<input type="text" name="lname" class="input" value="<? echo($grp->getULastname()); ?>" />
				</td></tr>
				<tr><td align="right" class="textarea">
				Email:</td><td>
				<input type="text" name="email" class="input" value="<? echo($grp->getEmail()); ?>" />
				</td></tr>
				<tr><td align="right" class="textarea">
				Username:</td><td>
				<input type="text" name="username" class="input" value="<? echo($grp->getUsername()); ?>" />
				</td></tr>
				<tr><td align="right" class="textarea">
				Password:</td><td>
				<input type="text" name="password" class="input" value="<? echo($grp->getPassword()); ?>" />
				</td></tr>
				<tr><td align="right" class="textarea">
				User Level:</td><td>
				<select name="ulevel">
				<option value="<? echo($grp->getULevel()); ?>"><? echo($grp->getULevel()); ?></option>
				<option> -- --</option>
				<option value="administrator">administrator</option>
				<option value="general">general</option>
				</select>
				</td></tr>
				<tr><td align="right">
				 <input type="submit" value="Submit" name="submit" />
				</td><td align="left">
				 <input type="submit" value="Cancel" name="cancel" />
				</table></fieldset>
				</form>
			</p>
		</div>
<?php
include("footer.php");
} else {
	$_SESSION['error'] = "Cannot Edit User";
	header("Location:hvnUsers.php");
}
?>