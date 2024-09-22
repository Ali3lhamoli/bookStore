<section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
    <div class="profile__right">
      <div class="profile__user mb-3 d-flex gap-3 align-items-center">
        <div class="profile__user-img rounded-circle overflow-hidden">
          <img class="w-100" src="assets/images/user.png" alt="">
        </div>
        <div class="profile__user-name">moamenyt</div>
      </div>
      <ul class="profile__tabs list-unstyled ps-3">
        <li class="profile__tab <?php echo $_GET['page']=='profile' ? 'active' : null ?>">
          <a class="py-2 px-3 text-black text-decoration-none" href="<?= $config['base_url']; ?>index.php?page=profile">لوحة التحكم</a>
        </li>
        <li class="profile__tab <?php echo $_GET['page']=='orders' ? 'active' : null ?>">
          <a class="py-2 px-3 text-black text-decoration-none" href="<?= $config['base_url']; ?>index.php?page=orders">الطلبات</a>
        </li>
        <li class="profile__tab <?php echo $_GET['page']=='account_details' ? 'active' : null ?>">
          <a class="py-2 px-3 text-black text-decoration-none" href="<?= $config['base_url']; ?>index.php?page=account_details">تفاصيل الحساب</a>
        </li>
        <li class="profile__tab">
          <a class="py-2 px-3 text-black text-decoration-none" href="<?= $config['base_url']; ?>index.php?page=favourites">المفضلة</a>
        </li>
        <li class="profile__tab">
          <a class="py-2 px-3 text-black text-decoration-none" href="<?= $config['base_url']; ?>index.php?page=logout">تسجيل الخروج</a>
        </li>
      </ul>
    </div>