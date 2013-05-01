<?php
class Documentation {
	//instance variables
	private $D_ID;
	private $filename;
	private $filetype;
	private $filesize;
	private $filecontent;
	private $copyof;
	private $refkey;
	
	//set and get methods
	//SETS
	function setDID($did){ $this->D_ID=$did; }
	function setFileName($app){ $this->filename=$app; }
	function setFileType($sp){ $this->filetype=$sp; }
	function setFileSize($pp){ $this->filesize=$pp; }
	function setFileContent($tc){ $this->filecontent=$tc; }
	function setCopyOf($ins){ $this->copyof=$ins; }
	function setRefKey($d){ $this->refkey=$d; }
	
	//GETS
	function getDID() { return $this->D_ID; }
	function getFileName() { return $this->filename; }
	function getFileType() { return $this->filetype; }
	function getFileSize() { return $this->filesize; }
	function getFileContent() { return $this->filecontent; }
	function getCopyOf() { return $this->copyof; }
	function getRefKey() { return $this->refkey; }
	
	
	//SQL injections encapsulated with PHP functions
	function insertDoc(){ 
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
		$query = "INSERT INTO hvndocumentation
		SET
		filename='" . $this->filename. "',
		filetype='" . $this->filetype . "',
		filesize='" . $this->filesize . "',
		filecontent='" . $this->filecontent . "',
		copyof='" . $this->copyof . "',
		refkey='" . $this->refkey. "'";
		//execute query
		$result = mysql_query($query);
		if($result){
			$_SESSION['success'] = "Document Uploaded";
			header("Location:../views/hvnEditVolunteer.php");
		} else {
			$_SESSION['error'] = mysql_error();
			header("Location:../views/hvnEditVolunteer.php");
		}
		mysql_close($conn);
	}
	
