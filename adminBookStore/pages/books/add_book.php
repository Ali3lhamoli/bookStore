<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $pages = $_POST['pages'];

    $crud = new DatabaseCrud();

    $image = 'default-image.jpg';

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../../uploads/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $image = basename($_FILES['image']['name']);
            } else {
                echo "Error uploading image.";
                exit;
            }
        } else {
            echo "File is not an image.";
            exit;
        }
    }

    $data = [
        'title' => $title,
        'author' => $author,
        'price' => $price,
        'stock' => $stock,
        'pages' => $pages,
        'image' => $image
    ];

    // Insert the book into the database
    $insertId = $crud->create('books', $data);

    if ($insertId) {
        header('Location: books.php');
        exit;
    } else {
        echo "Error inserting book.";
    }
}
