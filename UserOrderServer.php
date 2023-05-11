<?php
    include('Data.php');

    $userID = $_POST['userid'];
    $prodID = $_POST['prodid'];

    $prodQuan = $_POST['quantity'];
    $prodPrice = $_POST['prodprice'];

    if (isset($_POST['button'])) {
        $button_value = $_POST['button'];
        if ($button_value == 0) {

            $obj = new data;
            $obj->setconnection();
            $obj->addChart($userID, $prodID, $prodQuan);

        } else if ($button_value == 1) {

            $objs = new data;
            $objs->setconnection();
            $objs->order($userID, $prodID, $prodQuan, $prodPrice);

        }
    }

?>