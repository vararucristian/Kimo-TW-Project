<?php
include "index_KidModel.php";
class indexKidController{

public $kidModel;
private $id;
public $picture;
public $first_name;
public $last_name;
public $genre;
public function __construct($id){
    $this->kidModel=new indexKidModel();
    $this->id=$id; 
    $this->picture=$this->getPicture($this->id);
    $this->first_name=$this->getFirstName($this->id);
    $this->last_name=$this->getLastName($this->id);
    $this->last_genre=$this->getgenre($this->id);
}

public function getPicture($id){
    return $this->kidModel->getPicture($id);
}

public function getFirstName($id){
    return $this->kidModel->getFirstName($id);
}

public function getLastName($id){
    return $this->kidModel->getLastName($id);
}

public function getGenre($id){
    return $this->kidModel->getGenre($id);
}
}
include "index_kidFriendsController.php";
$id=2;
$kid=new indexKidController($id);
$friendsController=new indexKidFriendsController($id);

include "index_kidView.php"

?>