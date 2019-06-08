<?php
class Person{
    public $first_name;
    public $last_name;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;

    public function __construct($id){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
        $sql="select * from close_persons where id=?";
        $rezultat = $this->connection->prepare($sql);
        $rezultat->bind_param('i',$id);
        $rezultat->execute();
        $rez = $rezultat->get_result();
        $rez=$rez->fetch_assoc();
        $this->first_name=$rez["first_name"];
        $this->last_name=$rez["last_name"];
        $rezultat->close();
    }



}


?>