<?php
include "index_KidModel.php";
class indexKidController{

public $kidModel;

public function __construct(){
    $this->kidModel=new indexKidModel();
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

}

?>