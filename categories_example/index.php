<?php

require 'model/categories.php';
require 'model/products.php';

$categories = get_categories(); 

$products = get_products();

include 'views/list.php';

?>