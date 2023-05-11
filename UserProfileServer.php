<?php
    include("Data.php");

    $userID = $_POST['userid'];

    $userPass = $_POST['password'];
    $userConPass = $_POST['con_pass'];

    if($userPass ==  $userConPass){

        $userFname = $_POST['fname'];
        $userLname = $_POST['lname'];
        $userEmail = $_POST['email'];
        $userContact = $_POST['contactNum'];
        $userAddress = $_POST['address'];

        if (move_uploaded_file($_FILES["user_img"]["tmp_name"],"images/userProfile/".$_FILES["user_img"]["name"])) {

            $userImg=$_FILES["user_img"]["name"];

            $obj=new data;
            $obj->setconnection();
            $obj->updateProfile($userID, $userImg, $userFname, $userLname, $userEmail, $userContact, $userAddress, $userConPass);
        } else {
            header("Location: UserSetting.php?userid=$userID&msg=ERROR FILE UPLOAD");
        }
    
    } else {
        header("Location: UserSetting.php?userid=$userID&msg=PASSWORD DOESN'T MATCH!!");
    }

    

?>