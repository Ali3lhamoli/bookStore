<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'فروعنا';
require_once 'inc/subSectionFromMain.php';

$branches = $crud->read('branches');

?>


<section class="branches section-container my-5 py-5">
  <div class="row">
    <?php foreach($branches as $branch): ?>
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="branches__item h-100">
        <h3><?= $branch['branch']; ?></h3>
        <p><?= $branch['address']; ?></p>
        <div
          class="branches__contact d-flex align-items-center gap-2 mb-3">
          <div class="branches__icon">
            <i class="fa-solid fa-phone"></i>
          </div>
          <div>
            <p class="mb-0 fw-bolder">اتصل بنا</p>
            <p class="mb-0"><?= $branch['phone']; ?></p>
          </div>
        </div>
        <div class="branches__location d-flex align-items-center gap-2">
          <div class="branches__icon">
            <i class="fa-solid fa-location-dot"></i>
          </div>
          <div>
            <p class="mb-0 fw-bolder">زورنا في الفرع</p>
            <p class="mb-0"><?= $branch['brief_branch']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
</main>

<?php

require_once 'inc/footer.php';

?>