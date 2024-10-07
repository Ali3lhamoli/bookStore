<?php
session_start();
require_once '../classes/DatabaseConnection.php';
require_once '../classes/DatabaseCrud.php';
$config = require_once '../config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $crud = new DatabaseCrud();
  $user = $crud->read("users", "email = '$email' AND role = 'admin'", "*");

  if (!empty($user)) {
    $user = $user[0];

    if (password_verify($password, $user['password'])) {
      $_SESSION['admin_logged_in'] = true;
      $_SESSION['admin_user'] = $user;

      header("Location: " . $config['base_url'] . "pages/dashboard");
      exit;
    } else {
      $error = "Invalid email or password.";
    }
  } else {
    $error = "User not found or not an admin.";
  }
}
?>


<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- /.login-box -->