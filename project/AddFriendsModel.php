<?php
class AddFriendsModel{
    public $friends;
    function __construct($latitude,$longitude)
    {   
        
        $this->friends=$this->getNewFriends($latitude,$longitude);
        foreach($this->friends as $friend)
            echo $friend;
    }

    private function getNewFriends($latitude,$longitude){
        $result=array();
        for($i=-0.03;$i<=0.03;$i=$i+0.01)
        for($j=-0.03;$j<=0.03;$j=$j+0.01){ 
            $latitude1=$latitude+$i;
            $longitude1=$longitude+$j;
        $url="localhost/Kimo-TW-Project/project/sensorApi.php?latitude=".$latitude1."&longitude=".$longitude1;
        echo $url;
        echo $url ."<br>";
        $c = curl_init ();
        curl_setopt ($c, CURLOPT_URL, $url);              
        curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt ($c, CURLOPT_SSL_VERIFYPEER, false); 
        $res = curl_exec ($c);                                   
        curl_close ($c);
        $sensorData=json_decode($res,true);
            
        }
        
        return $result;
    
    }

}




?>