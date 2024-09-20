<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'حسابى';
require_once 'inc/subSectionFromMain.php';
require_once 'inc/sidebar.php';

?>

<div class="profile__left mt-4 mt-md-0 w-100">
  <div class="profile__tab-content active">
    <div class="mb-3">
      <?php if (!empty($_SESSION['change_det_success'])): ?>
        <?php foreach ($_SESSION['change_det_success'] as $error): ?>
          <div class="text-danger"><?= $error ?></div>
        <?php endforeach; ?>
        <?php unset($_SESSION['change_det_success']) ?>
      <?php endif; ?>
    </div>
    <form class="profile__form border p-3" action="<?= $config['base_url']; ?>index.php?page=change_account_details" method="POST">
      <div class="w-100">
        <div class="mb-3">
          <?php if (!empty($_SESSION['change_det_errors']['name&email'])): ?>
            <div class="text-danger"><?= $_SESSION['change_det_errors']['name&email']; ?></div>
          <?php endif; ?>
        </div>
        <label class="fw-bold mb-2" for="name">
          الاسم<span class="required">*</span>
          <div class="mb-3">
            <?php if (!empty($_SESSION['change_det_errors']['name'])): ?>
              <div class="text-danger"><?= $_SESSION['change_det_errors']['name']; ?></div>
            <?php endif; ?>
          </div>
        </label>
        <input name="name" type="text" class="form__input" id="name" />
      </div>
      <div class="w-100 mb-3">
        <label class="fw-bold mb-2" for="email">
          البريد الالكتروني<span class="required">*</span>
          <div class="mb-3">
            <?php if (!empty($_SESSION['change_det_errors']['email'])): ?>
              <div class="text-danger"><?= $_SESSION['change_det_errors']['email']; ?></div>
            <?php endif; ?>
          </div>
        </label>
        <input name="email" type="text" class="form__input" id="email" />
      </div>
      <button class="primary-button">تعديل</button>
    </form>
    <form action="<?= $config['base_url']; ?>index.php?page=change_password" method="POST">
      <fieldset>
        <legend class="fw-bolder p-4">تغيير كلمة المرور</legend>
        <div class="mb-3">
          <?php if (!empty($_SESSION['change_det_errors']['password'])): ?>
            <div class="text-danger"><?= $_SESSION['change_det_errors']['password']; ?></div>
          <?php endif; ?>
        </div>
        <div class="w-100 mb-3">
          <label class="fw-bold m-2" for="curr-password">
            كلمة المرور الحالية (اترك الحقل فارغاً إذا كنت لا تودّ
            تغييرها)
          </label>
          <input name="current_pass" type="text" class="form__input" id="curr-password" />
        </div>
        <div class="w-100 mb-3">
          <label class="fw-bold m-2" for="curr-password">
            كلمة المرور الجديدة (اترك الحقل فارغاً إذا كنت لا تودّ
            تغييرها)
          </label>
          <input name="new_pass" type="text" class="form__input" id="curr-password" />
        </div>
        <div class="w-100 mb-3">
          <label class="fw-bold m-2" for="curr-password">
            تأكيد كلمة المرور الجديدة
          </label>
          <input name="confirm_pass" type="text" class="form__input" id="curr-password" />
        </div>
        <button class="primary-button m-2">تغيير كلمة المرور</button>
      </fieldset>
    </form>
  </div>
</div>
</section>
</main>

<?php
unset($_SESSION['change_det_errors']);
require_once 'inc/footer.php';

?>