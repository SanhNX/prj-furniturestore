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

if($flag == 'loadHorizontalMenu'){
    $categorys = getAllCategory();
	// return value which function call ajax receive response
    echo json_encode($categorys);
}

// ---------------- END REQUEST WITH FLAG : loadHorizontalTabs ----------------

?>