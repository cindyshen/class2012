<?php

require_once ('database.php');

$query = 'SELECT * FROM cd ORDER BY cdID';
$cds = $db->query($query);

?>
<html><!-- html -->
<body>
	<div id ="page_wrap">
		<div id="container">
			<div id="header">
			</div><!-- header -->
			
			<div id="main">
				<h2>Add more CDs</h2>
				<form action="add_cd.php" method ="post">
					<label for="name"></label>
					<input type ="text" id="name" name="name">				
					<input type="submit" value="Add CD" />
					<input type="reset" value="Clear" />
				</form>
			</div><!-- main -->
			
			<div id="footer">
			</div><!-- footer -->
			
		</div><!-- container -->
	</div><!-- page_wrap -->

</body><!-- body -->
</html><!-- html -->