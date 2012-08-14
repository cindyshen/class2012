<?php # .\Includes\db.inc.php
	function connect() {
		
		$db = mysqli_connect("localhost", "add_email", "html1234", "Newsletter")
					or die("Error connecting to the database.");
		
		return $db;
		
	} // End connect
?>