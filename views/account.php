<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'حسابى';
require_once 'inc/subSectionFromMain.php';
require_once 'function.php';

?>



<?php

 
?>
<style>
  a {
    text-decoration: none;
    color: black;
  }
</style>
<div class="page-full pb-5">
  <div class="account account--register mt-5 pt-5">
    <div class="account__tabs w-100 d-flex mb-3">
      <div style="background-color: gray;" class=" text-center fs-6 py-3 w-50">
        <a href="<?= $config['base_url']; ?>index.php?page=accountLogin" style="color:white">تسجيل دخول</a>
      </div>
      <div class="account__tab account__tab--register text-center fs-6 py-3 w-50">
        <a href="<?= $config['base_url']; ?>index.php?page=account" style="color:white">حساب جديد</a>
      </div>
    </div>




    <div class="account__register w-100">
      <form class="mb-5" action="./controllers/register.php" method="POST">



        <div class="input-group rounded-1 mb-3">
          <input type="text" class="form-control p-3" placeholder="الاسم كامل" name="name" aria-label="Username"
            aria-describedby="basic-addon1" <?php if(isset($_SESSION['name'])): ?>
            value=" <?php $_SESSION['name'] ?>" <?php endif ?> />

          <span class="input-group-text login__input-icon" id="basic-addon1">
            <i class="fa-solid fa-user"></i>
          </span>

        </div>
        <?php  if(isset($_SESSION['errors']['name'])): ?>
        <h4 class="text-end text-danger"><?php echo $_SESSION['errors']['name'] ?></h4>

        <?php  endif ?>
        



        <div class="input-group rounded-1 mb-3">

          <input type="text" class="form-control p-3" placeholder="البريد الالكتروني" name="email" aria-label="Email" aria-describedby="basic-addon1" 
            <?php if(isset($_SESSION['email'])): ?> value=" <?php $_SESSION['email'] ?>" <?php endif ?> />

          <span class="input-group-text login__input-icon" id="basic-addon1">
            <i class="fa-solid fa-envelope"></i>
          </span>

        </div>
        <?php  if(isset($_SESSION['errors']['email'])): ?>
        <h4 class="text-end text-danger"><?php echo $_SESSION['errors']['email'] ?></h4>

        <?php  endif ?>

        
        <div class="input-group rounded-1 mb-3">
          <input type="password" class="form-control p-3" placeholder="كلمة السر" name="password" aria-label="Password"
            aria-describedby="basic-addon1" />
          <span class="input-group-text login__input-icon" id="basic-addon1">
            <i class="fa-solid fa-key"></i>
          </span>
        </div>

        <?php  if(isset($_SESSION['errors']['password'])): ?>
        <h4 class="text-end text-danger"><?php echo $_SESSION['errors']['password'] ?></h4>

        <?php  endif ?>

        <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
          حساب جديد
        </button>
      </form>
    </div>
    <div class="account__forget">
      <p>
        فقدت كلمة المرور الخاصة بك؟ الرجاء إدخال عنوان البريد الإلكتروني
        الخاص بك. ستتلقى رابطا لإنشاء كلمة مرور جديدة عبر البريد
        الإلكتروني.
      </p>
      <form action="">
        <div class="input-group rounded-1 mb-3">
          <input type="text" class="form-control p-3" placeholder="البريد الالكتروني" aria-label="Username"
            aria-describedby="basic-addon1" />
          <span class="input-group-text login__input-icon" id="basic-addon1">
            <i class="fa-solid fa-envelope"></i>
          </span>
        </div>
        <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
          اعادة تعيين كلمة المرور
        </button>
      </form>
    </div>

  </div>
</div>


<?php
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['errors']['name']);
unset($_SESSION['errors']['email']);
unset($_SESSION['errors']['password']);
require_once 'inc/footer.php';

?>