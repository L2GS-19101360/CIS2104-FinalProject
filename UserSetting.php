<?php
    include('Data.php');

    $userID = $_SESSION["userid"] = $_GET["userid"];

    $profileImg = "UserProfile.png";
    $msg="";

    if(!empty($_REQUEST['msg'])){
        $msg=$_REQUEST['msg'];
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, intial-scale=1.0, maximum-scale=1, use-scalable=no">
            <title>User Settings</title>
            <link rel="stylesheet" href="CSS_Files/UserSettings.css">
        </head>

        <header>
           

        </header>

        <body>
           <div class="side-bar">
                <a href="Home.php?userlogid=<?php echo $userID?>"><img src="images/logo/logo.png" class="logo"></a>
                <img src="images/icons/EditLogo.png" class="edit-logo">
                <img src="images/icons/RightArrow.png" class="arrow-logo">
                <h2>Edit Profile</h2>
           </div>

            <?php
                $user = new data;
                $user->setconnection();
                $userRecord = $user->getUserFile($userID);

                foreach($userRecord as $row){
                    $userImg = $row['USER_IMG'];
                    $userFname = $row['USER_FIRST_NAME'];
                    $userLname = $row['USER_LAST_NAME'];
                    $userContact = $row['USER_CONTACT_NUMBER'];
                    $userEmail = $row['USER_EMAIL'];
                    $userPass = $row['USER_PASSWORD'];
                    $userAddress = $row['USER_ADDRESS'];
                }
            
            ?>


           <div class="main-div">
                <h1>Edit Profile</h1>
                <img src="images/userProfile/<?php echo $profileImg?>" class="user-profile">
                <img src="images/userProfile/<?php echo $userImg?>" class="user-profile">
                
                <div class="Warning-Message">
                    <h4><?php echo $msg?></h4>
                </div>

                <section>
                    <form action="UserProfileServer.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="user_img" id="userUpadateImg" placeholder="Update Image">
                        <img src="images/icons/EditLogo.png" class="user-logo">

                        <label for="fname" class="fname-label">First Name</label>
                        <input value="<?php echo $userFname?>" class="fname-field" type="text" id="fname" name="fname" required>
                        <img src="images/icons/EditLogo.png" class="fname-logo">

                        <label for="lname" class="lname-label">Last Name</label>
                        <input value="<?php echo $userLname?>" class="lname-field" type="text" id="lname" name="lname" required>
                        <img src="images/icons/EditLogo.png" class="lname-logo">

                        <label for="email" class="email-label">Email</label>
                        <input value="<?php echo $userEmail?>" class="email-field" type="text" id="email" name="email" required>
                        <img src="images/icons/EditLogo.png" class="email-logo">

                        <label for="contactNum" class="contact-label">Contact Number</label>
                        <input value="<?php echo $userContact?>" class="contact-field" type="text" id="contactNum" name="contactNum" required>
                        <img src="images/icons/EditLogo.png" class="contact-logo">

                        <label for="address" class="address-label">Address</label>
                        <input value="<?php echo $userAddress?>" class="address-field" type="text" id="address" name="address" required>
                        <img src="images/icons/EditLogo.png" class="address-logo">

                        <label for="password" class="pass-label">Password</label>
                        <input value="<?php echo $userPass?>" class="password-field" type="password" id="password" name="password" required>
                        <img src="images/icons/EditLogo.png" class="pass-logo">

                        <label for="con_pass" class="con_pass-label">Confirm Password</label>
                        <input value="<?php echo $userPass?>" class="con_pass-field" type="password" id="con_pass" name="con_pass" required>
                        <img src="images/icons/EditLogo.png" class="con_pass-logo">

                        <input type="hidden" name="userid" value="<?php echo $userID; ?>">

                        <button class="btn-save" type="submit">Save Profile</button>
                    </form>
                </section>
           </div>

        </body>


    </html>