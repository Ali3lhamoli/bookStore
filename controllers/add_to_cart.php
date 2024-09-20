<?php
session_start();
require_once "../function.php";
require_once "../classes/DatabaseCrud.php";
require_once "../classes/DatabaseConnection.php";
$crud = new DatabaseCrud();
   
$id=$_GET['id'];
IDExists();
IDIsNumeric($id);

$result = $crud->read('books', "`id` = $id");
$data= findProductById($result,$id);
intialCart();



addToCart($data,$id);




// unset($_SESSION['cart']);