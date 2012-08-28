<?php
    // Parse data
    $category_id = $item['categoryID'];
    $item_code = $item['itemCode'];
    $item_name = $item['itemName'];
    $item_description = $item['itemDescription'];
    $item_price = $item['itemPrice'];
    $item_image = $item['thumbImage']

?>

<h1><?php echo $item_name; ?></h1>
<div id="left_column">
    <p><img src="../images/thumb/<?php echo $item['thumbImage']; ?>"
            alt="<?php echo $item_image; ?>" /></p>
</div>

<div id="right_column">
    <p>
    <b>Price:</b>
        <?php echo '$' . $item_price; ?>
    </p>
    <h2>Description</h2>
    <?php echo $item_description; ?>    
    <form action="<?php echo $app_path . 'cart' ?>" method="post">
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="item_id"
               value="<?php echo $item_id; ?>" />
        <b>Quantity:</b>
        <input type="text" name="quantity" value="1" size="2" />
        <input type="submit" value="Add to Cart" />
    </form>
</div>