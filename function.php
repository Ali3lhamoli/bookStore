<?php
function redirect($url)
{
  header("Location: http://localhost/bookStore/" . $url);
exit();
}
function IDExists()
{
  if (!isset($_GET['id'])) {
    echo 'Product Id not found';
    die;
  }
}

function intialCart()
{
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }
}
function calculateTotalPriceA($cart)
{
  $total = 0;
  foreach ($cart as $item) {
    $total += $item['discount_price']? $item['discount_price'] * $item['qty'] : $item['price'] * $item['qty'] ;
  }
  return $total;
}
function calculateTotalPriceP($cart)
{
  $total = 0;
  foreach ($cart as $item) {
    $total += $item['discount_price']? $item['discount_price'] * $item['qty'] : $item['price'] * $item['qty'];
  }
  return $total;
}
function calculateTotalPriceT($cart)
{
  $total = 0;
  foreach ($cart as $item) {
    $total += $item['products']['discount_price']? $item['products']['discount_price'] * $item['qty'] : $item['price'] * $item['qty'];
 
  }

  return $total;
}
function getProductDetailsPagenation($table_name,$start,$last,$connection) 
{


 
  $sql = "SELECT  * from `$table_name`  LIMIT $start,$last";

  return (mysqli_query($connection, $sql));
}
function calculateTotalPriceC($items,$qty )
{
  $total = 0;
  foreach ($items as $item) {
   
    
    if(isset($item['discount_price'])){
     $total += $item['discount_price'] * $qty;
    }else{
      $total += $item['price'] * $qty;
    }
  
}
  return $total;
}
// function calculateTotalPriceP($product,$item)
// {
//   $total = 0;

// foreach($item as $ite){
//     $total += $product['qty'] * $item;

// }  
//   return $total;
// }
function addToCart($product, $id)
{


  if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = [
      //  'id'=>$id,
      'products' => $product,
      'price' =>   $product['price'],
      'discount_price' => $product['discount_price'],
      'qty' => 1,



    ];
  } else {
    // 'products'=>$product,
    // $_SESSION['cart'][$id]['id']='';
    $_SESSION['cart'][$id]['products'] = $product;
    $_SESSION['cart'][$id]['qty']++;
  }

}





function IDIsNumeric($id)
{
  if (!is_numeric($id)) {
    echo 'Invalid Product Id';
    die;
  }
}
function getProductIdL($table_name, $id)
{


  global $connection;
  $sql = "SELECT  * from `$table_name` WHERE `$table_name`.`id` = '$id' ";
  // mysqli_fetch_assoc($sql);
  return mysqli_query($connection, $sql);

}


function IDInMyProducts($products, $id)
{
  $exists = false;

  foreach ($products as $product) {
    if ($product['id'] == $id) {
      $exists = true;
      break;
    }
  }

  if (!$exists) {
    echo 'Product not found';
    die;
  }
}


function findProductById($products, $id)
{
  //  mysqli_fetch_assoc($products);
  foreach ($products as $product) {
    if ($product['id'] == $id) {
      return $product;
    }
  }
}

