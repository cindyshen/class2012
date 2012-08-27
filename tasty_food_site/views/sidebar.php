<div id="sidebar">
    <ul>
        <li>
            <a href=".">Home</a>
        </li>
        <h2>Main Menu</h2>
            <!-- display links for all categories -->
        <?php foreach ($categories as $category) : ?>
        <li>
           	<a href="<?php echo 'action=list_items' .
                '&amp;category_id=' . $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </a>           	
        </li>
        <?php endforeach; ?>
        <li>&nbsp;</li>
    </ul>
</div>
