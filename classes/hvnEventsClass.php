<?php 
require_once('../config/config.php'); 
//class definition for events
class Events {
	//instance variables
	private $e_id;
	private $name_of_event;
	private $description;
	private $date;
	private $time;
	private $loc;

	//SETS
	function setE_ID($eid){ $this->e_id=$eid;; }
	function setNameOFEvent($noe){ $this->name_of_event=$noe; }
	function setDescription($des){ $this->description=$des; }
	function setDate($dte){ $this->date=$dte; }
	function setTime($tme){ $this->time=$tme; }
	function setLocation($lo){ $this->loc=$lo; }
	
	//GETS
	function getE_ID() { return $this->e_id; }
	function getNameOFEvent() { return $this->name_of_event; }
	function getDescription() { return $this->description; }
	function getDate() { return $this->date; }
	function getTime() { return $this->time; }
	function getLocation() { return $this->loc; }
	
	public function _construct(){
		
	}
	
	//SQL injections encapsulated with PHP functions
	function insertEvent(){ 
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
		$query = "INSERT INTO hvnevents
		SET
		Name_Of_Event='" . $this->name_of_event . "',
		Description_Of_Event='" . $this->description . "',
		Date_Of_Event='" . $this->date . "',
		Time_Of_Event='" . $this->time . "',
		location='" . $this->loc . "'";
		//execute query
		$result = mysql_query($query);
		if($result){
			$success = "One Event Added";
			header("Location:../views/hvnEventsAdd.php?&success=" . $success);
		} else {
			$err = mysql_error();
			header("Location:../views/hvnEventsAdd.php?&error=" . $err);
		}
		mysql_close($conn);
	}
	
	//update a members details
	function updateEvent(){
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
		$query = "UPDATE hvnevents
		SET
		Name_Of_Event='" . $this->name_of_event . "',
		Description_Of_Event='" . $this->description . "',
		Date_Of_Event='" . $this->date . "',
		Time_Of_Event='" . $this->time . "',
		location='" . $this->loc . "'
		WHERE E_ID='" . $this->e_id . "';";
		//execute query
		$result = mysql_query($query);
		if($result){
			$_SESSION['success'] = "One Event Edited";
			header("Location:../views/hvnEvents.php");
		} else {
			$_SESSION['error'] = mysql_error();
			header("Location:../views/hvnEvents.php");
		}
		mysql_close($conn);
	  }
	  function pullEvents(){
	  include("../config/config.php");
	  	$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
				if(!$conn){
					 die('Not connected : ' . mysql_error());
				}
				$sel = mysql_select_db($DB_SCHEMA, $conn);
				if(!$sel){
					 die('Cannot select: ' . mysql_error());
				}
				$query = "SELECT * FROM hvnevents";
				$result = mysql_query($query);
				if($result){
					echo ("<table cellpadding='0' cellspacing='0' border='0' id='table' class='sortable'>
					<thead>
					<tr>
					<th>Name Of Event</th>
					<th>Description Of Event</th>
					<th>Date Of Event</th>
					<th>Time Of Event</th>
					<th class='nosort'>-</th>
					</thead></tr><tbody>");
					while($row = mysql_fetch_array($result))
					{
						echo ("<tr>");
						echo ("<td>" . $row['Name_Of_Event'] . "</td>");
						echo ("<td>" . $row['Description_Of_Event'] . "</td>");
						$d = strtotime($row['Date_Of_Event'] );
						if(!$d == "0000-00-00"){
						     echo ("<td>none</td>");
						} else {
						   	echo ("<td>" . date("d-m-Y", $d) . "</td>");
						}
						echo ("<td>" . $row['Time_Of_Event'] . "</td>");
						echo ("<td><input type='radio' name='events' value='" . $row['E_ID'] . "' /></td>");
						echo ("</tr>");  
					}
					echo("</tbody></table>");
				} else {
					echo("Query did not process: " . mysql_error());
				}
				mysql_close($conn);
			}
			
		function eventDetail(){
		include("../config/config.php");
	  	$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
		if(!$conn){
			die('Not connected : ' . mysql_error());
		}
		$sel = mysql_select_db($DB_SCHEMA, $conn);
		if(!$sel){
			 die('Cant select: ' . mysql_error());
		}
		$query = "SELECT *  FROM hvnevents WHERE E_ID=" . $this->e_id;
		$result = mysql_query($query);
				if($result){
					while($row = mysql_fetch_array($result))
					{
						$this->name_of_event = $row['Name_Of_Event'];
						$this->description = $row['Description_Of_Event'];
						$this->date = $row['Date_Of_Event'];
						$this->time = $row['Time_Of_Event'];
						$this->loc = $row['location'];
					}
				} else {
					echo("Query did not process: " . mysql_error());
				}
				mysql_close($conn);
	  }
	  //delete event from table
			function deleteEvent(){
			include("../config/config.php");
			$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
			if(!$conn){
				die('Not connected : ' . mysql_error());
			}
			$sel = mysql_select_db($DB_SCHEMA, $conn);
			if(!$sel){
				 die('Cant select: ' . mysql_error());
			}
			$query = "DELETE FROM hvnevents WHERE E_ID=" . $this->e_id;
			$result = mysql_query($query);
			if($result){
				$_SESSION['success'] = "Event Deleted";
				header("Location:../views/hvnEvents.php");
			} else {
				$_SESSION['error'] = "Query did not process: " . mysql_error();
				header("Location:../views/hvnEvents.php");
			}
			mysql_close($conn);
		}
				
	 
		
}//end of class definition	
	
?>