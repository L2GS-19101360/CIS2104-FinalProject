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

$query = "SELECT * FROM `customers`";
$result = mysqli_query($est_conn, $query);

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
        #findCustomer{
            background-color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 500px;
            /* border-top-left-radius: 10px;
            border-bottom-left-radius: 10px; */
        }
        #enterCustomer{
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            padding: 10px;
            background-color: lightgray;
            border: none;
            cursor: pointer;
        }
        #enterCustomer:hover{
            background-color: gray;
        }
        .table_rows{
            background-color: white;
            width: 150px;
            height: 50px;
            padding: 3px;
            border: 1px solid gray;
            text-align: center;
        }
        .table_data{
            background-color: white;
            /* width: 180px; */
            padding: 5px;
            border: 1px solid gray;
            text-align: center;
        }
        .statBtn{
            border: none;
            border-radius: 10px;
            padding: 3px;
            background-color: lightgray;
            cursor: pointer;
            height: 30px;
        }
        .deleteBtn{
            border: none;
            border-radius: 10px;
            padding: 3px;
            background-color: ;
            background-color: rgb(255, 62, 62);
            cursor: pointer;
        }
        .statBtn:hover{
            background-color: gray;
        }
        .deleteBtn:hover{
            background-color: red;
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
                <a href="./admin-manage-products.php"><li>Manage Products</li></a>
                <a href="#" ><li id="active_tab">Manage Customers</li></a>
                <a href="./admin-manage-requests.php"><li>Manage Requests</li></a>
                <a href="./admin-manage-orders.php"><li>Manage Orders</li></a>
                <a href="./admin-view-records.php"><li>View Records</li></a>
        </ul>
    </nav>

    </header>
    <br><br>
    <center>
        <input type="text" name="" id="findCustomer" placeholder="Search Customer Details">
        <!-- <input type="submit" value="Search Customer" id="enterCustomer"> -->
    </center>
    <br><br>
    
    <!-- <div id="displayTable"></div> -->
    <center>

    <table id="displayTable" style="background-color: black;">
        <thead>
            <tr>
                <th class="table_rows">ID</th>
                <th class="table_rows">First Name</th>
                <th class="table_rows">Last Name</th>
                <th class="table_rows">Contact Number</th>
                <th class="table_rows">Email</th>
                <th class="table_rows">Address</th>
                <th class="table_rows">Status</th>
                <th class="table_rows"></th>
            </tr>
         </thead>
         <tbody>
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td class="table_data"> <?php echo $row['ID'] ?> </td>
                    <td class="table_data"> <?php echo $row['USER_FIRST_NAME'] ?> </td>
                    <td class="table_data"> <?php echo $row['USER_LAST_NAME'] ?> </td>
                    <td class="table_data"> <?php echo $row['USER_CONTACT_NUMBER'] ?> </td>
                    <td class="table_data"> <?php echo $row['USER_EMAIL'] ?> </td>
                    <td class="table_data"> <?php echo $row['USER_ADDRESS'] ?> </td>
                    <td class="table_data"> <?php echo $row['USER_STATUS'] ?> </td>
                    <td class="table_data"><button class="statBtn" onclick="statChange(<?php echo $row['ID'] ?>)">CHANGE STATUS</button></td>
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
                        
                        url: "./search_customer.php",
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

        function deleteAcct(id){
            // alert(id);
            $.ajax({
                url: "./delete_customer.php",
                type: "POST",
                data: {id: id},
                success:function(response){
                    alert("Customer ID " + id + " Deleted");
                    location.reload();
                }
            });
        }

        function statChange(id){
            // alert(id);
            $.ajax({
                url: "./change_status.php",
                type: "POST",
                data: {id: id},
                success:function(response){
                    alert("Customer ID " + id + " Status Changed");
                    location.reload();
                }
            });
        }
    </script>

</body>
</html>