<?php
require_once "../function.php";
$crud = new DatabaseCrud();
DatabaseConnection::getInstance()->selectDatabase();
$id=$_GET['id'];
IDExists();
IDIsNumeric($id);
$data = getProductIdL('products',$id);
$result = $crud->read('books', "`id` = $id");
intialCart();



addToCart($product);