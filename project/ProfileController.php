<?php
include "profileModel.php";
include "kidController.php";
include "checkSession.php";

class profileController{

public $profileModel;
private $id;
public $first_name;
public $last_name;
public $genre;
public $latitude;
public $longitude;
public $phone;
public $email;
public $childs;
public function __construct(){
    session_start();
    checkToken();
    $this->id= $_SESSION['sessionID'];
    $this->profileModel=new profileModel();
    $this->childs=$this->getChilds();
    $this->first_name=$this->getFirstName($this->id);
    $this->last_name=$this->getLastName($this->id);
    $this->genre=$this->getGenre($this->id);
    $this->latitude=$this->getLatitude($this->id);
    $this->longitude=$this->getLongitude($this->id);
    $this->phone=$this->getPhone($this->id);
    $this->email=$this->getemail($this->id);
}

public function getChilds(){
    return $this->profileModel->getchilds($this->id);
 }

public function getID(){
    return $this->id;
}

public function getFirstName(){
    return $this->profileModel->getFirstName($this->id);
}

public function getLastName(){
    return $this->profileModel->getLastName($this->id);
}

public function getGenre(){
    return $this->profileModel->getGenre($this->id);
}

public function getLatitude(){
    return $this->profileModel->getLatitude($this->id);
}

public function getLongitude(){
    return $this->profileModel->getLongitude($this->id);
}

public function getPhone(){
    return $this->profileModel->getPhone($this->id);
}

public function getEmail(){
    return $this->profileModel->getEmail($this->id);
}

}
$profile=new profileController();
include "index_profile.php";
?>