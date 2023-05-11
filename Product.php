<?php
    include("Data.php");

    $userID = $_SESSION["userid"] = $_GET["userid"];
    $prodID = $_GET['prodid'];


    $msg="";
    if(!empty($_REQUEST['msg'])){
        $msg=$_REQUEST['msg'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS_Files/Web_Style.css">
    <title>Home Plan</title>
</head>
<body>
    <div class="display_head">
        <div class="logo">
            <?php
                $displays = "<a href='Home.php?userlogid=$userID' class='logo-image'><img src='images/logo/logo.png' id='logo-image' ></a>";
                echo $displays;
            ?>
        </div>
        <div class="search-bar" >
            <form action="Home.php" method="GET" id="search-form">
                <input id="search" name="userSearch" class="search-text" type="text" placeholder="Search..." />
                <input type="hidden" name="userlogid" value="<?php echo $userID?>">
                <button id="search" class="search-button" type="submit"><img src="images/icons/search-icon.png" id="search-icon"></button>    
            </form>
        </div>
        <div class="icons">

            <div class="record">
                <a href="Purchase-History.php?userid=<?php echo $userID?>"><img src="images/icons/purchase_record-icon.png" class="user-icons" ></a>
            </div>

            <div class="chart">
                <a href="Chart.php?userid=<?php echo $userID?>"><img src="images/icons/chart-icon.png" class="user-icons" ></a> 
            </div>

            <div class="contact">
                <a href="ContactUs.php?userid=<?php echo $userID?>"><img src="images/icons/contacts-icon.png" class="user-icons"></a>
            </div>

            <div>
                <nav role='navigation'>
                    <div id="menuToggle">
    
                        <input type="checkbox" />
                        
                        <span></span>
                        <span></span>
                        <span></span>
                        
                        <ul id="menu">
                            <div class="user-profile"></div>
                            <a href="UserSetting.php?userid=<?php echo $userID; ?>"><button>Profile</button></a>
                            <a href="Home.php?userlogid=<?php echo $userID?>" ><li>Home</li></a>
                            <a href="#" ><li>Category</li></a>
                            <a href="AboutUs.php?userid=<?php echo $userID; ?>" ><li>About Us</li></a>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
            
    </div>

    <?php
        $user = new data;
        $user->setconnection();
        $prodRecord = $user->getSpecificProd($prodID);

        foreach($prodRecord->fetchAll() as $row){
            $prodImg = $row['PROD_IMG'];
            $prodDesc = $row['PROD_DESC'];
            $prodName = $row['PROD_NAME'];
            $prodPrice = $row['PROD_PRICE'];
            $prodQuantity = $row['PROD_QUANTITY'];

        }

    ?>
    
    <div class="product-display">
        
        <div class="prod-image">
            <img src="images/product_img/<?php echo $prodImg?> " id="prod_img-size">
        </div>

        <div class="prod-disc">
            <p><?php echo $prodDesc?></p>
        </div>

        <div class="prod-name">
            <h1><?php echo $prodName?></h1>
        </div>

        <div class="prod-price">
            <h3>Php <?php echo $prodPrice?></h3>
        </div>

        <div class="Warning-Message Product">
            <h4><?php echo $msg?></h4>
        </div>

        <div class="order-button">
            <div class="costume-order">
                <a href='CProduct.php?prodid=<?php echo $prodID?>&userid=<?php echo $userID?>'><button type='button' class='btn btn-primary'>Custom-Made Product</button></a>
            </div>

            <form action="UserOrderServer.php" method="POST">
                <label >Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $prodQuantity?>" value="1"><br><br>
                <input type="hidden" name="userid" value="<?php echo $userID; ?>">
                <input type="hidden" name="prodid" value="<?php echo $prodID; ?>">
                <input type="hidden" name="prodprice" value="<?php echo $prodPrice; ?>">

                <button type="submit" name="button" value="0">ADD CHART</button>
		        <button type="submit" name="button" value="1">ORDER</button>

            </form>

        </div>

    </div>
</body>
</html>