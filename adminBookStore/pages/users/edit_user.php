<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $crud = new DatabaseCrud();

    $data = [
        'name' => $name,
        'email' => $email,
        'role' => $role
    ];

    $crud->update('users', $data, "id = $id");

    header('Location: users.php');
    exit;
}
