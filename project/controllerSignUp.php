<?php
include 'modelSignUp.php';
class controllerSignUp{
  private $model;

  public function __construct(){
  $model = new modelSignUp();
  $empty_field =true;
  $incorrect_name =false;
  $incorrect_data =false;
  $different_passwords=false;
  $short_password=false;
  $easy_password = false;
  $username_used=false;
  if(isset($_POST['butonSignUp']))
    if($_POST['fname']=="" || $_POST['lname']=="" || $_POST['username']=="" || 
    $_POST['password1']==""|| $_POST['password2']==""||
     $_POST['latitude']==""|| $_POST['longitude']==""||
      $_POST['phone']==""|| $_POST['email']==""||!isset($_POST['gender']))
      $empty_field = false;
    else
    if($model->verify_name($_POST['fname'],$_POST['lname']))
     $incorrect_name=true;
     else
      if($model->verify_coordinates($_POST['latitude'],$_POST['longitude']))
        $incorrect_data=true;
        else
        if($model->verify_password_length($_POST['password1']))
          $short_password=true;
            else
             if($model->verify_password_strength($_POST['password1']))
             $easy_password=true;
              else
              if($model->verify_password_confirmation($_POST['password1'],$_POST['password2']))
              $different_passwords=true;
                else
                if($model->verify_username( $_POST['username'])==0)
                  $username_used=true;
                  else 
                  {
                    $model->add_user($_POST['fname'], $_POST['lname'], $_POST['username'],$_POST['password1'],$_POST['phone'],$_POST['email'],$_POST['gender'],$_POST['latitude'], $_POST['longitude']);
                    header('Location: loginController.php');
                  }
      include 'SignUp.php';
  }

}
$controllerSignUp=new controllerSignUp();  
?>