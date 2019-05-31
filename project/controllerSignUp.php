<?php
include 'SignUp.html';
include 'modelSignUp.php';
if(isset($_POST['butonSignUp']))
    if(!isset($_POST['fname']) || !isset($_POST['lname']))
        echo "Un parametru nu a fost setat!!!";
?>