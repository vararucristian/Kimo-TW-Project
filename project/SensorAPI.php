<?php
class SensorApi{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "project";
    private $connection;
    private $result;

    public function __construct(){
        $this->connection= new mysqli($this->host, $this->user, $this->password, $this->db);
        if($_SERVER['REQUEST_METHOD']=='GET')
            $this->get_method();
        if($_SERVER['REQUEST_METHOD']=='POST')
            $this->post_method();      
            
    }

    function post_method(){
        try{
            if(!isset($_POST["id"]))
                throw new Exception("Necessary parameter not set!");
            $id=$_POST["id"];        
            $params=array("latitude","longitude","normal_condition","animal_close","accident","colission","another_person");
            foreach($params as $param){
            if (isset($_POST[$param])){
                $sql="update sensor set ".$param."=".$_POST[$param]." where id=".$id;
                $this->connection->query($sql);
            } 
        }
            $result =array("message"=>"succes");
            header('Content-type:application/json;charset=utf-8');
            http_response_code(200) ; 
            echo json_encode($result);
        }catch(Exception $e){
            $result =array("message"=>$e->getMessage());
            header('Content-type:application/json;charset=utf-8');
            http_response_code(400)  ;
            echo json_encode($result);
        } 
}

    function get_method(){
        try{
        if(!isset($_GET['id']))
            throw new Exception('Unset parameter!');
        
            
        $id=$_GET["id"];     
        $sql = "SELECT * FROM sensor where id=".$id;
        $result=$this->connection->query($sql);
        $result=$result->fetch_assoc();
        if($result ==null)
            throw new Exception('Not Found!');
        header('Content-type:application/json;charset=utf-8');
        http_response_code(200);
        echo json_encode($result);
        
        }catch(Exception $e){
            $result =array("message"=>$e->getMessage());
            header('Content-type:application/json;charset=utf-8');
            if($e->getMessage()=='Unset parameter!')
                http_response_code(400);
            if($e->getMessage()=='Not Found!')
                http_response_code(404);    
            echo json_encode($result);            
            
        }

    }

}

$sensorApi=new SensorApi();

?>