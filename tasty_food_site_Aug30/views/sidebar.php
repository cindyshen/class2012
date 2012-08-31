<div id="sidebar">
	<h2>Main Menu</h2> 
    <ul>           
        <!-- display links for all categories -->
        <?php foreach ($categories as $category) : ?>
        <li>
           	<a href="<?php echo $app_path . 'catalog?action=list_items' .
                '&amp;category_id=' . $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </a>           	
        </li>
        <?php endforeach; ?>
        <li>&nbsp;</li>
    </ul>
</div>
