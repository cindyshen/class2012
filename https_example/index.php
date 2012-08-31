<?php
	if( !isset($_SERVER['HTTPS']))
	{
		$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		//echo $url;
		//print_r($_SERVER);
		header("Location: " . $url);// redictor the url to $url
		exit(); // 
	}
	
	
?>
<html>
<body>
	<h1>Hello World</h1>
</body>

</html>