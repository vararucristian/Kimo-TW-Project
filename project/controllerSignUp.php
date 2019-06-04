<?php
include 'SignUp.html';
include 'modelSignUp.php';
if(isset($_POST['butonSignUp']))
    if($_POST['fname']=="" || $_POST['lname']=="")
        echo "Un parametru nu a fost setat!!!";
        else echo "da";
?>