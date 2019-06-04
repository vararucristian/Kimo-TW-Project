<?php
require_once "index_kidController.php";
class indexKidFriendsModel{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;

    public function __construct(){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
    }

    public function getfriends($id){
        $sql = "SELECT id_kid2 FROM friends where id_kid1=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
         $friends=array();
         $index=0;
         $stmt->bind_result($friendId);
         while($stmt->fetch()){
            $friends[$index]=new indexKidController($friendId);
            $index++;
            $stmt->bind_result($friendId);
        }    
         return $friends;
    }


}
?>