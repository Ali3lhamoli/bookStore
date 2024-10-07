<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = $_POST['role'];

    $crud = new DatabaseCrud();

    $data = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'role' => $role
    ];

    $insertId = $crud->create('users', $data);

    if ($insertId) {
        header('Location: users.php');
        exit;
    } else {
        echo "Error inserting user.";
    }
}
