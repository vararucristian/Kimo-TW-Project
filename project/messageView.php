<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="images/images.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/Message.css">
    <title>Kimo</title>
</head>

<style>
    .logout {
    background: none;
    box-shadow: none;
}

    .logout input{
        border:none;
    background: none;
    text-align: center;
    font-family: inherit;
    font-size: 20px;
    font-weight: bold;
    color:black;
    text-decoration: none;
    display: block; padding: 5% 5%;
    margin-left: 25%;
    outline: none; 
    }

.logout input:hover{
    color: #fff;
}

@media screen and (max-width: 760px){
    .button{
        color:#fff;
        margin-left:30%;
    }
}


</style>

<body>

    <nav>
        <ul>
            <li><img src="images/images.png" alt="logo"></li>
            <li class="KIMO">KIMO APP</li>
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Notifications</a>
                <ul>
                    <li>Notification 1</li>
                    <li>Notification 2</li>
                    <li>Notification 3</li>
                    <li>Notification 4</li>
                    <li>Notification 5</li>
                </ul>
            </li>
            <li><a href="index_profile.html">My Account</a></li>
            <li><form method="POST" action="logout.php" class="logout"><input  class="button" type="submit" name="logout" value="Log Out" ></form></li>
        </ul>
        <nav>
            <ul>
                <li id="menu">
                    <img src="images/menu-icon.png" alt="menu">
                    <ul id="menu2">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Notifications</a>
                            <ul>
                                <li>Notification 1</li>
                                <li>Notification 2</li>
                                <li>Notification 3</li>
                                <li>Notification 4</li>
                                <li>Notification 5</li>
                            </ul>
                        </li>
                        <li><a href="index_profile.html">My Account</a></li>
                        <li><form method="POST" action="logout.php" class="logout"><input type="submit" name="logout" value="Log Out" ></form></li>
                    </ul>
                </li>
                <li><img src="images/images.png" alt="logo"></li>
                <li class="KIMO">KIMO APP</li>
            </ul>

        </nav>
    </nav>

    <main>
        <div id="profil">
            <img src="images/picture145716079994.jpg" alt="kid">
            <div>
                <p>Parent first name</p>
                <p>Parent last name</p>
            </div>
        </div>
        <div id="chat">
            <form>
                <h1>Send a message to his parent</h1>
                <div>
                    <textarea placeholder="Type message.." name="msg" required></textarea>
                    <button type="submit"><b>Send</b></button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div id="facebook">
            <img src="images/kisspng-logo-facebook-black-and-white-computer-icons-5b40b14988b153.2255686315309663455599.png"
                alt="facebook"><a href="https://www.facebook.com/stefania.andries" target="_blank">stefania.andries</a>
            <img src="images/kisspng-logo-facebook-black-and-white-computer-icons-5b40b14988b153.2255686315309663455599.png"
                alt="facebook"><a href="https://www.facebook.com/anamaria.turcu.90"
                target="_blank">anamaria.turcu.90</a>
            <img src="images/kisspng-logo-facebook-black-and-white-computer-icons-5b40b14988b153.2255686315309663455599.png"
                alt="facebook"><a href="https://www.facebook.com/vararu.cristian98"
                target="_blank">vararu.cristian98</a>
        </div>

        <div id="email">
            <img src="images/windows8mailapp.jpg" alt="mail"><a
                href="mailto:stefania.andries@yahoo.com">stefania.andries</a>
            <img src="images/windows8mailapp.jpg" alt="mail"><a
                href="mailto:turcu.anamaria98@gmail.com">turcu.anamaria98</a>
            <img src="images/windows8mailapp.jpg" alt="mail"><a
                href="mailto:vararu.cristian@yahoo.com">vararu.cristian98</a>

        </div>
    </footer>
</body>

</html>