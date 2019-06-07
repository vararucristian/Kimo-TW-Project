<?php
$conn = new mysqli('localhost', 'root', '', 'project');
function genToken($id){
    global $conn;
    echo "DAAAA";
    if(!isset($_SESSION['user_token'])){
        $_SESSION['user_token']=md5(uniqid());
        insertToken($id);
    }else{
        
        $sql="select * from account_tokens natural join tokens where id_account=? and value=?";
        $rezultat = $conn->prepare($sql);
        $rezultat->bind_param('is', $id,$_SESSION['user_token']);
        $rezultat->execute();
        $rez = $rezultat->get_result();
        $rezultat->close();
        if ($rez->num_rows<1)
            {
                $_SESSION['user_token']=md5(uniqid());
                insertToken($id);
            }   
    }
}

function insertToken($id_utilizator){
        global $conn;
        $sql="insert into tokens(value) values(?);";
        $rezultat = $conn->prepare($sql);
        $rezultat->bind_param('s',$_SESSION['user_token']);
        $rezultat->execute();
        $rezultat->close();
        $sql="select id from tokens where value=?";
        $rezultat = $conn->prepare($sql);
        $rezultat->bind_param('s',$_SESSION['user_token']);
        $rezultat->execute();
        $rez = $rezultat->get_result();
        $rez=$rez->fetch_assoc();
        $rezultat->close();
        
        $id_token=$rez['id'];
        $sql="insert into account_tokens(id_account,id_token) values(?,?);";
        $rezultat = $conn->prepare($sql);
        $rezultat->bind_param('ii',$id_utilizator,$id_token);
        $rezultat->execute();
        $rezultat->close();
    }

function checkToken(){
    global $conn;
        $sql="select * from tokens where value=?";
        $rezultat = $conn->prepare($sql);
        $rezultat->bind_param('s',$_SESSION['user_token']);
        $rezultat->execute();
        $rez = $rezultat->get_result();
        $rezultat->close();
        if ($rez->num_rows<1)
            {
                header('location:loginController.php');
            }
}

function checkLogedIn(){
    global $conn;
    $sql="select * from tokens where value=?";
    $rezultat = $conn->prepare($sql);
    $rezultat->bind_param('s',$_SESSION['user_token']);
    $rezultat->execute();
    $rez = $rezultat->get_result();
    $rezultat->close();
    if ($rez->num_rows >= 1)
    {
        header('location:index.php');
    }
}


function distroySession(){
    global $conn;
    $sql="select id from tokens where value=?";
    $rezultat = $conn->prepare($sql);
    $rezultat->bind_param('s',$_SESSION['user_token']);
    $rezultat->execute();
    $rez = $rezultat->get_result();
    $inregistrare=$rez->fetch_assoc();
    $rezultat->close();
    $id_token=$inregistrare['id'];

    $sql="delete from account_tokens where id_token=?";
    $rezultat = $conn->prepare($sql);
    $rezultat->bind_param('i',$id_token);
    $rezultat->execute();
    $rezultat->close();

    $sql="delete from tokens where id=?";
    $rezultat = $conn->prepare($sql);
    $rezultat->bind_param('i',$id_token);
    $rezultat->execute();
    $rezultat->close();
        session_unset();
        session_destroy();
        header('Location: loginController.php');
}
?>