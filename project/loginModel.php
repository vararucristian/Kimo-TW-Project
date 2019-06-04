<?php

$conn = new mysqli('localhost', 'root', '', 'project');

if(mysqli_connect_errno()){
    die('Nu s-a putut realiza conexiunea');
}


function login($user, $pass){
    GLOBAL $conn;

    $sql = 'select * from accounts where username = ? and password = ?';
    $rezultat = $conn->prepare($sql);
    $rezultat->bind_param('ss', $user, $pass);
    $rezultat->execute();
    $rez = $rezultat->get_result();
    $rezultat->close();

    if($rez->num_rows === 1){
        return new User($user, $pass);
    }
    else{
        return NULL;
    }
}


class User{
    public $username;
    public $password;

    function _construct($username, $password){
        $this -> username = $username;
        $this -> password = $password;
    }
}
?>