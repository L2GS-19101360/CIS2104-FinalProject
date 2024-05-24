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
        <div class="center-text">
            <h1>We Are Home Plan Marketing<h1>    
            <h2>About Us<h2>
                <p class="first-line">Home Plan Marketing started in October 2001 when a couple set out to establish their company with two visions in mind:<p>
                <p class="second-line">• To Provide Quality Products when and where needed, with the ultimate goal of being a partner in uplifting the standard of living for every Filipino people;<p>
                <p class="third-line">• To provide financially secured jobs to their employees, at the same time investing in their development and growth.
                                        Starting out as a simple furniture retail financing company with a three-man operation in Mandaue, Home Plan has grown to a twenty-five-man team. Home Plan has 
                                        been expanding its product line up with various brands and services.<p>
            <h2 class="motto">Corporate Motto<h2>
                <p class="motto-line">• “A Commitment to Serve and an Endeavor to Excel in a Journey to Ultimate Success.”<p>
        </div>


    <footer></footer>
</body>
</html>