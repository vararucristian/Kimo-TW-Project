
<!DOCTYPE html>
<?php

include "index_kidController.php";

include "ControllerNotifications.php";
?>
<html>

<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/images.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="styles/style_kid.css">
  <link rel="stylesheet" type="text/css" href="styles/index_profile.css">
  <title>My kid</title>
</head>

<style>
    .button {
    border:none;
    background: none;
    text-align: center;
    font-family: inherit;
    font-weight: bold;
    color:black;
    text-decoration: none;
    display: block; padding: 5% 5%;
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

.button1 {
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

.button1:hover{
    color: #fff;
}

@media screen and (max-width: 760px){
    .button1{
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
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Messages</a>
                <ul id="notification">
                   
                </ul>
            </li>
      </li>
      <li><a href="index_profile.php">My Account</a></li>
      <li><form method="POST" action="logout.php"><input  class="button1" type="submit" name="logout" value="Log Out" ></form></li>
    </ul>
    <nav>
      <ul>
        <li id="menu">
          <img src="images/menu-icon.png" alt="menu">
          <ul id="menu2">
            <li><a href="index.php">Home</a></li>
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
            <li><form method="POST" action="logout.php"><input  class="button1" type="submit" name="logout" value="Log Out" ></form></li>
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
          <?php
              foreach ($closePersonsController->getClosePersons() as $closePersons)
                  echo "<li>" .$closePersons->first_name." ".$closePersons->last_name."</a></li>";
            ?> 
            <li><a href="#modal" class="modal-trigger">Add new person</a></li>
          </ul>
        </div>
    
      
        <div class="person">Interactions with other kids
          <ul>
            <?php
              foreach ($friendsController->friends as $friend){
                  echo "<form method=\"POST\" action=\"messageView.php\"><input class=\"button\" name=\"choose\" type=\"submit\" value =".$friend->first_name."&nbsp;&nbsp;".$friend->last_name.">";
                  echo "<input type=\"hidden\" name=\"friendId\" value=\"".$friend->getID()."\" />";
                  echo "<input type=\"hidden\" name=\"childId\" value=\"".$id."\" /></form>";
                  // $_SESSION['friendID'] = $friend->getID();
              }
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
      <div class="map">
      <?php
      echo '<div class="mapouter" id="mapouter"> <div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" 
      src="https://maps.google.com/maps?q='.$position["latitude"].'%20'.$position["longitude"].'&t=&z=13&ie=UTF8&iwloc=&output=embed" 
      frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div> <style> .mapouter { position: relative; text-align: right; height: 100%; width:100%; } 
        .gmap_canvas { overflow: hidden; background: none !important; height: 500px; w1idth: 100%; } </style></div>'
      
      ?>
      </div>
      <script type="application/javascript">
        var data="";
        window.setInterval(function(){ xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(data===this.responseText)
                    return ;
                data=this.responseText;    
                var json=JSON.parse(this.responseText);
                document.getElementById("mapouter").innerHTML ='<div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q='+json.latitude+'%20'+json.longitude+'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div> <style> .mapouter { position: relative; text-align: right; height: 100%; width:100%; }.gmap_canvas { overflow: hidden; background: none !important; height: 500px; w1idth: 100%; } </style>';
                console.log("am facut update la harta!");
                   }
        };
        xmlhttp.open("GET", "http://localhost/Kimo-TW-Project/project/sensorApi.php?id="+<?php echo $_SESSION['childId']?>, true);
        xmlhttp.send();},1000)
      </script>
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
          <a href="index_kidView.php" class="modal__close" >X</a>
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
            <a href="index_kidView.php" class="modal__close" >X</a>
          </header>
          <div class="modal__body">
            <p class="modal__text">
              <form action="AddClosePersonControlller.php" method="POST" id="addPerson">
                Firstname
                <input type="text" name="fname" placeholder="FirstName">
                Lastname
                <input type="text" name="lname" placeholder="LastName">
                <img src="images/descărcare(2).png" alt="location" width=5%>
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
    <div class="modal3" id="modal3">
    <div class="modal__dialog">
      <section class="modal__content">
        <header class="modal__header">
          <h2 class="modal__title">Emergency situation!!!</h2>
          <a href="" class="modal__close">X</a>
        </header>
        <div class="modal__body">
          <p id="situation" class="modal__text">
              Emergency situation!!!
        </div>
        <footer class="modal__footer">
        </footer>
      </section>
    </div>
  </div>
</body>

</html>