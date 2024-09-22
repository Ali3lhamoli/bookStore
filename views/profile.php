<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'حسابى';
require_once 'inc/subSectionFromMain.php';
require_once 'inc/sidebar.php';


?>


<div class="profile__left mt-4 mt-md-0 w-100">
  <div class="profile__tab-content active">
    <p class="mb-5">
      مرحبا <span class="fw-bolder"><?= $_SESSION['client']['name'] ?></span> (لست
      <span class="fw-bolder"><?= $_SESSION['client']['name'] ?></span>?
      <a class="text-danger" href="<?= $config['base_url']; ?>index.php?page=logout">تسجيل الخروج</a>)
    </p>

    <p>
      من خلال لوحة تحكم الحساب الخاص بك، يمكنك استعراض
      <a class="text-danger" href="<?= $config['base_url']; ?>index.php?page=orders">أحدث الطلبات</a>،
      والفواتير
      الخاصة بك، بالإضافة إلى
      <a class="text-danger" href="<?= $config['base_url']; ?>index.php?page=account_details">تعديل كلمة المرور وتفاصيل حسابك</a>.
    </p>
  </div>
</div>
</section>
</main>
<?php

require_once 'inc/footer.php';

?>