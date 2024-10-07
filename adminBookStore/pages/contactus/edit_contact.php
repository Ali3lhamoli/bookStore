<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $couse = $_POST['couse'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $massege = $_POST['massege'];

    
    $crud = new DatabaseCrud();

    $data = [
        'name' => $name,
        'couse' => $couse,
        'phone' => $phone,
        'email' => $email,
        'massege' => $massege
    ];

    $result = $crud->update('contactus', $data, "id = $id");

    // Check if the update query was successful
    if ($result) {
        echo "Record updated successfully";
        header('Location: contactus.php');
        exit;
    } else {
        echo "Error updating contactus.";
        var_dump($result);
        exit;
    }
}
