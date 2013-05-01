<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
if(isset($_SESSION['recordToUpdate'])){
	$view = $_SESSION['recordToUpdate'];
	$detailobj = New FinanceHistory();
	$detailobj->setFH_ID($view);
	$detailobj->pullFinanceDetail();
?>
		<div id="main">
			<p class="text">
			<?php if(isset($_SESSION['error'])){
			}
			if(isset($_SESSSION['success'])){
				echo($_SESSION['success']);
			}
			?>
				<form method="POST" action="../logic/editFinanceHistory.php">
				<table>
				<tr><td align="right">
				Amount:</td><td>
				<input type="text" name="amount" id="amount" value="<? echo ($detailobj->getAmt()); ?>" />
				</td></tr>
				<tr><td align="right">
				 Date:</td><td>
				<input type="text" name="fhdate" id="fhdate" value="<? echo ($detailobj->getDateOfPayment()); ?>" />
				</td></tr>
				<tr><td align="right">
				Comment:</td><td>
				<input type="text" name="comment" id="comment" value="<? echo ($detailobj->getComment()); ?>" />
				</td></tr>
				<tr><td align="right">
				 <input type="submit" value="Edit" name="editfinance" />
				</td><td align="left">
				 <input type="submit" value="Cancel" name="cancelfinance" />
				</table>
				</form>
			</p>
		</div>
<?
} else {
	header("Location:../views/hvnVolunteers.php");
}
include('footer.php');
?>