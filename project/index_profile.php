<!DOCTYPE html>
<?php
include "ProfileController.php";
?>

<html>
<?php
include "ControllerNotifications.php";
?>
<style>
    .button {
    border:none;
    background: none;
    text-align: center;
    font-family: inherit;
    font-size: 15px;
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

<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/images.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="styles/index_profile.css?v=<?php echo time(); ?>">
  <title>My Account</title>
</head>

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
      <li><a href="">My Account</a></li>
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
            <li><a href="#">My Account</a></li>
            <li><form method="POST" action="logout.php"><input  class="button1" type="submit" name="logout" value="Log Out" ></form></li>
          </ul>
        </li>
        <li><img src="images/images.png" alt="logo"></li>
        <li class="KIMO">KIMO APP</li>
      </ul>

    </nav>
  </nav>
  <main>
    <div class="kids">
      <?php
        foreach ($profile->childs as $child)
            {
                echo "<form method=\"POST\" action=\"index_kidView.php\"><img class=\"Kidimage\" src=\"".$child->picture."\" alt=\"kid\"><input class=\"button\" type=\"submit\" value =".$child->first_name."&nbsp;&nbsp;".$child->last_name.">";
                echo "<input type=\"hidden\" name=\"childId\" value=\"".$child->getID()."\" /></form>";
             }
            ?>
            <a href="#modal2" class="modal-trigger">
          <div id="add"><img id="Kidimage" src="images/add.png" alt="add">Add kid</div>
          </a>
    </div>
    <div class="actions">
             <?php
      echo "<div class=\"datas\"><img src=\"images/descărcare(1).png\" alt=\"user\">". $profile->getFirstName() ."&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp".$profile->getLastName()."</div>";
      
      echo "<div class=\"datas\"><img src=\"images/descărcare(2).png\" alt=\"location\">". $profile->getLatitude()."&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp".$profile->getLongitude()."</div>";
    
      echo "<div class=\"datas\"><img src=\"images/simbolo-de-un-telefono-auricular-en-un-circulo_318-50200.jpg\" alt=\"phone\">".$profile->getPhone()."</div>";
      echo "<div class=\"datas\"><img src=\"images/nowy-e-mail-symbol-zarys-okrągłego-przycisku-w-kolorze-czarnym_318-68510.jpg\" alt=\"mail\">".$profile->getEmail()."</div>";
        ?>
      <br>

      <div class="datas"><a href="#modal" class="modal-trigger"><img src="images/pen.png" alt="pen"> Change personal data</a>
      </div>
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
  <div class="modal" id="modal">
    <div class="modal__dialog">
      <section class="modal__content">
        <header class="modal__header">
          <h2 class="modal__title">Change personal data</h2>
          <a href="#" onclick="document.getElementById('form1').submit();"class="modal__save" >Save</a>
                    <a href="index_profile.php" class="modal__close" >X</a>
        </header>
        <div class="modal__body">
          <p class="modal__text">
          <form action="SaveDataController.php"  method="POST" id="form1">
              <img src="images/descărcare(1).png" alt="user"><br>
              First Name:
              <input type="text" name="fname" placeholder="First Name">
              <br> Last Name:
              <input type="text" name="lname" placeholder="Last Name">
              <br>
              <img src="images/descărcare(2).png" alt="location">
              Latitude:
              <input type="text" name="latitude" placeholder="45.943161">
              <br> Longitude:
              <input type="text" name="longitude" placeholder="24.966761">
              <br>
              <img src="images/simbolo-de-un-telefono-auricular-en-un-circulo_318-50200.jpg" alt="phone"><br>
              <input type="tel" name="phone" placeholder="Phone Number">
              <br>
              <img src="images/nowy-e-mail-symbol-zarys-okrągłego-przycisku-w-kolorze-czarnym_318-68510.jpg"
                alt="mail"><br>
              <input type="email" name="email" placeholder="E-mail Adress">
              <br>
              <?php
              if (isset($_GET["fname"]))
               echo '<p style="text-align: center;color: red;font-size: 1.5rem;"><b>Upsss!!! First name was wrong!!!</b></p>';
               else
               if (isset($_GET["lname"]))
               echo '<p style="text-align: center;color: red;font-size: 1.5rem;"><b>Upsss!!! Last name was wrong!!!</b></p>';
               else
               if (isset($_GET["coord"]))
               echo '<p style="text-align: center;color: red;font-size: 1.5rem;"><b>Upsss!!! Latitude or longitude was wrong!!!</b></p>';
               else
               if (isset($_GET["compl"]))
               echo '<p style="text-align: center;color: red;font-size: 1.5rem;"><b>Upsss!!! Both latitude and longitude have to be completed!!!</b></p>';
               ?>
            </form id="form1">
        </div>
        <footer class="modal__footer">
        </footer>
      </section>
    </div>
  </div>
  <div class="modal2" id="modal2">
        <div class="modal__dialog">
            <section class="modal__content">
                <header class="modal__header">
                    <h2 class="modal__title">Add kid</h2>
                    <a href="#" onclick="document.getElementById('form2').submit();"class="modal__save" >Add</a>
                    <a href="index_profile.php" class="modal__close" >X</a>
                </header>
                <div class="modal__body">
                    <p class="modal__text">
                        <form action="AddKidController.php"  method="POST" id="form2" >
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
                                  <input type="hidden" name="location" value="account" />
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