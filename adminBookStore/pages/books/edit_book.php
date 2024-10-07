<?php
require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $pages = $_POST['pages'];

    $crud = new DatabaseCrud();

    $data = [
        'title' => $title,
        'author' => $author,
        'price' => $price,
        'stock' => $stock,
        'pages' => $pages
    ];

    if (!empty($_FILES['image']['name'])) {
        $targetDir = __DIR__ . "/../../uploads/";

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $data['image'] = basename($_FILES['image']['name']);
            } else {
                echo "Error uploading image.";
                exit;
            }
        } else {
            echo "File is not an image.";
            exit;
        }
    }

    $result = $crud->update('books', $data, "id = $id");

    if ($result) {
        header('Location: books.php');
        exit;
    } else {
        echo "Error updating book.";
    }
}
