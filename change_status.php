<?php

session_start();
$serverName = "localhost:3307";
$username = "root";
$password = "";
$dbName = "cis2104_finalproject_db";

$est_conn = mysqli_connect($serverName, $username, $password, $dbName);

if (isset($_POST['id'])){
    $id = $_POST['id'];

    $query = "SELECT USER_STATUS FROM customers WHERE ID = '$id'";
    $result = mysqli_query($est_conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['USER_STATUS'];

        if ($status == "ACTIVE"){
            $Inactive = "UPDATE customers SET USER_STATUS = 'INACTIVE' WHERE ID = '$id'";
            mysqli_query($est_conn, $Inactive);
        }
        else if ($status == "INACTIVE"){
            $Active = "UPDATE customers SET USER_STATUS = 'ACTIVE' WHERE ID = '$id'";
            mysqli_query($est_conn, $Active);
        }
    }
}

?>
