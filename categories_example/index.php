<?php

//require 'model/categories.php';
//require 'model/products.php';
require 'model/colors.php';

//$categories = get_categories(); 

//$products = get_products();

$colors = get_colors();

include 'views/list.php';

?>