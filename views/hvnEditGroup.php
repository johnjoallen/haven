<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
$val = $_SESSION['editGroup'];
$grp = new Group();
$grp->groupDetail($val);
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
				<form method="POST" class="form1" action="../logic/editGroup.php">
				<fieldset>
				<legend>Edit  Group</legend>
				<table>
				<tr><td align="right" class="textarea">
				Group Name:</td><td>
				<input type="text" name="group" class="input" value="<? echo($grp->getGroup()); ?>" />
				</td></tr>
				<tr><td align="right" class="textarea">
				Group Type:</td><td>
				<select name="grouptype" class="select">
					<option value="<? echo($grp->getGroupType()); ?>"><? echo($grp->getGroupType()); ?></option>
					<option> -- -- </option>
					<option value="subgroup">Sub Group</option>
					<option value="group">Group</option>
				</select>
				</td></tr>
				<tr><td align="right" class="textarea">
				Created:</td><td>
				<? echo($grp->getDateCreated()); ?>
				</td></tr>
				<tr><td align="right" class="textarea">
				Created By:</td><td>
				<? echo($grp->getUser()); ?>
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