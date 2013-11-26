<?php

function login ($uname, $pword) {
    $sql = "SELECT * FROM staff Where password = '".$pword."' AND username = '".$uname."' AND status = 1";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);
    $item = new staff();
    $item->id = $seletedItem['id'];
    $item->roleId = $seletedItem['roleId'];
    $item->fullName = $seletedItem['fullName'];
    $item->phoneNumber = $seletedItem['phoneNumber'];
    $item->address = $seletedItem['address'];
    $item->dob = $seletedItem['dob'];
    $item->startDate = $seletedItem['startDate'];
    $item->endDate = $seletedItem['endDate'];
    $item->salary = $seletedItem['salary'];
    $item->isDeleted = $seletedItem['isDeleted'];
    return $item;
}


function staffExist($uname) {
    $sql = "SELECT * FROM staff Where username = '".$uname."'";
    $queryResult = mysql_query($sql);
    
    if (!$queryResult) {
        echo 'Error: ' . mysql_error();
        return -1;
    }
    
    if (mysql_num_rows($queryResult) > 0)
        return  1;
    else
        return -1;
}

function insertStaff ($fullName, $cmnd, $username,  $roleId, $phoneNumber, $address, $dob, $salary){
    $sql = "INSERT INTO staff VALUES (default, '$fullName', '$cmnd', '$username', '123456', '$roleId', '$phoneNumber', '$address', '$dob', null, null, null, $salary,0)";
    $queryResult = mysql_query($sql) or die(mysql_error());
    
    if (!$queryResult) {
        echo 'Error: ' .  mysql_error();
        return -1;
    }
    
    if ($queryResult)
        return mysql_insert_id();
    else
        return -1;
}
function updateStaffById ($id, $fullName, $cmnd, $username,  $roleId, $phoneNumber, $address, $dob, $salary){
    $sql = " UPDATE staff SET fullName = '$fullName', cmnd = '$cmnd',
                            username = '$username', roleId = '$roleId',
                            phoneNumber = '$phoneNumber', address = '$address',
                            dob = '$dob', salary = $salary WHERE id = $id";
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

function getInforStaffById ($id) {
    $sql = "SELECT * FROM staff Where id = '".$id."'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . $id . mysql_error();
        exit;
    }
    $seletedItem = mysql_fetch_array($queryResult);
    $item = new staff();
    $item->id = $seletedItem['id'];
    $item->roleId = $seletedItem['roleId'];
    $item->fullName = $seletedItem['fullName'];
    $item->phoneNumber = $seletedItem['phoneNumber'];
    $item->address = $seletedItem['address'];
    $item->dob = $seletedItem['dob'];
    $item->startDate = $seletedItem['startDate'];
    $item->endDate = $seletedItem['endDate'];
    $item->salary = $seletedItem['salary'];
    $item->isDeleted = $seletedItem['isDeleted'];
    return $item;
}

function getAllStaffs () {
    $sql = "select s.*, r.`name` as roleName from staff s INNER JOIN role r ON s.roleId = r.id WHERE s.isDeleted = 0";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }
    $i = 0;
    $result = null;
    while ($seletedItem = mysql_fetch_array($queryResult)) {
        $item = new staff();
		$item->id = $seletedItem['id'];
        $item->fullName = $seletedItem['fullName'];
        $item->cmnd = $seletedItem['cmnd'];
        $item->username = $seletedItem['username'];
        $item->password = $seletedItem['password'];
		$item->roleId = $seletedItem['roleId'];
        $item->roleName = $seletedItem['roleName'];
		$item->phoneNumber = $seletedItem['phoneNumber'];
		$item->address = $seletedItem['address'];
		$item->dob = date("d/m/Y", strtotime($seletedItem['dob']));
        $item->shift = $seletedItem['shift'];
		$item->startDate = $seletedItem['startDate'];
		$item->endDate = $seletedItem['endDate'];
		$item->salary = $seletedItem['salary'];
		$item->isDeleted = $seletedItem['isDeleted'];
        $result[$i] = $item;
        $i++;
    }
    return $result;
}

function deleteStaffById($id) {
    $sql = "DELETE FROM staff WHERE id = '".$id."' ";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        return -1;
    } else {
        return 1;
    }
}

function updateIsDeletedStaffById ($id, $value){
    $sql = " UPDATE staff SET isDeleted = $value WHERE id = $id";              
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