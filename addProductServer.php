<?php
    include("Data.php");

    $prod_name = $_POST['prod_name'];
    $prod_des = $_POST['prod_desc'];
    $prod_price = $_POST['prod_price'];
    $prod_quantity = $_POST['prod_quantity'];
    


    if (move_uploaded_file($_FILES["prod_img"]["tmp_name"],"images/product_img/" . $_FILES["prod_img"]["name"])) {
        $prod_img=$_FILES["prod_img"]["name"];
    
        $obj=new data();
        $obj->setconnection();
        $obj->addProduct($prod_img, $prod_name, $prod_des, $prod_price, $prod_quantity);
    } else {
        echo "File not uploaded";
    }
    

?>