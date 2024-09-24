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



class Validation {
    private $_errors = [];
/****************************start the input is empty***************************** */
    function requierd($inputName,$input){
        if(empty($input)){
            $error = [$inputName => "the filed is reqierd"];
            array_push($this->_errors,$error);
        }
    }
/****************************end the input is empty***************************** */


/****************************start check the  max len for input ***************************** */

function max($inputName,$input,$max_val){
    if(strlen($input)>$max_val){
        $error=[$inputName => "the filed must be less than $max_val"];
        array_push($this->_errors,$error);
    }
}

/****************************end check the  max len for input ***************************** */

/****************************start check the  min len for input ***************************** */

function min($inputName,$input,$min_val){
    if(strlen($input)<$min_val){
        $error=[$inputName => "the filed must be less than $min_val"];
        array_push($this->_errors,$error);
    }
}

/****************************end check the  min len for input ***************************** */

/****************************start check the  email is email ***************************** */



function emailRule1($inputName,$input){
    if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
        $error = [$inputName => "invaild Email"];
        array_push($this->_errors,$error); 
    }
}
/****************************end check the  email is email ***************************** */
/****************************start check the  email is email with regex  ***************************** */

function emailRul2($inputName,$input){
    $regex="/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[\w-]{2,4}$/";
    if(!preg_match($regex,$input)){
        $error = [$inputName =>"invalid email"];
        array_push($this->_errors,$error);
    }
} 

/****************************start check the  if number is number   ***************************** */
/****************************start check the  email is email with regex  ***************************** */

function matchingEmail($inputName,$input,$inputFromDb){
  
    if(!preg_match($input,$inputFromDb)){
        $error = [$inputName =>" email not mach"];
        array_push($this->_errors,$error);
    }
} 

/****************************start check the  if number is number   ***************************** */

function numric($inputName,$input){
    if(!is_numeric($input)){
        $error = [$inputName => "you must enter numbers only"];
        array_push($this->_errors,$error);
    }
}
/****************************end check the  if number is number   ***************************** */

function alpha($inputName,$input){
    $regex ="/^[a-zA-Z]+$/";
    if(!preg_match($regex,$input)){
$error=[$inputName=>"you must enter only letters. "];
array_push($this->_errors,$error);
    }
}

function matchInput($inputName,$input,$matchInput){
    if($input !== $matchInput){
        $error = [$inputName => "you must match the filed"];
        array_push($this->_errors,$error);
    }
}


function matchPattern($inputName,$input,$regex){
    if(!preg_match($regex,$input)){
        $error= [$inputName =>"thr input must match the pattern"];
        array_push($this->_errors,$error);
    }
}

function getError(){
    return $this->_errors;
}

}





