<?php

function adminExist($email, $oldPass) {
    $sql = "SELECT * FROM  tbl_admin WHERE email = '" . $email . "' AND password = '" . $oldPass . "'";
    $queryResult = mysql_query($sql);
    if (!$queryResult) {
        echo 'Could not run query: ' . $email . mysql_error();
        exit;
    }
    // Mysql_num_row is counting table row
    $seletedItem = mysql_fetch_array($queryResult);
    return $seletedItem['id'];
}


function updatePassAdminById ($id, $newpass){
    $sql = " UPDATE tbl_admin SET password = '$newpass' WHERE id = '$id'";
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