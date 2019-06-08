<?php
include "homeModel.php";
include "checkSession.php";
class homeController{
public $childs;
private $id;
public function __construct(){
    session_start();
    checkToken();
    $this->id= $_SESSION['sessionID'];
    $this->homeModel=new homeModel();
    $this->childs=$this->getChilds();
}
public function getChilds(){
   return $this->homeModel->getchilds($this->id);
}
}

?>