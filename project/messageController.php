<?php

include "messageModel.php";
include "checkSession.php";

// $_SESSION['childId'] = $_POST['childId'];
class messageController{

    private $friendID;
    private $idAccount;
    private $model;
    
    public function __construct(){
        
        checkToken();
        $this->idAccount = $_SESSION['sessionID'];
        $this->friendID = $_SESSION["friendId"];
        $this->childId = $_SESSION['childId'];
        $this->model = new messageModel();

        if(isset($_POST['Send'])){
            $idParent = $this->getParentID($this->friendID);
            $this->model->addMessage($_POST['msg'], $this->idAccount, $idParent, $this->childId);
        }
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

    public function getParentID($friendID){
        return $this->model->getParentID($friendID);
    }

    public function getMyFirstName($id){
        return $this->model->getMyFirstNam($id);
    }
}

$messageController = new messageController();


?>