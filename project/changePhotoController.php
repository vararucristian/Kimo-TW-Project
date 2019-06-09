<?php
include "changePhotoModel.php";

class ChangePhotoController{
    public $image;
    function __construct(){
    $this->image=pathinfo($_FILES['photo']['name']);
    
}

}
$photo = new ChangePhotoController();
session_start();
changePhoto($photo->image,$_SESSION['childId'],$_FILES['photo']['tmp_name']);
session_abort();
include "index_kidController.php";

?>
