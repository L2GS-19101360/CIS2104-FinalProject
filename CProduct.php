<?php
    include("Data.php");

    $userID = $_SESSION["userid"] = $_GET["userid"];
    $prodID = $_GET['prodid'];
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
            $prodName = $row['PROD_NAME'];
            $prodQuantity = $row['PROD_QUANTITY'];
        }

    ?>
    
    <div class="product-display">
        
        <div class="prod-image">
            <img src="images/product_img/<?php echo $prodImg?> " id="prod_img-size">
        </div>
        <div class="prod-disc">
            <form action="RequestCusServer.php" method="POST">
                <label>Custom Description</label><br>
                <textarea name="prod_desc" id="enterProDesc" cols="70" rows="10" placeholder="Enter Custom Description"></textarea><br><br><br>
                <label>Quantity:</label><br>
                <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $prodQuantity?>" value="1"><br><br>
                <input type="hidden" name="userid" value="<?php echo $userID; ?>">
                <input type="hidden" name="prodid" value="<?php echo $prodID; ?>">

                <input type="submit" value="Request Custom">
            </form>
            
        </div>
        <div class="prod-name">
            <h1><?php echo $prodName?></h1>
        </div>
        <div class="prod-price"></div>
        <div class="order-button">
            <div class="costume-order">
                <a href='Product.php?prodid=<?php echo $prodID?>&userid=<?php echo $userID?>'><button type='button' class='btn btn-primary'>Ready-Made Product</button></a>
            </div>
        </div>

    </div>
</body>
</html>