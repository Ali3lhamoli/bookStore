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



    // if (   strlen($name) > 50  ) {

    //     $_SESSION['errors']['password'] = 'the password grater than 50 ';
       

    // }


    if (   6  > strlen($name)  ) {
        $_SESSION['errors']['password'] = 'the password less than 3 ';
       
        
    }
    
}
