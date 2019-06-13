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

    public function getParentID($id){
        $sql = "select accounts.id from accounts join account_childs on accounts.id = account_childs.id_account where id_child=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->fetch();    
        return $name;
    }

    public function getMyFirstName($id){
        $sql = "select fname from accounts where id=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->fetch();    
        return $name;
    }

    public function addMessage($message, $id_sendBy, $id_sendTo, $childId){
        $sql="insert into messages(message,date) values(?,?);";
        $rezultat = $this->connection->prepare($sql);
        $data = date("Y-m-d h:i A");
        $rezultat->bind_param('ss',$message, $data);
        $rezultat->execute();
        $rezultat->close();

        $sql="select id from messages where message = ? and date = ?";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->bind_param('ss',$message, $data);
        $rezultat->execute();
        $rez = $rezultat->get_result();
        $rez=$rez->fetch_assoc();
        $rezultat->close();
        $id_message=$rez['id'];

        $sql="insert into account_messages values(?,?,?,?);";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->bind_param('iiii',$id_message, $id_sendBy, $id_sendTo, $childId);
        $rezultat->execute();
        $rezultat->close();
    }

}

?>