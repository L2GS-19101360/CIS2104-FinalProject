<?php
    include("Data.php");

    session_start();
    $userLoginID = $_SESSION["userid"] = $_GET["userlogid"];
    
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
                $displays = "<a href='Home.php?userlogid=$userLoginID' class='logo-image'><img src='images/logo/logo.png' id='logo-image' ></a>";
                echo $displays;
            ?>
        </div>
        <div class="search-bar" >
            <form action="Home.php" method="GET" id="search-form">
                <input id="search" name="userSearch" class="search-text" type="text" placeholder="Search..." />
                <input type="hidden" name="userlogid" value="<?php echo $userLoginID?>">
                <button id="search" class="search-button" type="submit"><img src="images/icons/search-icon.png" id="search-icon"></button>    
            </form>
        </div>
        <div class="icons">

            <div class="record">
                <a href="Purchase-History.php?userid=<?php echo $userLoginID?>"><img src="images/icons/purchase_record-icon.png" class="user-icons" ></a>
            </div>

            <div class="chart">
                <a href="Chart.php?userid=<?php echo $userLoginID?>"><img src="images/icons/chart-icon.png" class="user-icons" ></a> 
            </div>

            <div class="contact">
                <a href="ContactUs.php?userid=<?php echo $userLoginID?>"><img src="images/icons/contacts-icon.png" class="user-icons"></a>
            </div>

            <div>
                <nav role='navigation'>
                    <div id="menuToggle">
    
                        <input type="checkbox" />
                        
                        <span></span>
                        <span></span>
                        <span></span>
                        
                        <ul id="menu">
                            <a href="UserSetting.php?userid=<?php echo $userLoginID; ?>"><button>Profile</button></a>
                            <div class="user-profile"></div>
                            <a href="Home.php?userlogid=<?php echo $userLoginID?>" ><li>Home</li></a>
                            <a href="#" ><li>Category</li></a>
                            <a href="AboutUs.php?userid=<?php echo $userLoginID; ?>"><li>About Us</li></a>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
            
    </div>

    <?php
        $userSearch = "";

        if(!empty($_GET['userSearch'])){
            $userSearch=$_GET['userSearch'];
        }

        $obj = new data;
        $obj->setconnection();
        $obj->getSearchProd($userSearch);
        $returnObj = $obj->getSearchProd($userSearch);

        $tableSearch = "<table class='prod-listDisplay'>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th></th>
            </tr>";
            foreach($returnObj as $row){
                $tableSearch.="<tr>";
                "<td>$row[0]</td>";
                $tableSearch.="<td class='td_img_lenght' ><img src='images/product_img/$row[1]'id='prod-imgSize'></td>";
                $tableSearch.="<td id='prod-name'>$row[2]</td>";
                $tableSearch.="<td id='prod-desc'>$row[3]</td>";
                $tableSearch.="<td id='prod-price'>Php $row[4]</td>";
                $tableSearch.="<td><a href='Product.php?prodid=$row[0]&userid=$userLoginID'><button type='button' class='btn btn-primary'>View</button></a></td>";
                $tableSearch.="</tr>";
            }
        $tableSearch.="</a></table>";
    
    ?>

    
    <div class="display_body">
        <div class="prod-display">
            <br>
            <?php
                echo $tableSearch;
            ?>

        </div>
    </div>
    <footer></footer>
</body>
</html>