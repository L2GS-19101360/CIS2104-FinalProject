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

$sql = "SELECT * FROM `product`";
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
        #addProBtn{
            background-color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 200px;
            margin-left: 75px;
        }
        #addProBtn:hover{
            background-color: lightgray;
            cursor: pointer;
        }
        #findProduct{
            background-color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 500px;
            margin-left: 280px;
            /* border-top-left-radius: 10px;
            border-bottom-left-radius: 10px; */
            /*removing this*/
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
            width: 150px;
            padding: 5px;
            border: 1px solid gray;
            text-align: center;
        }
        .deleteBtn{
            border: none;
            border-radius: 10px;
            padding: 3px;
            background-color: ;
            background-color: lightgray;
            cursor: pointer;
            height: 50px;
        }
        .deleteBtn:hover{
            background-color: gray;
        }
        .prodesc{
            background-color: white;
            height: 80px;
            overflow: hidden;
			overflow-y: scroll; 
        }
        .proImage{
            height: 100px;
            width: 100px;
            background: white;
        }
        nav ul li{
            width: 300px;
            background-color: rgb(188, 255, 251);
            padding: 10px;
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
                <a href="admin-manage-products.php"><li id="active_tab">Manage Products</li></a>
                <a href="./admin-manage-customers.php"><li>Manage Customers</li></a>
                <a href="./admin-manage-requests.php"><li>Manage Requests</li></a>
                <a href="./admin-manage-orders.php"><li>Manage Orders</li></a>
                <a href="./admin-view-records.php"><li>View Records</li></a>
            </ul>
        </nav>

    </header><br><br>
    <a href="./admin_add_products.php"><button id="addProBtn">Add Product</button></a> <input type="text" name="" id="findProduct" placeholder="Search Product Details"><br><br><br>

    <center>

    <table id="displayTable" style="background-color: black;">
        <thead>
            <tr>
                <th class="table_rows">ID</th>
                <th class="table_rows">IMAGE</th>
                <th class="table_rows">NAME</th>
                <th class="table_rows">DESCRIPTION</th>
                <th class="table_rows">PRICE</th>
                <th class="table_rows">QUANTITY</th>
                <th class="table_rows"></th>
            </tr>
         </thead>
         <tbody>
            
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td class="table_data"> <?php echo $row['ID'] ?> </td>
                    <td class="table_data"> <img src="./images/product_img/<?php echo $row['PROD_IMG'] ?>" class="proImage" alt=""> </td>
                    <td class="table_data"> <?php echo $row['PROD_NAME'] ?> </td>
                    <td class="table_data">

                    <div class="prodesc">
                        <?php echo $row['PROD_DESC'] ?> 
                    </div>

                    </td>
                    <td class="table_data"> <?php echo $row['PROD_PRICE'] ?> </td>
                    <td class="table_data"> <?php echo $row['PROD_QUANTITY'] ?> </td>
                    <td class="table_data"><button class="deleteBtn">EDIT PRODUCT</button></td>
                </tr>
            <?php } ?>

         </tbody>
    </table>

    </center>
    
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script>
        $(document).ready(function(){
            $('#findCustomer').keyup(function(){
                var input = $(this).val();

                if (input != ""){
                    $.ajax({
                        
                        url: "./search_product.php",
                        method: "POST",
                        data:{input: input},
                        success:function(data){
                            $("#displayTable").html(data);
                        }

                    });
                }
                else{
                    location.reload();
                }

            });
        });
    </script>

</body>
</html>