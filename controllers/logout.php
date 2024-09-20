<?php


 
require_once "function.php";

 
    unset($_SESSION['client']);
    redirect("index.php?page=account");