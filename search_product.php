<?php

session_start();
$serverName = "localhost:3307";
$username = "root";
$password = "";
$dbName = "cis2104_finalproject_db";

$est_conn = mysqli_connect($serverName, $username, $password, $dbName);

// if (!$est_conn){
//     echo "No";
// }
// echo "Yes";


?>