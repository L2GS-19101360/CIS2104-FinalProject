<?php
include("Database.php");

class data extends db {

    private $prod_img;
    private $prod_name;
    private $prod_des;
    private $prod_price;
    private $prod_quantity;


    /*********************************************************************
     *                             Add Function                          *
    **********************************************************************/
    function addProduct($prod_img, $prod_name, $prod_des, $prod_price, $prod_quantity){
        $this->prod_img = $prod_img;
        $this->prod_name = $prod_name;
        $this->prod_des = $prod_des;
        $this->prod_price = $prod_price;
        $this->prod_quantity = $prod_quantity;

        $q = "INSERT INTO product (ID, PROD_IMG, PROD_NAME, PROD_DESC, PROD_PRICE, PROD_QUANTITY) 
               VALUES ('','$prod_img', '$prod_name', '$prod_des', '$prod_price', '$prod_quantity')";

        if($this->connection->exec($q)) {
            header("Location: admin_add_products.php?msg=done"); 
        } else {
            header("Location: admin_add_products.php?msg=fail"); 
        }
    }

    function updateProfile($userID, $userImg, $userFname, $userLname, $userEmail, $userContact, $userAddress, $userConPass){
        
        $q = "UPDATE customers SET USER_IMG='$userImg',USER_FIRST_NAME ='$userFname',USER_LAST_NAME='$userLname', USER_CONTACT_NUMBER='$userContact',USER_EMAIL ='$userEmail', USER_PASSWORD ='$userConPass', USER_ADDRESS ='$userAddress' WHERE ID = $userID";

        if($this->connection->exec($q)) {
            header("Location: UserSetting.php?userid=$userID&msg=PROFILE UPDATED"); 
        } else {
            header("Location: UserSetting.php?userid=$userID&Smsg=ERROR UPDATE"); 
        }
    }

    /*********************************************************************
     *                       Get Product Function                        *
    **********************************************************************/
    function getProduct(){
        $q = "SELECT * FROM product ";
        $data = $this->connection->query($q);
        return $data;
    }

    function getSpecificProd($prodID){
        $q = "SELECT * FROM product where ID='$prodID'";
        $prodRecord = $this->connection->query($q);
        return $prodRecord;
    }

    function getUserFile($userID){
        $q = "SELECT * FROM customers";
        $userData = $this->connection->query($q);
        return $userData;
    }

    function getSearchProd($userSearch){
        $q = "SELECT * FROM `product` WHERE `PROD_NAME` LIKE '%$userSearch%'";

        $USearch = $this->connection->query($q);

        return $USearch;
    }

    /*********************************************************************
     *                       Get Record Function                        *
    **********************************************************************/
    function getCusRecord($userID){
        $q = "SELECT * FROM orderslip where CUSTOMER_ID_FK='$userID' ";

        $userRecord = $this->connection->query($q);

        foreach($userRecord->fetchAll() as $row){
            $prodID = $row['PRODUCT_ID_FK'];
        }

        if($prodID != "0"){
            $userOrder = "SELECT purchase_records.ID, product.PROD_IMG, product.PROD_NAME, request_order.REQUEST_DESCRIPTION, orderslip.ORDER_TYPE, orderslip.ORDER_PRICE, orderslip.ORDER_QUANTITY, orderslip.ORDER_PRICE * orderslip.ORDER_QUANTITY AS TOTAL_PRICE, orderslip.ORDER_STATUS,purchase_records.PURCHASE_DATE 
            FROM purchase_records
            JOIN orderslip ON orderslip.ID = purchase_records.ORDER_ID_FK
            JOIN request_order ON request_order.ID = orderslip.REQUEST_ID_FK
            JOIN product ON product.ID = request_order.PRODUCT_ID_FK
            WHERE purchase_records.CUSTOMER_ID_FK ='$userID'";

            $orderRecord = $this->connection->query($userOrder);

            return $orderRecord;
        } 
    }

    function getReaRecord($userID){
        $q = "SELECT * FROM orderslip where CUSTOMER_ID_FK='$userID' ";

        $userRecord = $this->connection->query($q);

        foreach($userRecord->fetchAll() as $row){
            $prodID = $row['PRODUCT_ID_FK'];
        }

        if($prodID != "0"){
            $userOrder = "SELECT purchase_records.ID, product.PROD_IMG, product.PROD_NAME, product.PROD_DESC, orderslip.ORDER_TYPE,product.PROD_PRICE, orderslip.ORDER_QUANTITY, product.PROD_PRICE * orderslip.ORDER_QUANTITY AS TOTAL_PRICE, orderslip.ORDER_STATUS,purchase_records.PURCHASE_DATE 
            FROM purchase_records
            JOIN orderslip ON orderslip.ID = purchase_records.ORDER_ID_FK
            JOIN product ON product.ID = orderslip.PRODUCT_ID_FK
            WHERE purchase_records.CUSTOMER_ID_FK ='$userID'";

            $orderRecords = $this->connection->query($userOrder);

            return $orderRecords;
        } 
    }

    

