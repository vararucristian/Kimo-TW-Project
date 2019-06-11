<?php
function changePhoto($image,$id,$tempName){
    $newname = $id.".".$image['extension'];
    $target='kidsPictures/'.$newname;
    move_uploaded_file( $tempName, $target);

}


?>