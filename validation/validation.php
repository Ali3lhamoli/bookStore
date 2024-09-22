<?php

function isEmptyName($name)
{
    $name = trim(htmlspecialchars($name));
    if (empty($name)) {
        $_SESSION['errors']['name'] = "name is empty ";
       
    }
    if (50 < strlen($_POST['name'])) {
        $_SESSION['errors']['name'] = 'the name grater than 50 ';
       
    }
    if (3 > strlen($_POST['name'])) {
        $_SESSION['errors']['name'] = 'the name less than 3 ';
       
    }
   
}
 

function isEmptyEmail($name)
{
    if (empty($name)) {
        $name = trim(htmlspecialchars($name));

        $_SESSION['errors']['email'] = "email is empty ";
       
    }



    if (50 < strlen($name)) {

        $_SESSION['errors']['email'] = 'the email grater than 50 ';
       
    }
    if (12 > strlen($name)) {
        $_SESSION['errors']['email'] = 'the email less than 12 ';
       
    }
 
} 
 
function isEmptyPassword($name)
{
    $name = trim(htmlspecialchars($name));

    if (empty($name)) {
        $_SESSION['errors']['password'] = "email is empty ";
       

    }

    if (   6  > strlen($name)  ) {
        $_SESSION['errors']['password'] = 'the password less than 3 ';
       
        
    }

    

    
}


function isEmptyFirst_name($name)
{
    // $name = trim(htmlspecialchars());
    if (empty($name)) {
        $_SESSION['error']['first_name'] = "first_name is empty ";
       
    }
    
    if (   3 > strlen($name)) {
        $_SESSION['error']['first_name'] = 'the first_name less than 1 ';
       
    }
    if (50 < strlen($name)) {
        $_SESSION['error']['first_name'] = 'the first_name grater than 50 ';
       
    }
   
   
}
 function isEmptyLast_name($name)
{
    $name = trim(htmlspecialchars($name));
    if (empty($name)) {
        $_SESSION['error']['last_name'] = "Last name is empty ";
       
    }
    if (50 < strlen($_POST['last_name'])) {
        $_SESSION['error']['last_name'] = 'the Last name grater than 50 ';
       
    }
    if (3 > strlen($_POST['last_name'])) {
        $_SESSION['error']['last_name'] = 'the Last name less than 3 ';
       
    }
   
}


function isEmptyAddress($name)
{
    if (empty($name)) {
        $name = trim(htmlspecialchars($name));

        $_SESSION['error']['address'] = "address is empty ";
       
    }


 
    if (12 > strlen($name)) {
        $_SESSION['error']['address'] = 'the address less than 12 ';
       
    }
 
}
function isEmptyPhone($name)
{
    if (empty($name)) {
        $name = trim(htmlspecialchars($name));

        $_SESSION['error']['phone'] = "phone is empty ";
       
    }
    if (15 < strlen($name)) {

        $_SESSION['error']['phone'] = 'the email grater than 15 ';
       
    }

 
    if (10 > strlen($name)) {
        $_SESSION['error']['phone'] = 'the phone less than 10 ';
       
    }
 
}
