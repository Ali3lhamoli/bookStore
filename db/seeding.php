<?php

require_once "../classes/DatabaseConnection.php";
require_once '../classes/DatabaseCrud.php';

$crud = new DatabaseCrud();

/********           LOCK ROW NUMBER  26                   */

// insert data into slider table

// $insertData = [
//     'image' => '01.png'
// ];
// $insertId = $crud->create('homeslider', $insertData);

// echo "New record created successfully in slider table. $insertId <br>";
require_once "../classes/DatabaseCrud.php";
$columns = [
    'id_cate ' => 'INT ',
 
];
$crud->alterTableAddColumn('books', $columns);


"ALTER TABLE `books` ADD FOREIGN KEY (`id_cate`) REFERENCES `category`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;";


 




// alter column to books table
// $var=['english','arabic'];
// $columns = [
//     'type' => $var
     
// ];
// $crud->alterTableAddColumn('books', $columns);


// insert data into books table

// $insertData = [
//     'title' => 'C# 10 in a Nutshell',
//     'author' => 'Frank Zammetti',
//     'price' => 5000.00,
//     'stock' => 30, 
//     'purchases' => 20,
//     'pages' => 373,
//     'discount_price' => 200.00,
//     'image' => 'product-2.webp'
// ];

// $insertId = $crud->create('books', $insertData);

// echo "New record created successfully in books table. $insertId <br>";
