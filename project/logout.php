<?php

include_once 'checkSession.php';
session_start();

if(isset($_POST['logout'])){
    distroySession();
}

include 'index.php';
?>