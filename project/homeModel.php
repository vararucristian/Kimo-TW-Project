<?php
require_once "homeController.php";
class homeModel{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;

    public function __construct(){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
    }

    public function getchilds($id){
        $sql = "SELECT id_child FROM account_childs where id_account=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
         $childs=array();
         $index=0;
         $stmt->bind_result($childId);
         while($stmt->fetch()){
            $childs[$index]=new indexKidController($childId);
            $index++;
            $stmt->bind_result($childId);
        }    
         return $childs;
    }


}
?>