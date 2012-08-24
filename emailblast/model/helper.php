<?php

function sendEmails()
{
	foreach (Email::find('all') as $sEmail)
	{
	 //echo $sEmail->email; 
	 
	 $message = $_POST['message'];
	 $subject = $_POST['subject'];
	 
	 // In case any of our lines are larger than 70 characters, we should use wordwrap()
	 $message = wordwrap($message, 70);
	 
	 // print_r($_SERVER);	 
	 $headers = $headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n"; 
	 	 	'From: ' . $_SERVER['SERVER_ADMIN'] . "\r\n" .
	 		'Reply-To: ' . $_SERVER['SERVER_ADMIN'] . "\r\n" .
	 		"Disposition-Notification-To" . $_SERVER['SERVER_ADMIN'] . "\r\n" .
	 		'X-Mailer: PHP/' . phpversion();	 		
	 	 
	 // Send
	 if(mail($sEmail->email, $subject, $message, $headers))
	 {
	 	echo "mail sent  to " . $sEmail->email;
	 }
	 else
	 {
	 	echo "mail failed to " . $sEmail->email;
	 }
 
	}
	
}	

?>	
