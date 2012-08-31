<?php include 'views/header.php'; ?>
<?php include 'views/sidebar.php'; ?>
<?php require_once('model/item_db.php');?>
<?php require_once('model/category_db.php');?>

<?php
    $category_id = rand(1,1);
    $item_id= date("N");
    $item = get_special_item($category_id,$item_id);
    $item_special_price = $item['itemPrice']* 0.9;
?>
    
<div id="content">
 <!-- 
    <h2>Welcome</h2>
    <p>Fried Rice is located in the heart of Waterloo, Ontario.	An ultimate place for authentic Chinese food.</p>
 -->

    <!-- display special item -->    
    <h2><?php echo date("l"); ?>'s specials</h2>
    
    <div class= "food">
	    <p class="image">
	    <img src="images/thumb/<?php echo $item['thumbImage']; ?>" width="180" height="135" alt="<?php echo $item['itemName']; ?>">
	    </p>
	    <div class="details">
	    <h4><?php echo $item['itemName']; ?></h4>
	    	                <p>Price: $<?php echo number_format($item['itemPrice'], 2); ?> </p>
	    	                <p> <span style="color:red"> Special Price: $</span><?php echo number_format($item_special_price, 2); ?></p>
	    	                <p><?php echo $item['itemDescription']; ?></p>					
	    </div>
    </div>
    
    <?php
    /*
     foreach ($items as $item) : ?>
      
        <div class= "food">			
				<p class="image">
					<img src="images/thumb/<?php echo $item['thumbImage']; ?>" width="180" height="135" alt="&nbsp;">
				</p>
				<div class="details">	
					<h4><?php echo $item['itemName']; ?></h4>			
	                <p>Price: <?php echo number_format($item['itemPrice'], 2); ?> </p>
	                <p><?php echo $item['itemDescription']; ?></p>					
				</div>
		</div>	
				
    <?php endforeach; 
    */
    ?>   

 
</div>

<?php include 'views/footer.php'; ?>
