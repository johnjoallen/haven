<?php
require_once('../config/config.php'); 
//class definition for a user(member)
class Contact {
	//instance variables
	private $c_id;
	private $status;
	private $firstName;
	private $lastName;
	private $email;
	private $addr1;
	private $addr2;
	private $addr3;
	private $county;
	private $country;
	private $mobile;
	private $landline;
	private $occupation;
	private $heard_of_haven;
	private $lastcontacted;
	private $callback_date;
	private $trip;

	//SETS
	function setC_ID($cid){ $this->c_id=$cid; }
	function setStatus($st){ $this->status=$st; }
	function setFname($fn){ $this->firstName=$fn; }
	function setLname($ln){ $this->lastName=$ln; }
	function setEmail($em){ $this->email=$em; }
	function setAddr1($ad1){ $this->addr1=$ad1; }
	function setAddr2($ad2){ $this->addr2=$ad2; }
	function setAddr3($ad3){ $this->addr3=$ad3; }
	function setCounty($cnty){ $this->county=$cnty; }
	function setCountry($cntry){ $this->country=$cntry; }
	function setMobile($mbl){ $this->mobile=$mbl; }
	function setLandline($lnd){ $this->landline=$lnd; }
	function setOccupation($occ){ $this->occupation=$occ; }
	function setHOH($hoh){ $this->heard_of_haven=$hoh; }
	function setLastContacted($lc){ $this->lastcontacted=$lc; }
	function setCallback($cb){ $this->callback_date=$cb; }
	function setTrip($trp){ $this->trip=$trp; }
	
	//GETS
	function getC_ID() { return $this->c_id; }
	function getStatus() { return $this->status; }
	function getFname() { return $this->firstName; }
	function getLname() { return $this->lastName; }
	function getEmail() { return $this->email; }
	function getAddr1() { return $this->addr1; }
	function getAddr2() { return $this->addr2; }
	function getAddr3() { return $this->addr3; }
	function getCounty() { return $this->county; }
	function getCountry() { return $this->country; }
	function getMobile() { return $this->mobile; }
	function getLandline() { return $this->landline; }
	function getOccupation() { return $this->occupation; }
	function getHOH() { return $this->heard_of_haven; }
	function getLastContacted() { return $this->lastcontacted; }
	function getCallback() { return $this->callback_date; }
	function getTrip() { return $this->trip; }
	
	public function _construct(){
		
	}
	
	//SQL injections encapsulated with PHP functions
	function insertContact(){ 
		include("../config/config.php");
	  	//create the connection
		$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		if(!$conn){
			die('Not connected : ' . mysql_error());
		}
		//select the DB
		$sel = mysql_select_db($DB_SCHEMA, $conn);
		if(!$sel){
			die('Cant select: ' . mysql_error());
		}
		//prepare query
		$query = "INSERT INTO hvn_contacts
		SET
		C_Status='" . $this->status . "',
		C_First_Name='" . $this->firstName . "',
		C_Last_Name='" . $this->lastName . "',
		C_Address_Line_1='" . $this->addr1 . "',
		C_Address_Line_2='" . $this->addr2 . "',
		C_Address_Line_3='" . $this->addr3 . "',
		C_County='" . $this->county . "',
		C_Country='" . $this->country . "',
		C_Mobile='" . $this->mobile . "',
		C_Landline='" . $this->landline . "',
		C_Email='" . $this->email . "',
		C_Occupation='" . $this->occupation . "',
		C_Heard_Of_Haven='" . $this->heard_of_haven . "',
		C_Last_Contacted='" . $this->lastcontacted . "',
		C_Call_Back_Date=DATE_ADD('" .$this->lastcontacted ."', INTERVAL 14 DAY),
		C_Trip='" . $this->trip . "'"; 
		//execute query
		$result = mysql_query($query);
		if($result){
			$success = "One Contact Added";
			header("Location:../views/hvnContactAdd.php?&success=" . $success);
		} else {
			$err = mysql_error();
			header("Location:../views/hvnContactAdd.php?&error=" . $err);
		}
		mysql_close($conn);
	}
	
