<?php

include "messageModel.php";
include "checkSession.php";

class messageController{

    // public $friendID;
    private $idAccount;
    // private $model;
    
    public function __construct(){
        session_start();
        checkToken();
        $this->idAccount = $_SESSION['sessionID'];
        // $this->model = new messsageModel();
    }

}

$messageController = new messageController();
include "messageView.php";

?>