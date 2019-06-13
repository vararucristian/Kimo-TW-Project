<?php

    // 
    // session_start();

    // $messages = newMessages($_SESSION['sessionID']);
    // $response = array();
    // foreach($messages as $msg){
    //     $rsp = array();
    //     $rsp['message'] = $msg->message;
    //     $rsp['date'] = $msg->data;
    //     $rsp['sendBy'] = $msg->sendBy;
    //     $rsp['sendTo'] = $msg->sendTo;
    //     array_push($response, $rsp);
    // }
    // header('Content-type:application/json;charset=utf-8');
    // http_response_code(200);
    // echo json_encode($response);

?>

<?php

include "notification.php";
class notificationMessages{
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
        if($_SERVER['REQUEST_METHOD']=='PUT')
            $this->put_method();     
    }

    function get_method(){
        
        if(isset($_GET['id']))
        {
            $this->getById();
            return;
        }
        else{
            $this->getNewMessages();
            return;
        }  
    }

    function put_method(){
        $id = $_GET["id"];
        $sql = "UPDATE messages SET seen=1 WHERE id=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
        $response = array();
        $rsp['message'] = 'success';
        array_push($response, $rsp);
        header('Content-type:application/json;charset=utf-8');
        http_response_code(200) ; 
        echo json_encode($response);
    }

    function getById(){
        $id = $_GET["id"];
        $sql = "SELECT fname FROM accounts where id=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($result);
        $stmt->fetch(); 
        $response = array();
        $response['nume'] = $result;  
        header('Content-type:application/json;charset=utf-8');
        http_response_code(200);
        echo json_encode($response);
    }

    function getNewMessages(){
        session_start();
        $messages = newMessages($_SESSION['sessionID']);
        $response = array();
        foreach($messages as $msg){
            $sql = "SELECT fname FROM accounts where id=?";
            $stmt=$this->connection->prepare($sql);
            $stmt->bind_param("i",$msg->sendBy);
            $stmt->execute();
            $stmt->bind_result($result);
            $stmt->fetch();
            $stmt->close(); 
            $rsp = array();
            $rsp['messageId'] = $msg->id;
            $rsp['message'] = $msg->message;
            $rsp['date'] = $msg->data;
            $rsp['sendBy'] = $msg->sendBy;
            $rsp['sendTo'] = $msg->sendTo;
            $rsp['name'] = $result;
            $rsp['childId'] = $msg->childId;
            array_push($response, $rsp);
        }
        header('Content-type:application/json;charset=utf-8');
        http_response_code(200);
        echo json_encode($response);
    }

}
$sensorApi=new notificationMessages();

?>