<?php	

if(array_key_exists('username', $_POST))
{
	setcookie('username',$_POST['username']);
	$_COOKIE['username'] = $_POST['username'];	
}	
	
if(array_key_exists('username', $_COOKIE))
{
	include 'views/hello.php';
}
else
{
	include 'views/form.php';
}

?>