<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $branch = $_POST['branch'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $brief_branch = $_POST['brief_branch'];

    $crud = new DatabaseCrud();

    $data = [
        'branch' => $branch,
        'address' => $address,
        'phone' => $phone,
        'brief_branch' => $brief_branch
    ];

    $result = $crud->update('branches', $data, "id = $id");

    if ($result) {
        header('Location: branches.php');
        exit;
    } else {
        echo "Error updating branch.";
    }
}
