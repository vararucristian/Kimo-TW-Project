<?php
include_once 'loginModel.php';


if(isset($_POST['login'])){
    if($_POST['username'] !== '' and $_POST['password'] !== ''){
        $user = login($_POST['username'], $_POST['password']);
        if($user !== NULL){
            header('Location: index.html');
        }
        else{
            $logat = false;
        }
    }
}

include 'index_login.php';
?>

