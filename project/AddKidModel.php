<?php
class addKidModel{
    public $incorrectName=false;
    private $fname;
    private $lname;
    private $sensor_code;
    private $gender;
    private $image;
    public function checkData($fname,$lname, $code, $gender )
    {
        $pattern="/\A[A-Z][a-z]*\z/"; 
        if(!preg_match($pattern,$fname )|| !preg_match($pattern,$lname))
            return true;
        return false;
    }
}

?>
