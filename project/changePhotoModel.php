<?php
function changePhoto($image,$id,$tempName){
    $newname = $id.".jpg";
    $target='kidsPictures/'.$newname;
    move_uploaded_file( $tempName, $target);

}


?>