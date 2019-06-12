<?php
class AddFriendsModel{
    public $friends;
    private $kidId;
    private $url;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;
    function __construct($kidId,$latitude,$longitude)
    {  
       $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);          
       $this->kidId=$kidId; 
       $this->getNewFriends($latitude,$longitude);
      
    }

    private function getNewFriends($latitude,$longitude){
        $result=array();
        for($i=-0.03;$i<=0.03;$i=$i+0.01)
        for($j=-0.03;$j<=0.03;$j=$j+0.01){ 
            $latitude1=$latitude+$i;
            $longitude1=$longitude+$j;
        $url="localhost/Kimo-TW-Project/project/sensorApi.php?latitude=".$latitude1."&longitude=".$longitude1;

        $c = curl_init ();
        curl_setopt ($c, CURLOPT_URL, $url);              
        curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false); 
        $res = curl_exec ($c);                                   
        curl_close ($c);
        $sensorData=json_decode($res,true);
        $this->addFriends($sensorData);
        }
            
    }
    private function addFriends($sensorData)
    {
        foreach($sensorData as $data){
            if ($data == "Not Found!" or $data==null)
                return;    
            $sql="select id_kid from sensor_codes join kids_sensor on id_sensor=id where value=?";
            $stmt=$this->connection->prepare($sql);
            $stmt->bind_param("i",$data);
            $stmt->execute();
            $stmt->bind_result($kidId);
            $stmt->fetch();
            $stmt->close();
            $this->addFriend($kidId);
        }
    }
    private function addFriend($kidId){
        if($this->kidId!=$kidId){
        $sql="insert into friends(id_kid1,id_kid2) values (?,?)";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("ii",$this->kidId,$kidId);
        $stmt->execute();
        $stmt->close();    
    }
    }
}




?>