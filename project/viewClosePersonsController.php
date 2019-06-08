<?php
include "ViewClosePersonsModel.php";
class ViewClosePersonsController{
    private $id;
    public $closePersons;

    function __construct($id){
        $this->id=$id;
        $this->closePersons=new ViewClosePersonsModel();
    }

    public function getClosePersons(){
        return $this->closePersons->getClosePersons($this->id);
     }

}


?>