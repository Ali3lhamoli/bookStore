<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $crud = new DatabaseCrud();
    $crud->delete('books', "id = '$id'");
    header("Location: books.php");
    exit;
}
