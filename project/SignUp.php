<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="images/images.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/SignUp.css"> 
    <title>Kimo</title>
</head>
<body>
    <main>
        <form  action="controllerSignUp.php" method="POST">
            <div id="Logo">
                <img src="images/images.png" alt="Logo">
                <h1 id="KIMO">KIMO APP</h1>
            </div>
            <div class="SignUpBox">
                <img src="images/index.png" alt="user">
                <div>
                    <input type="text" placeholder="First name" name="fname">
                    <input type="text" placeholder="Last name" name="lname"> 
                </div>
            </div>
            <div class="SignUpBox">
                    <div>
                        <input type="text" placeholder="Username" name="username">
                    </div>
            </div>
            <div class="SignUpBox">
                <img src="images/parola.png" alt="user">
                <div>
                    <input type="password" placeholder="Password" name="password1">
                    <input type="password" placeholder="Confirm Password" name="password2">
                </div>
        </div>
            <div class="SignUpBox">
                <img src="images/73527377-location-icon-simple-flat-logo-of-location-sign-on-white-background-vector-illustration-.jpg.png" alt="user">
                <div>
                    <input type="text" placeholder="Latitude" name="latitude">
                    <input type="text" placeholder="Longitude" name="longitude">
                </div>
            </div>
            <div class="SignUpBox">
                    <img src="images/phone2.png" alt="user">
                    <div>
                        <input type="tel" placeholder="Phone Number" name="phone">
                        <input type="email" placeholder="E-mail" name="email">
                    </div>
            </div>
            <div id="gen">
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
            </div>
           <input type="submit"  name="butonSignUp" id="butonSignUp" value="Sign up">
           <?php
                $error="";
               if ($empty_field==false)
                    echo '<p style="margin-left: 0%;text-align: center;color: darkred;font-size: 1.5rem;"><b> All the fields has to be completed! Please, try again!</b></p>';
                    else
                        if ($incorrect_data==true)
                        echo '<p style="margin-left: 0%;text-align: center;color: darkred;font-size: 1.5rem;"><b> Latidude or longitude incorrect! Please, try again!</b></p>';
                        else
                          if ($short_password==true)
                            echo '<p style="margin-left: 0%;text-align: center;color: darkred;font-size: 1.5rem;"><b> Password too short! Please, try again!</b></p>';
                            else
                            if ($easy_password==true)
                                echo '<p style="margin-left: 0%;text-align: center;color: darkred;font-size: 1.5rem;"><b> Password too easy! Please, try again!</b></p>';
                                else
                               if ($different_passwords==true)
                                echo '<p style="margin-left: 0%;text-align: center;color: darkred;font-size: 1.5rem;"><b> Incorrect password confirmation! Please, try again!</b></p>';
                                else
                                    if ($username_used==true)
                                        echo '<p style="margin-left: 0%;text-align: center;color: darkred;font-size: 1.5rem;"><b> Username is already used! Please, try again!</b></p>';
                                        
               ?>
        </form>
    
    </main> 
</body>
</html>