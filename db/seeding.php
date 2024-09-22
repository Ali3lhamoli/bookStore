<?php
session_start();
require_once "../classes/DatabaseConnection.php";
require_once '../classes/DatabaseCrud.php';
require_once '../core/functions.php';

$crud = new DatabaseCrud();

/********           LOCK ROW NUMBER  26                   */

// insert data into slider table

// $insertData = [
<<<<<<< HEAD
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
     
=======
//     'image' => '03.png'
>>>>>>> e258a9d6803211597fe806d75d37a1214ff21ca6
// ];
// $insertId = $crud->create('homeslider', $insertData);

// echo "New record created successfully in slider table. $insertId <br>";

// insert data into books table

// $insertData = [
//     'title' => 'Head First Design Patterns',
//     'author' => ' Eric Freeman, Elisabeth Robson, Bert Bates, Kathy Sierra',
//     'price' => 1350.00,
//     'stock' => 47, 
//     'purchases' => 21,
//     'pages' => 453,
//     'discount_price' => 499.00,
//     'image' => 'product-6.webp'
// ];

// $insertId = $crud->create('books', $insertData);

// echo "New record created successfully in books table. $insertId <br>";

// insert data into about table

// $insertData = [
//     // 'image' => 'logo.png',
//     'title' => 'هدف شركة Coding arabic',
//     'description' => 'هدفنا في Coding Arabic هو توفير منصة شاملة ومتكاملة للمصادر التعليمية التقنية باللغة العربية، تهدف إلى تمكين الأفراد من تعلم البرمجة والتكنولوجيا بسهولة واحترافية. نسعى لأن نكون مرجعًا موثوقًا للمطورين والمبرمجين العرب، من خلال توفير كتب ومراجع تغطي أحدث التقنيات، الأدوات، واللغات البرمجية.
// نطمح إلى دعم الأجيال الجديدة من المبرمجين والمبتكرين في العالم العربي، وتزويدهم بالمعرفة والمهارات اللازمة للنجاح في مجالاتهم، مما يسهم في تعزيز دور المنطقة العربية في الاقتصاد الرقمي والتكنولوجي العالمي.'
// ]; 
// $insertId = $crud->create('aboutus', $insertData);

// echo "New record created successfully in aboutus table. $insertId <br>";

// insert data into branches table

// $insertData = [
//     'branch' => 'فرع: المحلة',
//     'address' => 'ش شكري الكواتلي مع ش عبد العزيز امام البنك الاهلي.',
//     'phone' => '01063888667',
//     'brief_branch' => 'ش شكري الكواتلي - المحلة.'
// ];

// $insertId = $crud->create('branches', $insertData);

// echo "New record created successfully in books table. $insertId <br>";