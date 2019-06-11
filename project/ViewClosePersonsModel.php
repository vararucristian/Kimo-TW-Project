<?php
require_once "Person.php";
class ViewClosePersonsModel{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;

    public function __construct(){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
    }

    public function getClosePersons($id){
        $sql = "SELECT id_close_person FROM child_close_persons where id_child=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
         $closePersons=array();
         $index=0;
         $stmt->bind_result($closePersonId);
         while($stmt->fetch()){
            $closePersons[$index]=new Person($closePersonId);
            $index++;
            $stmt->bind_result($closePersonId);
        } 
       
         return $closePersons;
    }


}
?>