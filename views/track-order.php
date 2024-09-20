<?php
session_start();
require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'تتبع طلبك';
require_once 'inc/subSectionFromMain.php';

$path = $config['base_url'] . "index.php?page=track-order-controller";

?>

  <section class="section-container my-5 py-5">
    <?php if(isset($_SESSION['order_not_found'])):?>
    <div class="alert alert-danger">
      <?php echo $_SESSION['order_not_found']; ?>
    </div>
    <?php endif; ?>
    <p class="mb-5">فضلًا أدخل رقم طلبك في الصندوق أدناه وأضغط زر لتتبعه "تتبع الطلب" لعرض حالته. بإمكانك العثور على رقم الطلب في البريد المرسل إليك والذي يحتوي على فاتورة تأكيد الطلب.</p>
    <form action="<?php echo $path; ?>" method="POST">
      <div class="mb-4">
        <label for="">رقم الطلب</label>
        <input class="form__input" name="order_id" id="order_id" required placeholder="ستجده في رسالة تأكيد طلبك." type="text">
      </div>
      <div class="mb-4">
        <label for="">البريد الالكتروني للفاتورة</label>
        <input class="form__input" name="email" id="email" required placeholder="البريد الالكتروني الذي استخدمته اثناء اتمام الطلب" type="text">
      </div>
      <button class="primary-button">تتبع طلبك</button>
    </form>
  </section>
</main>

<?php

unset($_SESSION['order_not_found']);
require_once 'inc/footer.php';

?>