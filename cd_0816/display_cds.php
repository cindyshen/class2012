<?php
require_once ('database.php');

// Get cd name, we fixed the code here
if(array_key_exists('name', $_GET))
{
	$name = $_GET['name'];
}
else
{
	$cdID=1;
}

// Get all cds
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
            <!-- display a list of categories -->
            <h2>We have these CDs in the store</h2>
            <ul>
            <?php foreach ($cds as $cd) : ?>
                <li>                	             	
                    <?php echo $cd['name']; ?>
                </li>
            <?php endforeach; ?>
            </ul>
			</div><!-- main -->
			
			<div id="footer">
			</div><!-- footer -->
			
		</div><!-- container -->
	</div><!-- page_wrap -->

</body><!-- body -->
</html><!-- html -->

