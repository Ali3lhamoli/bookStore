<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'تواصل معنا';
require_once 'inc/subSectionFromMain.php';

?>


<section class="section-container py-5">
  <div class="row">
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="contact__item h-100 d-flex align-items-center gap-2">
        <div class="contact__icon">
          <i class="fa-solid fa-phone"></i>
        </div>
        <div>
          <h6 class="contact__item-title m-0">اتصل بنا</h6>
          <p class="contact__item-text m-0">01063888667</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="contact__item h-100 d-flex align-items-center gap-2">
        <div class="contact__icon">
          <i class="fa-regular fa-envelope"></i>
        </div>
        <div>
          <h6 class="contact__item-title m-0">راسلنا علي الايميل</h6>
          <p class="contact__item-text m-0">eraasoft@gmail.com</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="contact__item h-100 d-flex align-items-center gap-2">
        <div class="contact__icon">
          <i class="fa-solid fa-location-dot"></i>
        </div>
        <div>
          <h6 class="contact__item-title m-0">العنوان</h6>
          <p class="contact__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
      <div class="contact__item h-100 d-flex align-items-center gap-2">
        <div class="contact__icon">
          <i class="fa-solid fa-comments"></i>
        </div>
        <div>
          <h6 class="contact__item-title m-0">دعم متواصل</h6>
          <p class="contact__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-container contact d-md-flex align-items-center mb-3">
  <div class="contact__side w-50">
    <h4 class="mb-3">يسعدنا تواصلك معنا في أى وقت</h4>
    <p>إذا كنت تواجه أي مشكلة أو ترغب في إسترجاع أو إستبدال المنتج لا تتردد أبدأ بالتواصل معنا في أي وقت. كل ماعليك هو ملئ النموذج التالي ببيانات صحيحة وسنقوم بمراجعة طلبك في أسرع وقت.</p>

    <?php if (isset($_SESSION['contact_errors'])): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php foreach ($_SESSION['contact_errors'] as $error): ?>
          <li><?= $error ?></li>
        <?php endforeach; ?>
      </div>
      <?php unset($_SESSION['contact_errors']) ?>
    <?php elseif(isset($_SESSION['contact_success'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['contact_success']; ?></strong>
      </div>
      <?php unset($_SESSION['contact_success']) ?>
    <?php endif; ?>

    <form class="contact__form" action="<?= $config['base_url']; ?>index.php?page=contact_us" method="POST">
      <div class="d-flex gap-3 mb-3">
        <div class="w-50">
          <label for="name">الاسم<span class="required">*</span></label>
          <input name="name" class="contact__input" id="name" type="text">
        </div>
        <div class="w-50">
          <label for="phone">رقم الهاتف<span class="required">*</span></label>
          <input name="phone" class="contact__input" id="phone" type="text">
        </div>
      </div>
      <div class="mb-3">
        <label for="email">البريد الالكتروني<span class="required">*</span></label>
        <input name="email" class="contact__input" id="email" type="text">
      </div>
      <div class="mb-3">
        <label for="reason">سبب التواصل<span class="required">*</span></label>
        <select name="couse" class="contact__input" id="reason">
          <option value="">- اضغط هنا لاختيرا السبب -</option>
          <option value="استفسار">استفسار</option>
          <option value="استبدال">استبدال</option>
          <option value="استرجاع">استرجاع</option>
          <option value="استعجال اوردر">استعجال اوردر</option>
          <option value="اخرى">اخرى</option>
        </select>
      </div>
      <div>
        <label for="reason">نص الرسالة<span class="required">*</span></label>
        <textarea name="massege" class="contact__input" name="" id=""></textarea>
      </div>
      <button class="primary-button w-100 rounded-2">ارسال الطلب</button>
    </form>
  </div>
  <div class="contact__side w-50 text-center">
    <img class="w-100" src="assets/images/contact-1.png" alt="">
  </div>
</section>

<div class="section-container my-5 px-4">
  <div class="contact__map"></div>
</div>
</main>

<?php

require_once 'inc/footer.php';

?>