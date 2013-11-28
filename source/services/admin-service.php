<?php
// include all BLL use to handlen request
include '../DAO/connection.php';
include '../DTO/object.php';
include '../BLL/categoryBll.php';
include '../BLL/subCategoryBll.php';
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
else if($flag == 'getAllSubCategoriesByCateId'){
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

// ---------------- END REQUEST WITH FLAG : loadHorizontalTabs ----------------

?>