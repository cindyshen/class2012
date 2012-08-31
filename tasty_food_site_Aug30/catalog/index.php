<?php
require_once('../util/main.php');
require_once('../model/database.php');
require_once('../model/item_db.php');
require_once('../model/category_db.php');

/*
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}
*/

//_POST
$action = array_key_exists('action', $_POST)?$_POST['action']: '';
//_GET
$action = array_key_exists('action', $_GET)?$_GET['action']: $action;

switch ($action) {
    case 'list_items':
        // get items in current category
        $category_id = $_GET['category_id'];
        if (empty($category_id)) {
            $category_id = 1;
        }
		
        // get categories and items
        $current_category = get_category($category_id);
        // get categories for siderbar 
        $categories = get_categories();
        // get and items 
        $items = get_items_by_category($category_id);

        // Display view
        include('item_list.php');
        break;
    case 'view_item':
    	
    	// get categories for siderbar
        $categories = get_categories();

        // Get item data
        $item_id = $_GET['item_id'];
        $item = get_item($item_id);

        // Display item
        include('item_view.php');
        break;
}
?>