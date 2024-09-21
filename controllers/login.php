<?php

session_start();

require_once "../classes/DatabaseConnection.php";
require_once "../classes/DatabaseCrud.php";
require_once "../validation/validation.php";
require_once "../function.php";
 

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $email=$_POST['email'];
    $passwordOf_user=$_POST['password'];
     isEmptyEmail($email);    
     isEmptyPassword($passwordOf_user);
 

if(!empty($_SESSION['errors'])){
    redirect("index.php?page=account");
    


}else{
    $git = new DatabaseCrud();

$where = "`email` = '$email'";

$filed= "email ,  password , name";
    $user= $git->read('users',$where,$filed);



    if(empty($user)){
 

 $_SESSION['errors']['email']="email not match";

    }else{
        
foreach ($user as  $client) {
  

    if(password_verify($passwordOf_user , $client['password']) ){
          
        $_SESSION['client']=$client;
        
        $_SESSION['passwordU']=$passwordOf_user;
        redirect("index.php?page=home");



}else{


 $_SESSION['errors']['password']="password not match";


}

}
 

    }
}

         
 

 
 


    }else{
        $_SESSION['errors']['email']="  X";
        redirect("index.php?page=account");
    }
    // echo "<pre>";
    // print_r($_SESSION['passwordU']);
    // echo "</pre>";

 
// // 
// if (isset($_SESSION['users'])&& is_array($_SESSION['users'])) {
//     foreach ($_SESSION['users'] as $book) {
//         echo "Title: " . $book['name'] . "<br>";
//         echo "Author: " . $book['email'] . "<br><br>";
//     }
// echo "Y";
    
// } else {
//     echo "لا توجد بيانات في الجلسة أو البيانات ليست مصفوفة.";
// }