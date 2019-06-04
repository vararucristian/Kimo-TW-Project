<?php
include "index_KidFriendsModel.php";
class indexKidFriendsController{
public $friends;
private $friendsModel;
private $id;
public function __construct($id){
    $this->id=$id;
    $this->friendsModel=new indexKidFriendsModel();
    $this->friends=$this->getFriends();
}
public function getfriends(){
   return $this->friendsModel->getfriends($this->id);
}
}
?>