<?php 
session_start();
 require_once "../function.php";
require_once "../classes/DatabaseConnection.php";
$conn=  DatabaseConnection::getInstance()->getConnection();
 
if(isset($_SESSION['client'])){    
if(isset($_GET['id'])){
    $book_id = $_GET['id'];
    $user_id = $_SESSION['client']['id'];
    $add_favorite_query = "INSERT INTO favouriets (user_id , book_id) VALUES ('$user_id', '$book_id')";
    mysqli_query($conn, $add_favorite_query);
    if($_GET['page']=='single'){
    redirect("index.php?page=single-product&id=$book_id");
    }else{
        redirect("index.php?page=home");

    }

}
}else{
    redirect("index.php?page=account");
}