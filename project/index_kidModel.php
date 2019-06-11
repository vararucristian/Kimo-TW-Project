<?php
class indexKidModel{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;

    public function __construct(){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
    }

    public function getPicture($id){
        $sql = "SELECT picture FROM children where id=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($picture);
        $stmt->fetch();    
        return $picture;
    }

    public function getFirstName($id){
        $sql = "SELECT first_name FROM children where id=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->fetch();    
        return $name;
    }

    public function getLastName($id){
        $sql = "SELECT last_name FROM children where id=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->fetch();    
        return $name;
    }

    public function getGenre($id){
        $sql = "SELECT genre FROM children where id=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($genre);
        $stmt->fetch();    
        return $genre;
    }


}


?>