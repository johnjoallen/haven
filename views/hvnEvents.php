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
				echo("<h3>" . $_SESSION['error'] . "</h3>");
			}
			if(isset($_SESSION['success'])){
				echo("<h3>" . $_SESSION['success'] . "</h3>");
			}
			$_SESSION['error'] = "";
			$_SESSION['success'] = "";
			?>
			<p class="text">
			<form method="POST" action="../logic/eventsActionSelect.php">
			 <input type="submit" name="view" value="View" /> <input type="submit" name="edit" value="Edit" /> <input type="submit" name="delete" value="Delete" /> | <input type="submit" name="add" value="Add Event" />
			 
				<?php
				$e = New Events();
				$e->pullEvents();
				?>
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