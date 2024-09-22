<?php 
  
require_once "function.php";


if(isset($_SESSION['client'])){
    unset($_SESSION['cart']);
    unset($_SESSION['itemFromCart']);
    redirect("index.php?page=home");
}