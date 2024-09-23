<?php


session_start();
require_once "../classes/DatabaseConnection.php";
require_once "../classes/DatabaseCrud.php";
require_once "../validation/validation.php";
require_once "../function.php";


$_SESSION['errors'] = [];

 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validation=new Validation;
    // Validate each field
    $validation->requierd('name', $_POST['name']);
    $validation->max('name', $_POST['name'], 50);
    $validation->min('name', $_POST['name'], 3);

    $validation->requierd('email', $_POST['email']);
    $validation->max('email', $_POST['email'], 50);
    $validation->min('email', $_POST['email'], 12);
    $validation->emailRule1('email', $_POST['email']);  
    $validation->requierd('password', $_POST['password']);
    $validation->min('password', $_POST['password'], 6);

    $crud = new DatabaseCrud();
$dataFiled='email';
$dataFromUser=$crud->read("users","",$dataFiled);
 
    
    $_SESSION['errors'] = $validation->getError();
  
foreach($dataFromUser as $userEm){
    $email=$_POST['email'];
    $userDb= $userEm['email'];
     if( $userDb == $email ){
        $_SESSION['errors'][0]['email']="email is token";
     }
 }


    if (!empty($_SESSION['errors'])) {
        redirect("index.php?page=account");
        exit;
    }elseif(isset($email)){

    }elseif (empty($_SESSION['errors'])) {
        $email=$_POST['email'];
        $name=$_POST['name'];
        $passwordH=$_POST['password'];

        $passwordH = password_hash($password, PASSWORD_DEFAULT);




        $data = ["email" => $email, "name" => $name, "password" => $passwordH];


        $usersAdded = $crud->create('users', $data);


        redirect("index.php?page=accountLogin");
      
    }


}




