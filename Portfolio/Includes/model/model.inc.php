<?php # model.inc.php
	function connect() {
		
		$db = mysqli_connect("localhost", "add_msg", "php1234", "Contact")
					or die("Error connecting to the database.");
		
		return $db;
		
	} // End connect
	
	function sanitizeDatabase() {
		global $clean;
		global $mysql;
		
		$db = connect();
		
		foreach ($clean as $key => $value) {
			
			switch ($key) {
				case "name":
					$value = checkLength($value, 80);
					break;
				case "email":
					$value = checkLength($value, 100);
					break;
				case "phone":
					$value = prepNumber($value);
					break;
				case "message":
					$value = checkLength($value, 65000);
					break;
			}
			
			$mysql[$key] = mysqli_real_escape_string($db, $value);
		}
		
		mysqli_close($db);
		
	} // End sanitizeDatabase
	
	function prepNumber($number) {
		$pattern = '/\D/';
		
		$number = preg_replace($pattern, "", $number);
		
		return $number;
	} // End prepNumber
	
	function checkLength($value, $maxLength) {
		return (strlen($value) <= $maxLength) ? $value : "Error: Data too long";
	} // End checkLength
	
	function insertMessage() {
		global $mysql;
		$success = false;
		
		$db = connect();
		
		$query = sprintf(
			"INSERT INTO Message (Name, Email, Phone, Message) VALUES ('%s', '%s', '%s', '%s')", 
			 $mysql["name"], $mysql["email"], $mysql["phone"], $mysql["message"]);
		
		if (mysqli_query($db, $query)) {
			$success = true;
		}
		else {
			$success = false;
			// Log error that happened
		}
		
		mysqli_close($db);
		
		return $success;
	} // End insertMessage
?>