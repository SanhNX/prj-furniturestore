<?php

function getAllSubCategories() {
    $sql = "SELECT * FROM tbl_sub_category";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $i = 0;
    $result = null;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new SubCategory();
        $item->id = $seletedItem['id'];
		$item->cateId = $seletedItem['cateid'];
		$item->name = $seletedItem['name'];
		$item->description = $seletedItem['description'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function getAllSubCategoriesByCateId ($id) {
    $sql = "SELECT * FROM tbl_sub_category Where cateid = '".$id."'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $i = 0;
    $result = null;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new SubCategory();
        $item->id = $seletedItem['id'];
        $item->cateId = $seletedItem['cateid'];
        $item->name = $seletedItem['name'];
        $item->description = $seletedItem['description'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function getSubCategoryById ($id) {
    $sql = "SELECT * FROM tbl_sub_category Where id = '".$id."'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . $id . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);
    $item = new SubCategory();
    $item->id = $seletedItem['id'];
    $item->cateId = $seletedItem['cateid'];
    $item->name = $seletedItem['name'];
    $item->description = $seletedItem['description'];
    return $item;
}

function insertSubCategory ($cateId, $name, $description){
    $sql = "INSERT INTO tbl_sub_category VALUES (default, '$cateId',  '$name', '$description')";
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

function updateSubCategoryById ($id, $cateId, $name, $description){
    $sql = " UPDATE tbl_sub_category SET cateid = '$cateId', name = '$name', description = '$description' WHERE id = '$id'  ";
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

function deleteSubCategoryById($id) {
    $sql = "DELETE FROM tbl_sub_category WHERE id = '".$id."' ";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        return -1;
    } else {
        return 1;
    }
}
?>