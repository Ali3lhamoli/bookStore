<?php

require_once "../classes/DatabaseConnection.php";

// Create connection
$dbConnection = DatabaseConnection::getInstance();
$db = $dbConnection->getConnection();
$dbname = $dbConnection->getDbName();

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($db, $sql)) {
    echo "Database created successfully\n";
} else {
    die("Error creating database: " . mysqli_error($db) . "\n");
}

$dbConnection->selectDatabase();

// List of tables to create
$tables = [

    // Users table
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        role ENUM('customer', 'admin') NOT NULL DEFAULT 'customer'
    )",
    "CREATE TABLE IF NOT EXISTS category (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nameCategory VARCHAR(255) NOT NULL
       
    )",
 
   

    // Books table 
    "CREATE TABLE IF NOT EXISTS books (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        author VARCHAR(255) NOT NULL,
        pages INT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        discount_price DECIMAL(10, 2) DEFAULT NULL,
        stock INT NOT NULL DEFAULT 0,
        description TEXT,
        image VARCHAR(255) NOT NULL,
        category int,
        rating DECIMAL(2, 1) DEFAULT NULL, 
        purchases INT DEFAULT 0,
        offer INT DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )",

    // Orders table
    "CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        total_price DECIMAL(10, 2) NOT NULL,
        payment_status ENUM('pending', 'paid', 'failed') NOT NULL DEFAULT 'pending',
        shipping_status ENUM('pending', 'shipped', 'delivered', 'cancelled') NOT NULL DEFAULT 'pending',
        status ENUM('pending', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
        billing_name VARCHAR(255) NOT NULL,
        billing_address VARCHAR(255) NOT NULL,
        billing_city VARCHAR(100) NOT NULL,
        billing_postal_code VARCHAR(20) NOT NULL,
        billing_phone VARCHAR(20) NOT NULL,
        billing_email VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
    )",

    // Order Items table
    "CREATE TABLE IF NOT EXISTS order_items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        order_id INT NOT NULL,
        book_id INT NOT NULL,
        quantity INT NOT NULL,
        unit_price DECIMAL(10, 2) NOT NULL,
        discount_applied DECIMAL(10, 2) DEFAULT 0,
        offer_applied INT DEFAULT NULL,
        total_price DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE ON UPDATE CASCADE
    )",

    // Checkout table
    "CREATE TABLE IF NOT EXISTS checkout (
        id INT AUTO_INCREMENT PRIMARY KEY,
        order_id INT NOT NULL,
        payment_method ENUM('credit_card', 'paypal', 'bank_transfer', 'cash_on_delivery') NOT NULL,
        transaction_id VARCHAR(255) DEFAULT NULL,
        shipping_address TEXT NOT NULL,
        billing_address TEXT DEFAULT NULL,
        payment_status ENUM('pending', 'paid', 'failed') NOT NULL DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE ON UPDATE CASCADE
    )",


    // Siting table
    "CREATE TABLE IF NOT EXISTS siting (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50),
        logo VARCHAR(250),
        link VARCHAR(250)
    )",

    "CREATE TABLE IF NOT EXISTS favouriets (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        book_id INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE ON UPDATE CASCADE
    )",

    // Services table
    "CREATE TABLE IF NOT EXISTS services (
        id INT AUTO_INCREMENT PRIMARY KEY,
        service VARCHAR(50),
        subservice VARCHAR(50)
    )",

 

    // Landing Page table
    "CREATE TABLE IF NOT EXISTS landingPage (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image VARCHAR(250)
    )",

    // About Us table
    "CREATE TABLE IF NOT EXISTS aboutus (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image VARCHAR(200),
        title VARCHAR(50),
        description VARCHAR(200)
    )",


    // Refund Policy table (fixed duplicate 'image' column)
    "CREATE TABLE IF NOT EXISTS refundpolicy (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(200),
        title_2 VARCHAR(200),
        image VARCHAR(250)
    )",

    // Footer table
    "CREATE TABLE IF NOT EXISTS footer (
        id INT AUTO_INCREMENT PRIMARY KEY,
        links VARCHAR(50),
        logo VARCHAR(250),
        subTitle VARCHAR(50),
        branch VARCHAR(50),
        email VARCHAR(50),
        title VARCHAR(50)
    )",

    // Homeslider table 
    "CREATE TABLE IF NOT EXISTS homeslider (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image VARCHAR(250)
    )",


    "CREATE TABLE IF NOT EXISTS `description_single_products` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Q VARCHAR(100),
    Ansare VARCHAR(250)
    )",

    // Branches table
    "CREATE TABLE IF NOT EXISTS branches (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `branch` VARCHAR(50),
        `address` VARCHAR(250),
        `phone` VARCHAR (20),
        `brief_branch` VARCHAR(50)
    )",

    // Checkout table
    "CREATE TABLE IF NOT EXISTS contactus (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        couse ENUM('اخرى','استفسار', 'استبدال', 'استرجاع', 'استعجال الاوردر') NOT NULL,
        phone VARCHAR(20) NOT NULL,
        email VARCHAR(100) NOT NULL,
        massege TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )"
];

// Loop through and execute each table creation query
foreach ($tables as $table_sql) {
    if (mysqli_query($db, $table_sql)) {
        echo "Table created successfully<br>";
    } else {
        echo "Error creating table: " . mysqli_error($db) . "<br>";
    }
}

// Close connection
mysqli_close($db);
