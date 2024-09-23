<?php
session_start();


 
require_once "../validation/validation.php";
require_once "../function.php";
require_once "../classes/DatabaseConnection.php";
require_once "../classes/DatabaseCrud.php";
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $firstName=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $state=$_POST['state'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];

  "true";

// print_r($_SESSION['check']['id']);

      
    isEmptyFirst_name($firstName);
    isEmptyLast_name($last_name);
    isEmptyAddress($address);
     isEmptyPhone($phone);


      
 
 
/********************************************************** */

     
if(isset($_SESSION['client'])){
  $crud= new DatabaseCrud();
$id_User= $_SESSION['client']['id'];
 $totalPrice= $_SESSION['totalP'];
//  echo "$id_User";
 
 
  
    $statue='pending';
      $created_at= $_SESSION['check']['created_at'];
      $updated_at= $_SESSION['check']['updated_at'];

    $data= ["user_id"=>$id_User,"total_price"=>$totalPrice,"status"=>$statue,"created_at"=>$created_at,"updated_at"=>$updated_at];
    $addOrder = $crud->create('orders', $data);

/********************************************************** */
//                        order_items
/********************************************************** */

$id_order = $crud->read('orders'); // Specify your table name

  
$order_id= $id_order[0];
//  print_r($order_id['id']);
print_r($order_id['id']);

  $book_id= $_SESSION['check']['id'];
    
    $product_qty=$_SESSION['cart_qty'][0];
    $product_price= $_SESSION['cart_qty'][1];
  $order_items= ["order_id"=>$order_id['id'],"book_id"=>$book_id,"quantity"=>$product_qty,"price"=>$product_price];

  // print_r($order_items);
$addOrder2 = $crud->create('order_items', $order_items);

redirect("index.php?page=UnsetCart");
 
 

    
}}