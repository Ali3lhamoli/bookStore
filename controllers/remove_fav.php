<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $crud->delete('favouriets',"`book_id`='$id'");
    header('location: index.php?page=favourites');
}else{
    header('location: index.php?page=favourites');

}