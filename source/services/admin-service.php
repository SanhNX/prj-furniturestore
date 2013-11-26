<?php
// include all BLL use to handlen request
include '../DAO/connection.php';
include '../DTO/object.php';
include '../BLL/categoryBll.php';
include '../BLL/foodBll.php';
include '../BLL/mealTableBll.php';
include '../BLL/orderDetailBll.php';
include '../BLL/ordersBll.php';
include '../BLL/roleBll.php';
include '../BLL/staffBll.php';
include '../BLL/tempOrderDetailBll.php';
// Handle for each request should add in two line comment

// ---------------- REQUEST WITH FLAG : loadHorizontalTabs --------------------
$flag = $_POST['flag'];

if($flag == 'getAllCategories'){
    $categories = getAllCategories();
    // return value which function call ajax receive response
    echo json_encode($categories);
} else if($flag == 'getAllFoods'){
    $foods = getAllFoods();
    echo json_encode($foods);
} else if($flag == 'getAllStaffs'){
    $staffs = getAllStaffs();
    echo json_encode($staffs);
} else if($flag == 'getAllRoles'){
    $roles = getAllRoles();
    echo json_encode($roles);
} else if($flag == 'addCategorie'){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = insertCategory($name, $description);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
} else if($flag == 'editCategorie'){
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

// ---------------- END REQUEST WITH FLAG : loadHorizontalTabs ----------------

?>