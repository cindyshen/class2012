<?php include 'views/header.php'; ?>
<?php include 'views/sidebar.php'; ?>

<div id="content">
    <p>Vestibulum facilisis lectus quis sapien lacinia vel pretium massa mollis.</br> 
    Quisque id felis a nibh dictum pulvinar. Integer nec aliquam est. </br> 
    Aenean sit amet ligula felis, vel tincidunt ligula. Nullam tempus tempor dolor vel dapibus. </br>
    </p>

    <!-- display product -->
    <h1>Today's special</h1>
    <?php foreach ($items as $item) : ?>
        <tr>
            <td id="product_image_column">
                <img src="images/thumb/<?php echo $item['thumbImage']; ?>"
                     alt="&nbsp;">
            </td>
            <td>
                <p>
                    <?php echo $item['itemName']; ?>
                    </a>
                </p>
                <p>
                    <b>price:</b>
                    $<?php echo number_format($item['itemPrice'], 2); ?>
                </p>
                <p>
                    <?php echo $item['itemDescription']; ?>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
 
</div>

<?php include 'views/footer.php'; ?>
