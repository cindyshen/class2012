<html>
<body>
<?php 

	require 'model/Dog.php';
	include 'views/form.php';
	$oBingo = new Dog('Collie');
	if(array_key_exists('food', $_POST))
	{
		$oBingo->eat($_POST['food']);		
	}
	include 'views/feelings.php';	
	
?>
</body>
</html>