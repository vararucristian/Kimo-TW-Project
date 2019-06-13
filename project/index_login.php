<!DOCTYPE html>
<?php
include 'loginController.php';
?>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="images/images.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/login.css"> 
    <title>Kimo</title>
</head>
<body>
    <main>
        <div id = "Logo">
            <img src="images/images.png" alt="Logo">
            <h1 id="KIMO">KIMO APP</h1>
        </div>
        <div id = "Mesaj">
            <b>Hey, parent! Let's see where your child is!</b>
        </div>
        <div id = "Login">
            <form action="index_login.php" method="POST">
                <div class="loginBox">
                    <img src="images/index.png" alt="user" >
                    <input type="text" placeholder="Your username" name="username" required>
                </div>
                <div class="loginBox">
                    <img src="images/parola.png" alt="password">
                    <input type="password" placeholder="Your password" name="password" required>
                </div>
                <input type="submit" id="butonLogin" value="Login" name="login">
            </form>
            <?php 
                    if(isset($logat) && $logat === false) {
                        echo '<p style="margin-left: 15%;text-align: center;color: red;font-size: 1.5rem;"><b> Ups! Wrong username or password. Please, try again!</b></p>';
                    } 
                ?>
            <p id="SignUp">
                    Don't have an account?
                    <a href="SignUp.php" target="_blank">Sign Up!</a>
             </p>
        </div>
    </main>
</body>
</html>
