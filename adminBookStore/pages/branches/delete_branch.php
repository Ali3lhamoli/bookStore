<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $crud = new DatabaseCrud();
    $result = $crud->delete('branches', "id = $id");

    if ($result) {
        header('Location: branches.php');
        exit;
    } else {
        echo "Error deleting branch.";
    }
}
