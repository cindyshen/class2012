<?php
function getCDs()
{
	global $db;
	$query = 'select name from mycds';
	return $db->query($query);
}


function addCD($sTitle)
{
	global $db;
	$query = "insert into mycds (name) values ('$sTitle')";
	echo $query;
	$db->exec($query); 
}
?>