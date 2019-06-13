<?php
include "checkSession.php";
include "AddClosePersonModel.php";
class AddClosePerson{
    public $checkData=true;
    private $fname;
    private $lname;
    private $longitude;
    private $latitude;
    public $closePersonModel;
    function __construct(){
        $this->closePersonModel =new AddClosePersonModel();
        try{
        $this->closePersonModel->checkFields();  
        $this->fname=$_POST["fname"];
        $this->lname=$_POST["lname"];
        $this->longitude=$_POST["longitude"];
        $this->latitude=$_POST["latitude"];
        $this->checkData=true;
    }catch(Exception $e){
        $this->checkData=false;
    }
    }
    function addPerson(){
        $this->closePersonModel->addPerson($_SESSION['childId'],$this->fname,$this->lname,$this->longitude,$this->latitude);
    }


}
$closePerson=new AddClosePerson();
if ($closePerson->checkData==false)
        {   
            header("location:index_kidView.php?check=false#modal");
        }
session_start();  
$closePerson->addPerson();
header("location:index_kidView.php");



?>