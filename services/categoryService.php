<?php
include '../DAO/connection.php';
include '../DTO/object.php';
include '../BLL/categoryBll.php';

/*------------------------*/
$flag = $_POST['flag'];
if($flag == 'getAllCategories'){
    $categories = getAllCategories();
    echo json_encode($categories);
}else if($flag == 'addCategory'){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = insertCategory($name, $description);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
} else if($flag == 'editCategory'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = updateCategoryById($id, $name, $description);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
} else if($flag == 'deleteCategory'){
    $id = $_POST['id'];
    $status = updateIsDeletedCategoryById($id, 1);
    if($status == -1){
        echo 'fail';
    } else {
        echo 'success';
    }
}

?>