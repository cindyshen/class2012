<?php

// in the same folder

require 'database.php';

function get_categories()
{	
	global $db;// defined in database.php
	
	$query = 'select categoryName from categories';
	return $db->query($query);
			
}

?>