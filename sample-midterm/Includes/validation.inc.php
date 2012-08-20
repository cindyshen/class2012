<?php #validation.inc.php
	
	function testEmail($email, $optional = false) {
		$emailRegEx = '/^[A-Z0-9._%+-]+@(?:[A-Z0-9-]+\.)+[A-Z]{2,4}$/i';
		
		if ($optional && strlen($email) == 0) {
			return true;
		} // End if
		else {
			return preg_match($emailRegEx, $email);
		} // End else
		
	} // End testEmail
	
	function testPhone($phone, $optional = false) {
		$phoneRegEx = '/^\(?\d{3}\)?[\s-.]?\d{3}[\s-.]?\d{4}$/';
		
		if ($optional && strlen($phone) == 0) {
			return true;
		} // End if
		else {
			return preg_match($phoneRegEx, $phone);
		} // End else
	} // End testPhone

	function testRequired($value) {
		return (!empty($value) && strlen(trim($value)) != 0);
	} // End testRequired
?>