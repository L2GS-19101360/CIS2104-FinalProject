<?php

session_start();
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "cis2104_finalproject_db";

$est_conn = mysqli_connect($serverName, $username, $password, $dbName);

// if (!$est_conn){
//     echo "No";
// }
// echo "Yes";

$sql = "SELECT request_order.ID, customers.USER_FIRST_NAME, customers.USER_EMAIL, customers.USER_CONTACT_NUMBER, product.PROD_NAME, product.PROD_IMG, request_order.REQUEST_DESCRIPTION, request_order.REQUEST_QUANTITY, request_order.REQUEST_STATUS
FROM request_order
JOIN customers ON customers.ID = request_order.CUSTOMER_ID_FK
JOIN product ON product.ID = request_order.PRODUCT_ID_FK";

$result = mysqli_query($est_conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Products</title>
    <link rel="shortcut icon" href="./admin_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS_Files/admin-style.css">
    <style>
        nav ul li{
            width: 300px;
            background-color: rgb(188, 255, 251);
            padding: 10px;
        }
        #findCustomer{
            background-color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 500px;
            /* border-top-left-radius: 10px;
            border-bottom-left-radius: 10px; */
        }
        .table_rows{
            background-color: white;
            width: 120px;
            padding: 3px;
            border: 1px solid gray;
            text-align: center;
        }
        .table_data{
            background-color: white;
            width: 100px;
            padding: 5px;
            border: 1px solid gray;
            text-align: center;
        }
        .inputprice{
            background-color: white;
            border-radius: 10px;
            height: 30px;
            width: 100px;
        }
        .reqBtn{
            background-color: lightgray;
            cursor: pointer;
            height: 30px;
            border-radius: 10px;
            border: none;
        }
        .reqBtn:hover{
            background-color: gray;
        }
    </style>
</head>
<body>
    
    <header>

    <div class="title_bar">
        <img src="images/logo/admin_logo.png" alt="" id="logo" height="100" width="150">
    </div>

    <nav>
        <ul>
                <a href="./admin-manage-products.php"><li>Manage Products</li></a>
                <a href="./admin-manage-customers.php" ><li>Manage Customers</li></a>
                <a href="#"><li id="active_tab">Manage Requests</li></a>
                <a href="./admin-manage-orders.php"><li>Manage Orders</li></a>
                <a href="./admin-view-records.php"><li>View Records</li></a>
        </ul>
    </nav>

    </header>
    <br><br>
    <center>
        <input type="text" name="" id="findCustomer" placeholder="Search Request Order Details">
        <!-- <input type="submit" value="Search Customer" id="enterCustomer"> -->
    </center>

    <br><br>
    <center>
        <table id="displayTable" style="background-color: black;">
            <thead>
                <tr>
                    <td class="table_data">ID</td>
                    <td class="table_data">CUSTOMER NAME</td>
                    <td class="table_data">CUSTOMER EMAIL</td>
                    <td class="table_data">CUSTOMER CONTACT NUMBER</td>
                    <td class="table_data">PRODUCT NAME</td>
                    <td class="table_data">PRODUCT IMAGE</td>
                    <td class="table_data">REQUEST DESCRIPTION</td>
                    <td class="table_data">REQUEST QUANTITY</td>                    
                    <td class="table_data">ENTER PRICE</td>
                    <td class="table_data">REQUEST STATUS</td>
                    <td class="table_data"></td>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                
                    <tr>
                        <td class="table_data"><?php echo $row['ID']; ?></td>
                        <td class="table_data"><?php echo $row['USER_FIRST_NAME']; ?></td>
                        <td class="table_data"><?php echo $row['USER_EMAIL']; ?></td>
                        <td class="table_data"><?php echo $row['USER_CONTACT_NUMBER']; ?></td>
                        <td class="table_data"><?php echo $row['PROD_NAME']; ?></td>
                        <td class="table_data"><img src="images/product_img/<?php echo $row['PROD_IMG']; ?>" height="100px" width="100px"></td>
                        <td class="table_data"><?php echo $row['REQUEST_DESCRIPTION']; ?></td>
                        <td class="table_data"><?php echo $row['REQUEST_QUANTITY']; ?></td>
                        <td class="table_data">
                            <input type="number" name="" id="enterReqCost" class="inputprice">
                        </td>
                        <td class="table_data"><?php echo $row['REQUEST_STATUS']; ?></td>
                        <td class="table_data">
                            <button type="submit" class="reqBtn">Change Status</button>
                        </td>
                    </tr>
                    
                <?php } ?>
            </tbody>
        </table>
    </center>

    
</body>
</html>