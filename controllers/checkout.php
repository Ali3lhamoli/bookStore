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
    $state=$_POST['state'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];

  "true";

// print_r($_SESSION['check']['id']);
$val=new Validation;
$val->emailRule1("email",$email);
      
    isEmptyFirst_name($firstName);
    isEmptyLast_name($last_name);
    isEmptyAddress($address);
     isEmptyPhone($phone);

$fullName=$firstName . " " . $last_name;
 
 
/********************************************************** */

     
if(isset($_SESSION['client'])){
  $crud= new DatabaseCrud();
$id_User= $_SESSION['client']['id'];
 $totalPrice= $_SESSION['totalP'];
//  echo "$id_User";
 
 
  
    $statue='pending';
      $created_at= $_SESSION['check']['created_at'];
      $updated_at= $_SESSION['check']['updated_at'];
$data= ["user_id"=>$id_User,
        "total_price"=>$totalPrice, 
        "payment_status"=>"cash", 
        /** shipping_status*/
        "status"=>$statue,
        "billing_name"=>$fullName,
        "billing_address"=>$address,
        "billing_city"=>$state,
        "billing_postal_code"=>"02",
        "billing_phone"=>$phone,
        "billing_email"=>$email,
        "created_at"=>$created_at,
        "updated_at"=>$updated_at
      ];
    $addOrder = $crud->create('orders', $data);

/********************************************************** */
//                        order_items
/********************************************************** */

$id_order = $crud->read('orders'); // Specify your table name

  
$order_id= $id_order[0];
//  print_r($_SESSION['totalP']);
// print_r($order_id['id']);

  $book_id= $_SESSION['check']['id'];
    
    $product_qty=$_SESSION['cart_qty'][0];
    $product_price= $_SESSION['cart_qty'][1];
    // print_r( $_SESSION['cart_qty']) ;
  $order_items= ["order_id"=>$order_id['id'],
                  "book_id"=>$book_id,
                  "quantity"=>$product_qty,
                  "unit_price"=>$product_price,
                  // "discount_applied"=>$discount_applied
                  "total_price"=>$totalPrice

                ];

  // print_r($order_items);
$addOrder2 = $crud->create('order_items', $order_items);

redirect("index.php?page=UnsetCart");
 
 

    
}}