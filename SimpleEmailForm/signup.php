<?php
	include_once("./Includes/db.inc.php");

	if (isset($_POST["email"])) {
		$clean = array();
		$mysql = array();
		
		$email_regex = '/^\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,8}$/';
				
		if (preg_match($email_regex, $_POST["email"])) {
			$db = connect();

			$clean["email"] = $_POST["email"];
			$mysql["email"] = mysqli_real_escape_string($db, $clean["email"]);
		
			$query = 
				sprintf("INSERT INTO Subscriber (Email) VALUES ('%s')", 	
					$mysql["email"]);
			
			if (mysqli_query($db, $query)) {
				echo "Valid email";
			} // End if
			else {
				$errno = mysqli_errno($db);
				
				if ($errno == 1062)
					echo "Duplicate email";
				else if ($errno == 1406)
					echo "Email too long";
			} // End else
			
		} // End if
		else {
			echo "Invalid email";
		} // End else
	} // End outer if
	else {
		header("Location: index.html");
	} // End outer else
?>