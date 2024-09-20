<?php
session_start();
require_once "../classes/DatabaseConnection.php";
require_once '../classes/DatabaseCrud.php';
require_once '../core/functions.php';

$crud = new DatabaseCrud();



// insert data into slider table

// $insertData = [
//     'image' => '01.png'
// ];
// $insertId = $crud->create('homeslider', $insertData);

echo "New record created successfully in slider table. $insertId <br>";

// insert data into books table

$insertData = [
    'title' => 'C# 10 in a Nutshell',
    'author' => 'Frank Zammetti',
    'price' => 5000.00,
    'stock' => 30, 
    'purchases' => 20,
    'pages' => 373,
    'discount_price' => 200.00,
    'image' => 'product-2.webp'
];

$insertId = $crud->create('books', $insertData);

echo "New record created successfully in books table. $insertId <br>";

dd($_SESSION['change_det_errors']);