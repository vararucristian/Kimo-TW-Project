<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "project";
$connection=new mysqli($host, $user, $password, $db);;

function getchilds($id){
  global $connection;
  $sql = "SELECT id_child FROM account_childs where id_account=?";
  $stmt=$connection->prepare($sql);
  $stmt->bind_param("i",$id);
  $stmt->execute();
   $childs=array();
   $index=0;
   $stmt->bind_result($childId);
   while($stmt->fetch()){
      $childs[$index]=new indexKidController($childId);
      $index++;
      $stmt->bind_result($childId);
  }    
   return $childs;
}

 function getLatitude($id){
     global $connection;
    $sql = "SELECT l.latitude  FROM accounts a  join user_locations u on a.id=u.id_user join locations l on u.id_location =l.id where a.id=?";
    $stmt=$connection->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $stmt->bind_result($latitude);
    $stmt->fetch();    
    return $latitude;
}

 function getLongitude($id){
    global $connection;

    $sql = "SELECT l.longitude  FROM accounts a  join user_locations u on a.id=u.id_user join locations l on u.id_location =l.id where a.id=?";
    $stmt=$connection->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $stmt->bind_result($longitude);
    $stmt->fetch();    
    return $longitude;
}

function findClosePersonsLatitude($id ){
  global $connection;
  $sql = "SELECT id_close_person FROM child_close_persons where id_child=?";
  $stmt=$connection->prepare($sql);
  $stmt->bind_param("i",$id);
  $stmt->execute();
   $closePersons=array();
   $index=0;
   $stmt->bind_result($closePersonId);
   while($stmt->fetch()){
      $closePersons[$index]=$closePersonId;
      $index++;
      $stmt->bind_result($closePersonId);
  } 
  $latitude=array();
  $index=0;
  foreach ( $closePersons as $person){
      $latitude[$index]=getLatitudePerson($person);   
      $index++;
  }
  return $latitude;
}

function findClosePersonsLongitude($id ){
  global $connection;
  $sql = "SELECT id_close_person FROM child_close_persons where id_child=?";
  $stmt=$connection->prepare($sql);
  $stmt->bind_param("i",$id);
  $stmt->execute();
   $closePersons=array();
   $index=0;
   $stmt->bind_result($closePersonId);
   while($stmt->fetch()){
      $closePersons[$index]=$closePersonId;
      $index++;
      $stmt->bind_result($closePersonId);
  } 
  $longitude=array();
  $index=0;
  foreach ( $closePersons as $person){
      $longitude[$index]=getLongitudePerson($person);   
      $index++;
  }
  return $longitude;
}

function getLongitudePerson($id){
  global $connection;

  $sql = "SELECT l.longitude  FROM close_person_location c  join locations l on l.id=c.id_location where c.id_close_person=?";
  $stmt=$connection->prepare($sql);
  $stmt->bind_param("i",$id);
  $stmt->execute();
  $stmt->bind_result($longitude);
  $stmt->fetch();    
  return $longitude;
}

function getLatitudePerson($id){
  global $connection;
 $sql = "SELECT l.latitude  FROM close_person_location c  join locations l on l.id=c.id_location where c.id_close_person=?";
 $stmt=$connection->prepare($sql);
 $stmt->bind_param("i",$id);
 $stmt->execute();
 $stmt->bind_result($latitude);
 $stmt->fetch();    
 return $latitude;
}

?>