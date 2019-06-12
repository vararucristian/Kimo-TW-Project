<?php
require_once "profileController.php";
class profileModel{
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


        public function getFirstName($id){
            $sql = "SELECT fname FROM accounts where id=?";
            $stmt=$this->connection->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->bind_result($name);
            $stmt->fetch();    
            return $name;
        }
    
        public function getLastName($id){
            $sql = "SELECT lname FROM accounts where id=?";
            $stmt=$this->connection->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->bind_result($name);
            $stmt->fetch();    
            return $name;
        }
    
        public function getGenre($id){
            $sql = "SELECT fname FROM accounts where id=?";
            $stmt=$this->connection->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->bind_result($genre);
            $stmt->fetch();    
            return $genre;
        }

        public function getLatitude($id){
            $sql = "SELECT l.latitude  FROM accounts a  join user_locations u on a.id=u.id_user join locations l on u.id_location =l.id where a.id=?";
            $stmt=$this->connection->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->bind_result($latitude);
            $stmt->fetch();    
            return $latitude;
        }

        public function getLongitude($id){
            $sql = "SELECT l.longitude  FROM accounts a  join user_locations u on a.id=u.id_user join locations l on u.id_location =l.id where a.id=?";
            $stmt=$this->connection->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->bind_result($genre);
            $stmt->fetch();    
            return $genre;
        }

        public function getPhone($id){
            $sql = "SELECT phone FROM accounts where id=?";
            $stmt=$this->connection->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->bind_result($phone);
            $stmt->fetch();    
            return $phone;
        }

        public function getEmail($id){
            $sql = "SELECT email FROM accounts where id=?";
            $stmt=$this->connection->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->fetch();    
            return $email;
        }
    
    }

?>