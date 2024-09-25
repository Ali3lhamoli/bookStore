<?php
session_start();
require_once "../function.php";
$id=$_GET['id'];
$qty=$_GET['qty'];

if(isset($_GET['id'],$_GET['qty'])){
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['qty'] = $qty; 
    }
}
// header("Location:index.php?page=single-product&id=$id");
redirect("index.php?page=single-product&id=$id");