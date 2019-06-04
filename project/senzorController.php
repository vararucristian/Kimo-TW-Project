<?php
include "senzor.html";
include "senzorModel.php";
class sensorController{
    private $model;

    public function __construct(){
    $model = new sensorModel();    
    if (isset($_GET["id"]))
    if ($_GET["id"]!="")
        $model->call_service();
    }

}

$sensorController=new sensorController();

?>