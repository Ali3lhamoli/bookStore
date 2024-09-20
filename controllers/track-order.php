<?php
session_start();
require_once "classes/DatabaseConnection.php";
require_once "classes/DatabaseCrud.php";
require_once "config.php"; 

if ((!isset($_POST['order_id']) || !isset($_POST['email'])) && (!isset($_GET['order_id']) || !isset($_GET['email']))) {
    header("Location: " . $config['base_url'] . "index.php?page=track-order");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = isset($_POST['order_id']) ? $_POST['order_id'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $orderId = isset($_GET['order_id']) ? $_GET['order_id'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
}

if (empty($orderId) || empty($email)) {
    $_SESSION['order_not_found'] = "الرجاء إدخال رقم الطلب والبريد الإلكتروني.";
    header("Location: " . $config['base_url'] . "index.php?page=track-order");
    exit;
}

$crud = new DatabaseCrud();

$order = $crud->read("orders JOIN users ON orders.user_id = users.id", 
                 "orders.id = '$orderId' AND users.email = '$email'", 
                 "orders.*, users.name");

if (!empty($order)) {
    $_SESSION['order_details'] = $order[0];
    header("Location: " . $config['base_url'] . "index.php?page=order-received");
    exit;
} else {
    $_SESSION['order_not_found'] = "عذرًا، لم يتم العثور على طلب بهذا الرقم أو البريد الإلكتروني.";
    header("Location: " . $config['base_url'] . "index.php?page=track-order");
    exit;
}
