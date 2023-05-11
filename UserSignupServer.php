<?php
    include('Data.php');


    $userPass = $_GET['password'];
    $userConPass = $_GET['conPassword'];

    if($userPass ==  $userConPass){
        $userEmail = $_GET['email'];
        $userFname = $_GET['fname'];
        $userLname = $_GET['lname'];
        $userContact = $_GET['contact'];
        $userAddress = $_GET['address'];

        $obj = new data;
        $obj->setconnection();
        $obj->userSignup($userFname, $userLname, $userContact, $userEmail, $userConPass, $userAddress);
    
    } else {
        header("Location: SignUp.php?msg=PASSWORD DOESN'T MATCH!!");
    }


?>