    /*********************************************************************
     *                           Order Function                          *
     *********************************************************************/
    function addChart($user_ID, $prod_ID, $prod_qunatity){

        $prod_type = "READY-MADE";

        $q = "INSERT INTO cosumer_chart (ID, CUSTOMER_ID_FK, PRODUCT_ID_FK, REQUEST_ID_FK, C_TYPE, C_QUANTITY) 
                VALUES ('','$user_ID', '$prod_ID', '', '$prod_type', '$prod_qunatity')";

        if($this->connection->exec($q)) {
            header("Location:Product.php?userid=$user_ID&prodid=$prod_ID&msg=PRODUCT ADDED TO CHART");
        } else {
            header("Location:Product.php?userid=$user_ID&prodid=$prod_ID&msg=PRODUCT ERROR TO ADD CHART");
        }
    }

    function order($user_ID, $prod_ID, $prod_qunatity, $prod_price){
        $order_type = "READY-MADE";
        $order_status = "PENDING";

        $q = "INSERT INTO orderslip (ID, CUSTOMER_ID_FK, PRODUCT_ID_FK, REQUEST_ID_FK, ORDER_PRICE, ORDER_TYPE, ORDER_QUANTITY, ORDER_STATUS) 
                VALUES ('','$user_ID', '$prod_ID', '', '$prod_price', '$order_type', '$prod_qunatity', '$order_status')";

        if($this->connection->exec($q)){
            header("Location:Product.php?userid=$user_ID&prodid=$prod_ID&msg=ORDERED SUCCESSFULLY!!");
        } else {
            header("Location:Product.php?userid=$user_ID&prodid=$prod_ID&msg=ORDER ERROR!!");
        }
    }

    function requestOrder($user_Id, $prod_Id, $prod_Desc, $prod_qunatity){
        $prod_status = "PENDING";

        $q = "INSERT INTO request_order (ID, CUSTOMER_ID_FK, PRODUCT_ID_FK, REQUEST_DESCRIPTION, REQUEST_QUANTITY, REQUEST_STATUS) VALUES ('','$user_Id','$prod_Id','$prod_Desc', '$prod_qunatity', '$prod_status')";

        if($this->connection->exec($q)) {
            header("Location:Product.php?userid=$user_Id&prodid=$prod_Id&msg=REQUEST CUSTOM ORDER SUCCESSFULLY!!");
        }
    }

    /*********************************************************************
     *                       User Login/Signup Function                  *
     *********************************************************************/
    function userLogin($user_email, $user_password){
        $q = "SELECT * FROM customers where USER_EMAIL='$user_email' and USER_PASSWORD='$user_password'";
        $userRecord = $this->connection->query($q);
        $result = $userRecord->rowCount();

        if($result > 0){
            foreach($userRecord->fetchALL() as $row){
                $loginID = $row['ID'];
                $userType = $row["USER_TYPE"];
                $userStatus = $row["USER_STATUS"];

                if($userType == "ADMIN"){
                    header("Location: admin-manage-products.php?userid=$loginID");
                } else {
                    if($userStatus != "ACTIVE"){
                        header("Location: Login.php?msg=ACCOUNT INACTIVE");
                    } else {
                        header("Location: Home.php?userlogid=$loginID");
                    }
                    
                }
                
            }
        } else {
            header("Location: Login.php?msg=INVALID CREDENTIALS");
        }
    }

    function userSignup($fname, $lname, $contact, $email, $pass, $address){
        $userType = "CUSTOMER";
        $userStatus = "ACTIVE";

        $q = "INSERT INTO customers (ID, USER_IMG, USER_TYPE, USER_FIRST_NAME, USER_LAST_NAME, USER_CONTACT_NUMBER, USER_EMAIL, USER_PASSWORD, USER_ADDRESS, USER_STATUS) 
                VALUES ('','', '$userType','$fname', '$lname', '$contact', '$email', '$pass', '$address', '$userStatus')";

        if($this->connection->exec($q)) {
            header("Location:Login.php?msg=ACCOUNT CREATED SUCCESSFULLY!!");
        } else {
            header("Location:Login.php?msg=ERROR CREATING ACCOUNT!!");
        }
    }

}

?>