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
				<?php
				$t = New Team();
				$t->pullTeam();
				?>
			</p>
		</div>
<?php
include('footer.php');
?>