<?php

function getAllCategories() {
    $sql = "SELECT * FROM category WHERE isDeleted=0";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $i = 0;
    $result = null;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new category();
		$item->id = $seletedItem['id'];
		$item->name = $seletedItem['name'];
		$item->description = $seletedItem['description'];
		$item->isDeleted = $seletedItem['isDeleted'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function getCategoryById ($id) {
    $sql = "SELECT * FROM category Where id = '".$id."'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . $id . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);
    $item = new category();
    $item->id = $seletedItem['id'];
	$item->name = $seletedItem['name'];
	$item->description = $seletedItem['description'];
	$item->isDeleted = $seletedItem['isDeleted'];
    return $item;
}

function insertCategory ($name, $description){
    $sql = "INSERT INTO category VALUES (default, '$name', '$description',0)";
    $queryResult = mysql_query($sql) or die(mysql_error());
    
    if (!$queryResult) {
        echo 'Error: ' . mysql_error();
        return -1;
    }
    
    if ($queryResult)
        return mysql_insert_id();
    else
        return -1;
}

function updateCategoryById ($id, $name, $description){
    $sql = " UPDATE category SET name = '$name', description = '$description' WHERE id = '$id'  ";
    $queryResult = mysql_query($sql) or die(mysql_error());
    
    if (!$queryResult) {
        echo 'Error: ' . $id . mysql_error();
        return -1;
    }
    
    if ($queryResult)
        return 1;
    else
        return -1;
}

function deleteCategoryById($id) {
    $sql = "DELETE FROM category WHERE id = '".$id."' ";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        return -1;
    } else {
        return 1;
    }
}

function updateIsDeletedCategoryById ($id, $isDeleted){
    $sql = " UPDATE category SET isDeleted = '$isDeleted' WHERE id = '$id' ";
    $queryResult = mysql_query($sql) or die(mysql_error());
    
    if (!$queryResult) {
        echo 'Error: ' . $id . mysql_error();
        return -1;
    }
    
    if ($queryResult)
        return 1;
    else
        return -1;
}
?>