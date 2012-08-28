<?php include 'views/header.php'; ?>
<?php include 'views/sidebar.php'; ?>

<div id="content">
<!-- 
    <h2>Welcome</h2>
    <p>Fried Rice is located in the heart of Waterloo, Ontario.	An ultimate place for authentic Chinese food.</p>
-->
    <!-- display product -->
    <h2>Today's special</h2>
    <?php foreach ($items as $item) : ?>
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
    <?php endforeach; ?>
 
</div>

<?php include 'views/footer.php'; ?>
