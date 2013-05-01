<?php
session_start();
if(!isset($_SESSION['uid'])){
	//redirect
	header("Location:../index.php");
}
include("../config/appconfig.php");
//parse data
if(isset($_POST['send'])){
	if(!empty($_POST['toall'])){
		$subject = Trim(stripslashes($_POST['subject']));
		$body= Trim(stripslashes($_POST['message']));
		$bcc= Trim(stripslashes($_POST['bcc']));
		$cc = Trim(stripslashes($_POST['cc']));
		if($_POST['toall'] == "contacts"){
			$con = new Contact();
			$con->sendMassMail($subject, $body, $bcc, $cc);
		} else if($_POST['toall'] == "volunteers"){
			$vol = new Volunteer();
		    $vol->sendMassMail($subject, $body, $bcc, $cc);
		}
	}
	if(!empty($_POST['emaillist'])){
	$sub = Trim(stripslashes($_POST['subject']));
		$body = Trim(stripslashes($_POST['message']));
		$bcc= Trim(stripslashes($_POST['bcc']));
		$cc = Trim(stripslashes($_POST['cc']));
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
			  while (list ($key,$val) = @each($_SESSION['emaillist'])) {
					$mail->AddAddress($val);
			  } 
			  $mail->AddAddress(Trim(stripslashes($_POST['to'])));
			  if($mail->Send()){
				$_SESSION['success'] = "Mail Sent!";
				header('Location:../views/hvnEmail.php');
			  }
		  } catch (phpmailerException $e) {
				$_SESSION['error'] =  $e->errorMessage();
				header('Location:../views/hvnEmail.php');
		  } catch (Exception $e) {
				$_SESSION['error'] =  $e->getMessage();
				header('Location:../views/hvnEmail.php');
		  }
	}
	if(!empty($_POST['to'])){
		$sub = Trim(stripslashes($_POST['subject']));
		$body = Trim(stripslashes($_POST['message']));
		$bcc= Trim(stripslashes($_POST['bcc']));
		$cc = Trim(stripslashes($_POST['cc']));
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
			  $mail->AddAddress(Trim(stripslashes($_POST['to'])));
			  if($mail->Send()){
				$_SESSION['success'] = "Mail Sent!";
				header('Location:../views/hvnEmail.php');
			  }
		  } catch (phpmailerException $e) {
				$_SESSION['error'] =  $e->errorMessage();
				header('Location:../views/hvnEmail.php');
		  } catch (Exception $e) {
				$_SESSION['error'] =  $e->getMessage();
				header('Location:../views/hvnEmail.php');
		  }
		  
	}
} else {
	header('Location:../views/hvnEmail.php');
}
?>