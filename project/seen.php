<?php

    
    // function update($id){
        $id = $_POST['messageId'];
        $conn = new mysqli('localhost', 'root', '', 'project');

        $sql="update messages set seen = 1 where id=?";
        $rezultat = $conn->prepare($sql);
        $rezultat->bind_param('i',$id);
        $rezultat->execute();
        $rez = $rezultat->affected_rows;
        $rezultat->close();
        // return $rez;
    // echo "sfn";
        // header('location: messageController.php#');
?>