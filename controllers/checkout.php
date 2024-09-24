<?php
session_start();


 
require_once "../validation/validation.php";
require_once "../function.php";
require_once "../core/functions.php";
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
$con=DatabaseConnection::getInstance()->getConnection();
  "true";

// print_r($_SESSION['check']['id']);
$val=new Validation;
$val->emailRule1("email",$email);
      
    isEmptyFirst_name($firstName);
    isEmptyLast_name($last_name);
    isEmptyAddress($address);
     isEmptyPhone($phone);

$fullName=$firstName . " " . $last_name;
 
// print_r($_SESSION['client']);
 
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
        "shipping_status"=>"panding",
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
      $_SESSION['order_details'] = $data;
    $addOrder = $crud->create('orders', $data);

/********************************************************** */
//                        order_items
/********************************************************** */

$id_order = $crud->read('orders'); // Specify your table name

  
// $order_id= $id_order[0];
//  print_r($_SESSION['totalP']);

// $book_id= $_SESSION['check'];




 
              $product_price= $_SESSION['cart_price'];
foreach($_SESSION['cart'] as $catId){
  ////////////////////////////////
  $lastId = getLastRow("orders", $con);
  $_SESSION['order_details'][] = $lastId['id'];
  ////////////////////////////////
  $book_id=$catId['products']['id'];
  ////////////////////////////////
  $totalOwnProduct=0;
  $totalOwnProduct += isset($catId['discount_price']) ? $catId['discount_price'] *$catId['qty'] : $catId['price'] *$catId['qty'];
   
  $order_items= [
                "order_id"=>$lastId['id'],
                "book_id"=>$book_id,
                "quantity"=>$catId['qty'],
                "unit_price"=> $catId['price'],
                "discount_applied"=>$catId['discount_price'],
                "total_price"=>$totalOwnProduct
                          ];
  
  // print_r($lastId['id']);
                          
}
$addOrder2 = $crud->create('order_items', $order_items);
// $id_book=$_SESSION['cart']

            //   
            //   // print_r( $_SESSION['cart_qty']) ;
            // $order_items= ["order_id"=>$order_id['id'],
            //                 "book_id"=>$id_book,
            //                 "quantity"=>$product_qty,
            //                 "unit_price"=>$product_price,
            //                 // "discount_applied"=>$discount_applied
            //                 "total_price"=>$totalPrice
          
            //               ];
 

redirect("index.php?page=UnsetCart");
 
 

    
}else{
  redirect("index.php?page=accountLogin");

}

}
