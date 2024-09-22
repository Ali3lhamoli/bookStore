<?php

$old_name = $_SESSION['client'][0];
$old_email = $_SESSION['client'][1];




if(empty($_POST['name']) && empty($_POST['email'])){
    $_SESSION['change_det_errors']['name&email'] = 'Please enter at least one of the fields.';
    header('Location: index.php?page=account_details');
    exit;
}elseif(!empty($_POST['name']) && empty($_POST['email'])){
    $name = $_POST['name'];

    if(strlen($name)<3){
        $_SESSION['change_det_errors']['name'] = 'Name must be at least 3 characters long.';
    }elseif($name == $old_name){
        $_SESSION['change_det_errors']['name'] = 'This is the name actually currently in use.';
    }else{
        $data = ['name'=>$name];
        $update = $crud->update('users',$data,"name = '$old_name' AND email = '$old_email'");
        if($update > 0 ){
            $_SESSION['client'][0] = $name;
            $_SESSION['change_det_success']['name'] = 'Name changed successfully.';    
        }else{
            $_SESSION['change_det_errors']['name'] = 'error in changing name please try again later.';
        }

    }
    header('Location: index.php?page=account_details');
    exit;
}elseif(empty($_POST['name']) && !empty($_POST['email'])){
    $email = $_POST['email'];

    $already_exist_email = $crud->read('users',"email = '$email'",'email');
    if($already_exist_email = []){
        $_SESSION['change_det_errors']['email'] = 'Email already exists.';
    }elseif($email == $old_email){
        $_SESSION['change_det_errors']['email'] = 'This is the email actually currently in use.';
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['change_det_errors']['email'] = 'Invalid email.';
    }else{
        $data = ['email'=>$email];
        $update = $crud->update('users',$data,"name = '$old_name' AND email = '$old_email'");
        if($update > 0){
            $_SESSION['client'][1] = $email;
            $_SESSION['change_det_success']['email'] = 'Email changed successfully.';
        }else{
            $_SESSION['change_det_errors']['email'] = 'error in changing email please try again later.';
        }
    }
    header('Location: index.php?page=account_details');
    exit;
}else{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $already_exist_email = $crud->read('users',"email = '$old_email'",'email');

    if(strlen($name)<3){
        $_SESSION['change_det_errors']['name'] = 'Name must be at least 3 characters long.';
    }elseif($name == $old_name){
        $_SESSION['change_det_errors']['name'] = 'This is the name actually currently in use.';
    }else{
        $data = ['name'=>$name];
    }


    if($already_exist_email = []){
        $_SESSION['change_det_errors']['email'] = 'Email already exists.';
    }elseif($email == $old_email){
        $_SESSION['change_det_errors']['email'] = 'This is the email actually currently in use.';
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['change_det_errors']['email'] = 'Invalid email.';
    }else{
        $data['email'] = $email;
    }


    if($data == ['name'=>$name , 'email'=>$email]){
        $update = $crud->update('users',$data,"name = '$old_name' AND email = '$old_email'");
        if($update > 0){
            $_SESSION['client'][1] = $email;
            $_SESSION['client'][0] = $name;
            $_SESSION['change_det_success']['email'] = 'Email changed successfully.';
            $_SESSION['change_det_success']['name'] = 'name changed successfully.';

        }else{
            $_SESSION['change_det_errors']['name&email'] = 'error in changing email and name please try again later.';
        }
    }else{
        $_SESSION['change_det_errors']['name&email'] = 'error in changing email and name please try again later.';
    }


    header('Location: index.php?page=account_details');
    exit;

}

?>