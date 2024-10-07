<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // $id = $_POST['id'];
    $id = $_GET['i'];
    $total_price = $_POST['total_price'];
    $payment_status = $_POST['payment_status'];
    $shipping_status = $_POST['shipping_status'];

    // Billing details
    $billing_name = $_POST['billing_name'];
    $billing_address = $_POST['billing_address'];
    $billing_city = $_POST['billing_city'];
    $billing_postal_code = $_POST['billing_postal_code'];
    $billing_phone = $_POST['billing_phone'];
    $billing_email = $_POST['billing_email'];

    $crud = new DatabaseCrud();

    $data = [
        'total_price' => $total_price,
        'payment_status' => $payment_status,
        'shipping_status' => $shipping_status,
        'billing_name' => $billing_name,
        'billing_address' => $billing_address,
        'billing_city' => $billing_city,
        'billing_postal_code' => $billing_postal_code,
        'billing_phone' => $billing_phone,
        'billing_email' => $billing_email
    ];

    $result = $crud->update('orders', $data, "id = $id");

    // Check if the update query was successful
    if ($result) {
        echo "Record updated successfully";
        header('Location: orders.php');
        exit;
    } else {
        echo "Error updating order.";
        var_dump($result);
        exit;
    }
}
