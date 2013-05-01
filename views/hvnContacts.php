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
		<?php if(!empty($_SESSION['error'])){
				echo("<h3>Error: " . $_SESSION['error'] . "</h3>");
			}
			if(!empty($_SESSION['success'])){
				echo("<h3>" . $_SESSION['success'] . "</h3>");
			}
			$_SESSION['error'] = "";
			$_SESSION['success'] = "";
			?>
			<p class="text">
			<form method="POST" action="../logic/contactActionSelect.php">
			 <input type="submit" name="view" value="View" /> <input type="submit" name="edit" value="Edit" /> <input type="submit" name="delete" value="Delete" />  | <input type="submit" name="add" value="Add Contact" /> | <input type="submit" name="emaillist" value="Add To Email" />
		<div id="controls">
		<div id="perpage">
			<select onchange="sorter.size(this.value)">
			<option value="5">5</option>
				<option value="10" selected="selected">10</option>
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
		<div id="text2">Displaying Page <span id="currentpage"></span> of <span id="pagelimit"></span></div>
	</div>
				<?php
				$c = New Contact();
				$c->pullContacts();
				?>
			<input type="submit" name="csv" value="Download Contacts as CSV" />
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
			</p>
		</div>
<?php
$_SESSION['success'] = "";
$_SESSION['error'] = "";
include('footer.php');
?>