	//update a members details
	function updateContact(){
		include("../config/config.php");
	  	//create the connection
		$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		if(!$conn){
			die('Not connected : ' . mysql_error());
		}
		//select the DB
		$sel = mysql_select_db($DB_SCHEMA, $conn);
		if(!$sel){
			die('Cant select: ' . mysql_error());
		}
		//prepare query
		$query = "UPDATE hvn_contacts
		SET
		C_Status='" . $this->status . "',
		C_First_Name='" . $this->firstName . "',
		C_Last_Name='" . $this->lastName . "',
		C_Address_Line_1='" . $this->addr1 . "',
		C_Address_Line_2='" . $this->addr2 . "',
		C_Address_Line_3='" . $this->addr3 . "',
		C_County='" . $this->county . "',
		C_Country='" . $this->country . "',
		C_Mobile='" . $this->mobile . "',
		C_Landline='" . $this->landline . "',
		C_Email='" . $this->email . "',
		C_Occupation='" . $this->occupation . "',
		C_Heard_Of_Haven='" . $this->heard_of_haven . "',
		C_Last_Contacted='" . $this->lastcontacted . "',
		C_Call_Back_Date=DATE_ADD('" .$this->lastcontacted ."', INTERVAL 14 DAY),
		C_Trip='" . $this->trip. "' 
		WHERE C_ID='" . $this->c_id . "';";
		//execute query
		$result = mysql_query($query);
		if($result){
			$_SESSION['success'] = "One Contact Edited";
			header("Location:../views/hvnContacts.php");
		} else {
			$_SESSION['error'] = mysql_error();
			header("Location:../views/hvnContacts.php");
		}
		mysql_close($conn);
	  }
	  function pullContacts(){
	  	include("../config/config.php");
	  	$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		if(!$conn){
			die('Not connected : ' . mysql_error());
		}
		$sel = mysql_select_db($DB_SCHEMA, $conn);
			if(!$sel){
			 die('Cant select: ' . mysql_error());
				}
				$query = "SELECT C_ID, C_Status, C_First_Name, C_Last_Name, C_Landline, C_Email, C_Call_Back_Date FROM hvn_contacts";
				$result = mysql_query($query);
				if($result){
					echo ("<table cellpadding='0' cellspacing='0' border='0' id='table' class='sortable'>
					<thead><tr>
					<th>Status</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Telephone</th>
					<th>Call Back Date</th>
					<th class='nosort'>Select All <input type='checkbox' name='checkAll' onclick='checkUncheckAll(this);'/></th>
					</tr></thead><tbody>");
					while($row = mysql_fetch_array($result))
					{
						echo ("<tr>");
						echo ("<td>" . $row['C_Status'] . "</td>");
						echo ("<td>" . $row['C_First_Name'] . "</td>");
						echo ("<td>" . $row['C_Last_Name'] . "</td>");
						echo ("<td>" . $row['C_Landline'] . "</td>");
						$d = strtotime($row['C_Call_Back_Date']);
						if(!$d == "0000-00-00"){
						     echo ("<td>none</td>");
						} else {
						   	echo ("<td>" . date("d-m-Y", $d) . "</td>");
						}
						echo ("<td><input type='checkbox' name=contacts[] value='" . $row['C_ID'] ."' /></td>");
						echo ("</tr>"); 
					}
					echo("</tbody></table>");
				} else {
					echo("Query did not process: " . mysql_error());
				}
				mysql_close($conn);
	  }
	  function searchContacts($nme){
	  include("../config/config.php");
	  $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		if(!$conn){
			die('Not connected : ' . mysql_error());
		}
		$sel = mysql_select_db($DB_SCHEMA, $conn);
		if(!$sel){
			 die('Cant select: ' . mysql_error());
		}
		$query = "SELECT * FROM hvn_contacts 
		WHERE C_First_Name like'%" . $nme . "%'
		OR C_Last_Name like'%" . $nme . "$';";
		$result = mysql_query($query);
		if($result){
			echo ("<table cellpadding='0' cellspacing='0' border='0' id='table' class='sortable'>
					<thead><tr>
					<th>Status</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Telephone</th>
					<th>Call Back Date</th>
					<th>-</th>
					</tr></thead><tbody>");
					while($row = mysql_fetch_array($result))
					{
						echo ("<tr>");
						echo ("<td>" . $row['C_Status'] . "</td>");
						echo ("<td>" . $row['C_First_Name'] . "</td>");
						echo ("<td>" . $row['C_Last_Name'] . "</td>");
						echo ("<td>" . $row['C_Landline'] . "</td>");
						$d = strtotime($row['C_Call_Back_Date'] );
						if(!$d == "0000-00-00"){
						     echo ("<td>none</td>");
						} else {
						   	echo ("<td>" . date("d-m-Y", $d) . "</td>");
						}
						echo ("<td><input type='radio' name='contacts' value='" . $row['C_ID'] ."' /></td>");
						echo ("</tr>"); 
					}
					echo("</tbody></table>");
		} else {
			$_SESSION['error'] = mysql_error();
		}
		mysql_close($conn);
	  }
	  function contactDetail(){
		include("../config/config.php");
	  	$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		if(!$conn){
			die('Not connected : ' . mysql_error());
		}
		$sel = mysql_select_db($DB_SCHEMA, $conn);
		if(!$sel){
			 die('Cant select: ' . mysql_error());
		}
		$query = "SELECT *  FROM hvn_contacts WHERE C_ID=" . $this->c_id;
		$result = mysql_query($query);
				if($result){
					while($row = mysql_fetch_array($result))
					{
						$this->status = $row['C_Status'];
						$this->firstName = $row['C_First_Name'];
						$this->lastName = $row['C_Last_Name'];
						$this->addr1 = $row['C_Address_line_1'];
						$this->addr2 = $row['C_Address_line_2'];
						$this->addr3 = $row['C_Address_line_3'];
						$this->county = $row['C_County'];
						$this->country = $row['C_Country'];
						$this->mobile = $row['C_Mobile'];
						$this->landline = $row['C_Landline'];
						$this->email = $row['C_Email'];
						$this->occupation  = $row['C_Occupation'];
						$this->hoh = $row['Heard_Of_Haven'];
						$this->lastcontacted  = $row['C_Last_Contacted'];
						$this->callback_date = $row['C_Call_Back_Date'];
						$this->trip = $row['C_Trip'];
					}
				} else {
					echo("Query did not process: " . mysql_error());
				}
				mysql_close($conn);
	  }
	  
	  //delete member from table
	  function deleteContact(){
			include("../config/config.php");
			$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
			if(!$conn){
				die('Not connected : ' . mysql_error());
			}
			$sel = mysql_select_db($DB_SCHEMA, $conn);
			if(!$sel){
				 die('Cant select: ' . mysql_error());
			}
			$query = "DELETE FROM hvn_contacts WHERE C_ID=" . $this->c_id;
			$result = mysql_query($query);
			if($result){
				$_SESSION['success'] = "Contact Deleted";
				header("Location:../views/hvnContacts.php");
			} else {
				$_SESSION['error'] = "Query did not process: " . mysql_error();
				header("Location:../views/hvnContacts.php");
			}
			mysql_close($conn);
		}
		function downloadEntireDataSet(){
		include("../config/config.php");
		$file = 'exportcontacts'; 
		$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		if(!$conn){
			die('Not connected : ' . mysql_error());
		}
		$sel = mysql_select_db($DB_SCHEMA, $conn);
		if(!$sel){
			 die('Cant select: ' . mysql_error());
		}
		$query = "SHOW COLUMNS FROM hvn_contacts";
		$result = mysql_query($query);
		if($result){
			$i = 0;
			if (mysql_num_rows($result) > 0) {
				while ($row = mysql_fetch_assoc($result)) {
					$csv_output .= $row['Field'].", ";
					$i++;
				}
			}
			$csv_output .= "\n";
			$values = mysql_query("SELECT * FROM hvn_contacts");
			while ($rowr = mysql_fetch_row($values)) {
				for ($j=0;$j<$i;$j++) {
					$csv_output .= $rowr[$j].", ";
				}
				$csv_output .= "\n";
			}	
			$filename = $file."_".date("d-m-Y_H-i",time());
			header("Content-type: application/vnd.ms-excel");
			header("Content-disposition: csv" . date("Y-m-d") . ".csv");
			header("Content-disposition: filename=".$filename.".csv");
			echo ($csv_output);
			exit;
		} else {
			$_SESSION['error'] = "Error: " . mysql_error();
			header("Location:../views/hvnVolunteers.php");
		}
		mysql_close($conn);
	  }
	  function downloadOne(){
		include("../config/config.php");
		$file = 'exportone'; 
		$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		if(!$conn){
			die('Not connected : ' . mysql_error());
		}
		$sel = mysql_select_db($DB_SCHEMA, $conn);
		if(!$sel){
			 die('Cant select: ' . mysql_error());
		}
		$query = "SHOW COLUMNS FROM hvn_contacts";
		$result = mysql_query($query);
		if($result){
			$i = 0;
			if (mysql_num_rows($result) > 0) {
				while ($row = mysql_fetch_assoc($result)) {
					$csv_output .= $row['Field'].", ";
					$i++;
				}
			}
			$csv_output .= "\n";
			$values = mysql_query("SELECT * FROM hvn_contacts WHERE C_ID='" . $this->c_id . "';");
			while ($rowr = mysql_fetch_row($values)) {
				for ($j=0;$j<$i;$j++) {
					$csv_output .= $rowr[$j].", ";
				}
				$csv_output .= "\n";
			}	
			$filename = $file."_".date("d-m-Y_H-i",time());
			header("Content-type: application/vnd.ms-excel");
			header("Content-disposition: csv" . date("d-m-Y") . ".csv");
			header("Content-disposition: filename=".$filename.".csv");
			echo ($csv_output);
			exit;
		} else {
			$_SESSION['error'] = "Error: " . mysql_error();
			header("Location:../views/hvnVolunteers.php");
		}
		mysql_close($conn);
	  }
	 function sendMassMail($sub, $body, $bcc, $cc){
	  require_once('class.phpmailer.php');
	  include('../config/config.php');
	   $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
	  if(!$conn){
		 die('Not connected : ' . mysql_error());
	  }
	  $sel = mysql_select_db($DB_SCHEMA, $conn);
	  if(!$sel){
		 die('Cant select: ' . mysql_error());
	  }
	  $query = "SELECT C_First_Name, C_Email FROM hvn_contacts";
	  $result = mysql_query($query);
	  if($result){
		  try{
		  $mail = new PHPMailer(true);
		  $mail->IsSMTP();                           
		  $mail->SMTPAuth   = true;
		  $mail->Port       = 25;                    
		  $mail->Host       = $MAIL_HOST;
		  $mail->Username   = $MAIL_USER;
		  $mail->Password   = $MAIL_PASS; 
		  $mail->AddReplyTo($_SESSION['uemail'],"Haven Partnership");
		  $mail->From = $_SESSION['uemail'];
		  $mail->FromName = "Haven Partnership";
          $mail->Subject = $sub;
		  $mail->WordWrap = 80; // set word wrap
		  $mail->Body = $body;
		  if(!empty($bcc)){
			$mail->AddBCC($bcc);
		  }
		  if(!empty($cc)){
			$mail->AddCC($cc);
		  }
		  while($row = mysql_fetch_array($result)){
				if(!empty($row['email'])){
						$mail->AddAddress($row['C_Email'], $row['C_First_Name']);
				}
			 }
		  $mail->Send();
		  if($mail->Send()){
			$_SESSION['success'] = "Mail Sent!";
			header('Location:../views/hvnEmail.php');
		  }
		  } catch (phpmailerException $e) {
				$_SESSION['error'] =  $e->errorMessage();
				header('Location:../views/hvnEmail.php');
		  }
	  }
	  }
	  function AdHocPDF($field, $criteria){
		  include('../config/config.php');
		  require_once('pdfClass.php');
		  $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		  if(!$conn){
				die('Not connected : ' . mysql_error());
		  }
		  $sel = mysql_select_db($DB_SCHEMA, $conn);
		  if(!$sel){
			 die('Cant select: ' . mysql_error());
		  }
		  $query = "SELECT C_First_Name, C_Last_Name, C_Email, C_Mobile, C_Occupation, C_Status FROM hvn_contacts WHERE " . $field . " like '%" . $criteria . "%'";
		  $result = mysql_query($query);
		  if($result){
			if(mysql_num_rows($result) != 0){
					$header  = array('First Name' , 'Last Name' , 'Email' , 'Trade', 'Occupation', 'Status');
					$pdf = new PDF('L','pt','A4');
					$pdf->AddPage();
					$pdf->SetFont('Arial','',8);
						$pdf->SetFillColor(255,0,0);
						$pdf->SetTextColor(255);
						$pdf->SetDrawColor(128,0,0);
						$pdf->SetLineWidth(.3);
						$pdf->SetFont('','B');
						//Header
						$w=array(50,50,200,70,80,40);
						for($i=0;$i<count($header);$i++)
							$pdf->Cell($w[$i],12,$header[$i],1,0,'C',true);
						$pdf->Ln();
						//Color and font restoration
						$pdf->SetFillColor(224,235,255);
						$pdf->SetTextColor(0);
						$pdf->SetFont('');
						//Data
						$fill=false;
					while($row = mysql_fetch_assoc($result)) 
					{
						$pdf->Cell($w[0],12,$row['C_First_Name'],'LR',0,'',$fill);
						$pdf->Cell($w[1],12,$row['C_Last_Name'],'LR',0,'',$fill);
						$pdf->Cell($w[2],12,$row['C_Email'],'LR',0,'',$fill);
						$pdf->Cell($w[3],12,$row['C_Mobile'],'LR',0,'',$fill);
						$pdf->Cell($w[4],12,$row['C_Occupation'],'LR',0,'R',$fill);
						$pdf->Cell($w[4],12,$row['C_Status'],'LR',0,'R',$fill);
						$pdf->Ln();
						$fill=!$fill;
					}
					$pdf->Cell(array_sum($w),0,'','T');
					//$pdf->FancyTable($header, $data);
					$filename = "HavenPDF_" . date("d-m-Y_H-i",time());
					$pdf->Output();
			} else {
				$_SESSION['error'] = 'No Data in result';
				header("Location:../views/adhoc-reporting.php");
			}
	
		  } else {
			$_SESSION['error'] = mysql_error();
			header("Location:../views/adhoc-reporting.php");
		  }
		  
	  }
	  
	  function AdHocAdvanced($field, $condition, $criteria){
		  include('../config/config.php');
		  require_once('pdfClass.php');
		  $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		  if(!$conn){
				die('Not connected : ' . mysql_error());
		  }
		  $sel = mysql_select_db($DB_SCHEMA, $conn);
		  if(!$sel){
			 die('Cant select: ' . mysql_error());
		  }
		  if(!$field == 'V_County'){
		     $query = "SELECT C_First_Name, C_Last_Name, C_Email, C_Mobile, C_Occupation, C_Status FROM hvn_contacts WHERE " . $field . " " . $condition . "'" . $criteria . "'";
		  } else {
			 $query = "SELECT C_First_Name, C_Last_Name, C_Email, C_Mobile, C_Occupation, C_Status FROM hvn_contacts WHERE " . $field . " like'%" . $criteria . "%'";
	      }
		  $result = mysql_query($query);
		  if($result){
		   if(mysql_num_rows($result) != 0){
					$header  = array('First Name' , 'Last Name' , 'Email' , 'Trade', 'Occupation', 'Status');
				$pdf = new PDF('L','pt','A4');
				$pdf->AddPage();
				$pdf->SetFont('Arial','',8);
				$pdf->SetFillColor(255,0,0);
				$pdf->SetTextColor(255);
				$pdf->SetDrawColor(128,0,0);
				$pdf->SetLineWidth(.3);
				$pdf->SetFont('','B');
					//Header
				$w=array(70,70,200,70,70);				
				for($i=0;$i<count($header);$i++)
						$pdf->Cell($w[$i],12,$header[$i],1,0,'C',true);
					$pdf->Ln();
					//Color and font restoration
					$pdf->SetFillColor(224,235,255);
					$pdf->SetTextColor(0);
					$pdf->SetFont('');
					//Data
					$fill=false;
				while($row = mysql_fetch_assoc($result)) 
				{
						$pdf->Cell($w[0],12,$row['C_First_Name'],'LR',0,'',$fill);
						$pdf->Cell($w[1],12,$row['C_Last_Name'],'LR',0,'',$fill);
						$pdf->Cell($w[2],12,$row['C_Email'],'LR',0,'',$fill);
						$pdf->Cell($w[3],12,$row['C_Mobile'],'LR',0,'',$fill);
						$pdf->Cell($w[4],12,$row['C_Occupation'],'LR',0,'R',$fill);
						$pdf->Cell($w[4],12,$row['C_Status'],'LR',0,'R',$fill);
						$pdf->Ln();
						$fill=!$fill;
				}
				$pdf->Cell(array_sum($w),0,'','T');
				//$pdf->FancyTable($header, $data);
				$filename = "HavenPDF_" . date("d-m-Y_H-i",time());
				$pdf->Output();	
			} else {
				$_SESSION['error'] = 'No data in result';
				header("Location:../views/adhoc-reporting.php");
			}
		  } else {
			$_SESSION['error'] = mysql_error();
			header("Location:../views/adhoc-reporting.php");
		  }
	  }
	  function AdHocCSVbasic($field, $criteria){
	  //download everybody as CSV
		include("../config/config.php");
		$file = 'export'; 
		$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		if(!$conn){
			die('Not connected : ' . mysql_error());
		}
		$sel = mysql_select_db($DB_SCHEMA, $conn);
		if(!$sel){
			 die('Cant select: ' . mysql_error());
		}
		$query = "SHOW COLUMNS FROM hvn_contacts";
		$result = mysql_query($query);
		if($result){
			$i = 0;
			if (mysql_num_rows($result) > 0) {
				while ($row = mysql_fetch_assoc($result)) {
					$csv_output .= $row['Field'].", ";
					$i++;
				}
			}
			$csv_output .= "\n";
			$que = "SELECT * FROM hvn_contacts WHERE " . $field . " like '%" . $criteria . "%'";
			$values = mysql_query($que);
			if($values){
				while ($rowr = mysql_fetch_row($values)) {
					for ($j=0;$j<$i;$j++) {
						$csv_output .= $rowr[$j].", ";
					}
					$csv_output .= "\n";
				}	
				$filename = $file."AdHoc_".date("d-m-Y_H-i",time());
				header("Content-type: application/vnd.ms-excel");
				header("Content-disposition: csv" . date("Y-m-d") . ".csv");
				header("Content-disposition: filename=".$filename.".csv");
				echo ($csv_output);
				exit;
			} else {
				$_SESSION['error'] = "Error: " . mysql_error();
				header("Location:../views/adhoc-reporting.php");
			}
		} else {
			$_SESSION['error'] = "Error: " . mysql_error();
			header("Location:../views/hvnVolunteers.php");
		}
		mysql_close($conn);
	  }
	  
	  function AdHocCSVAdv($field, $condition, $criteria){
		include("../config/config.php");
		$file = 'export'; 
		$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		if(!$conn){
			die('Not connected : ' . mysql_error());
		}
		$sel = mysql_select_db($DB_SCHEMA, $conn);
		if(!$sel){
			 die('Cant select: ' . mysql_error());
		}
		$query = "SHOW COLUMNS FROM hvn_contacts";
		$result = mysql_query($query);
		if($result){
			$i = 0;
			if (mysql_num_rows($result) > 0) {
				while ($row = mysql_fetch_assoc($result)) {
					$csv_output .= $row['Field'].", ";
					$i++;
				}
			}
			$csv_output .= "\n";
			if(!$field == 'V_County'){
				$query = "SELECT * FROM hvn_contacts WHERE " . $field . " " . $condition . "'" . $criteria . "'";
			} else {
				$query = "SELECT * FROM hvn_contacts WHERE " . $field . " like'%" . $criteria . "%'";
			}
			$values = mysql_query($query);
			while ($rowr = mysql_fetch_row($values)) {
				for ($j=0;$j<$i;$j++) {
					$csv_output .= $rowr[$j].", ";
				}
				$csv_output .= "\n";
			}	
			$filename = $file."AdHoc_".date("d-m-Y_H-i",time());
			header("Content-type: application/vnd.ms-excel");
			header("Content-disposition: csv" . date("Y-m-d") . ".csv");
			header("Content-disposition: filename=".$filename.".csv");
			echo ($csv_output);
			exit;
		} else {
			$_SESSION['error'] = "Error: " . mysql_error();
			header("Location:../views/hvnVolunteers.php");
		}
		mysql_close($conn);
	  
	  }

	  function ContactStatus(){
		  include('../config/config.php');
		  require_once('pdfClass.php');
		  $conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		  if(!$conn){
				die('Not connected : ' . mysql_error());
		  }
		  $sel = mysql_select_db($DB_SCHEMA, $conn);
		  if(!$sel){
			 die('Cant select: ' . mysql_error());
		  }
		$query2 = "select C_Status, count(C_Status) from hvn_contacts group by C_Status";
		$result2 = mysql_query($query2);
		if($result2){
			if(mysql_num_rows($result2) != 0){
						$hot;
						$warm;
						$cold;
						$app;
						while($row2 = mysql_fetch_array($result2)){
							if($row2['C_Status'] == 'WARM'){
								$warm = $warm + $row2['count(C_Status)'];
							}
							if($row2['C_Status'] == 'HOT'){
								$hot = $hot + $row2['count(C_Status)'];
							}
							if($row2['C_Status'] == 'COLD'){
								$cold = $cold + $row2['count(C_Status)'];
							}
							if($row2['C_Status'] == 'APP'){
								$app = $app + $row2['count(C_Status)'];
							}
						}
						$data2 = array('Hot' => $hot, 'Cold' => $cold, "AppPending" => $app, 'Warm' => $warm);
						$pdf = new PDF('P','pt','A4');
						$pdf->AddPage();
						$pdf->SetFont('Arial', 'BIU', 12);
						$pdf->Cell(0, 5, 'Trades', 0, 1);
						$pdf->Ln(8);
						$pdf->SetFont('Arial', '', 10);
						$valX = $pdf->GetX();
						$valY = $pdf->GetY();
						$pdf->Cell(60, 14, 'Warm:');
						$pdf->Cell(15, 14, $data2['Warm'], 0, 0, 'R');
						$pdf->Ln(14);
						$pdf->Cell(60, 14, 'Hot:');
						$pdf->Cell(15, 14, $data2['Hot'], 0, 0, 'R');
						$pdf->Ln(14);
						$pdf->Cell(60, 14, 'Cold:');
						$pdf->Cell(15, 14, $data2['Cold'], 0, 0, 'R');
						$pdf->Ln(14);
						$pdf->Cell(60, 14, 'Application Pending:');
						$pdf->Cell(15, 14, $data2['AppPending'], 0, 0, 'R');
						$pdf->SetXY(90, $valY+80);
						$col1=array(100,100,255);
						$col2=array(255,100,100);
						$col3=array(255,255,100);
						$col4=array(255,100,255);
						$pdf->PieChart(320, 320, $data2, '%l (%p)', array($col1,$col2,$col3,$col4));
						$pdf->SetXY($valX, $valY + 180);
						//output for file download
				$filename = "HavenPDF_ContactStatus_Report" . date("d-m-Y_H-i",time()) . ".pdf";
				$pdf->Output($filename, "D");	
			} else {
				$_SESSION['error'] = 'No data in result';
				header("Location:../views/standard-reporting.php");
			}
		  } else {
			$_SESSION['error'] = mysql_error();
			header("Location:../views/standard-reporting.php");
		  }
	  }
}//end of class definition
?>