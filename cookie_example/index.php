
<?php	

if( !isset($_SERVER['HTTPS']))
{
	$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	//echo $url;
	//print_r($_SERVER);
	header("Location: " . $url);
	exit(); //
}

// setup and connect to database
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

include 'model/helper.php';

// controller logic
if(array_key_exists('action', $_POST))
{
	if($_POST['action'] == 'signup')
	{
		include 'views/signup.php';
		exit();
	}
	else if($_POST['action'] == 'save')
	{
		addUser($_POST);
		addCookie($_POST['username']);
	}
	else if($_POST['action'] == 'signin')
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
}
	
if(array_key_exists('username', $_COOKIE))
{
	include 'views/hello.php';
}

include 'views/form.php';

?>

