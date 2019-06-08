<?php

include "messageModel.php";
include "checkSession.php";

class messageController{

    private $friendID;
    private $idAccount;
    private $model;
    
    public function __construct(){
        session_start();
        checkToken();
        $this->idAccount = $_SESSION['sessionID'];
        $this->friendID = $_SESSION['friendID'];
        $this->model = new messageModel();
    }


    public function getID(){
        return $this->friendID;
    } 

    public function getPicture($friendID){
        return $this->model->getPicture($friendID);
    }

    public function getParentFirstName($friendID){
        return $this->model->getParentFirstName($friendID);
    }

    public function getParentLastName($friendID){
        return $this->model->getParentLastName($friendID);
    }
}

$messageController = new messageController();
include "messageView.php";

?>