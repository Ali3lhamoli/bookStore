<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if (isset($_GET['id'])) {
    $crud = new DatabaseCrud();
    $checkout_id = $_GET['id'];

    $deletedRows = $crud->delete('checkout', "id = '$checkout_id'");

    if ($deletedRows > 0) {
        header('Location: checkout.php');
        exit;
    } else {
        echo "An error occurred while deleting the record.";
    }
}
