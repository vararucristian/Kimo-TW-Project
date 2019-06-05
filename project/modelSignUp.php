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

    function verify_name($fname,$lname)
    {
        $pattern="/\A[A-Z][a-z]*\z/"; 
        if(!preg_match($pattern,$fname )|| !preg_match($pattern,$lname))
            return true;
        return false;
    }

    function verify_coordinates($latitude, $longitude)
    {
        $pattern="/[^0-9.]/";
        if(preg_match($pattern,$longitude )|| preg_match($pattern,$latitude ))
            return true;
        return false;
    }

    function verify_password_length($password)
    {
        if(strlen($password)<6)
            return true;
        return false;
    }

    function verify_password_strength($password)
    {
        $pattern="/([a-z]*[^a-z]+[a-z]*)+/";
        if(!preg_match($pattern,$password ))
            return true;
        return false;
    }
    function verify_password_confirmation($password1,$password2)
    {
        if(!($password1=== $password2))
            return true;
        return false;
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
        $sql = $this->connection->prepare("select * from locations where latitude=? and longitude=?");
        $sql->bind_param('dd', $latitude,$longitude);
        $sql->execute() ;
        $result=$sql->get_result();
        if($result->num_rows <= 0)
        {
            $locationStmt = $this->connection -> prepare('INSERT INTO locations (latitude, longitude ) VALUES(?,?);');
            $locationStmt -> bind_param('dd',$latitude,$longitude );
            $success = $locationStmt -> execute();
            $locationStmt -> close();
        }
        $sql = $this->connection->prepare("select id from locations where latitude=? and longitude=?");
        $sql->bind_param('dd', $latitude,$longitude);
        $sql->execute() ;
        $result=$sql->get_result();
        $row=$result->fetch_assoc();
         $id_location= $row['id'];
        $sql = $this->connection->prepare("select id from accounts where username=?");
        $sql->bind_param('s', $username);
        $sql->execute() ;
        $result=$sql->get_result();
        $row=$result->fetch_assoc();
         $id_user=$row['id'];
         $locationStmt = $this->connection -> prepare('INSERT INTO user_locations (id_user, id_location ) VALUES(?,?);');
        $locationStmt -> bind_param('ii',$id_user,$id_location );
        $success = $locationStmt -> execute();
        $locationStmt -> close();
    }
}
?>