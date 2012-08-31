<?php
require_once('util/main.php');
require_once('model/database.php');
require_once('model/category_db.php');
require_once('model/item_db.php');

// Get all categories for sidebar
$categories = get_categories();

// Get an array of featured items from the database
//$items = get_items();

// dispaly the home view
include 'home_view.php';
?>	
