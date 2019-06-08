<?php
class messageModel{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;

    public function __construct(){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
    }

    public function getPicture($id){
        $sql = "select picture from children where id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($picture);
        $stmt->fetch();    
        return $picture;
    }

    public function getParentFirstName($id){
        $sql = "select fname from accounts join account_childs on accounts.id = account_childs.id_account where id_child=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->fetch();    
        return $name;
    }

    public function getParentLastName($id){
        $sql = "select lname from accounts join account_childs on accounts.id = account_childs.id_account where id_child=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->fetch();    
        return $name;
    }
}

?>