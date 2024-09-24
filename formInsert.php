<?php
require_once "./function.php";
require_once "./classes/DatabaseConnection.php";
// require_once "./classes/";

$connection= new mysqli("localhost","root","","bookStore");
$sql="SELECT * FROM category ";

mysqli_query($connection, $sql);

 
    $title=$_POST['title'];
    $author=$_POST['author'];
    $pages=$_POST['pages'];
    $price=$_POST['price'];
     $discount_price=$_POST['discount_price'];
    $stock=$_POST['stock'];
    // $description=$_POST['description'];
    $image=$_FILES['image'];
    $category=$_POST['category'];
    $rating=$_POST['rating'];
    // $purchases=$_POST['purchases'];

// echo "<pre>";

// print_r($image);
// echo "</pre>";
 

// Store data
$uploadDir = './assets/images/newImage/';  // Ensure this path is correct

// Check if the upload directory exists and is writable
if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
    die("Upload directory is not writable or does not exist.");
} 

// Check for file upload errors
if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    die("File upload error: " . $_FILES['image']['error']);
}

// Validate file type (example: only allow JPEG and PNG images)
$fileType = mime_content_type($_FILES['image']['tmp_name']);
$allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

if (!in_array($fileType, $allowedTypes)) {
    die("Invalid file type.");
}

// Validate file size (example: limit to 5MB)
if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
    die("File size exceeds 5MB.");
}

// Generate a unique file name to avoid overwriting existing files
$uniqueName = uniqid() . '-' . basename($_FILES['image']['name']);
$targetFile = $uploadDir . $uniqueName;

// Move the uploaded file
if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
    die("Failed to move uploaded file.");
}


// $title=$_POST['title'];
// $author=$_POST['author'];
// $pages=$_POST['pages'];
// $price=$_POST['price'];
//  $discount_price=$_POST['discount_price'];
// $stock=$_POST['stock'];
// $description=$_POST['description'];
// $image=$_FILES['image'];
// $category=$_POST['category'];
// $rating=$_POST['rating'];
// $purchases=$_POST['purchases'];



$products= "INSERT INTO `books` (`title`,`author`,pages,`price`,`image`,`stock`,`discount_price`,`cat_id`,`rating` ) values(

'$title',
'$author',
'$pages',
-- '$pages',
'$price',
'$targetFile',
'$stock',
'$discount_price',
'$category',
'$rating'

 
 


 
 




 ) ";
mysqli_query($connection,$products);


// redirect('index.php?page=home');
// }

