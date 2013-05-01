<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include('header.php');
include("../config/appconfig.php");
if(isset($_SESSION['viewvolunteer'])){
	$view = $_SESSION['viewvolunteer'];
	$_SESSION['type'] = "";
	$_SESSION['type'] = "volunteer";
?><div id='main'>
			<p class='text'>
			<?php if(isset($_SESSION['error'])){
				echo("<h3>" . $_SESSION['error'] . "</h2>");
			}
			if(isset($_SESSION['success'])){
				echo("<h3>" . $_SESSION['success'] . "</h2>");
			}
			$detailobj = New Volunteer();
			$detailobj->setV_ID($view);
			$detailobj->volunteerDetail();
			?>
			<form action="../logic/volunteersActionSelect.php" method="POST">
			<input type="submit" name="note" value="Add Note" />
			<input type="submit" name="email" value="Email" />
			<input type="submit" name="onecsv" value="Download CSV" />
			<input type="hidden" name="onevol" value="<?php echo($detailobj->getPassportName()); ?>" />
			<input type="hidden" name="name" value="<? echo($detailobj->getPassPortName()); ?>" />
			</form>
			<div class="tabber">
			<div class="tabbertab">
			<h2>Details: <? 
			echo($detailobj->getPassportName());
			?></h2>
			<table width="749" border="1" class="vol_table smalltbl" >
			<th width="368" height="26" colspan="0">General Details</th>
				<tr valign="top" >
				  <td width="368" height="120">
					<strong>First Name: </strong><? echo($detailobj->getFname()); ?><br />
					<strong>Last Name: </strong><? echo($detailobj->getLname()); ?><br />
					<strong>Age: </strong><? 
					$date = $detailobj->getDob();
					echo ($detailobj->birthday($date)); ?><br />
					<strong>DOB: </strong><? echo($detailobj->getDob());?><br />
					<strong>Sex: </strong><? echo($detailobj->getSex()); ?><br />
					<strong>Occupation: </strong><? echo($detailobj->getOccupation()); ?><br />
				  </td>
					<td width="365"><strong>Last Contacted: </strong><? echo($detailobj->getLastContacted()); ?><br />
					<strong>Call Back Date:</strong><? echo($detailobj->getCallback()); ?><br />
					<strong>Volunteer Coordinator: </strong><? echo($detailobj->getVolunteerCoordinator()); ?><br />
					<strong>Heard Of Haven: </strong><? echo($detailobj->getHeardOfHaven()); ?><br />
			  </tr>
			  </table>
					<br />
					<table width="749" border="1" class="vol_table smalltbl" >
					<th width="312" height="26" colspan="0">Contact Details</th>
					<tr valign="top" >
				    <td width="312">
					<strong>Mobile: </strong><? echo($detailobj->getMobile()); ?><br />
					<strong>Email: </strong><? echo($detailobj->getEmail()); ?><br />
					</td>
					<td width="421">
					<strong>Ph. Landline: </strong><? echo($detailobj->getLandline()); ?><br />
					<strong>Address:<br /></strong>
					<? echo($detailobj->getAddress1()); ?><br />
					<? echo($detailobj->getAddress2()); ?><br />
					<? echo($detailobj->getAddress3()); ?><br />
					<? echo($detailobj->getCounty()); ?><br />
					<? echo($detailobj->getCountry()); ?><br />
		            </td>
					</tr>
					</table>
					<br />
					<table width="749" border="1" class="vol_table smalltbl" >
					<th width="368" height="26" colspan="0">Passport Details</th>
					<tr valign="top" >
				    <td width="368">
					<strong>Passport Name: </strong><? echo($detailobj->getPassportName()); ?><br />
					<strong>Passport No.: </strong><? echo($detailobj->getPassportNo()); ?><br />
					<strong>Passport Ex.: </strong><? 
					$passdate = $detailobj->getPassportExpiry();
					echo date("n-Y", strtotime($passdate));
					?><br />
					</td>
					<td width="365">
					<strong>Nationality: </strong><? echo($detailobj->getNationality()); ?><br />
					<strong>Visa Number: </strong><? echo($detailobj->getVisaNo()); ?><br />
					</td>
					</tr>
					</table>
					<br />
					<table width="509" border="1" class="vol_table smalltbl" >
					<th width="249" height="26" colspan="0">Qualifications</th>
					<tr valign="top" >
				    <td width="249">
					<strong>Qualification: </strong><? echo($detailobj->getQualification()); ?><br />
					<strong>Trade: </strong><? echo($detailobj->getTrade()); ?><br />
					</td>
					<td width="244">
					<strong>Driver License: </strong><? echo($detailobj->getDriverL()); ?><br />
					<strong>Safepass: </strong><? echo($detailobj->getSafePass()); ?><br />
					</td>
					</tr>
			  </table>
					<br />
					<table width="509" border="1" class="vol_table smalltbl" >
					<th width="249" height="26" colspan="0">Onsite Details</th>
					<tr valign="top" >
				    <td width="249">
					<strong>Onsite Trade: </strong><? echo($detailobj->getOnsiteTrade()); ?><br />
					<strong>Number of Trips: </strong><? echo($detailobj->getTrips()); ?><br />
					<strong>Trade: </strong><? echo($detailobj->getTrade()); ?><br />
					<strong>Group: </strong><? echo($detailobj->getGroupName()); ?><br />
					</td>
					<td width="244">
					<strong>Team: </strong><? echo($detailobj->getTeam()); ?><br />
					<strong>House Number: </strong><? echo($detailobj->getHouseNo()); ?><br />
					<strong>Room Number: </strong><? echo($detailobj->getRoomNo()); ?><br />
					</td>
					</tr>
					</table>
					<br />
					<table width="509" border="1" class="vol_table smalltbl" >
					<th width="249" height="26" colspan="0">Travel Details</th>
					<tr valign="top" >
				    <td width="249">
					<strong>Advance Party: </strong><? echo($detailobj->getAdvanceParty()); ?><br />
					<strong>Room Share: </strong><? echo($detailobj->getRoomShare()); ?><br />
					<strong>Outbound Flight 1: </strong><? echo($detailobj->getOutboundFlight1()); ?><br />
					<strong>Outbound Flight 2: </strong><? echo($detailobj->getOutboundFlight2()); ?><br /></td>
					<td width="244">
					<strong>Return Flight 1: </strong><? echo($detailobj->getReturnFlight1()); ?><br />
					<strong>Return Flight 2: </strong><? echo($detailobj->getReturnFlight2()); ?><br />
					<strong>Coach Number: </strong><? echo($detailobj->getCoachNo()); ?><br />
					</td>
					</tr>
					</table>
					<br />
					<table width="509" border="1" class="vol_table smalltbl" >
					<th width="249" height="26" colspan="0">Medical/Dietary Details</th>
					<tr valign="top" >
				    <td width="249">
					<strong>T-Shirt Size: </strong><? echo($detailobj->getTShirt()); ?><br />
					<strong>Medical Conditions </strong><? echo($detailobj->getMedicalConditions()); ?><br />
					<strong>Medical Requirements: </strong><? echo($detailobj->getMedicalReq()); ?><br /></td>
					<td width="244">
					<strong>Smoker: </strong><? echo($detailobj->getSmoker()); ?><br />
					<strong>Dietary Requirements: </strong><? echo($detailobj->getDietaryReq()); ?><br />			  
					</td>
					</tr>
					</table>
					<br />
					<table width="509" border="1" class="vol_table smalltbl" >
					<th width="249" height="26" colspan="0">Admin Details </th>
					<tr valign="top" >
				    <td width="249">
					<strong>T-Shirt Size: </strong><? echo($detailobj->getTShirt()); ?><br />
					</td>
					<td width="244">
					<strong>Online Donation: </strong><? echo($detailobj->getOnlineDonation()); ?><br />

					</td>
					</tr>
					</table>
					<br />
					<table width="509" border="1" class="vol_table smalltbl" >
					<th width="249" height="26" colspan="0">1st Next of Kin: </th>
					<tr valign="top" >
				    <td width="249">
				  <strong>Name:</strong><? echo($detailobj->getNOK1Fname()); ?> <? echo($detailobj->getNOK1Lname()); ?><br />
				  <strong>Relationship:</strong><? echo($detailobj->getNOK1Rel()); ?><br />
				  </td>
				  <td width="244">
				  <strong>Mobile:</strong><? echo($detailobj->getNOK1Mobile()); ?><br />
				  <strong>Landline:</strong><? echo($detailobj->getNOK1Landline()); ?><br />
				 </td>
				</tr>
				</table>
				<br />
				<table width="509" border="1" class="vol_table smalltbl" >
					<th width="249" height="26" colspan="0">2nd Next of Kin: </th>
					<tr valign="top" >
				    <td width="249">
					<strong>Name:</strong><? echo($detailobj->getNOK2Fname()); ?> <? echo($detailobj->getNOK2Lname()); ?><br />
					<strong>Relationship:</strong><? echo($detailobj->getNOK2Rel()); ?><br />
					</td>
					<td width="244">
					<strong>Mobile:</strong><? echo($detailobj->getNOK2Mobile()); ?><br />
					<strong>Landline:</strong><? echo($detailobj->getNOK2Landline()); ?><br />				 				</td>
				</tr>
				</table>			
  </div>
			<div class="tabbertab">
			<h2>Documentation</h2>
				<table cellpadding="5px" class="vol_table narrow_table" >
				<th>Copy Of Passport</th>
				<tr><td>
				<?php
				 $passport = new Documentation();
				 $passport->setRefKey($_SESSION['viewvolunteer']);
				 $pspt = 'passport';
				 $passport->setCopyOf($pspt);
				 $passport->pullData();
				 $check = $passport->getFileName();
				 if(!$check == ""){
				?>
				Download<a href="../logic/downloadPassport.php?&id=<?php echo($passport->getDID()); ?>"> <?php echo($passport->getFileName());?></a>
				<?php
				} else {
				?>No File Available
				<?php
				}
				?></td>
				</tr>
				</table>
				<br/>
				<table cellpadding="5px" class="vol_table narrow_table" >
				<th>Copy Of Safe Pass</th>
				<tr><td>
				<?php
				 $safepass = new Documentation();
				 $safepass->setRefKey($_SESSION['viewvolunteer']);
				 $safe = 'safepass';
				 $safepass->setCopyOf($safe);
				 $safepass->pullData();
				 $check1 = $safepass->getFileName();
				 if(!$check1 == "" ){
				?>
				Download<a href="../logic/downloadSafepass.php?&id=<?php echo($safepass->getDID()); ?>"> <?php echo($safepass->getFileName());?></a>
				<?php
				} else {
				?>No File Available
				<?php
				}
				?></td>
				</tr></table>
				<br/>
				<table cellpadding="5px" class="vol_table narrow_table" >
				<th>Copy Of Original Application</th><tr><td>
				<?php
				 $application = new Documentation();
				 $application->setRefKey($_SESSION['viewvolunteer']);
				 $app = 'oa';
				 $application->setCopyOf($app);
				 $application->pullData();
				 $check2 = $application->getFileName();
				 if(!$check2 == ""){
				?>
				Download<a href="../logic/downloadApplication.php?&id=<?php echo($application->getDID()); ?>"> <?php echo($application->getFileName());?></a>
				<?php
				} else {
				?>No File Available
				<?php
				}
				?>
				</td></tr>
				</table>
				<br/>
				<table cellpadding="5px" class="vol_table narrow_table" >
				
				<th>Copy Of Declaration</th><tr><td>
				<?php
				 $declare = new Documentation();
				 $declare->setRefKey($_SESSION['viewvolunteer']);
				 $dec = 'declaration';
				 $declare->setCopyOf($dec);
				 $declare->pullData();
				 $check3 = $declare->getFileName();
				 if(!$check3 == ""){
				?>
				Download<a href="../logic/downloadDeclaration.php?&id=<?php echo($declare->getDID()); ?>"> <?php echo($declare->getFileName());?></a>
				<?php
				} else {
				?>No File Available
				<?php
				}
				?>
				</td></tr></table>
				<br/>
				<table cellpadding="5px" class="vol_table narrow_table" >
				<th>Copy Of Terms &amp; Conditions</th><tr><td>
				<?php
				 $tc = new Documentation();
				 $tc->setRefKey($_SESSION['viewvolunteer']);
				 $t = 'tc';
				 $tc->setCopyOf($t);
				 $tc->pullData();
				 $check4 = $tc->getFileName();
				 if(!$check4 == ""){
				?>
				Download<a href="../logic/downloadTC.php?&id=<?php echo($tc->getDID()); ?>"> <?php echo($tc->getFileName());?></a>
				<?php
				} else {
				?>No File Available
				<?php
				}
				?>
				</td></tr>
				</table>
				<br/>
				<table cellpadding="5px" class="vol_table narrow_table" >
				<th>Copy Of Insurance</th> <tr><td>
				<?php
				 $insurance = new Documentation();
				 $insurance->setRefKey($_SESSION['viewvolunteer']);
				 $ins = 'insurance';
				 $insurance->setCopyOf($ins);
				 $insurance->pullData();
				 $check5 = $insurance->getFileName();
				 if(!$check5 == ""){
				?>
				Download<a href="../logic/downloadInsurance.php?&id=<?php echo($insurance->getDID()); ?>"> <?php echo($insurance->getFileName());?></a>
				<?php
				} else {
				?>No File Available
				<?php
				}
				?>
				</td></tr></table>
				<br/>
				<table cellpadding="5px" class="vol_table narrow_table" >
				<th>Copy of Medical Cert</th> <tr><td>
				<?php
				 $medical = new Documentation();
				 $medical->setRefKey($_SESSION['viewvolunteer']);
				 $med = 'medical';
				 $medical->setCopyOf($med);
				 $medical->pullData();
				 $check6 = $medical->getFileName();
				 if(!$check6 == ""){
				?>
				Download<a href="../logic/downloadMedicalCert.php?&id=<?php echo($medical->getDID()); ?>"> <?php echo($medical->getFileName());?></a>
				<?php
				} else {
				?>No File Available
				<?php
				}
				?>
				</td></tr></table>
				<br/>
				<table cellpadding="5px" class="vol_table narrow_table" >
				<th>Copy of Medical History</th><tr><td>
				<?php
				 $medicalh = new Documentation();
				 $medicalh->setRefKey($_SESSION['viewvolunteer']);
				 $medh = 'medicalh';
				 $medicalh->setCopyOf($medh);
				 $medicalh->pullData();
				 $check7 = $medicalh->getFileName();
				 if(!$check7 == ""){
				?>
				Download<a href="../logic/downloadMedicalHistory.php?&id=<?php echo($medicalh->getDID()); ?>"> <?php echo($medicalh->getFileName());?></a>
				<?php
				} else {
				?>No File Available
				<?php
				}
				?>
				</td></tr></table>
				<br/>
				<table cellpadding="5px" class="vol_table narrow_table" >
				<th>Copy of Code of Conduct</th><tr><td>
				<?php
				 $conduct = new Documentation();
				 $conduct->setRefKey($_SESSION['viewvolunteer']);
				 $cond = 'conduct';
				 $conduct->setCopyOf($cond);
				 $conduct->pullData();
				 $check8 = $conduct->getFileName();
				 if(!$check8 == ""){
				?>
				Download<a href="../logic/downloadConduct.php?&id=<?php echo($conduct->getDID()); ?>"> <?php echo($conduct->getFileName());?></a>
				<?php
				} else {
				?>No File Available
				<?php
				}
				?>
				</td></tr>
				</table>
			</div>
			<div class="tabbertab">
			<table border='0' class="vol_table" width="50%">
			<h3>Finance History</h3>
			<tr><td>
				<?php
					$finance = new FinanceHistory ();
					$finance->setRefkey($view);
					$finance->pullFinanceHistory();
				?>
				</td></tr></table>
				<form action="../logic/addFinanceHistory.php" method="post">
				<table>
				<tr>
					<td><input type="text" name="amount" >
					</td>
					<td><select name="day">
					<?php
					for($x = 1;$x <= 31; $x++){
						if($x > 31){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				<select name="month">
					<?php
					for($x = 1;$x <= 12; $x++){
						if($x > 12){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select>
				<select name="year">
					<?php
					for($x = 2009;$x <= 2020; $x++){
						if($x > 2020){
							break;
						}
						echo("<option value='" . $x ."'>" . $x . "</option>");
					}
					?>
				</select></td>
					<td><input type="text" name="comment" /></td>
					<td><input type="submit" name="submit" value="Submit" /></td>
				</tr>
					<tr>
					<td>Amount</td>
					<td>Date</td>
					<td>Comment</td>
				</tr>
				</table>
				</form>
			</div>
			<div class="tabbertab">
			<table border='0' class="vol_table1" width="70%">
			<h3>Notes</h3>
			<tr><td>
				<?php
				$notes = New Notes();
				$notes->setN_ID($view);
				$vol = 'volunteer'; 
				$notes->setType($vol);
				$notes->pullNotes();
			?>
			</div>
			</div>
			<form action="../logic/volunteersActionSelect.php" method="POST">
			<input type="submit" name="note" value="Add Note" />
			<input type="submit" name="email" value="Email" />
			<input type="submit" name="onecsv" value="Download CSV" />
			<input type="hidden" name="onevol" value="<?php echo($detailobj->getPassportName()); ?>" />
			<input type="hidden" name="name" value="<? echo($detailobj->getPassPortName()); ?>" />
			</form>
			</td></tr></table>
			</p>
			</p></div>
<?
$_SESSION['success'] = "";
$_SESSION['error'] = "";
}
include('footer.php');
?>