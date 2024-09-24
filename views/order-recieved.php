<?php
session_start();
require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'تتبع طلبك';
require_once 'inc/subSectionFromMain.php';

$orderDetails = $_SESSION['order_details'] ?? '';



if ($orderDetails && $orderDetails === null) {
  header("Location: " . $config['base_url'] . "index.php?page=track-order");
  exit;
}
// dd($orderDetails);
?>

<section class="section-container profile my-5 py-5">
  <div class="text-center mb-5">
    <div class="success-gif m-auto">
      <?php if ($orderDetails['shipping_status'] == 'pending'): ?>
        <img class="w-100" src="assets/images/pending.gif" alt="Order Pending" />
        <h4 class="mb-4">جاري تجهيز طلبك الآن</h4>
        <p class="mb-1">سيقوم أحد ممثلي خدمة العملاء بالتواصل معك لتأكيد الطلب</p>
        <p>برجاء الرد على الأرقام الغير مسجلة</p>
      <?php elseif ($orderDetails['shipping_status'] == 'shipped'): ?>
        <img class="w-100" src="assets/images/shipped.gif" alt="Order Shipped" />
        <h4 class="mb-4">تم شحن طلبك</h4>
        <p class="mb-1">سيتم توصيل طلبك قريبًا. شكرًا لتعاملك معنا.</p>
      <?php elseif ($orderDetails['shipping_status'] == 'delivered'): ?>
        <img class="w-100" src="assets/images/delivered.gif" alt="Order Delivered" />
        <h4 class="mb-4">تم توصيل طلبك</h4>
        <p class="mb-1">شكرًا لتعاملك معنا. نتمنى أن تكون سعيدًا بمنتجاتك.</p>
      <?php elseif ($orderDetails['shipping_status'] == 'cancelled'): ?>
        <img class="w-100" src="assets/images/cancelled.gif" alt="Order Cancelled" />
        <h4 class="mb-4">تم إلغاء طلبك</h4>
        <p class="mb-1">عذرًا، لقد تم إلغاء طلبك. برجاء التواصل معنا إذا كان هناك أي استفسارات.</p>
      <?php endif; ?>
    </div>
    <a href="<?php echo $config['base_url'] .'index.php?page=orders' ?>" class="primary-button">تصفح منتجات أخرى</a>
  </div>

  <div>
    <p>شكرًا لك. تم استلام طلبك.</p>
    <div class="d-flex flex-wrap gap-2">
      <div class="success__details">
        <p class="success__small">رقم الطلب:</p>
        <p class="fw-bolder"><?php echo $orderDetails['0']; ?></p>
      </div>
      <div class="success__details">
        <p class="success__small">التاريخ:</p>
        <p class="fw-bolder"><?php echo date('d-m-Y', strtotime($orderDetails['created_at'])); ?></p>
      </div>
      <div class="success__details">
        <p class="success__small">البريد الإلكتروني:</p>
        <p class="fw-bolder"><?php echo $orderDetails['billing_email']; ?></p>
      </div>
      <div class="success__details">
        <p class="success__small">الإجمالي:</p>
        <p class="fw-bolder"><?php echo $orderDetails['total_price']; ?> جنيه</p>
      </div>
      <div class="success__details">
        <p class="success__small">حالة الدفع:</p>
        <p class="fw-bolder"><?php echo ucfirst($orderDetails['payment_status']); ?></p>
      </div>
      <div class="success__details">
        <p class="success__small">حالة الشحن:</p>
        <p class="fw-bolder"><?php echo ucfirst($orderDetails['shipping_status']); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="section-container">
  <h2>تفاصيل الطلب</h2>
  <table class="success__table w-100 mb-5">
    <thead>
      <tr class="border-0 bg-main text-white">
        <th>المنتج</th>
        <th class="d-none d-md-table-cell">الإجمالي</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $orderItems = $crud->read(
        "order_items JOIN books ON order_items.book_id = books.id",
        "order_items.order_id = '" . $orderDetails['0'] . "'",
        "books.title, order_items.quantity, order_items.unit_price"
      );
      $total = 0;
      foreach ($orderItems as $item) {
        $total += $item['unit_price'] * $item['quantity'];
      ?>
        <tr>
          <td>
            <div>
              <a href="#"><?php echo $item['title']; ?>, <?php echo $item['quantity']; ?></a> x <?php echo $item['quantity']; ?>
            </div>
          </td>
          <td><?php echo $item['unit_price']; ?> جنيه</td>
        </tr>
      <?php } ?>
      <tr>
        <th>المجموع:</th>
        <td class="fw-bolder"><?php echo $total; ?> جنيه</td>
      </tr>
      <tr>
        <th>الإجمالي:</th>
        <td class="fw-bold"><?php echo $orderDetails['total_price']; ?> جنيه</td>
      </tr>
    </tbody>
  </table>
</section>

<section class="section-container mb-5">
  <h2>عنوان الفاتورة</h2>
  <div class="border p-3 rounded-3">
    <p class="mb-1"><?php echo $orderDetails['billing_name']; ?></p>
    <p class="mb-1"><?php echo $orderDetails['billing_address']; ?></p>
    <p class="mb-1"><?php echo $orderDetails['billing_city']; ?></p>
    <p class="mb-1"><?php echo $orderDetails['billing_postal_code']; ?></p>
    <p class="mb-1"><?php echo $orderDetails['billing_phone']; ?></p>
    <p class="mb-1"><?php echo $orderDetails['billing_email']; ?></p>
  </div>
</section>

<?php
unset($_SESSION['order_details']);

require_once 'inc/footer.php';
?>