<?php
include "checkSession.php";
include "kidController.php";
include "index_kidFriendsController.php";
include "ViewClosePersonsController.php";
try{
session_start();
checkToken();
}
catch(Exception $e){
}

if (!isset($_SESSION['childId'])){
    if(!isset($_POST["childId"]))
        header('location:homeController.php');
   
}
if(isset($_POST["childId"]))
    $_SESSION['childId']=$_POST["childId"];

$id=$_SESSION['childId'];
$kid=new indexKidController($id);
$friendsController=new indexKidFriendsController($id);
$closePersonsController=new ViewClosePersonsController($id);
include "PositionController.php";
include "AddFriendsController.php";
include "index_kidView.php";

?>