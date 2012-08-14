<?php

// in the same folder

require 'database.php';

function get_products()
{
	
	global $db;// defined in database.php, get databas handler from 
	
	$query = 'select productName from products';
	return $db->query($query);	

}

?>
