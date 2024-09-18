<?php
function redirect($url)
{
  header("Location: http://localhost/bookStore/" . $url);
  die;
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
    $total += $item['price'] * $item['qty'];
  }
  return $total;
}
function calculateTotalPriceP($cart)
{
  $total = 0;
  foreach ($cart as $item) {
    $total += $item['mony'] * $item['qty'];
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
function addToCart($product)
{
  $id = $_GET['id'];

  if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = [
      //  'id'=>$id,
      'products' => $product,
      'price' => $product['offer'] ? $product['offer'] : $product['price'],
      'mony' => $product['price'] ,
      'qty' => 1,

    
      'id' => ''
    ];
  } else {
    // 'products'=>$product,
    // $_SESSION['cart'][$id]['id']=$id;
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
