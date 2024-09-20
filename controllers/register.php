<?php
 
 
session_start();
require_once "../classes/DatabaseConnection.php";
require_once "../classes/DatabaseCrud.php";
require_once "../validation/validation.php";
require_once "../function.php";




if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    
    /*****************************************************************/
    $passwordH = password_hash($password, PASSWORD_DEFAULT);
    
    isEmptyName($name);
    isEmptyEmail($email);
    isEmptyPassword($passwordH);
    /******--------------------------------------------------------------- */
    /******--------------------------------------------------------------- */
    
    $crud = new DatabaseCrud();

    if (!empty($_SESSION['errors'])) {
    //    redirect("index.php?page=account");

    }elseif(empty($_SESSION['errors'])){


$data=
    ["email"=>$email,"name"=>$name,"password"=>$passwordH];


$usersAdded = $crud->create('users', $data);
 
 
redirect("index.php?page=home");
}

 
} 

 
echo "<pre>";
print_r( $_SESSION['users']);
echo "</pre>";