<?php

function getAllCategories() {
    $sql = "SELECT * FROM tbl_category";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $i = 0;
    $result = null;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Category();
		$item->id = $seletedItem['id'];
		$item->name = $seletedItem['name'];
		$item->description = $seletedItem['description'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function getCategoryById ($id) {
    $sql = "SELECT * FROM tbl_category Where id = '".$id."'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . $id . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);
    $item = new Category();
    $item->id = $seletedItem['id'];
	$item->name = $seletedItem['name'];
	$item->description = $seletedItem['description'];
    return $item;
}

function insertCategory ($name, $description){
    $sql = "INSERT INTO tbl_category VALUES (default, '$name', '$description')";
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
    $sql = " UPDATE tbl_category SET name = '$name', description = '$description' WHERE id = '$id'  ";
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
    $sql = "DELETE FROM tbl_category WHERE id = '".$id."' ";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        return -1;
    } else {
        return 1;
    }
}
?>