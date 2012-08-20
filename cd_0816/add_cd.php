<?php 
// get cd name 
$name = $_POST['name'];

// Validate inputs
if ( empty($name) ) 
{
	$error = "Invalid CD data. Check all fields and try again.";
	include('error.php');
} 
else 
{
	// If valid, add the cd into the database
	require_once ('database.php');
	
	$query = "INSERT INTO cd (name) VALUES ('$name')";
	$db->exec($query);	
	
	// Display the CD List page
	include('index.php');
}

?>
	


