<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Products</title>
    <link rel="shortcut icon" href="images/logo/admin_logo.png" type="image/x-icon">
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
        }
        .addProContainter{
            position: relative;
            top: 25px;
            left: 300px;
            background-color: white;
            border-radius: 10px;
            height: 500px;
            width: 1000px;
            padding: 20px;
        }
        .addProContainter label{
            background-color: white;
        }
        .addProPic{
            border: 1px solid black;
            height: 200px;
            width: 254px;
            background-color: white;
            padding: none;
            position: relative;
            left: 55px;
        }
        #addProImage{
            background-color: white;
            position: relative;
            
        }
        #enterProName, #enterProPrice, #enterProQuan, #enterProDesc{
            background-color: white;
            padding: 10px;
            border-radius: 10px;
        }
        #imageIcon{
            background-color: white;
            height: 173px;
            width: 250px;
            color: white;
        }
        .proDetails{
            background-color: white;
            position: relative;
            top: -258px;
            left: 430px;
            width: 500px;
        }
        #enterProDesc{
            resize: none;
            margin-top: 5px;
        }
        #storePro{
            border: none;
            border-radius: 10px;
            background-color: rgb(28, 182, 28);
            padding: 15px;
            width: 150px;
        }
        #storePro:hover{
            background-color: green;
            cursor: pointer;
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

    </header>
    <div class="addProContainter">
        <br><br>

        <form action="addProductServer.php" method="post" enctype="multipart/form-data" style='background-color: transparent;'>
            <div class="addProPic">            
                <img src="images/icons/add-image.png" alt="" id="imageIcon">
                <input type="file" name="prod_img" id="addProImage">
            </div><br>

            <label>Enter Product Name</label> 
            <input type="text" name="prod_name" id="enterProName" placeholder="Product Name">

            <div class="proDetails">
                <label>Enter Product Price</label>
                <input type="number" name="prod_price" id="enterProPrice" placeholder="Product Price"><br><br><br>

                <label >Enter Product Quantity</label>
                <input type="number" name="prod_quantity" id="enterProQuan" placeholder="Product Quantity"><br><br><br>

                <label for="enterProDesc">Enter Product Description</label><br>
                <textarea name="prod_desc" id="enterProDesc" cols="70" rows="10" placeholder="Price Description"></textarea><br><br><br>

                <button type="submit" id="storePro">Add New Product</button>
            </div>
        </form>

    </div>

</body>
</html>