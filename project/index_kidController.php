<?php
include "checkSession.php";
include "kidController.php";
try{
session_start();
checkToken();
if (!isset($_SESSION['childId'])){
    if(!isset($_POST["childId"]))
        header('location:index.php');
   
}
if(isset($_POST["childId"]))
    $_SESSION['childId']=$_POST["childId"];
}
catch(Exception $e){
}
include "PositionController.php";
include "AddFriendsController.php";
include "index_kidFriendsController.php";
include "ViewClosePersonsController.php";


$id=$_SESSION['childId'];
$kid=new indexKidController($id);
$friendsController=new indexKidFriendsController($id);
$closePersonsController=new ViewClosePersonsController($id);



?>