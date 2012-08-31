<?php include '../views/header.php'; ?>
<?php include '../views/sidebar.php'; ?>

<div id="content">
    <!-- display item -->
        
	<div class= "space"></div>	
	<div class= "food">
   		<h4><?php echo $item['itemName']; ?></h4>			
		<p class="image">
			<img src="../images/thumb/<?php echo $item['thumbImage']; ?>" 
	        width="180" height="135" alt="<?php echo $item['itemName']; ?>"/>            
		</p>
		<div class="details">						
            <p>Price: $<?php echo number_format($item['itemPrice'], 2); ?> </p>	
            <p><?php echo $item['itemDescription']; ?></p>	                				
		</div>
	</div>	  
    <form action="#" method="post">
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>" />
        <div>
	        <label for="quantity">Quantity:</label>
	        <input type="text" id="quantity" name="quantity" value="1" size="2" />	        
	        <input type="submit" id="add to cart" name="add to cart" value="Add to Cart" />
        </div> 
    </form>
    
</div>

<?php include '../views/footer.php'; ?>