<?php
include "AddKidModel.php";

include "checkSession.php";
class AddKid{
    private $model;
    public $correctName= true;
    public $correctSensor= true;
    public $checkData;
    public $id;
    public $home=true;
    function __construct(){
        session_start();
    checkToken();
        $this->model = new addKidModel();
        $this->id=$_SESSION['sessionID'];
        $this->checkData=true;
        if ($_POST["location"]=="account")
        $this->home=false;
        if($_POST["fname"]=="" or $_POST["lname"]=="" or $_POST["code"]=="" or $_POST["gender"]=="" )
            $this->checkData=false;
        if ($this->checkData==true)
        {
            if($this->model->checkName($_POST["fname"],$_POST["lname"])==true )
                $this->correctName=false;
            if($this->model->checkSensor( $_POST["code"])==true )
                $this->correctSensor=false;
        }
        if($this->checkData==true and $this->correctName==true and $this->correctSensor==true){
        $this->model->addKid($_POST["fname"],$_POST["lname"],$_POST["code"],$_POST["gender"],$this->id);
        $this->model->addSensor($_POST["code"]);    
    }
    }
    

}
$kid=new AddKid();
if($kid->home==true)
{
if ($kid->checkData==false )
        {   
            header("location:homeController.php?check=false#modal2");
        }

else
if ($kid->correctName==false)
    {   
        header("location:homeController.php?name=false#modal2");
    }
    else
if ($kid->correctSensor==false)
    {   
        header("location:homeController.php?sensor=false#modal2");
    }
else
header( "location: homeController.php");
}
else
{
    if ($kid->checkData==false )
            {   
                header("location:profileController.php?check=false#modal2");
            }
    
    else
    if ($kid->correctName==false)
        {   
            header("location:profileController.php?name=false#modal2");
        }
        else
    if ($kid->correctSensor==false)
        {   
            header("location:profileController.php?sensor=false#modal2");
        }
    else
    header( "location: profileController.php");
    }
?>