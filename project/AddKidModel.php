<?php
class addKidModel{
    public $incorrectName=false;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;
    public function __construct(){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
    }
    public function checkName($fname,$lname)
    {
        $pattern="/\A[A-Z][a-z]*\z/"; 
        if(!preg_match($pattern,$fname )|| !preg_match($pattern,$lname))
            return true;
        return false;
    }
    public function getIdSensor( $code)
    {
        $sql = $this->connection->prepare("select * from sensor_codes where value=?");
        $sql->bind_param('s', $code );
        $sql->execute() ;
        $result=$sql->get_result();
        $sql->close();
        if($result->num_rows > 0)
        {
        $row=$result->fetch_assoc();
        $id_sensor= $row['id'];
        return $id_sensor;
        }
        else return 0;
    }
    public function checkSensor( $code)
    {
        $id_sensor=$this->getIdSensor($code);
        if($id_sensor==0)
        return true;
        else
        {
        $sql = $this->connection->prepare("select * from kids_sensor where id_sensor=?");
        $sql->bind_param('i', $id_sensor);
        $sql->execute() ;
        $result=$sql->get_result();
        $sql->close();
        if($result->num_rows > 0)
            return true;
        }
        return false;
    }
    public function addKid($fname,$lname, $code, $gender, $id_s)
    {
        $sql="select max(id) from children";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->execute();
        $rez = $rezultat->get_result();
        $rez=$rez->fetch_assoc();
        $rezultat->close();
        
        $id=$rez["max(id)"]+1;
        $addStmt = $this->connection -> prepare('INSERT INTO children ( first_name, last_name,genre) VALUES(?,?,?);');
        $addStmt -> bind_param('sss',  $fname,$lname,$gender );
        $addStmt -> execute();
        $addStmt -> close();
        $addStmt = $this->connection -> prepare('INSERT INTO account_childs (id_account, id_child) VALUES(?,?);');
        $addStmt -> bind_param('ii', $id_s,$id );
        $addStmt -> execute();
        $addStmt -> close();
        $id_sensor=$this->getIdSensor($code);
        $addStmt = $this->connection -> prepare('INSERT INTO kids_sensor (id_kid, id_sensor) VALUES(?,?);');
        $addStmt -> bind_param('ii', $id, $id_sensor);
        $addStmt -> execute();
        $addStmt -> close();
    }
}

?>
