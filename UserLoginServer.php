<?php
    include("Data.php");

    $login_email = $_GET['login_email'];
    $login_password = $_GET['login_password'];

    if($login_email == null || $login_password == null){
        $emailMsg = "";
        $passMsg = "";

        if($login_email == null){
            $emailMsg = "Email Empty";
        }
        if($login_password == null){
            $passMsg = "Password Empty";
        }

        header("Location: Login.php?emailmsg=$emailMsg&passmsg=$passMsg");

    } elseif($login_email != null && $login_password != null){
        $obj = new data;
        $obj->setconnection();
        $obj->userLogin($login_email, $login_password);
    }

?>