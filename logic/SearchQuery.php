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
		<div id="sidebar">
			<?php include("sidebar.php"); ?>
		</div>
			<p class="text">
			<?php if(isset($_SESSION['error'])){
				echo("<h2>" . $_SESSION['error'] . "</h2>");
			}
			if(isset($_SESSION['success'])){
				echo("<h2>" . $_SESSION['success'] . "</h2>");
			}
			?>
			<h2>Contacts results for <?php echo($criteria); ?></h2>
			<form method="POST" action="../logic/contactActionSelect.php">
			<input type="submit" name="view" value="View" /> <input type="submit" name="edit" value="Edit" /> <input type="submit" name="delete" value="Delete" />
			<div id="controls">
			<div id="perpage">
			<select onchange="sorter.size(this.value)">
			<option value="5" selected="selected">5</option>
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
			<span>Entries Per Page</span>
				</div>
				<div id="navigation">
					<img src="i/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
					<img src="i/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
					<img src="i/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
					<img src="i/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
				</div>
				<div id="text">Displaying Page <span id="currentpage"></span> of <span id="pagelimit"></span></div>
			</div>
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
			<?php
			$con = new Contact();
			$con->searchContacts($criteria);
			?>
			<input type="submit" name="csv" value="Download Contacts as CSV" />
			</form>
			<form method="POST" action="../logic/volunteersActionSelect.php">
			 <input type="submit" name="view" value="View" /> <input type="submit" name="edit" value="Edit" /> <input type="submit" name="delete" value="Delete" />
			<?php
			$vol = new Volunteer();
			$vol->searchVolunteers($criteria);
			?>
			<input type="submit" name="csv" value="Download Volunteers as CSV" />
			</form>
			</p>
			</div>
<?php
	$_SESSION['error'] = "";
	$_SESSION['success'] = "";
	include('footer.php');
?>