<?php
class AddClosePersonModel{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;

    public function __construct(){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
    }

    function checkFields(){
        if(!isset($_POST["fname"]) or !isset($_POST["lname"]) or !isset($_POST["longitude"]) or !isset($_POST["latitude"])  )
            throw new Exception("no Data");    
            if($_POST["fname"]==null or $_POST["lname"]==null or $_POST["longitude"]==null or $_POST["latitude"]==null  )
            throw new Exception("no Data");
    }


    function addPerson($childId,$fname, $lname, $longitude, $latitude){
        $sql="select max(id) from close_persons";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->execute();
        $rez = $rezultat->get_result();
        $rez=$rez->fetch_assoc();
        $rezultat->close();
        $personId=$rez["max(id)"]+1;
        $this->addClosePerson($fname,$lname,$personId);
        $this->addLocation($longitude,$latitude);
        $this->addPersonLocation($personId,$longitude,$latitude);
        $this->addChildPerson($childId,$personId);
        
    }
    private function addClosePerson($fname,$lname,$id){
        $sql="insert into close_persons(id,first_name,last_name) values(?,?,?)";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->bind_param('iss',$id,$fname,$lname);
        $rezultat->execute();
        $rezultat->close();
    }

    private function addLocation($longitude,$latitude){
        $sql="select max(id) from locations";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->execute();
        $rez = $rezultat->get_result();
        $rez=$rez->fetch_assoc();
        $locationId=$rez["max(id)"]+1;
        $rezultat->close();
        $sql="insert into locations(id,latitude,longitude) values(?,?,?)";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->bind_param('idd',$locationId,floatval($latitude),floatval($longitude));
        $rezultat->execute();
        $rezultat->close();
    }

    private function addPersonLocation($personId,$longitude,$latitude){
        $sql="select id from locations where latitude=? and longitude=?";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->bind_param('dd',$latitude,$longitude);
        $rezultat->execute();
        $rez = $rezultat->get_result();
        $rez=$rez->fetch_assoc();
        $locationId=$rez["id"];
        $rezultat->close();
        $sql="insert into close_person_location(id_close_person,id_location) values(?,?)";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->bind_param('ii',$personId,$locationId);
        $rezultat->execute();
        $rezultat->close();

    }
    private function addChildPerson($childId,$personId){

        $sql="insert into child_close_persons(id_child,id_close_person) values(?,?)";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->bind_param('ii',$childId,$personId);
        $rezultat->execute();
        $rezultat->close();

    }
}


?>