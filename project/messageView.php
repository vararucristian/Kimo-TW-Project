<?php
include "messageController.php";
include "kidController.php";
include "ControllerNotifications.php";
?>
<!DOCTYPE html>
<?php

?>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="images/images.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/Message.css?v=<?php echo time(); ?>">
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
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Messages</a>
                <ul id="notification">
                   
                </ul>
            </li>
            <li><a href="index_profile.php">My Account</a></li>
            <li><form method="POST" action="logout.php" class="logout"><input  class="button" type="submit" name="logout" value="Log Out" ></form></li>
        </ul>
        <nav>
            <ul>
                <li id="menu">
                    <img src="images/menu-icon.png" alt="menu">
                    <ul id="menu2">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Messages</a>
                            <ul>
                                <li>Notification 1</li>
                                <li>Notification 2</li>
                                <li>Notification 3</li>
                                <li>Notification 4</li>
                                <li>Notification 5</li>
                            </ul>
                        </li>
                        <li><a href="index_profile.php">My Account</a></li>
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
            <img src="<?php echo $messageController->getPicture($messageController->getID()); ?>" alt="kid">
            <div>
                <h1>Hi, friend! This is my parent's name</h1>
                <p><?php echo $messageController->getParentFirstName($messageController->getID()) ?></p>
                <p><?php echo $messageController->getParentLastName($messageController->getID()) ?></p>
            </div>
        </div>
        <div id="chat" action="messageView.php">
            <form method="POST" action="messageView.php">
                <h1>Here you can send a message to my parent</h1>
                <div>
                    <textarea placeholder="Type message.." name="msg" required></textarea>
                    <button type="submit" name="Send"><b>Send</b></button>
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
        // xmlhttp1 = new XMLHttpRequest();
        // xmlhttp1.onreadystatechange = function() {
        //     if ( this.status == 200) {
        //         console.log("Seen message!");
        //     }
        // }
        // xmlhttp1.open("PUT", "GetMessages.php?id="+id, true);
        // xmlhttp1.send();
        var xhr = new XMLHttpRequest();
        xhr.open("PUT", "GetMessages.php?id="+id, true);
        // xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
        // xhr.onload = function () {
        //     // var users = JSON.parse(xhr.responseText);
        //     if ( xhr.status == "200") {
        //         console.table("Seen message!");
        //     } else {
        //        return;
        //     }
        // }
        xhr.send(null);
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
            function seenMessage(id){
        // xmlhttp1 = new XMLHttpRequest();
        // xmlhttp1.onreadystatechange = function() {
        //     if ( this.status == 200) {
        //         console.log("Seen message!");
        //     }
        // }
        // xmlhttp1.open("PUT", "GetMessages.php?id="+id, true);
        // xmlhttp1.send();
        var xhr = new XMLHttpRequest();
        xhr.open("PUT", "GetMessages.php?id="+id, true);
        xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
        // xhr.onload = function () {
        //     // var users = JSON.parse(xhr.responseText);
        //     if ( xhr.status == "200") {
        //         console.table("Seen message!");
        //     } else {
        //        return;
        //     }
        // }
        xhr.send();
    }
            while(i < count){
                
                var node = document.createElement("P");
                var mesaj = document.createTextNode(json[i].message);
                node.appendChild(mesaj);
                var node11 = document.createElement("INPUT");
                var att = document.createAttribute("value"); att.value = json[i].messageId; node11.setAttributeNode(att);
                var att1 = document.createAttribute("type"); att1.value = "hidden"; node11.setAttributeNode(att1);
                var att2 = document.createAttribute("name"); att2.value = "messageId"; node11.setAttributeNode(att2);
                var node1 = document.createElement("FORM"); 
                var att = document.createAttribute("id"); att.value = "message_modal"; node1.setAttributeNode(att);
                var att1 = document.createAttribute("action"); att1.value = "messageController.php"; node1.setAttributeNode(att1);
                var att2 = document.createAttribute("method"); att2.value = "POST"; node1.setAttributeNode(att2);
                node1.appendChild(node); node1.appendChild(node11);
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
                var att1 = document.createAttribute("href"); att1.value = "#"; node5.setAttributeNode(att1);
                var att10 = document.createAttribute("id"); att10.value = "closeModal"+i; node5.setAttributeNode(att10);
                // var att2 = document.createAttribute("onclick"); att2.value = document.getElementById("message_modal").submit(); node5.setAttributeNode(att2);
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
                
               
                // var el = document.getElementsByClassName("modal__close");
                // var att2 = document.createAttribute("onclick"); att2.value = seenMessage(json[i].messageId); el[0].setAttributeNode(att2);

                i++;
            }
            console.log("new message!");
                }
     };
    xmlhttp.open("GET", "GetMessages.php", true);
    xmlhttp.send();},1000)
</script>



<!-- <div class="modal4" id="modal4">
    <div class="modal__dialog">
      <section class="modal__content">
        <header class="modal__header">
          <h2 class="modal__title">Emergency situation!!!</h2>
          <a href="#" class="modal__close">X</a>
        </header>
        <div class="modal__body">
          <p class="modal__text">
            <form id="message_modal">
              <p>Your kid KidName is closed to a animal that might be dangerous!</p>
            </form>
        </div>
        
        <footer class="modal__footer">
        </footer>
      </section>
    </div>
  </div> -->
<?php
    // echo $_POST['messageId'];
?>

</body>

</html>
