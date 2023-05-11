<?php
    include("Data.php");

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
<body>
    <div class="display_head">
        <div class="logo">
            <?php
                $displays = "<a href='Home.php?userlogid=$userID' class='logo-image'><img src='images/logo/logo.png' id='logo-image' ></a>";
                echo $displays;
            ?>
        </div>
        <div class="search-bar" >
            <form onsubmit="event.preventDefault();" role="search" id="search-form">
                <input id="search" class="search-text" type="search" placeholder="Search..." />
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
                            <a href="Home.php" ><li>Home</li></a>
                            <a href="#" ><li>Category</li></a>
                            <a href="#" ><li>About Us</li></a>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
            
    </div>
    
    <div class="display_body">
        <div class="chart-container">
            <?php
                $user = new data;
                $user->setconnection();
                $user->getCusRecord($userID);
                $chartRecord = $user->getCusRecord($userID);

                $chart_table = "<table>"
                    foreach($chartRecord as $row){
                        $chart_table. = "<tr>";
                        "<td>$row[0]</td>";
                        $chart_table. = "<td></td>"
                    }
                $chart_table. = "</table>";

                echo $chart_table;

            ?>
        </div>
    </div>
</body>
</html>