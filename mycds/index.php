<?php
require 'model/database.php';
require 'model/mycds.php';

if(array_key_exists('title', $_POST)){
	//echo 'exists ' . $_POST['title'];
	addCD($_POST['title']);
}
$aMyCDs = getCDs();

include 'views/newcd.php';
?>

