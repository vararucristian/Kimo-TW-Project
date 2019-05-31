<?php
include "senzor.html";
function call_service(){
    $id=$_GET["id"];
    $params=array("latitude","longitude");
    foreach($params as $param){
        if(isset($_GET[$param]))
            if($_GET[$param]!="")
                $data[$param]=$_GET[$param]; 
    }
    $params=array("normal_condition","animal_close","accident","collision","another_person");

    foreach($params as $param){
        if(isset($_GET[$param])){
            $data[$param]="1";}
        else
        $data[$param]="0";    
    }                                                                  
    $data_string = json_encode($data);
    $ch = curl_init('http://localhost/project/sensorAPI.php?id='.$id);    
    curl_setopt($ch,CURLOPT_POST,true);                 
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,' ');                                                                                                                   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                            
    $result=curl_exec($ch);
    curl_close($ch);
}




if (isset($_GET["id"]))
    if ($_GET["id"]!="")
        call_service();
?>