
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
  <link rel="stylesheet" type="text/css" href="styles/style_kid.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="styles/index_profile.css?v=<?php echo time(); ?>">
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
        var data1="";
        window.setInterval(function(){ xmlhttp1 = new XMLHttpRequest();
        xmlhttp1.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(data1===this.responseText)
                    return ;
                data1=this.responseText;    
                var json=JSON.parse(this.responseText);
                document.getElementById("mapouter").innerHTML ='<div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q='+json.latitude+'%20'+json.longitude+'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div> <style> .mapouter { position: relative; text-align: right; height: 100%; width:100%; }.gmap_canvas { overflow: hidden; background: none !important; height: 500px; w1idth: 100%; } </style>';
                console.log("am facut update la harta!");
                   }
        };
        xmlhttp1.open("GET", "http://localhost/Kimo-TW-Project/project/sensorApi.php?id="+<?php echo $_SESSION['childId']?>, true);
        xmlhttp1.send();},1000)
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

  <script type="application/javascript">

    var data="";

    function seenMessage(id){
        
        var xhr = new XMLHttpRequest();
        // xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
        xhr.onload = function () {
            
            if ( xhr.status == "200") {
                // var users = JSON.parse(xhr.responseText);
                console.table("Seen message!");
                window.location.href = "#";
                location.reload();
            } else {
               return;
            }
        }
        xhr.open("PUT", "GetMessages.php?id="+id, true);
        xhr.send();
        console.log(id);
        
    }

    window.setInterval(function(){ xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(data===this.responseText)
                return ;
            data=this.responseText;    
            var json=JSON.parse(this.responseText);
            var count = Object.keys(json).length;
            var i = 0;
            
            while(i < count){
                
                var node = document.createElement("P");
                var mesaj = document.createTextNode(json[i].message);
                node.appendChild(mesaj);
                var node12 = document.createElement("form");
                var att = document.createAttribute("method"); att.value = "POST"; node12.setAttributeNode(att);
                var att1 = document.createAttribute("action"); att1.value = "messageView.php"; node12.setAttributeNode(att1);
                var node11 = document.createElement("INPUT");
                var att = document.createAttribute("value"); att.value = json[i].childId; node11.setAttributeNode(att);
                var att1 = document.createAttribute("type"); att1.value = "hidden"; node11.setAttributeNode(att1);
                var att2 = document.createAttribute("name"); att2.value = "friendId"; node11.setAttributeNode(att2);
                node12.appendChild(node11);
                var node14 = document.createElement("INPUT");
                var att = document.createAttribute("value"); att.value = <?php echo $_SESSION['childId']?>; node14.setAttributeNode(att);
                var att1 = document.createAttribute("type"); att1.value = "hidden"; node14.setAttributeNode(att1);
                var att2 = document.createAttribute("name"); att2.value = "childId"; node14.setAttributeNode(att2);
                node12.appendChild(node14);
                var node13 = document.createElement("INPUT");
                var att = document.createAttribute("value"); att.value = "Replay"; node13.setAttributeNode(att);
                var att1 = document.createAttribute("type"); att1.value = "submit"; node13.setAttributeNode(att1);
                var att2 = document.createAttribute("class"); att2.value = "buttonReplay"; node13.setAttributeNode(att2);
                node12.appendChild(node13);
                var node1 = document.createElement("FORM"); 
                var att = document.createAttribute("id"); att.value = "message_modal"; node1.setAttributeNode(att);
                var att1 = document.createAttribute("action"); att1.value = "messageController.php"; node1.setAttributeNode(att1);
                var att2 = document.createAttribute("method"); att2.value = "POST"; node1.setAttributeNode(att2);
                node1.appendChild(node); node1.appendChild(node12);
                var node2 = document.createElement("P"); 
                var att = document.createAttribute("class"); att.value = "modal__text"; node2.setAttributeNode(att);
                node2.appendChild(node1);
                var node3 = document.createElement("DIV"); 
                var att = document.createAttribute("class"); att.value = "modal__body"; node3.setAttributeNode(att);
                node3.appendChild(node2);
                var node4 = document.createElement("H2"); 
                var att = document.createAttribute("class"); att.value = "modal__title"; node4.setAttributeNode(att);
                var titlu = document.createTextNode(json[i].name+" a timis un mesaj la "+json[i].date);
                node4.appendChild(titlu);
                var node5 = document.createElement("A"); 
                var att = document.createAttribute("class"); att.value = "modal__close"; node5.setAttributeNode(att);
                var att1 = document.createAttribute("href"); att1.value = "javascript:seenMessage("+json[i].messageId+")"; node5.setAttributeNode(att1);
                var att10 = document.createAttribute("id"); att10.value = "closeModal"+i; node5.setAttributeNode(att10);
                var close = document.createTextNode("X");
                node5.appendChild(close);
                var node6 = document.createElement("HEADER"); 
                var att = document.createAttribute("class"); att.value = "modal__header"; node6.setAttributeNode(att);
                node6.appendChild(node4); node6.appendChild(node5);
                var node7 = document.createElement("FOOTER"); 
                var att = document.createAttribute("class"); att.value = "modal__footer"; node7.setAttributeNode(att);
                var node8 = document.createElement("SECTION"); 
                var att = document.createAttribute("class"); att.value = "modal__content"; node8.setAttributeNode(att);
                node8.appendChild(node6); node8.appendChild(node3); node8.appendChild(node7);
                var node9 = document.createElement("DIV"); 
                var att = document.createAttribute("class"); att.value = "modal__dialog"; node9.setAttributeNode(att);
                node9.appendChild(node8);
                var node10 = document.createElement("DIV"); 
                var att = document.createAttribute("class"); att.value = "modal4"; node10.setAttributeNode(att);
                var att1 = document.createAttribute("id"); att1.value = "modal"+i; node10.setAttributeNode(att1);
                node10.appendChild(node9);

                document.body.appendChild(node10); 
                

                var id = json[i].sendBy;
                var node1 = document.createElement("LI");
                var node2 = document.createElement("a");
                var att = document.createAttribute("class");
                att.value = "modal-trigger"; 
                node2.setAttributeNode(att); 
                var att1 = document.createAttribute("href");
                att1.value = "#modal"+i;
                node2.setAttributeNode(att1);
                var textNode = document.createTextNode("New message from "+json[i].name);
                node2.appendChild(textNode);
                node1.appendChild(node2);
                document.getElementById("notification").appendChild(node1);
                

                i++;
            }
            console.log("new message!");
            
                }
     };
    xmlhttp.open("GET", "GetMessages.php", true);
    xmlhttp.send();},1000)
    
</script>

</body>

</html>