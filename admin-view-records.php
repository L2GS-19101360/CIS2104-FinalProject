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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Records</title>
    <link rel="shortcut icon" href="./admin_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS_Files/admin-style.css">
    <style>
        nav ul li{
            width: 300px;
            background-color: rgb(188, 255, 251);
            padding: 10px;
        }
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
                <a href="./admin-manage-requests.php"><li>Manage Requests</li></a>
                <a href="./admin-manage-orders.php"><li>Manage Orders</li></a>
                <a href="./admin-view-records.php"><li id="active_tab">View Records</li></a>
        </ul>
    </nav>

    </header>
    <br><br>
    <center>
        <input type="text" name="" id="findCustomer" placeholder="Search Order Records Details">
        <!-- <input type="submit" value="Search Customer" id="enterCustomer"> -->
    </center>

    <br><br>
    <center>
        <table id="displayTable" style="background-color: black;">
            <thead>
                <tr>
                    <td class="table_data">ID</td>
                    
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </center>

</body>
</html>