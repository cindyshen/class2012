<html>
<body>
<h1>Display a categories...</h1>
<h2>Categories</h2>
<ul>
<?php foreach( $categories as $category ){ ?>
	<li>
	<?php echo $category['categoryName']; ?>
	</li>	
<?php } ?>
</ul>

<h2>Products</h2>
<ul>
<?php foreach( $products as $product ){ ?>
	<li>	
	<?php echo $product['productName']; ?>
	</li>
<?php } ?>
</ul>


</body>
</html>

