<?php
class PositionModel{
    private $url;
function __construct($id){
    $this->url="localhost/Kimo-TW-Project/project/sensorApi.php?id=".$id;
}
function getPosition(){
    $c = curl_init ();
curl_setopt ($c, CURLOPT_URL, $this->url);              
curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false); 
$res = curl_exec ($c);                                   
curl_close ($c);
$sensorData=json_decode($res,true);
return $sensorData;


}


}


?>