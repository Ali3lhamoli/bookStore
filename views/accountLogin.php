<?php
require_once 'function.php';


require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'login';
require_once 'inc/subSectionFromMain.php';


 
?>


<style>
  a {
    text-decoration: none;

  }
</style>


<div class="page-full pb-5">
  <div class="account account--login mt-5 pt-5">
    <div class="account__tabs w-100 d-flex mb-3">
      <div style="background-color: gray;" class=" text-center fs-6 py-3 w-50">
        <a href="<?= $config['base_url']; ?>index.php?page=accountLogin" style="color:white;text-decoration: none;">تسجيل
          دخول</a>
      </div>
      <div style="background-color: black;" class=" text-center fs-6 py-3 w-50">
        <a href="<?= $config['base_url']; ?>index.php?page=account" style="color:white">حساب جديد</a>
      </div>
    </div>
    <div class="account__login w-100">
      <form class="mb-5" action="controllers/login.php" method="POST">
        <div class="input-group rounded-1 mb-3">
          <input type="text" class="form-control p-3" placeholder="البريد الالكتروني" name="email" aria-label="Email"
            aria-describedby="basic-addon1" <?php if (isset($_SESSION['email'])): ?> value="<?= $_SESSION['email'] ?>"
            <?php endif ?> />
          <span class="input-group-text login__input-icon" id="basic-addon1">
            <i class="fa-solid fa-envelope"></i>
          </span>

        </div>
        <?php if (isset($_SESSION['errors'][0]['email'])): ?>
         <?php  $_SESSION['errors'] ?>
          <h4 class="text-end text-danger"><?php echo $_SESSION['errors'][0]['email'] ?></h4>
 
        <?php endif ?>
   
        <div class="input-group rounded-1 mb-3">
          <input type="password" class="form-control p-3" placeholder="كلمة السر" name="password" aria-label="Password"
            aria-describedby="basic-addon1" <?php  if(isset($_SESSION['password'])): ?>
            value="<?= $_SESSION['password'] ?>" <?php  endif ?> />
          <span class="input-group-text login__input-icon" id="basic-addon1">
            <i class="fa-solid fa-key"></i>
          </span>
        </div>
        <?php  if(isset($_SESSION['errors'][0]['password'])): ?>
        <h4 class="text-end text-danger"><?php echo $_SESSION['errors'][0]['password'] ?></h4>

        <?php  endif ?>

        <div class="login__bottom d-flex justify-content-between mb-3">
          <a class="login__forget-btn" href="">نسيت كلمة المرور؟</a>
          <div>
            <input type="checkbox" />
            <label for="">تذكرني</label>
          </div>
        </div>

        <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
          تسجيل الدخول
        </button>
      </form>
    </div>
  </div>
</div>



<?php

unset($_SESSION['email']);
unset($_SESSION['password']);

unset($_SESSION['errors'][0]['email']);
unset($_SESSION['errors'][0]['password']);
require_once 'inc/footer.php';

?>