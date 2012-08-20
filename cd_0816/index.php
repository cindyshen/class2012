<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- 
	Website:
	Developer: Cindy Shen
	Language Used: XHTML 1.0
	Date Created:  2012-08-16
	Last Revised: 

	Website Description: Display and add CDs information 

	External files:
	
 -->
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
	
	<meta name="description" content=""/>
		
	<meta name="keywords" content="" />

	<!-- CSS link -->
	<link rel="stylesheet" type="text/css" href="./css/main.css" />

	<title></title>
	
</head>
<body>
	<div id ="page_wrap">
		<div id="container">
		
        <div id="header">
            <h1>My CD Shop</h1>
        </div>

		<div id="main">
			<!--  display a table of cds -->
			<?php
				include('display_cds.php');
			?>
			<!--  add cds form -->
			<?php
				include('add_cd_form.php');
			?>
		</div><!-- main -->
			
		<div id="footer">
		    <p class="copyright">
               &copy; <?php echo date("Y"); ?> My CD Shop, Inc.
            </p>
		</div><!-- footer -->
			
		</div><!-- container -->
	</div><!-- page_wrap -->

</body><!-- body -->
</html><!-- html -->

