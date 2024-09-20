<?php



$old_password = $_SESSION['client']['2'];
$old_email = $_SESSION['client']['1'];

$current_password = $_POST['current_pass'];
$new_password = $_POST['new_pass'];
$confirm_password = $_POST['confirm_pass'];

if(empty($current_password) || empty($new_password) || empty($confirm_password)){
    $_SESSION['change_det_errors']['password'] = 'Please enter all the fields';
    header('Location: index.php?page=account_details');
    exit;
}else{
    if($new_password != $confirm_password){
        $_SESSION['change_det_errors']['password'] = 'new passwords do not match';
    }elseif(strlen($new_password)<8){
        $_SESSION['change_det_errors']['password'] = 'new password must be at least 8 characters';
    }elseif($current_password != $old_password){
        $_SESSION['change_det_errors']['password'] = 'old password is incorrect';
    }else{
        $new_hash_password = password_hash($new_password, PASSWORD_DEFAULT);
        $data = ['password'=>$new_hash_password];
        $update = $crud->update('users',$data,"password = '$current_password' AND email = '$old_email'");
        if($update > 0 ){
            $_SESSION['user']['password'] = $new_password;
            $_SESSION['change_det_success']['password'] = 'password changed successfully';    
        }else{
            $_SESSION['change_det_errors']['password'] = 'error in changing password please try again later';
        }

    }
    header('Location: index.php?page=account_details');
    exit;
}


