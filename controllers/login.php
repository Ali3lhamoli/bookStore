<?php

session_start();

require_once "../classes/DatabaseConnection.php";
require_once "../classes/DatabaseCrud.php";
require_once "../validation/validation.php";
require_once "../function.php";

$_SESSION['errors'] = [];

// Include your validation functions here or include the file where they are defined

// Create an instance of the Validation class
$validation = new Validation();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $validation->requierd('email', $_POST['email']);
    $validation->max('email', $_POST['email'], 50);
    $validation->min('email', $_POST['email'], 12);
    $validation->emailRule1('email', $_POST['email']); // Or emailRul2 based on your preference

    $validation->requierd('password', $_POST['password']);
    $validation->min('password', $_POST['password'], 6);



    $_SESSION['errors'] = $validation->getError();

    if (!empty($_SESSION['errors'])) {
        redirect("index.php?page=accountLogin");
print_r($_SESSION['errors']);


    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $git = new DatabaseCrud();

        $where = "`email` = '$email'";

        $filed = "email ,  password , name,id";
        $user = $git->read('users', $where, $filed);
 

        if (empty($user)) {


            $_SESSION['errors'][0]['email'] = "email not math";
        redirect("index.php?page=accountLogin");

        } else {

            foreach ($user as $client) {

                if (password_verify($password, $client['password'])) {

                    $_SESSION['client'] = $client;

                    $_SESSION['passwordU'] = $password;
                    redirect("index.php?page=home");

                } else {
                    $_SESSION['errors'][0]['password'] = "password not match";
                    redirect("index.php?page=accountLogin");
                }
            }
        }
    }
} else {
    $_SESSION['errors']['email'] = "  X";
    redirect("index.php?page=account");
}

