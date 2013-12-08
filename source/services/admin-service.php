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

if($flag == 'getAllCategories'){
    $categories = getAllCategories();
    // return value which function call ajax receive response
    echo json_encode($categories);
} else if($flag == 'loadItemCategorie') {
    $categorie = getCategoryById($_POST['id']);
    // return value which function call ajax receive response
    echo json_encode($categorie);
}else if($flag == 'addCategorie'){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = insertCategory($name, $description);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
} else if($flag == 'updateCategorie'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = updateCategoryById($id, $name, $description);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
} else if($flag == 'deleteCategorie'){
    $id = $_POST['id'];
    $status = deleteCategoryById($id);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
} 
// ------------------ SUB CATEGORY --------------------------
else if($flag == 'getAllSubCategories'){
    $categories = getAllSubCategories();
    // return value which function call ajax receive response
    echo json_encode($categories);
} else if($flag == 'getAllSubCategoriesByCateId'){
    $categories = getAllSubCategoriesByCateId($_POST['cateId']);
    // return value which function call ajax receive response
    echo json_encode($categories);
} else if($flag == 'loadItemSubCategorie') {
    $categorie = getSubCategoryById($_POST['id']);
    // return value which function call ajax receive response
    echo json_encode($categorie);
}else if($flag == 'addSubCategorie'){
    $name = $_POST['name'];
    $cateId = $_POST['cateId'];
    $description = $_POST['description'];
    $status = insertSubCategory($cateId, $name, $description);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
} else if($flag == 'updateSubCategorie'){
    $id = $_POST['id'];
    $cateId = $_POST['cateId'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = updateSubCategoryById($id, $cateId, $name, $description);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
} else if($flag == 'deleteSubCategorie'){
    $id = $_POST['id'];
    $status = deleteSubCategoryById($id);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
}
// ------------------ PRODUCT --------------------------
else if($flag == 'getAllProductBySubCateId'){
    $products = getAllProductBySubCateId($_POST['subCateId']);
    // return value which function call ajax receive response
    echo json_encode($products);
} else if($flag == 'loadItemProduct') {
    $product = getProductById($_POST['id']);
    // return value which function call ajax receive response
    echo json_encode($product);
} else if($flag == 'deleteProduct'){
    $id = $_POST['id'];
    $status = deleteProductById($id);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
} else if($flag == 'addProduct'){
    $subcateId = $_POST['subcateId'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $promotion_price = $_POST['promotionPrice'];
    $size = $_POST['size'];
    $material = $_POST['material'];
    $color = $_POST['color'];
    $description = $_POST['description'];
    $path = '../images/prod_image/';
    $image_1 = $_FILES["file1"]["name"] ? $path . $_FILES["file1"]["name"] : null;
    $image_2 = $_FILES["file2"]["name"] ? $path . $_FILES["file2"]["name"] : null;
    $image_3 = $_FILES["file3"]["name"] ? $path . $_FILES["file3"]["name"] : null;
    // echo $subcateId.$name.$price.$promotion_price.$size.$material.$color.$description.$image_1.$image_2.$image_3;
    $status = insertProduct($subcateId, $name, $price, $promotion_price, $image_1, 
    $image_2, $image_3, $size, $material, $color, $description);
    if($status == -1){
        echo 'fail';
    } else {
        $dirTemp = str_replace('BLL', '', getcwd()) . "images/prod_image/";
        $dirTemp = str_replace('services', '', getcwd()) . "images/prod_image/";
        for ($i=1; $i <= 3; $i++) { 
            $dir = str_replace("\\", "/", $dirTemp . $_FILES["file" . $i]["name"]);
            move_uploaded_file($_FILES["file" . $i]["tmp_name"], $dir);
        }
        $json = array('status' => 'success', 'subcateId' => $subcateId);
        echo json_encode($json);
    }
    // $dirTemp = str_replace('BLL', '', getcwd()) . "images/prod_image/";
    // $dirTemp = str_replace('services', '', getcwd()) . "images/prod_image/";
    // $dir = str_replace("\\", "/", $dirTemp . $_FILES["file1"]["name"]);
    // echo move_uploaded_file($_FILES["file1"]["tmp_name"], $dir);
    // echo $_FILES["file1"]["tmp_name"]. $dir;
} else if($flag == 'updateProduct'){
    $id = $_POST['id'];
    $subcateId = $_POST['subcateId'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $promotion_price = $_POST['promotion_price'];
    $size = $_POST['size'];
    $material = $_POST['material'];
    $color = $_POST['color'];
    $path = '../images/prod_image/';
    $image_1 = $_POST['image_1'] ? $path . $_POST['image_1'] : null;
    $image_2 = $_POST['image_2'] ? $path . $_POST['image_2'] : null;
    $image_3 = $_POST['image_3'] ? $path . $_POST['image_3'] : null;
    $description = $_POST['description'];
    $status = updateProductById ($id, $subcateId, $name, $price, $promotion_price, $image_1, $image_2, $image_3, $size, $material, $color, $description);
    if($status == -1){
        echo 'fail';
    } else {
        $json = array('status' => 'success', 'subcateId' => $subcateId);
        echo json_encode($json);
    }
}

// ---------------- END REQUEST WITH FLAG : loadHorizontalTabs ----------------

?>