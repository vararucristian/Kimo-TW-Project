<?php
include "kidController.php";
include "index_kidFriendsController.php";
session_start();
if (!isset($_SESSION['childId']))
   $_SESSION['childId']=$_POST["childId"];
$id=$_SESSION['childId'];
$kid=new indexKidController($id);
$friendsController=new indexKidFriendsController($id);

include "index_kidView.php"

?>