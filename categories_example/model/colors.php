<?php

// in the same folder

require 'database.php';

function get_colors()
{	
	global $db;// defined in database.php
	
	$query = 'select name from colors';
	return $db->query($query);
			
}

?>