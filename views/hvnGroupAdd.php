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
			<?php if(isset($_SESSION['error'])){
				echo("<h2>" . $_SESSION['error'] . "</h2>");
			}
			if(isset($_SESSION['success'])){
				echo("<h2>" . $_SESSION['success'] . "</h2>");
			}
			$_SESSION['success'] = "";
			$_SESSION['error'] = "";
			?>
				<form method="POST" class="form1" action="../logic/addGroup.php">
				<fieldset><legend>Add Group</legend>
				<table>
				<tr><td align="right" class="textarea">
				Group Name:</td><td>
				<input type="text" name="group" class="input" />
				</td></tr>
				<tr><td align="right" class="textarea">
				Group Type:</td><td>
				<select name="grouptype" class="select">
					<option value="subgroup">Sub Group</option>
					<option value="group">Group</option>
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
?>