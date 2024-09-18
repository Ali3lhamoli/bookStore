<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'حسابى';
require_once 'inc/subSectionFromMain.php';

?>


<section
  class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
  <div class="profile__right">
    <div class="profile__user mb-3 d-flex gap-3 align-items-center">
      <div class="profile__user-img rounded-circle overflow-hidden">
        <img class="w-100" src="assets/images/user.png" alt="" />
      </div>
      <div class="profile__user-name">moamenyt</div>
    </div>
    <ul class="profile__tabs list-unstyled ps-3">
      <li class="profile__tab">
        <a
          class="py-2 px-3 text-black text-decoration-none"
          href="profile.html">لوحة التحكم</a>
      </li>
      <li class="profile__tab">
        <a
          class="py-2 px-3 text-black text-decoration-none"
          href="orders.html">الطلبات</a>
      </li>

      <li class="profile__tab active">
        <a
          class="py-2 px-3 text-black text-decoration-none"
          href="account_details.html">تفاصيل الحساب</a>
      </li>
      <li class="profile__tab">
        <a
          class="py-2 px-3 text-black text-decoration-none"
          href="favourites.html">المفضلة</a>
      </li>
      <li class="profile__tab">
        <a class="py-2 px-3 text-black text-decoration-none" href="">تسجيل الخروج</a>
      </li>
    </ul>
  </div>
  <div class="profile__left mt-4 mt-md-0 w-100">
    <div class="profile__tab-content active">
      <form class="profile__form border p-3" action="<?= $config['base_url']; ?>index.php?page=change_account_details" method="POST">
        <div class="w-100">
          <label class="fw-bold mb-2" for="name">
            الاسم<span class="required">*</span>
          </label>
          <input name="name" type="text" class="form__input" id="name" />
        </div>
        <div class="w-100 mb-3">
          <label class="fw-bold mb-2" for="email">
            البريد الالكتروني<span class="required">*</span>
          </label>
          <input name="email" type="text" class="form__input" id="email" />
        </div>
        <button class="primary-button">تعديل</button>
      </form>
      <form action="<?= $config['base_url']; ?>index.php?page=change_password" method="POST">
        <fieldset>
          <legend class="fw-bolder">تغيير كلمة المرور</legend>
          <div class="w-100 mb-3">
            <label class="fw-bold mb-2" for="curr-password">
              كلمة المرور الحالية (اترك الحقل فارغاً إذا كنت لا تودّ
              تغييرها)
            </label>
            <input type="text" class="form__input" id="curr-password" />
          </div>
          <div class="w-100 mb-3">
            <label class="fw-bold mb-2" for="curr-password">
              كلمة المرور الجديدة (اترك الحقل فارغاً إذا كنت لا تودّ
              تغييرها)
            </label>
            <input type="text" class="form__input" id="curr-password" />
          </div>
          <div class="w-100 mb-3">
            <label class="fw-bold mb-2" for="curr-password">
              تأكيد كلمة المرور الجديدة
            </label>
            <input type="text" class="form__input" id="curr-password" />
          </div>
          <button class="primary-button">تغيير كلمة المرور</button>
        </fieldset>
      </form>
    </div>
  </div>
</section>
</main>

<?php

require_once 'inc/footer.php';

?>