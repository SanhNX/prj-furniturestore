<?php
// include all BLL use to handlen request
include '../DAO/connection.php';
include '../DTO/object.php';
include '../BLL/categoryBLL.php';
include '../BLL/subCategoryBLL.php';
include '../BLL/productBLL.php';
// Handle for each request should add in two line comment

// ---------------- REQUEST WITH FLAG : loadHorizontalTabs --------------------
$flag = $_POST['flag'];

if($flag == 'loadLeftMenu'){
    $categorys = getAllCategories();
    $menuList = array();
    for ($i=0; $i < count($categorys); $i++) { 
    	$item = $categorys[$i];
    	$subCate = getAllSubCategoriesByCateId($item->id);
    	$subCate[] = $item->name; 
    	$menuList[] = $subCate;
    }
    // $json = array('status' => 'success', 'subcateId' => $subcateId);
	// return value which function call ajax receive response
    echo json_encode($menuList);
} else if($flag == 'getLatestProduct') {
	$latestProducts = getLatestProduct();
	echo json_encode($latestProducts);
} else if($flag == 'getPremiumProduct') {
	$premiumProducts = getPremiumProducts();
	echo json_encode($premiumProducts);
} else if($flag == 'getProductsBySubCateId'){
    $products = getAllProductBySubCateId($_POST['subCateId']);
    // return value which function call ajax receive response
    echo json_encode($products);
}
// ---------------- END REQUEST WITH FLAG : loadHorizontalTabs ----------------

?>