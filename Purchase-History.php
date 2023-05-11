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
        $userReaRecord = $user->getReaRecord($userID);

        $title1 = "<h2>Ready-Made Purchase Record</h2>";
        $table_ReadyMade = "<table class='prod-listDisplay'>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Original Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Date</th>
            </tr>";
            foreach($userReaRecord as $row){
                $table_ReadyMade.="<tr>";
                "<td>$row[0]</td>";
                $table_ReadyMade.="<td class='td_img_lenght' ><img src='images/product_img/$row[1]'id='prod-imgSize'></td>";
                $table_ReadyMade.="<td id='purProd-Name'>$row[2]</td>";
                $table_ReadyMade.="<td id='purProd-Desc'>$row[3]</td>";
                $table_ReadyMade.="<td id='purProd-Type'>$row[4]</td>";
                $table_ReadyMade.="<td id='purProd-Price'>$row[5]</td>";
                $table_ReadyMade.="<td id='purProd-Quan'>$row[6]</td>";
                $table_ReadyMade.="<td id='purProd-TPrice'>$row[7]</td>";
                $table_ReadyMade.="<td id='purProd-Stat'>$row[8]</td>";
                $table_ReadyMade.="<td id='purProd-Date'>$row[9]</td>";
                $table_ReadyMade.="</tr>";
            }
        $table_ReadyMade.="</a></table>";

        $users = new data;
        $users->setconnection();
        $userCusRecord = $users->getCusRecord($userID);

        $title2 = "<h2>Custom-Made Purchase Record</h2>";
        $table_CustomMade = "<table class='prod-listDisplay'>
            <tr>
                <th></th>
                <th >Name</th>
                <th >Description</th>
                <th >Type</th>
                <th >Original Price</th>
                <th '>Quantity</th>
                <th '>Total Price</th>
                <th >Status</th>
                <th >Date</th>
            </tr>";
            foreach($userCusRecord as $rows){
                $table_CustomMade.="<tr>";
                "<td>$rows[0]</td>";
                $table_CustomMade.="<td class='td_img_lenght' ><img src='images/product_img/$row[1]'id='prod-imgSize'></td>";
                $table_CustomMade.="<td id='purProd-Name'>$rows[2]</td>";
                $table_CustomMade.="<td id='purProd-Desc'>$rows[3]</td>";
                $table_CustomMade.="<td id='purProd-Type'>$rows[4]</td>";
                $table_CustomMade.="<td id='purProd-Price'>$rows[5]</td>";
                $table_CustomMade.="<td id='purProd-Quan'>$row[6]</td>";
                $table_CustomMade.="<td id='purProd-TPrice'>$row[7]</td>";
                $table_CustomMade.="<td id='purProd-Stat'>$row[8]</td>";
                $table_CustomMade.="<td id='purProd-Date'>$rows[9]</td>";
                $table_CustomMade.="</tr>";
            }
        $table_CustomMade.="</a></table>";
    ?>



    <div class="display_body">
        <div class="chart-container">
            <?php
                echo $title1;
                echo $table_ReadyMade;

                echo $title2;
                echo $table_CustomMade;
            ?>
        </div>
    </div>
</body>
</html>