<?php

function adminExist($email, $oldPass) {
    $sql = "SELECT * FROM tbl_admin Where email = '".$email."' and password = '".$oldPass."'";
    $queryResult = mysql_query($sql);
    
    if (!$queryResult) {
        echo 'Error: ' . mysql_error();
        return -1;
    }
    
    if (mysql_num_rows($queryResult) > 0){
        $seletedItem = mysql_fetch_array($queryResult);
        return  $seletedItem['id'];
    } else {
        return -1;
    }
}


function updatePassAdminById ($id, $newpass){
    $sql = " UPDATE tbl_admin SET password = '$newpass' WHERE id = $id";
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