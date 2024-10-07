<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud = new DatabaseCrud();

    $checkout_id = $_POST['checkout_id'];
    $data = [
        'order_id' => $_POST['order_id'],
        'payment_method' => $_POST['payment_method'],
        'transaction_id' => $_POST['transaction_id'],
        'shipping_address' => $_POST['shipping_address'],
        'billing_address' => $_POST['billing_address'],
        'payment_status' => $_POST['payment_status']
    ];

    $updatedRows = $crud->update('checkout', $data, "id = '$checkout_id'");

    if ($updatedRows > 0) {
        header('Location: checkout.php');
        exit;
    } else {
        echo "No changes were made or an error occurred.";
    }
}
