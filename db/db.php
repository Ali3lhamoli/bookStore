<?php

require_once "../classes/DatabaseConnection.php";

// Create connection (without selecting the database initially)
$db = DatabaseConnection::getInstance()->getConnection();
$dbname = DatabaseConnection::getInstance()->getDbName();

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($db, $sql)) {
    echo "Database created successfully\n";
} else {
    die("Error creating database: " . mysqli_error($db) . "\n");
}

// Now select the created database
DatabaseConnection::getInstance()->selectDatabase();

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

    // Books table
    "CREATE TABLE IF NOT EXISTS books (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        author VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        stock INT NOT NULL,
        description TEXT
    )",

    // Orders table
    "CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        total_price DECIMAL(10, 2) NOT NULL,
        status ENUM('pending', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
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
        price DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE ON UPDATE CASCADE
    )",

    // Checkout table
    "CREATE TABLE IF NOT EXISTS checkout (
        id INT AUTO_INCREMENT PRIMARY KEY,
        order_id INT NOT NULL,
        payment_method ENUM('credit_card', 'paypal') NOT NULL,
        shipping_address TEXT NOT NULL,
        payment_status ENUM('pending', 'paid') NOT NULL DEFAULT 'pending',
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

    // Services table
    "CREATE TABLE IF NOT EXISTS services (
        id INT AUTO_INCREMENT PRIMARY KEY,
        service VARCHAR(50),
        subservice VARCHAR(50)
    )",

    // Category table
    "CREATE TABLE IF NOT EXISTS category (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image VARCHAR(250)
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
        logo VARCHAR(250),
        title VARCHAR(50),
        subTitle VARCHAR(50),
        section_1 VARCHAR(50),
        section_1_2 VARCHAR(200),
        section_2 VARCHAR(50),
        section_2_2 VARCHAR(200),
        image_2 VARCHAR(250)
    )",

    // Contact Us table (fixed duplicate 'image' column)
    "CREATE TABLE IF NOT EXISTS contactus (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image VARCHAR(200),
        title VARCHAR(50),
        subTitle VARCHAR(250)
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
];


// Loop through and execute each table creation query
foreach ($tables as $table_sql) {
    if (mysqli_query($db, $table_sql)) {
        echo "Table created successfully\n";
    } else {
        echo "Error creating table: " . mysqli_error($db) . "\n";
    }
}

// Close connection
mysqli_close($db);
