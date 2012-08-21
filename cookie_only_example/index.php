<?php	

// add for https site
if( !isset($_SERVER['HTTPS']))
{
	$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	//echo $url;
	//print_r($_SERVER);
	header("Location: " . $url);
	exit(); //
}

if(array_key_exists('username',$_POST))
{
	setcookie('username',$_POST['username']);
	$_COOKIE['username'] = $_POST['username'];
}	
	
if(array_key_exists('username', $_COOKIE))
{
	include 'views/hello.php';
}

include 'views/form.php';


?>