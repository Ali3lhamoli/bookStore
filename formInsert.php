<?php
require_once "./function.php";
$connection= new mysqli("localhost","root","","bookStore");


 
    $title=$_POST['title'];
    $author=$_POST['author'];
    $price=$_POST['price'];
    $offer=$_POST['offer'];
    $stock=$_POST['stock'];
    $description=$_POST['description'];
    $image=$_FILES['image'];

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
// $price=$_POST['price'];
// $offer=$_POST['offer'];
// $stock=$_POST['stock'];
// $description=$_POST['description'];
// $image=$_FILES['image'];



$products= "INSERT INTO `books` (`title`,`image`,`description`,`price`,`author`,`stock`,`offer` ) values(

'$title',

'$targetFile',

'$description',

'$price',

'$author',
'$stock',
'$offer'
 
 




 ) ";
mysqli_query($connection,$products);


// redirect('index.php?page=home');
// }

