
<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
if(!empty($_SESSION['viewcontact'])){
	$con = new Contact();
	$con->setC_ID($_SESSION['viewcontact']);
	$con->contactDetail();
	//do email
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
			  $mail->Subject = Trim(stripslashes($_POST['subject']));
			  $mail->WordWrap = 80; // set word wrap
			  $mail->Body = Trim(stripslashes($_POST['message'])); 
			  $mail->AddAddress($con->getEmail(), $con->getFname());
			  if($mail->Send()){
				$_SESSION['success'] = "Mail Sent!";
				header('Location:../views/hvnViewContact.php');
			  }
		  } catch (phpmailerException $e) {
				$_SESSION['error'] =  $e->errorMessage();
				header('Location:../views/hvnViewContact.php');
		  } catch (Exception $e) {
				$_SESSION['error'] =  $e->getMessage();
				header('Location:../views/hvnViewContact.php');
		  }
}
if (!empty($_SESSION['viewvolunteer'])) {
	$vol = new Volunteer();
	$vol->setV_ID($_SESSION['viewvolunteer']);
	$vol->volunteerDetail();
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
			  $mail->Subject = Trim(stripslashes($_POST['subject']));
			  $mail->WordWrap = 80; // set word wrap
			  $mail->Body = Trim(stripslashes($_POST['message'])); 
			  $mail->AddAddress($vol->getEmail(), $vol->getFname());
			  $mail->Send();
			  if($mail->Send()){
				$_SESSION['success'] = "Mail Sent!";
				header('Location:../views/hvnViewVolunteer.php');
			  }
		  } catch (phpmailerException $e) {
				$_SESSION['error'] =  $e->errorMessage();
				header('Location:../views/hvnViewVolunteer.php');
		  } catch (Exception $e) {
				$_SESSION['error'] =  $e->getMessage();
				header('Location:../views/hvnViewVolunteer.php');
		  }
}
if(isset($_POST['cancel'])){
	header('Location:../views/index.php');
}
?>