<?php
include "kidController.php";
include "index_kidFriendsController.php";
include "ViewClosePersonsController.php";
session_start();
if (!isset($_SESSION['childId']))
   $_SESSION['childId']=$_POST["childId"];
$id=$_SESSION['childId'];
$kid=new indexKidController($id);
$friendsController=new indexKidFriendsController($id);
$closePersonsController=new ViewClosePersonsController($id);
include "index_kidView.php"

?>