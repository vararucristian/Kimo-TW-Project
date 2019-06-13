<?php
include 'modelSignUp.php';
class controllerSignUp{
  private $model;
  public $empty_field =true;
  public $incorrect_name ;
  public $incorrect_data ;
  public $different_passwords;
  public $short_password;
  public $easy_password;
  public $username_used;
  public function __construct(){
  $this->model = new modelSignUp();
  $this->empty_field =true;
  $this->incorrect_name =false;
  $this->incorrect_data =false;
  $this->different_passwords=false;
  $this->short_password=false;
  $this->easy_password = false;
  $this->username_used=false;
  if(isset($_POST['butonSignUp']))
    if($_POST['fname']=="" || $_POST['lname']=="" || $_POST['username']=="" || 
    $_POST['password1']==""|| $_POST['password2']==""||
     $_POST['latitude']==""|| $_POST['longitude']==""||
      $_POST['phone']==""|| $_POST['email']==""||!isset($_POST['gender']))
      $this->empty_field = false;
    else
    if($this->model->verify_name($_POST['fname'],$_POST['lname']))
     $this->incorrect_name=true;
     else
      if($this->model->verify_coordinates($_POST['latitude'],$_POST['longitude']))
        $this->incorrect_data=true;
        else
        if($this->model->verify_password_length($_POST['password1']))
          $this->short_password=true;
            else
             if($this->model->verify_password_strength($_POST['password1']))
             $this->easy_password=true;
              else
              if($this->model->verify_password_confirmation($_POST['password1'],$_POST['password2']))
              $this->different_passwords=true;
                else
                if($this->model->verify_username( $_POST['username'])==0)
                  $this->username_used=true;
                  else 
                  {
                    $this->model->add_user($_POST['fname'], $_POST['lname'], $_POST['username'],$_POST['password1'],$_POST['phone'],$_POST['email'],$_POST['gender'],$_POST['latitude'], $_POST['longitude']);
                    header('Location: index_login.php');
                  }
  }

}
$controllerSignUp=new controllerSignUp();  
?>