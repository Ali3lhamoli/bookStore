<?php

require_once "../classes/DatabaseConnection.php";
require_once '../classes/DatabaseCrud.php';

$crud = new DatabaseCrud();



// insert data into slider table

// $insertData = [
//     'image' => '01.png'
// ];
// $insertId = $crud->create('homeslider', $insertData);

// echo "New record created successfully in slider table. $insertId <br>";


// alter column to books table
// $columns = [
//     'number_of_pages' => 'INT',
//     'discount' => 'DECIMAL(10, 2)',
//     'image' => 'VARCHAR(255)'
// ];
// $crud->alterTableAddColumn('books', $columns);


// insert data into books table

$insertData = [
    `title` => 'Modern Full-Stack Development',
    `author` => 'Frank Zammetti',
    `price` => 5000,
    `stock` => 30,
    `times_of_buying` => 0,
    `description` => '',
    `number_of_pages` => 373,
    `discount` => 0,
    `image` => 'product-1.webp'
];
$insertId = $crud->create('books', $insertData);

echo "New record created successfully in books table. $insertId <br>";
