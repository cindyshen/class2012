<?php include '../views/header.php'; ?>
<?php include '../views/sidebar.php'; ?>
<div id="content">
    <h2><?php echo $current_category['categoryName']; ?></h2>
    <?php if (count($items) == 0) : ?>
        <p>There are no items in this category.</p>
    <?php else: ?>

        <?php foreach ($items as $item) : ?>
        <div class= "food">			
				<p class="image">
					<a href="?action=view_item&amp;item_id=<?php echo $item['itemID']; ?>">
	                <img src="../images/thumb/<?php echo $item['thumbImage']; ?>" 
	                width="100" height="100" alt="&nbsp;"/>
                </a>
				</p>
				<div class="details">	
					<h4><?php echo $item['itemName']; ?></h4>			
	                <p>Price: <?php echo number_format($item['itemPrice'], 2); ?> </p>	                				
				</div>
		</div>				
    <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php include '../views/footer.php'; ?>