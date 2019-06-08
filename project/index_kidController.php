<?php
include "kidController.php";
include "index_kidFriendsController.php";
$id=$_POST["childId"];
$kid=new indexKidController($id);
$friendsController=new indexKidFriendsController($id);

include "index_kidView.php"

?>