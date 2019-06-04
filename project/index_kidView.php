<?php
include "index_kidController.php";
class indexKidView{
public $kidController;
private $id;
public $picture;
public $first_name;
public $last_name;
public $genre;

public function __construct($id){
  $this->kidController=new indexKidController();
  $this->id=$id;
  $this->picture=$this->kidController->getPicture($id);
  $this->first_name=$this->kidController->getFirstName($id);
  $this->last_name=$this->kidController->getLastName($id);

}

}
$kid=new indexKidView(1);
?>

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
            <li><a href="Message.html"> Friend 1</a></li>
            <li><a href="Message.html"> Friend 2</a></li>
            <li><a href="Message.html"> Friend 3</a></li>
            <li><a href="Message.html"> Friend 4</a></li>
           
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
          <a href="#" class="modal__close">Save</a>
        </header>
        <div class="modal__body">
          <p class="modal__text">
            <form id="form2">
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
            <a href="#" class="modal__close">Save</a>
          </header>
          <div class="modal__body">
            <p class="modal__text">
              <form>
                Firstname and Lastname
                <input type="text" name="name" placeholder="FirstName LastName">
                <img src="images/descărcare(2).png" alt="location">
                Latitude:
                <input type="text" name="latitude" placeholder="45.943161">
                Longitude:
                <input type="text" name="longitudine" placeholder="24.966761">
                
  
              </form>
          </div>
          <footer class="modal__footer">
          </footer>
        </section>
      </div>
    </div>
</body>

</html>