<?php
include "senzor.html";
function call_service(){
    $id=$_GET["id"];
    $data = array("id" => "1", "latitude" => "2");                                                                    
    $data_string = json_encode($data);                                                                                       
    $ch = curl_init('http://localhost/project/sensorAPI.php');    
    curl_setopt($ch,CURLOPT_POST,true);                                                                                                                                    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                            
    $result=curl_exec($ch);
    echo $result;
    curl_close($ch);
}




if (isset($_GET["id"]))
    call_service();
?>