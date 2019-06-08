<?php


class AddClosePerson{
    public $checkData=true;
    private $fname;
    private $lname;
    private $longitude;
    private $latitude;

    function __construct(){
        try{
        if(!isset($_POST["fname"]) or !isset($_POST["lname"]) or !isset($_POST["longitude"]) or !isset($_POST["latitude"])  )
            throw new Exception("no Data");    
            if($_POST["fname"]==null or $_POST["lname"]==null or $_POST["longitude"]=null or $_POST["latitude"]==null  )
            throw new Exception("no Data");       
        $this->fname=$_POST["fname"];
        $this->lname=$_POST["lname"];
        $this->longitude=$_POST["longitude"];
        $this->latitude=$_POST["latitude"];
        $this->checkData=true;
    }catch(Exception $e){
        $this->checkData=false;
    }

    }


}
$closePerson=new AddClosePerson();
if ($closePerson->checkData==false)
        {   
            header("location:index_kidController.php?check=false#modal");
        }
include "index_kidController.php";



?>