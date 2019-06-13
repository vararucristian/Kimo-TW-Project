<?php
include "homeController.php"; 
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/x-icon" href="images/images.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" type="text/css" href="styles/style.css"> -->
    <link href="styles/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>Kimo</title>
</head>

<style>
    .button {
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

.button:hover{
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
            <li><a href="#">Home</a></li>
            <li><a href="#">Notifications</a>
                <ul>
                    <li>Notification 1</li>
                    <li>Notification 2</li>
                    <li>Notification 3</li>
                    <li>Notification 4</li>
                    <li>Notification 5</li>
                </ul>
            </li>
            <li><a href="index_profile.php">My Account</a></li>
            <li><form method="POST" action="logout.php"><input  class="button" type="submit" name="logout" value="Log Out" ></form></li>
        </ul>
        <nav>
            <ul>
                <li id="menu">
                    <img src="images/menu-icon.png" alt="menu">
                    <ul id="menu2">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Notifications</a>
                            <ul>
                                <li>Notification 1</li>
                                <li>Notification 2</li>
                                <li>Notification 3</li>
                                <li>Notification 4</li>
                                <li>Notification 5</li>
                            </ul>
                        </li>
                        <li><a href="index_profile.php">My Account</a></li>
                        <li><form method="POST" action="logout.php"><input type="submit" name="logout" value="Log Out" ></form></li>
                    </ul>
                </li>
                <li><img src="images/images.png" alt="logo"></li>
                <li class="KIMO">KIMO APP</li>
            </ul>

        </nav>
    </nav>
    <main>
            
            <?php
        
                foreach ($homeController->childs as $child)
                  {
                      echo "<form method=\"POST\" action=\"index_kidView.php\"><img src=\"".$child->picture."\" alt=\"kid\"><input class=\"button\" type=\"submit\" value =".$child->first_name."&nbsp;&nbsp;".$child->last_name.">";
                      echo "<input type=\"hidden\" name=\"childId\" value=\"".$child->getID()."\" /></form>";
                    }

                  ?>
            
        <a href="#modal2" class="modal-trigger">
            <div id="add"><img src="images/add.png" alt="add"></div>
        </a>
    </main>
    <footer>
        <div id="facebook">
            <img src="images/kisspng-logo-facebook-black-and-white-computer-icons-5b40b14988b153.2255686315309663455599.png"
                alt="facebook"><a href="https://www.facebook.com/stefania.andries">stefania.andries</a>
            <img src="images/kisspng-logo-facebook-black-and-white-computer-icons-5b40b14988b153.2255686315309663455599.png"
                alt="facebook"><a href="https://www.facebook.com/anamaria.turcu.90">anamaria.turcu.90</a>
            <img src="images/kisspng-logo-facebook-black-and-white-computer-icons-5b40b14988b153.2255686315309663455599.png"
                alt="facebook"><a href="https://www.facebook.com/vararu.cristian98">vararu.cristian98</a>
        </div>

        <div id="email">
            <img src="images/windows8mailapp.jpg" alt="mail"><a
                href="mailto:stefania.andries@yahoo.com">stefania.andries</a>
            <img src="images/windows8mailapp.jpg" alt="mail">
            <a href="mailto:turcu.anamaria98@gmail.com">turcu.anamaria98</a>
            <img src="images/windows8mailapp.jpg" alt="mail"> <a
                href="mailto:vararu.cristian@yahoo.com">vararu.cristian98</a>

        </div>
    </footer>
    <div class="modal2" id="modal2">
        <div class="modal__dialog">
            <section class="modal__content">
                <header class="modal__header">
                    <h2 class="modal__title">Add kid</h2>
                    <a href="#" onclick="document.getElementById('form2').submit();"class="modal__save" >Add</a>
                    <a href="index.php" class="modal__close" >X</a>
                </header>
                <div class="modal__body">
                    <p class="modal__text">
                        <form action="AddKidController.php"  method="POST" id="form2" enctype="multipart/form-data">
                            <div id="text">
                                <div class="item">
                                    Kid's first name:
                                    <input type="text" name="fname" placeholder="FirstName">
                                </div>
                                <div class="item">
                                    Kid's last name:
                                <input type="text" name="lname" placeholder="LastName">
                                </div>
                                <div class="item">
                                    Sensor's code:
                                    <input type="text" name="code" placeholder="Code">
                                </div>
                            </div>

                            <div class="item">
                                Gender:
                                <div id="gen">
                                    <input type="radio" class="gender" placeholder="Girl" name="gender" value="Girl">Girl
                                    <input type="radio" class="gender" placeholder="Boy" name="gender" value="Boy">Boy</div>
                                    <input type="hidden" name="location" value="home" />
                            <!-- </div>
                            <div id="addphoto">
                                Add a photo with your child:
                                <input type="file" name="photo">
                            </div> -->
                            <?php
                            if(isset($_GET["check"]))
                                 echo '<p style="text-align: center;color: red;font-size: 1.5rem;"><b>Upsss!!! A necessary field has not been completed!!!</b></p>';
                            else
                            if (isset($_GET["name"]))
                                 echo '<p style="text-align: center;color: red;font-size: 1.5rem;"><b>Upsss!!! First name or last name was wrong!!!</b></p>';
                            if (isset($_GET["sensor"]))
                                 echo '<p style="text-align: center;color: red;font-size: 1.5rem;"><b>The sensor\'s code is not valid!!!</b></p>';
                             ?>
                        </form>
                </div>
                <footer class="modal__footer">
                </footer>
            </section>
        </div>
    </div>
</body>

</html>

