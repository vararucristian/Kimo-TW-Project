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
        $kidImage="kidsPictures/".$id."."."jpg";
        $addStmt = $this->connection -> prepare('INSERT INTO children ( first_name, last_name,genre,picture) VALUES(?,?,?,?);');
        $addStmt -> bind_param('ssss',  $fname,$lname,$gender,$kidImage);
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
        $kidImage='F:/TW/xampp\htdocs/Kimo-TW-Project/project/kidsPictures/'.$id.'.'.'jpg';
        $this->addImage($gender,$kidImage);
    }

    private function addImage($gender,$kidImage){
        if($gender=="Boy")
            $copied=copy('images/picture145716079994.jpg',$kidImage);
        else
            $copied=copy('images/clipart2755860.png',$kidImage);

    }

    public function addSensor($code){
        $data=array("id"=>$code,
                    "latitude"=>"47.56",
                    "longitude"=>"27.56",
                    "normal_condition"=>"1",
                    "animal_close"=>"0",
                    "accident"=>"0",
                    "collision"=>"0",
                    "another_person"=>"0",
                    );
        $data_string = json_encode($data);            
        $ch = curl_init('http://localhost/Kimo-TW-Project/project/sensorAPI.php');    
        curl_setopt($ch,CURLOPT_POST,true);                 
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'POST');                                                                                                                   
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);   
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                            
        $result=curl_exec($ch);
        curl_close($ch);
        echo $result;


    }

}

?>
