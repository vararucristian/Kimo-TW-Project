<?php
include "SaveDataModel.php";

include "checkSession.php";
class SaveData{
    private $model;
    public $correctfName= true;
    public $correctCoordinates=true;
    public $correctlName= true;
    public $incompleteData=false;
    public $id;
    function __construct(){
        session_start();
        checkToken();
        $this->model = new SaveDataModel();
        $this->id=$_SESSION['sessionID'];
        if(!($_POST["fname"]==""))
        {
        if($this->model->checkName($_POST["fname"] )==true)
                $this->correctfName=false;
        if( $this->correctfName==true)
            $this->model->updateFname($_POST["fname"], $this->id);
        }
        
        if(!($_POST["lname"]==""))
        {
        if($this->model->checkName($_POST["lname"] )==true)
                    $this->correctlName=false;
        if( $this->correctlName==true)
                $this->model->updateLname($_POST["lname"], $this->id);
        }

        if(!($_POST["email"]==""))
        {
                $this->model->updateEmail($_POST["email"], $this->id);
        }

        if(!($_POST["phone"]==""))
        {
                $this->model->updatePhone($_POST["phone"], $this->id);
        }
        if(!($_POST["longitude"]=="") and !($_POST["latitude"]==""))
        {
        if($this->model->verify_coordinates($_POST["latitude"],$_POST["longitude"])==true)
                $this->correctCoordinates=false;
        if( $this->correctCoordinates==true)
           $this->model->updateLocation($_POST["latitude"],$_POST["longitude"], $this->id);
        }
        if(($_POST["longitude"]=="" and !( $_POST["latitude"]=="")) or (!($_POST["longitude"]=="") and $_POST["latitude"]==""))
            $this->incompleteData=true;
        

    }
    

}
$data=new SaveData();
if ($data->correctfName==false)
{   
header("location:profileController.php?fname=false#modal");
}
else
if ($data->correctlName==false)
{   
header("location:profileController.php?lname=false#modal");
}
else
if ($data->correctCoordinates==false)
{   
header("location:profileController.php?coord=false#modal");
}
else
if ($data->incompleteData==true)
{   
header("location:profileController.php?compl=false#modal");
}
else
header( "location: profileController.php");
?>