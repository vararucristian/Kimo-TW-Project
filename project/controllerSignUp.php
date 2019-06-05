<?php
include 'modelSignUp.php';
class controllerSignUp{
  private $model;

  public function __construct(){
  $model = new modelSignUp();
  $empty_field =true;
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
      {
        $pattern="/[0-9]+|[0-9]+.[0-9]+/";
        if(!preg_match($pattern,$_POST['longitude'] )|| !preg_match($pattern,$_POST['latitude'] ))
        $incorrect_data = true;
        else
          if(strlen($_POST['password1'])<6)
           $short_password=true;
           else 
            {
              $pattern="/([a-z]*[^a-z]+[a-z]*)+/";
              if(!preg_match($pattern,$_POST['password1'] ))
              $easy_password = true;
                 else
                   if(!($_POST['password1']=== $_POST['password2']))
                     $different_passwords=true;
                      else 
                        if($model->verify_username( $_POST['username'])==0)
                          $username_used=true;
                          else $model->add_user($_POST['fname'],$_POST['lname'],$_POST['username'],$_POST['password1'],$_POST['phone'],$_POST['email'],$_POST['gender'], $_POST["latitude"], $_POST["longitude"]);
            }
          
    }
      include 'SignUp.php';
  }

}
$controllerSignUp=new controllerSignUp();  
?>