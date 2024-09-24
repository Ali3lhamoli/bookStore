<?php 

session_start();
require_once "../function.php";

echo $_GET['id'];

$id=$_GET['id'];

if(isset($_SESSION['cart'][$id] )){
    unset( $_SESSION['cart'][$id] );
    unset($_SESSION['check']);
    unset($_SESSION['productCheck']);
    unset($_SESSION['totalP']);
    unset($_SESSION['cart_qty']);
    unset($_SESSION['totalBeforDis']);
 
}
redirect("index.php?page=shop");