	//update a members details
	function updateDoc($id){
		//create a connection to the grade a database
		$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD)or die("cannot connect"); 
		//select the database 
		$sel = mysql_select_db($DB_SCHEMA)or die("cannot select DB");
		//SQL injection to update a row in the memebers table updating a member of gradea
	    $sql = "UPDATE
			hvndocumentation
		  SET
			filename='" . $this->filename . "',
			filetype='" . $this->filetype . "',
			filesize='" . $this->filesize . "',
			filecontent='" . $this->filecontent . "',
			copyof='" . $this->copyof . "',
			refkey='" . $this->refkey . "'
		 WHERE D_ID='" . $this->d_id . "';";
		//execute query
		$result = mysql_query($query);
		if($result){
			$_SESSION['success'] = "Document Updated";
			header("Location:../views/hvnEditDocumentation.php");
		} else {
			$_SESSION['error'] = mysql_error();
			header("Location:../views/hvnEditDocumentation.php");
		}
		mysql_close($conn);
	  }
	  function pullData(){
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
		$query="SELECT D_ID, filename, filetype, filesize FROM hvndocumentation WHERE copyof='" . $this->copyof . "' AND refkey='" . $this->refkey . "'LIMIT 1;"; 
		$result = mysql_query($query);
		if($result){
			 while($row = mysql_fetch_array($result))
			 {
				 $this->D_ID = $row['D_ID'];
				 $this->filename = $row['filename'];
				 $this->filetype = $row['filetype'];
				 $this->filesize = $row['filesize'];
			}
		} else {
			$_SESSION['error'] = "SQL: " . mysql_error();
			header("Location:../views/hvnViewVolunteer.php");
		}
		mysql_close($conn);
	  }
	  function downloadDoc(){
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
		$query="SELECT filename, filetype, filesize, filecontent FROM hvndocumentation WHERE D_ID='" . $this->D_ID . "' LIMIT 1;"; 
		$result = mysql_query($query);
		if($result){
		    while($row = mysql_fetch_array($result))
			{
				$this->filename = $row['filename'];
				$this->filesize = $row['filesize'];
				$this->filetype = $row['filetype'];
				$this->filecontent = $row['filecontent'];
			}
			header("Content-length: " .$this->filesize);
			header("Content-type: " . $this->type);
			header("Content-Disposition: attachment; filename=" . $this->filename);
			echo ($this->filecontent);
			
		} else {
			$_SESSION['error'] = "SQL: " . mysql_error();
			header("Location:../views/hvnViewVolunteer.php");
		}
		mysql_close($conn);
	  }
	  	
	  //delete member from table
	  function deleteMember(){
	  	createConnectionToMember();
		//SQL for deleting a member
	    $sql = "DELETE FROM 
				member
				WHERE
					member_id=" . mysql_escape_string($this->member_id);
		//execute query
		mysql_query($sql);
	  }
	  function checkLogin(){
	  	//create a connection to the database
	  	$conn = mysql_connect("localhost", "root", "root")or die("cannot connect");
		//select the database gradea 
		$sel = mysql_select_db("gradea")or die("cannot select DB");
		//SQL injection to check the user login details
	 	 $sql = "SELECT * FROM member WHERE email_addr='" . $this->email . "' and password='" . $this->password . "'";
	  	 //execute query
		 $result = mysql_query($sql);
		 //if a scucess
		 if($result){
		 	 //create an array based on the query
			 $row = mysql_fetch_array($result);
			 //parse each row of the query result
			 $this->member_id = $row['member_id'];
			 $this->fname = $row['first_name'];
			 $this->lname = $row['last_name'];
			 $this->email = $row['email_addr'];
			 $this->profile_img = $row['profile_img'];
			 $this->interest = $row['interest'];
			 $this->about_me = $row['about_text'];
			 $this->sign_up = $row['sign_up'];
			 //used for verification in the login_logic.php
			 //count the number rows returned
			 $this->count = mysql_num_rows($result);
		 } else {
		     echo "Email address or password is incorrect";
		 }
	  }
	  function myprofile(){
	  	//create a connection to the database
	  	$conn = mysql_connect("localhost", "root", "root")or die("cannot connect");
		//select the gradea database 
		$sel = mysql_select_db("gradea")or die("cannot select DB");
		//SQL injection to select a member row according to the member_id criteria
		$sql = "SELECT * FROM member WHERE member=" . $this->member_id;
		$result = mysql_query($sql);
		//if a success
		 if($result){
		 	//create an array based on the query result
			 $row = mysql_fetch_array($result);
			 $this->fname = $row['first_name'];
			 $this->lname = $row['last_name'];
			 $this->email = $row['email_addr'];
			 $this->profile_img = $row['profile_img'];
			 $this->interest = $row['interest'];
			 $this->sign_up = $row['sign_up'];
			 $this->about_me = $row['about_text'];
			 $this->sign_up = $row['sign_up'];
			
		 }
		 //close database connection
		 mysql_close($conn);
	   }
	   function forgotpassword($email){
	   //create connection and select database
	   	$conn = mysql_connect("localhost", "root", "root")or die("cannot connect"); 
		$sel = mysql_select_db("gradea")or die("cannot select DB");
		//SQL injection for selectin a member based on their email address criteria
		$sql = "SELECT * FROM member WHERE email_addr='" . $email . "'";
		$result = mysql_query($sql);
			if ($result){
				//create and array
				$row = mysql_fetch_array($result);
				//parse the security information
				$this->security_question = $row['security_question'];
				$this->security_answer = $row['secuirty_answer'];
				//count the rows
				$this->count = mysql_num_rows($result);
			}
		//close database connection
		mysql_close($conn);
		}
		//veriofy the answer
		function verifyAnswer($answer){
			//create a connection and select the database
			$conn = mysql_connect("localhost", "root", "root")or die("cannot connect"); 
			$sel = mysql_select_db("gradea")or die("cannot select DB");
			//select the answer based on the the question in the SQL string, select the right answer to check based on the email address
			$sql = "SELECT first_name, password FROM member WHERE email_addr='" . $this->email . "' and secuirty_answer='" . $answer . "'";
			//execute the query
			$result = mysql_query($sql);
				if ($result){
					//create an array based on the query result
					$row = mysql_fetch_array($result);
					//parse the database return
					$this->password = $row['password'];
					$this->fname = $row['first_name'];
					//coun the rows
					$this->count = mysql_num_rows($result);
				} else {
				//if an error occurs disply the error
				 echo "SQL error: " . mysql_error();
				 }
				//close connection
			mysql_close($conn);
		}
		//check image URL
		function checkImage($id){
			//create connection to the database and select grade a
			$conn = mysql_connect("localhost", "root", "root")or die("cannot connect"); 
			$sel = mysql_select_db("gradea")or die("cannot select DB");
			//SQL injection to select the image URL based on the members id
			$sql = "SELECT profile_img FROM member WHERE member_id=" . $id;
			//execute query
			$result = mysql_query($sql);
			if($result){
				//create array based on the query result
				$row = mysql_fetch_array($result);
				//parse the array
				$this->profile_img = $row['profile_img'];
			} else { 
				//if and SQL error occurs display the code
				print "SQL error: " . mysql_error();
			}
			//close connection
			mysql_close($conn);
		}
		function newImage($id){
			$conn = mysql_connect("localhost", "root", "root")or die("cannot connect"); 
			$sel = mysql_select_db("gradea")or die("cannot select DB");
			$sql = "UPDATE member SET profile_img='" . $this->profile_img . "' WHERE member_id=" . $id;
			$result = mysql_query($sql);			
			if($result){
				//print "picture in";
			} else { 
				print "SQL error: " . mysql_error();
			}
			mysql_close($conn);
		}
		
}//end of class definition
?>