<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'من نحن';
require_once 'inc/subSectionFromMain.php';

$about = $crud->read('aboutus');

?>

<?php foreach($about as $section): ?>
<section class="section-container d-flex align-items-center py-4<?= $section['id']%2==0 ? ' text-white bg-black': null ?>">
  <div class="about__img text-center w-50">
    <img class="w-100" src="<?= $config['base_url']; ?>assets/images/<?= $section['image'] ?>" alt="" />
  </div>
  <div class="w-50">
    <h4 class="fw-bolder m-4"><?= $section['title'] ?></h4>
    <p class="m-2"><?= $section['description'] ?></p>
  </div>
</section>
<?php endforeach; ?>
<section class="section-container py-5">
  <h4 class="text-center fw-bolder mb-4">
    مميزات الشراء من Coding arabic
  </h4>
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="features__item d-flex align-items-center gap-2">
        <div class="features__img">
          <img class="w-100" src="assets/images/feature-1.png" alt="" />
        </div>
        <div>
          <h6 class="features__item-title m-0">شحن سريع</h6>
          <p class="features__item-text m-0">
            سعر شحن موحد لجميع المحافظات ويصلك في أقل من 72 ساعة
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="features__item d-flex align-items-center gap-2">
        <div class="features__img">
          <img class="w-100" src="assets/images/feature-2.png" alt="" />
        </div>
        <div>
          <h6 class="features__item-title m-0">ضمان الجودة</h6>
          <p class="features__item-text m-0">
            خامات عالية الجودة ومرونه فى طلبات الاستبدال والاسترجاع
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="features__item d-flex align-items-center gap-2">
        <div class="features__img">
          <img class="w-100" src="assets/images/feature-3.png" alt="" />
        </div>
        <div>
          <h6 class="features__item-title m-0">دعم فني</h6>
          <p class="features__item-text m-0">
            دعم فني على مدار اليوم للإجابة على اي استفسار لديك
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="features__item d-flex align-items-center gap-2">
        <div class="features__img">
          <img class="w-100" src="assets/images/feature-4.png" alt="" />
        </div>
        <div>
          <h6 class="features__item-title m-0">استبدال سهل</h6>
          <p class="features__item-text m-0">
            يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
</main>

<?php

require_once 'inc/footer.php';

?>