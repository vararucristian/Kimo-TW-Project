<?php
include "index_kidController.php";
class ChangePhotoController{
    public $image;
    public $ext;
function __construct(){
    $this->image=pathinfo($_FILES['photo']['name']);
    $this->ext = $this->image['extension'];
}

}
$photo = new ChangePhotoController();
$newname = "2.".$photo->ext; 
$folder='kidsPictures/'.$newname;
move_uploaded_file( $_FILES['photo']['tmp_name'], $folder);

?>