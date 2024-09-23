<?php 

session_start();
require_once "../function.php";

echo $_GET['id'];

$id=$_GET['id'];

if(isset($_SESSION['cart'][$id] )){
    unset( $_SESSION['cart'][$id] );

}
redirect("index.php?page=shop");