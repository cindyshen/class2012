<?php

// Make sure we are on https
if(!isset($_SERVER['HTTPS'])){
	// then we are not on https
	$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	//echo $url . "\n";
	//print_r($_SERVER);
	header("Location: " . $url);
	exit();
}

//setup database
require '../ActiveRecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
	$cfg->set_model_directory('model');
	$cfg->set_connections(
			array(
					'development' => 'mysql://root:@localhost/users',
					'test' => 'mysql://username:password@localhost/test_database_name',
					'production' => 'mysql://username:password@localhost/production_database_name'
			)
	);
});

require 'model/helpers.php';
//controller logic
$action = array_key_exists('action', $_POST)?$_POST['action']:'';

if($action == 'signup')
{
	include 'views/signup.php';
	exit();
}
else if($action == 'save')
{
	$sError = addUser($_POST);
	
	if ($sError == "Success")
	{
		addCookie($_POST['username']);
	}
	else 
	{	
		echo $sError ;
		include 'views/signup.php';
		exit(); // include 'views/form.php' will not run  
	}
}
else if($action == 'signin')
{
	if(validateUser($_POST))
	{
		addCookie($_POST['username']);		
	}
	else
	{
		echo 'invalid user';
	}
}

if(array_key_exists('username', $_COOKIE)){
	include 'views/hello.php';
}
include 'views/form.php';



?>
