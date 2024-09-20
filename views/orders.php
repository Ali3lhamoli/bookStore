

<?php
session_start();
require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'الطلبات';
require_once 'inc/subSectionFromMain.php';

$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    header("Location: " . $config['base_url'] . "index.php?page=login");
    exit;
}

$crud = new DatabaseCrud();

$orders = $crud->read("orders", "user_id = '$user_id'", "*");

?>

<section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
<div class="profile__right">
      <div class="profile__user mb-3 d-flex gap-3 align-items-center">
        <div class="profile__user-img rounded-circle overflow-hidden">
          <img class="w-100" src="assets/images/user.png" alt="">
        </div>
        <div class="profile__user-name">moamenyt</div>
      </div>
      <ul class="profile__tabs list-unstyled ps-3">
        <li class="profile__tab">
          <a class="py-2 px-3 text-black text-decoration-none" href="profile.html">لوحة التحكم</a>
        </li>
        <li class="profile__tab active">
          <a class="py-2 px-3 text-black text-decoration-none" href="orders.html">الطلبات</a>
        </li>
        <li class="profile__tab">
          <a class="py-2 px-3 text-black text-decoration-none" href="account_details.html">تفاصيل الحساب</a>
        </li>
        <li class="profile__tab">
          <a class="py-2 px-3 text-black text-decoration-none" href="favourites.html">المفضلة</a>
        </li>
        <li class="profile__tab">
          <a class="py-2 px-3 text-black text-decoration-none" href="">تسجيل الخروج</a>
        </li>
      </ul>
    </div>
    <div class="profile__left mt-4 mt-md-0 w-100">
        <div class="profile__tab-content orders active">
            <?php if (empty($orders)): ?>
            <div class="orders__none d-flex justify-content-between align-items-center py-3 px-4">
                <p class="m-0">لم يتم تنفيذ اي طلب بعد.</p>
                <a href="index.php" class="primary-button">تصفح المنتجات</a>
            </div>
            <?php else: ?>
            <table class="orders__table w-100">
                <thead>
                    <tr>
                        <th class="d-none d-md-table-cell">الطلب</th>
                        <th class="d-none d-md-table-cell">التاريخ</th>
                        <th class="d-none d-md-table-cell">الحالة</th>
                        <th class="d-none d-md-table-cell">الاجمالي</th>
                        <th class="d-none d-md-table-cell">اجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                    <tr class="order__item">
                        <td class="d-flex justify-content-between d-md-table-cell">
                            <div class="fw-bolder d-md-none">الطلب:</div>
                            <div><a href="index.php?page=order-details&order_id=<?php echo $order['id']; ?>">#<?php echo $order['id']; ?></a></div>
                        </td>
                        <td class="d-flex justify-content-between d-md-table-cell">
                            <div class="fw-bolder d-md-none">التاريخ:</div>
                            <div><?php echo date('d-m-Y', strtotime($order['created_at'])); ?></div>
                        </td>
                        <td class="d-flex justify-content-between d-md-table-cell">
                            <div class="fw-bolder d-md-none">الحالة:</div>
                            <div><?php echo ucfirst($order['status']); ?></div>
                        </td>
                        <td class="d-flex justify-content-between d-md-table-cell">
                            <div class="fw-bolder d-md-none">الاجمالي:</div>
                            <div><?php echo number_format($order['total_price'], 2); ?> جنيه</div>
                        </td>
                        <td class="d-flex justify-content-between d-md-table-cell">
                            <div class="fw-bolder d-md-none">اجراءات:</div>
                            <div><a class="primary-button" href="index.php?page=order-details&order_id=<?php echo $order['id']; ?>">عرض</a></div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</section>
</main>

<?php
require_once 'inc/footer.php';
?>
