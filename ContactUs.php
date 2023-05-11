<?php
    include("Data.php");

    session_start();
    $userID = $_SESSION["userid"] = $_GET["userid"];
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
<body class="main-body">
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
                <a href="chart.php?userid=<?php echo $userID?>"><img src="images/icons/chart-icon.png" class="user-icons" ></a> 
            </div>

            <div class="contact">
                <a href="Contact.php?userid=<?php echo $userID?>"><img src="images/icons/contacts-icon.png" class="user-icons"></a>
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
        <div class="main-text">
            <img src="images/icons/Map.png" class="map-picture"> 
            <p class="contact-info">For business inquiries contact us at info@homeplanmktg.com<p>
            <p class="number-info">+63 (32) 424-0303<p>
            <p class="address-info">Our office is located at Bayview Road, East Binabag, Tayud, Consolacion<p>
            <h2>Address<h2>
        </div>


    <footer></footer>
</body>
</html>