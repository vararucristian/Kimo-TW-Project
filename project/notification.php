<?php
$conn = new mysqli('localhost', 'root', '', 'project');

function newMessages($id){
    GLOBAL $conn;
    $sql = "SELECT * FROM messages join account_messages on messages.id = account_messages.id_message where id_sendTo=? and seen = 0";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $newMessages=array();
    $index=0;
    $messages = $stmt->get_result();
    for($i = 1; $i <= $messages->num_rows; $i++){
        $msg = $messages->fetch_assoc();
        $newMessages[$index]=new Message($msg['id'], $msg['message'], $msg['date'], $msg['id_sendBy'], $id);
        $index++;
    } 
   
    return $newMessages;
}

class Message{
    public $id;
    public $message;
    public $data;
    public $sendBy;
    public $sendTo;

    function __construct($id, $message, $data, $sendBy, $sendTo){
        $this -> id = $id;
        $this -> message = $message;
        $this -> data = $data;
        $this -> sendBy = $sendBy;
        $this -> sendTo = $sendTo;
    }

}

?>