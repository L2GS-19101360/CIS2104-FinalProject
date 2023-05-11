<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS_Files/Web_Style.css">
    <title>Login</title>
</head>
<body>
    
    <?php
        $emailmsg="";
        $pasdmsg="";
        $msg="";
    
        if(!empty($_REQUEST['emailmsg'])){
            $emailmsg=$_REQUEST['emailmsg'];
        }
        
        if(!empty($_REQUEST['passmsg'])){
          $pasdmsg=$_REQUEST['passmsg'];
        }
        
        if(!empty($_REQUEST['msg'])){
            $msg=$_REQUEST['msg'];
         }
        
    ?>

    <img class="Logo" src="images/logo/logo.png">
        
    <div class="welcome-text">
        <h2>WELCOME!</h2>
    </div>
    
    <div class="Warning-MessageLogin">
        <h4><?php echo $msg?></h4>
    </div>

    <form action="UserLoginServer.php" method="get">
        <label for="email"></label>
        <input placeholder="Username/Email" class="email-field" type="email" id="email" name="login_email" required>
          
        <label for="password"></label>
        <input placeholder="Password" class="password-field" type="password" id="password" name="login_password" required>
          
        <button class="btn-login" type="submit">Login</button>
    </form>

    <div class="ask-signup">
        <p>No account yet?<a href="SignUp.php">Sign Up</a></p>
    </div>

</body>
</html>