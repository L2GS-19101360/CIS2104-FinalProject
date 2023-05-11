<?php
    include("Data.php");

    $userID = $_POST['userid'];
    $prodID = $_POST['prodid'];
    $prodDesc = $_POST['prod_desc'];
    $prodQuan = $_POST['quantity'];

    $obj = new data;
    $obj->setconnection();
    $obj->requestOrder($userID, $prodID, $prodDesc, $prodQuan);

?>