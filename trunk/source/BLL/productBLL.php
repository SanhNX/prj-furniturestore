<?php

function getAllProduct() {
    $sql = "SELECT * FROM tbl_product";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $i = 0;
    $result = null;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Product();
        $item->id = $seletedItem['id'];
		$item->subcateId = $seletedItem['subcateid'];
        $item->name = $seletedItem['name'];
        $item->price = $seletedItem['price'];
        $item->promotion_price = $seletedItem['promotion_price'];
        $item->image_1 = $seletedItem['image_1'];
        $item->image_2 = $seletedItem['image_2'];
        $item->image_3 = $seletedItem['image_3'];
        $item->size = $seletedItem['size'];
        $item->material = $seletedItem['material'];
		$item->color = $seletedItem['color'];
        $item->description = $seletedItem['description'];
		$item->created_date = $seletedItem['created_date'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function getLatestProduct() {
    $sql = "SELECT * FROM tbl_product ORDER BY created_date DESC LIMIT 10";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $i = 0;
    $result = null;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Product();
        $item->id = $seletedItem['id'];
        $item->subcateId = $seletedItem['subcateid'];
        $item->name = $seletedItem['name'];
        $item->price = $seletedItem['price'];
        $item->promotion_price = $seletedItem['promotion_price'];
        $item->image_1 = $seletedItem['image_1'];
        $item->image_2 = $seletedItem['image_2'];
        $item->image_3 = $seletedItem['image_3'];
        $item->size = $seletedItem['size'];
        $item->material = $seletedItem['material'];
        $item->color = $seletedItem['color'];
        $item->description = $seletedItem['description'];
        $item->created_date = $seletedItem['created_date'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}
function getPremiumProducts() {
    $sql = "SELECT * FROM tbl_product ORDER BY price DESC LIMIT 10";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $i = 0;
    $result = null;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Product();
        $item->id = $seletedItem['id'];
        $item->subcateId = $seletedItem['subcateid'];
        $item->name = $seletedItem['name'];
        $item->price = $seletedItem['price'];
        $item->promotion_price = $seletedItem['promotion_price'];
        $item->image_1 = $seletedItem['image_1'];
        $item->image_2 = $seletedItem['image_2'];
        $item->image_3 = $seletedItem['image_3'];
        $item->size = $seletedItem['size'];
        $item->material = $seletedItem['material'];
        $item->color = $seletedItem['color'];
        $item->description = $seletedItem['description'];
        $item->created_date = $seletedItem['created_date'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}
function getAllProductBySubCateId ($subcateid) {
    // $sql = "SELECT * FROM tbl_product Where cateid = '".$id."' LIMIT '".($pageNumber*10)."', '".($pageNumber*10*2)."'"; // ORDER BY name ASC
    $sql = "SELECT * FROM tbl_product Where subcateid = '".$subcateid."'"; // ORDER BY name ASC
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $i = 0;
    $result = null;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new Product();
        $item->id = $seletedItem['id'];
        $item->subcateId = $seletedItem['subcateid'];
        $item->name = $seletedItem['name'];
        $item->price = $seletedItem['price'];
        $item->promotion_price = $seletedItem['promotion_price'];
        $item->image_1 = $seletedItem['image_1'];
        $item->image_2 = $seletedItem['image_2'];
        $item->image_3 = $seletedItem['image_3'];
        $item->size = $seletedItem['size'];
        $item->material = $seletedItem['material'];
        $item->color = $seletedItem['color'];
        $item->description = $seletedItem['description'];
        $item->created_date = $seletedItem['created_date'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function getProductById ($id) {
    $sql = "SELECT * FROM tbl_product Where id = '".$id."'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . $id . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);
    $item = new Product();
    $item->id = $seletedItem['id'];
    $item->subcateId = $seletedItem['subcateid'];
    $item->name = $seletedItem['name'];
    $item->price = $seletedItem['price'];
    $item->promotion_price = $seletedItem['promotion_price'];
    $item->image_1 = $seletedItem['image_1'];
    $item->image_2 = $seletedItem['image_2'];
    $item->image_3 = $seletedItem['image_3'];
    $item->size = $seletedItem['size'];
    $item->material = $seletedItem['material'];
    $item->color = $seletedItem['color'];
    $item->description = $seletedItem['description'];
    $item->created_date = $seletedItem['created_date'];
    return $item;
}

function insertProduct ($subcateId, $name, $price, $promotion_price, $image_1, 
    $image_2, $image_3, $size, $material, $color, $description){
    $sql = "INSERT INTO tbl_product VALUES (default, '$subcateId', '$name', '$price', '$promotion_price', '$image_1', 
        '$image_2', '$image_3', '$size', '$material', '$color', '$description', NOW())";
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

function updateProductById ($id, $subcateId, $name, $price, $promotion_price, $image_1, 
    $image_2, $image_3, $size, $material, $color, $description){
    $temp_image_1 = $image_1 ? ", image_1 = '$image_1'" : "" ;
    $temp_image_2 = $image_2 ? ", image_2 = '$image_2'" : "" ;
    $temp_image_3 = $image_3 ? ", image_3 = '$image_3'" : "" ;
    $sql = " UPDATE tbl_product SET subcateid = '$subcateId', name = '$name', price = '$price', promotion_price = '$promotion_price'".$temp_image_1.$temp_image_2.$temp_image_3.", size = '$size', 
    material = '$material', color = '$color', description = '$description' WHERE id = '$id'  ";
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

function deleteProductById($id) {
    $sql = "DELETE FROM tbl_product WHERE id = '".$id."' ";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        return -1;
    } else {
        return 1;
    }
}
?>