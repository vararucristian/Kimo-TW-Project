<?php
class SaveDataModel{
    public $incorrectName=false;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;
    public function __construct(){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
    }
    public function checkName($name)
    {
        $pattern="/\A[A-Z][a-z]*\z/"; 
        if(!preg_match($pattern,$name ))
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

    public function updateFname($fname,$id)
    {
        $uppStmt = $this->connection -> prepare('update accounts set fname=? where id=?;');
        $uppStmt -> bind_param('si',  $fname,$id );
        $uppStmt -> execute();
        $uppStmt -> close();
    }

    public function updateLname($lname,$id)
    {
        $uppStmt = $this->connection -> prepare('update accounts set lname=? where id=?;');
        $uppStmt -> bind_param('si',  $lname,$id );
        $uppStmt -> execute();
        $uppStmt -> close();
    }

    public function updateEmail($email,$id)
    {
        $uppStmt = $this->connection -> prepare('update accounts set email=? where id=?;');
        $uppStmt -> bind_param('si',  $email,$id );
        $uppStmt -> execute();
        $uppStmt -> close();
    }

    public function updatePhone($phone,$id)
    {
        $uppStmt = $this->connection -> prepare('update accounts set phone=? where id=?;');
        $uppStmt -> bind_param('si',  $phone,$id );
        $uppStmt -> execute();
        $uppStmt -> close();
    }

    public function updateLocation($latitude,$longitude, $id)
    {
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
        $locationStmt = $this->connection -> prepare('Update user_locations set id_location=? where id_user=?;');
        $locationStmt -> bind_param('ii',$id_location,$id );
        $success = $locationStmt -> execute();
        $locationStmt -> close();
    }
 
}

?>
