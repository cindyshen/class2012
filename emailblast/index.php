<?php 

//_POST
$action = array_key_exists('action', $_POST)?$_POST['action']: '';
//_GET
$action = array_key_exists('action', $_GET)?$_GET['action']: $action;

// connect to database
require '../ActiveRecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
	$cfg->set_model_directory('model');
	$cfg->set_connections(
			array(
					'development' => 'mysql://root:@localhost/emails',
					'test' => 'mysql://username:password@localhost/test_database_name',
					'production' => 'mysql://username:password@localhost/production_database_name'
			)
	);
});

if($action == "Subscribe")
{
	//print_r ($_POST);
	$oEmail = new Email;
	$oEmail->email = $_POST['email'];
	$oEmail->save();
}
else if ($action == "Delete")
{
	$oEmail = Email::find_by_email($_GET['email']);

	if ($oEmail && $oEmail->delete())
	{
		echo "The email has been deleted";
	}
	else 
	{
		echo "The email is unable to delete";
	}
}
// http://localhost/class2012/emailblast/?action=Unsubscribe&email=cindyshen99@hotmail.com

else if ($action == "Unsubscribe")
{
	$oEmail = Email::find_by_email($_GET['email']);
	print_r ($_GET);
	if ($oEmail && $oEmail->delete())
	{
	echo "You have been unsubscribed";	
	}
	else
	{
		echo "Unsubscribe failed";
	}	 
	exit();
		
}
else if ($action == "Send")
{
	include 'model/helper.php';
	sendEmails();

}

if($action == "" || $action =="Send")
{
	include 'views/email_form.php';	
}
else 
{
	include 'views/edit.php';
}

?>