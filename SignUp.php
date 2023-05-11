<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, intial-scale=1.0, maximum-scale=1, use-scalable=no">
            <title>Sign Up Page</title>
            <link rel="stylesheet" href="CSS_Files/styleSignUp.css">
        </head>

        <?php
            $msg="";

            if(!empty($_REQUEST['msg'])){
                $msg=$_REQUEST['msg'];
            }
        
        ?>

        <body>
            <img class="Logo" src="images/logo/logo.png">
        
            <div class="welcome-text">
                <h2>Enter The Account Details</h2>
            </div>

            <div class="account-text">
                <h2>Account Information</h2>
            </div>

            <hr class="hr-line">
           
            <div class="Warning-MessageSignup">
                <h4><?php echo $msg?></h4>
            </div>

            <form action="UserSignupServer.php" method="GET">
                <label for="email"></label>
                <input placeholder="Email Address" class="email-field" type="email" id="email" name="email" required>

                <label for="fname"></label>
                <input placeholder="First Name" class="fname-field" type="text" id="fname" name="fname" required>

                <label for="lname"></label>
                <input placeholder="Last Name" class="lname-field" type="text" id="lname" name="lname" required>

                <label for="contactNum"></label>
                <input placeholder="Contact Number" class="contact-field" type="text" id="contact" name="contact" required>

                <label for="address"></label>
                <input placeholder="Address:Street/Barangay/City" class="address-field" type="text" id="address" name="address" required>
              
                <label for="password"></label>
                <input placeholder="Password" class="password-field" type="password" id="password" name="password" required>
              
                <label for="confirmPass"></label>
                <input placeholder="Confirm Password" class="confirmPass-field" type="password" id="conPassword" name="conPassword" required>

                <button class="btn-login" type="submit">Sign Up</button>
            </form>
          
            <div class="ask-login">
                <a href="Login.php"><p><-Back to login</p></a>
            </div>


        </body>


    </html>