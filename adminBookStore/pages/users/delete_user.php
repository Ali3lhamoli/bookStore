<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $crud = new DatabaseCrud();
    $crud->delete('users', "id = '$id'");
    header("Location: users.php");
}
