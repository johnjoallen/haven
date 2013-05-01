<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
//parse data
$criteria = Trim(stripslashes($_POST['criteria']));
$table = Trim(stripslashes($_POST['table']));
include('header.php');
include("../config/appconfig.php");
?><div id="main">
			<p class="text">
			<?php if(isset($_SESSION['error'])){
				echo("<h2>" . $_SESSION['error'] . "</h2>");
			}
			if(isset($_SESSION['success'])){
				echo("<h2>" . $_SESSION['success'] . "</h2>");
			}
			?>
			<h3>Contacts results for <?php echo($criteria); ?></h3>
			<form method="POST" action="../logic/contactActionSelect.php">
			<input type="submit" name="view" value="View" /> <input type="submit" name="edit" value="Edit" /> <input type="submit" name="delete" value="Delete" />
			<?php
			$con = new Contact();
			$con->searchContacts($criteria);
			?>
			</form>
			<h3>Volunteers results for <?php echo($criteria); ?></h3>
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
			 <input type="submit" name="action" value="Action" /> | <input type="submit" name="add" value="Add New Volunteer" />
			<?php
			$vol = new Volunteer();
			$vol->searchVolunteers($criteria);
			?>
			</form>
			</p>
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
			</div>
<?php
	$_SESSION['error'] = "";
	$_SESSION['success'] = "";
	include('footer.php');
?>