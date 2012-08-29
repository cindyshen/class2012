<?php

function get_items_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM items
              WHERE categoryID = :category_id
              ORDER BY itemID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}


function get_items() {
    global $db;
    $query = 'SELECT * FROM items ORDER BY itemID';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}


function get_item($item_id) {
    global $db;
    $query = 'SELECT *
              FROM items
              WHERE itemID = :item_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':item_id', $item_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_special_item($category_id, $item_id) {
	global $db;
	$query = 'SELECT *
	FROM items
	WHERE itemID = :item_id 
	AND categoryID = :category_id';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':item_id', $item_id);
		$statement->bindValue(':category_id', $category_id);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		display_db_error($error_message);
	}
}
?>
