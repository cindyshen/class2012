<?php

// in the same folder

require 'database.php';

function get_products()
{
	
	global $db;// defined in database.php
	
	$query = 'select productName from products';
	return $db->query($query);	

}

?>
