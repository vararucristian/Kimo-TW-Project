<?php
class modelSignUp{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;
    public function __construct(){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
    }
    public function verify_username($username)
    {
        $sql = $this->connection->prepare("select * from accounts where username=?");
        $sql->bind_param('s', $username);
        $sql->execute() ;
        $result=$sql->get_result();
        if($result->num_rows > 0)
            return 0;
        return 1;
    }
    function add_user($fname, $lname, $username,$password1,$phone,$email,$gender,$latitude, $longitude)
    {
        $hashedPassword = md5($password1);
        $registerStmt = $this->connection -> prepare('INSERT INTO accounts (fname, lname, username, password, phone, email, genre) VALUES(?,?,?,?,?,?,?);');
        $registerStmt -> bind_param('sssssss',$fname,$lname ,$username, $hashedPassword, $phone, $email,$gender);
        $success = $registerStmt -> execute();
        $registerStmt -> close();
        $locationStmt = $this->connection -> prepare('INSERT INTO locations (latitude, longitude ) VALUES(?,?);');
        $locationStmt -> bind_param('dd',$latitude,$longitude );
        $success = $locationStmt -> execute();
        $locationStmt -> close();
        
        
    }

}
?>