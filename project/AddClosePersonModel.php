<?php
class AddClosePersonModel{

    function checkFields(){
        if(!isset($_POST["fname"]) or !isset($_POST["lname"]) or !isset($_POST["longitude"]) or !isset($_POST["latitude"])  )
            throw new Exception("no Data");    
            if($_POST["fname"]==null or $_POST["lname"]==null or $_POST["longitude"]=null or $_POST["latitude"]==null  )
            throw new Exception("no Data");
    }

}


?>