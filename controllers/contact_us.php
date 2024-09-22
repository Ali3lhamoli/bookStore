<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$couse = $_POST['couse'];
$massege = $_POST['massege'];
$contact_errors = $_SESSION['contact_errors'];

if(empty($name) || empty($email) || empty($phone) || empty($couse) || empty($massege)){
    $_SESSION['contact_errors'][] = 'Please enter all the fields';
    header('Location: index.php?page=contact');
    exit;
}else{
    if(strlen($name)<3){
        $_SESSION['contact_errors'][] = 'Name must be at least 3 characters long.';
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['contact_errors'][] = 'Invalid email address.';
    }
    if(strlen($phone)!=11){
        $_SESSION['contact_errors'][] = 'Phone number must be 11 numbers.';
    }
}

if(empty($_SESSION['contact_errors'])){
    $data = ['name'=>"$name",'email'=>"$email",'phone'=>"$phone",'couse'=>"$couse",'massege'=>"$massege",];
    $crud->create('contactus',$data);
    $_SESSION['contact_success'] = 'Your request will be reviewed and we will contact you shortly.';
}

header('Location: index.php?page=contact');
