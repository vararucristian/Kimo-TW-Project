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
        if($_SERVER['REQUEST_METHOD']=='PUT')
            $this->put_method();      
        if($_SERVER['REQUEST_METHOD']=='DELETE')
            $this->delete_method();      
        
    }
    function delete_method(){
        try{
            if( !isset($_GET["id"]))
                throw new Exception("Necessary parameter not set!");
            $id=$_GET["id"];     
            $sql="delete from sensor where id=?";
            $stmt=$this->connection->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $result =array("message"=>"succes");
            header('Content-type:application/json;charset=utf-8');
            http_response_code(200);  
            echo json_encode($result);
        }catch(Exception $e){
            $result =array("message"=>$e->getMessage());
            header('Content-type:application/json;charset=utf-8');
            http_response_code(400);  
            echo json_encode($result);}
            
    }
    function post_method(){
        try{
        $data = json_decode(file_get_contents('php://input'), true);
        $params=array("latitude","longitude","normal_condition","animal_close","accident","collision","another_person");
        foreach($params as $param){
            if (!array_key_exists ($param,$data ))        
                throw new Exception("Necessary parameter not set!");
        }
        $sql="insert into sensor(latitude,longitude,normal_condition,animal_close,accident,collision,another_person) values (?,?,?,?,?,?,?)";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("ddiiiii",$data["latitude"],$data["longitude"],$data["normal_condition"],$data["animal_close"],$data["accident"],$data["collision"],$data["another_person"]);
        $stmt->execute();
        $result =array("message"=>"succes");
        header('Content-type:application/json;charset=utf-8');
        http_response_code(200);  
        echo json_encode($result);
        }catch(Exception $e){
            $result =array("message"=>$e->getMessage());
            header('Content-type:application/json;charset=utf-8');
            http_response_code(400);  
            echo json_encode($result);}
            
            

    }


    function put_method(){
        try{

            $data = json_decode(file_get_contents('php://input'), true);
            if( !isset($_GET["id"]))
                throw new Exception("Necessary parameter not set!");
            $id=$_GET["id"];        
            $params=array("latitude","longitude","normal_condition","animal_close","accident","collision","another_person");
            foreach($params as $param){
            if (array_key_exists ($param,$data )){
                $sql="update sensor set ".$param."=".$data[$param]." where id=?";
                $stmt=$this->connection->prepare($sql);
                $stmt->bind_param("i",$id);
                $stmt->execute();
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
        $sql = "SELECT * FROM sensor where id=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=array();
        $stmt->bind_result($id,$result["latitude"],$result["longitude"],$result["normal_condition"],$result["animal_close"],$result["accident"],$result["collision"],$result["another_person"]);
        $stmt->fetch();    
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