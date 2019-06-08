<?php
include_once 'loginModel.php';
include_once 'checkSession.php';

session_start();
checkLogedIn();

if(isset($_POST['login'])){
    if($_POST['username'] !== '' and $_POST['password'] !== ''){
        $user = login($_POST['username'], $_POST['password']);
        $id=getID($user);
        if($user !== NULL){
            genToken($id);     
            header('Location: homeController.php');
            
            $_SESSION['sessionID'] = getID($user);
        }
        else{
            $logat = false;
        }
    }
}



include 'index_login.php';
?>

