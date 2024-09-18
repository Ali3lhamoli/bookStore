<?php
session_start();
require_once "../classes/DatabaseConnection.php";
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


    if (!empty($_SESSION['errors'])) {
       redirect("index.php?page=account");

    }elseif(empty($_SESSION['errors'])){



        $addUser= "INSERT INTO `users` (`name`,`email`,`password` ) values(

       '$name',
       '$email',
       '$passwordH'

         ) ";
        mysqli_query($db,$addUser);
    }


 
//     }
    /******--------------------------------------------------------------- */



 


















    /**REQUEST_METHOD */
} else {

}