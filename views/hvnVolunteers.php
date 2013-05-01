<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
$_SESSION['viewvolunteer'] = "";
$_SESSION['editvolunteer'] = "";
$_SESSION['deletevolunteer'] = "";
$_SESSION['addvolunteer'] = "";
//parse the group selection
if(isset($_POST['groups'])){
	$group = $_POST['groups'];
	if(isset($_POST['subgroups'])){
		$subgroup = $_POST['subgroups'];
		if(isset($_POST['viewtype'])){
			$viewtype = $_POST['viewtype'];
		}	
	}
	if($group == "all" || $subgroup == "all"){
		unset($group);
		unset($subgroup);
	}
}
?>
		<div id="main">
			<?php if(isset($_SESSION['error'])){
				echo("<h3>" . $_SESSION['error'] . "</h3>");
			}
			if(isset($_SESSION['success'])){
				echo("<h3>" . $_SESSION['success'] . "</h3>");
			}
			$_SESSION['error'] = "";
			$_SESSION['success'] = "";
			?>
			<form class="form2" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
			<fieldset><legend>Filter Volunteers by Group, Sub Group &amp; View </legend>
			<table>
			<th>Group</th><th>Sub Group</th><th>View</th>
<th>&nbsp;</th>
			<tr><td><select name="groups" class="select">
               <option></option>
               <option value="all">-All-</option>
               <?php 
					$grp = new Group();
					$grp->GroupNames();
				?>
             </select></td>
			 <td><select name="subgroups" class="select">>
			   <option></option>
               <option value="all">---</option>
				<?
				$grp->SubGroupNames();
				?>
			 </select></td>
			 <td><select name="viewtype" class="select">
			   <option></option>
				<option value="general">General Details</option>
				<option value="personal">Personal Details</option>
				<option value="travel">Travel Details</option>
				<option value="contact">Contact Details</option>
				<option value="address">Address</option>
			 </select></td>
			 <td><input type="submit" name="grpsearch" value="Filter" /></td></tr>
			</table>
			</fieldset>
			</form>
			<form method="POST" action="../logic/volunteersActionSelect.php">
			<select name="edit" class="select">
				<option></option>
				<option value="view">View</option>
				<option value="editall">Edit Details</option>
				<option value="delete">Delete</option>
				<option value="finances">Edit Finances</option>
				<option value="personal">Edit Personal Details</option>
				<option value="general">Edit General Details</option>
				<option value="travel">Edit Travel Details</option>
				<option value="nok">Edit Next of Kin</option>
				<option value="address">Edit Addresses</option>
				<option value="contacts">Edit Contact Details</option>
			</select>
			 <input type="submit" name="action" value="Select" /> | <input type="submit" name="add" value="Add Volunteer" />
			 <div id="controls">
			 <div id="text2">Displaying Page <span id="currentpage"></span> of <span id="pagelimit"></span></div>
		<div id="perpage">
			<select onchange="sorter.size(this.value)">
			<option value="5">5</option>
				<option value="10" selected="selected">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
			<span>Entries Per Page</span></div>
		<div id="navigation">
			<img src="i/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
			<img src="i/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
			<img src="i/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
			<img src="i/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
		</div>
	</div>
				<?php
				$v = New Volunteer();
				//parse the group selection
				if(isset($group)){
					if(isset($subgroup) && isset($group)){
						echo('sub group');
						$v->pullVolunteersBySubGroup($group,$subgroup,$viewtype);
					} else {
						echo('group vol');
						$v->pullVolunteersByGroup($group,$viewtype);
					}
				} else {
					$v->pullVolunteers($viewtype);
				}
				?>
				<input type="submit" name="csv" value="Download Volunteers as CSV" />
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript">
  var sorter = new TINY.table.sorter("sorter");
	sorter.head = "head";
	sorter.asc = "asc";
	sorter.desc = "desc";
	sorter.even = "evenrow";
	sorter.odd = "oddrow";
	sorter.evensel = "evenselected";
	sorter.oddsel = "oddselected";
	sorter.paginate = true;
	sorter.currentid = "currentpage";
	sorter.limitid = "pagelimit";
	sorter.init("table",1);
  </script>
			</form>
		</div>
			</p>
<?php
include('footer.php');
?>