<?php
	$dsn = 'mysql:host=localhost;dbname=tasty_food';
	$username = 'root';
	$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'errors/db_error_connect.php';
    exit;
}

?>

