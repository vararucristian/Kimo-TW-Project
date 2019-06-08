<?php

include "AddKidModel.php";
class AddKid{
    private $model;
    public $correctName= true;
    public $checkData;
    function __construct(){
        $this->model = new addKidModel();
        $this->checkData=true;
        if($_POST["fname"]=="" or $_POST["lname"]=="" or $_POST["code"]=="" or $_POST["gender"]==""  )
            $this->checkData=false;
        // if ($this->checkData==true)
        // {
        //     if($this->model->checkData($_POST["fname"],$_POST["lname"], $_POST["code"], $_POST["gender"])==true )
        //         $this->correctName=false;
        // }

    }
    

}
$kid=new AddKid();
if ($kid->checkData==false )
        {   
            header("location:homeController.php?check=false#modal2");
        }

// else
// if ($kid->correctName==false)
//     {   
//         header("location:homeController.php?name=false#modal2");
//     }
include "homeController.php";
?>