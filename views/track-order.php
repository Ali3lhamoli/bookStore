<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'تتبع طلبك';
require_once 'inc/subSectionFromMain.php';

?>


<section class="section-container my-5 py-5">
  <p class="mb-5">فضلًا أدخل رقم طلبك في الصندوق أدناه وأضغط زر لتتبعه "تتبع الطلب" لعرض حالته. بإمكانك العثور على رقم الطلب في البريد المرسل إليك والذي يحتوي على فاتورة تأكيد الطلب.</p>
  <form action="">
    <div class="mb-4">
      <label for="">رقم الطلب</label>
      <input class="form__input" placeholder="ستجده في رسالة تأكيد طلبك." type="text">
    </div>
    <div class="mb-4">
      <label for="">البريد الالكتروني للفاتورة</label>
      <input class="form__input" placeholder="البريد الالكتروني الذي استخدمته اثناء اتمام الطلب" type="text">
    </div>
    <button class="primary-button">تتبع طلبك</button>
  </form>
</section>
</main>

<?php

require_once 'inc/footer.php';

?>