<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/images.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="styles/style_kid.css">
  <link rel="stylesheet" type="text/css" href="styles/index_profile.css">
  <title>My kid</title>
</head>

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
      <li><a href="index_login.html">Log Out</a></li>
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
            <li><a href="index_login.html">Log Out</a></li>
          </ul>
        </li>
        <li><img src="images/images.png" alt="logo"></li>
        <li class="KIMO">KIMO APP</li>
      </ul>

    </nav>
  </nav>
  <main>
    <div class="act">
        <div class="person"> People of interest
          <ul>
            <li>Person 1</li>
            <li>Person 2</li>
            <li>Person 3</li>
            <li>Person 4</li>
            <li><a href="#modal" class="modal-trigger">Add new person</a></li>
          </ul>
        </div>
    
      
        <div class="person">Interactions with other kids
          <ul>
            <?php
              foreach ($friendsController->friends as $friend)
                  echo "<li><a href='Message.html'>" .$friend->first_name." ".$friend->last_name."</a></li>"
            ?>         
          </ul>
        </div>
      
      <a href="#modal2" class="modal-trigger">
        <div id="addph"><img id="Kidimage" src="images/add.png" alt="kid">Change the profile image </div>
      </a>

    </div>
    <div class="profile">
      <div id="dataprofile"><img src="<?php echo $kid->picture; ?>" alt="boy">
        <div id="name"> <?php echo $kid->first_name." ".$kid->last_name; ?></div>
      </div>
      <div class="map"><img src="images/Capture.jpg " alt="map"></div>
    </div>
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
      <img src="images/windows8mailapp.jpg" alt="mail"><a href="mailto:stefania.andries@yahoo.com">stefania.andries</a>
      <img src="images/windows8mailapp.jpg" alt="mail"> <a href="mailto:turcu.anamaria98@gmail.com">turcu.anamaria98</a>
      <img src="images/windows8mailapp.jpg" alt="mail"> <a href="mailto:vararu.cristian@yahoo.com">vararu.cristian98</a>

    </div>
  </footer>

  <div class="modal2" id="modal2">
    <div class="modal__dialog">
      <section class="modal__content">
        <header class="modal__header">
          <h2 class="modal__title">Change the image</h2>
          <a href="#" onclick="document.getElementById('form2').submit();" class="modal__save">Save</a>
          <a href="index_kidController.php" class="modal__close" >X</a>
        </header>
        <div class="modal__body">
          <p class="modal__text">
            <form action="changePhotoController.php" method="POST" id="form2" enctype='multipart/form-data'>
              <div id="text">

                <div id="addphoto">
                  Add a photo with your child:
                  <input type="file" name="photo">
                </div>
              </div>
            </form>
        </div>
        <footer class="modal__footer">
        </footer>
      </section>
    </div>
  </div>
    <div class="modal" id="modal">
      <div class="modal__dialog">
        <section class="modal__content">
          <header class="modal__header">
            <h2 class="modal__title">Add a new person of interest</h2>
            <a href="#" onclick="document.getElementById('addPerson').submit();"class="modal__save" >Save</a>
            <a href="index_kidController.php" class="modal__close" >X</a>
          </header>
          <div class="modal__body">
            <p class="modal__text">
              <form action="AddClosePersonControlller.php" method="POST" id="addPerson">
                Firstname
                <input type="text" name="fname" placeholder="FirstName">
                Lastname
                <input type="text" name="lname" placeholder="LastName">
                <img src="images/descărcare(2).png" alt="location">
                Latitude:
                <input type="text" name="latitude" placeholder="45.943161">
                Longitude:
                <input type="text" name="longitude" placeholder="24.966761">
                <?php
                if(isset($_GET["check"]))
                    echo '<p style="text-align: center;color: red;font-size: 1.5rem;"><b>Upss!! A necessary field has not been completed!!</b></p>';
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