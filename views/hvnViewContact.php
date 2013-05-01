<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
if(isset($_SESSION['viewcontact'])){
	$view = $_SESSION['viewcontact'];
	$detailobj = New Contact();
	$detailobj->setC_ID($view);
	$detailobj->contactDetail();
	$_SESSION['type'] = "";
	$_SESSION['type'] = "contact";
?><div id='main'>
			<p class='text'>
			<?php if(!empty($_SESSION['error'])){
				echo("<h3>" . $_SESSION['error'] . "</h3>");
			}
			if(!empty($_SESSION['success'])){
				echo("<h3>" . $_SESSION['success'] . "</h3>");
			}
			$_SESSION['error'] = "";
			$_SESSION['success'] = "";
			?>
			<form method="post" action="../logic/contactActionSelect.php">
			<input type="submit" name="note" value="Add Note" />
			<input type="submit" name="email" value="Email" />
			<input type="submit" name="onecsv" value="Download CSV" />
			<input type="hidden" name="individual" value="individual" />
			<input type="hidden" name="name" value="<? echo($detailobj->getFname()); ?> <? echo($detailobj->getLname()); ?>" />
			</form>
			<div class="tabber">
			<div class="tabbertab">
			<h2>Details</h2>
			<table border="1" class="vol_table smalltbl" >
			<th width="243" height="26" colspan="0">Contact Details </th>
				<tr><td width="243" height="120"><strong>Status: </strong><? echo($detailobj->getStatus()); ?><br/>
				
					<strong>Name: </strong><? echo($detailobj->getFname()); ?>&nbsp;<? echo($detailobj->getLname()); ?><br/>
					<strong>Address: </strong>
					<? echo($detailobj->getAddr1()); ?>, 
					<? echo($detailobj->getAddr2()); ?>, 
					<? echo($detailobj->getAddr3()); ?>, 
					<? echo($detailobj->getCounty()); ?>.
					<br/>
					<strong>Email: </strong><? echo($detailobj->getEmail()); ?><br />					<br />
					</td>
				  <td width="406"><strong>Mobile: </strong><? echo($detailobj->getMobile()); ?><br />
                    <strong>Landline: </strong><? echo($detailobj->getLandline()); ?><br />
                    <strong>Occupation: </strong><? echo($detailobj->getOccupation()); ?><br />
                    <strong>LastContacted: </strong><? echo($detailobj->getLastContacted()); ?><br />
                    <strong>Call Back Date: </strong><? echo($detailobj->getCallback()); ?><br />
                  <strong>Trip: </strong><? echo($detailobj->getTrip()); ?></td>
				</tr>
			</table>
			</div>
			<div class="tabbertab">
			<table width="70%" border="0" class="vol_table1">
			<h3>Notes</h3>
			<tr>
			  <td>
			<?php
				$notes = New Notes();
				$notes->setN_ID($view);
				$contact = 'contact'; 
				$notes->setType($contact);
				$notes->pullNotes();
			?>
			</div>
			</td></tr></table>
			</p>
			</p>
			</div>
<?
} else {
	header("Location:hvnContacts.php");
}
include('footer.php');
?>