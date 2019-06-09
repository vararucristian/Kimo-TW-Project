<?php
class PositionModel{
    private $url;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;
function __construct($id){
    $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
    $sensorCode=$this->getSensorCode($id);
    $this->url="localhost/Kimo-TW-Project/project/sensorApi.php?id=".$sensorCode;
}

private function getSensorCode($id){
    $sql="select value from sensor_codes join kids_sensor on id_sensor=id where id_kid=?";
    $stmt=$this->connection->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $stmt->bind_result($sensorCode);
    $stmt->fetch();
    return $sensorCode;
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