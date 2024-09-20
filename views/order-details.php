<?php
session_start();
require_once 'inc/header.php';
require_once 'inc/nav.php';
require_once "classes/DatabaseConnection.php";
require_once "classes/DatabaseCrud.php";

$sub_section = 'تفاصيل طلبك';
require_once 'inc/subSectionFromMain.php';

if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
    header("Location: " . $config['base_url'] . "index.php?page=orders");
    exit;
}

$order_id = $_GET['order_id'];
$crud = new DatabaseCrud();

$orderDetails = $crud->read("orders", "id = '$order_id'", "*");

if (empty($orderDetails)) {
    $_SESSION['order_not_found'] = "عذرًا، لم يتم العثور على طلب بهذا الرقم.";
    header("Location: " . $config['base_url'] . "index.php?page=orders");
    exit;
}

$orderDetails = $orderDetails[0];

$orderItems = $crud->read("order_items JOIN books ON order_items.book_id = books.id", 
                          "order_items.order_id = '" . $order_id . "'",
                          "books.title, order_items.quantity, order_items.unit_price");

?>
<main>
<?php if (isset($_SESSION['order_not_found'])): ?>
<section>
  <div class="alert alert-danger">
    <?php echo $_SESSION['order_not_found']; ?>
  </div>
</section>
<?php 
unset($_SESSION['order_not_found']);
else: ?>
<section class="section-container my-5 py-5">
    <p>
      تم تقديم الطلب #<?php echo $orderDetails['id']; ?> في <?php echo date('d-m-Y', strtotime($orderDetails['created_at'])); ?> وهو الآن بحالة <?php echo ucfirst($orderDetails['shipping_status']); ?>.
    </p>

    <section>
      <h2>تفاصيل الطلب</h2>
      <table class="success__table w-100 mb-5">
        <thead>
          <tr class="border-0 bg-danger text-white">
            <th>المنتج</th>
            <th class="d-none d-md-table-cell">الإجمالي</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          foreach ($orderItems as $item) {
              $itemTotal = $item['unit_price'] * $item['quantity'];
              $total += $itemTotal;
          ?>
          <tr>
            <td>
              <div>
                <a href="#"><?php echo $item['title']; ?>, <?php echo $item['quantity']; ?></a> x <?php echo $item['quantity']; ?>
              </div>
            </td>
            <td><?php echo number_format($itemTotal, 2); ?> جنيه</td>
          </tr>
          <?php } ?>
          <tr>
            <th>المجموع:</th>
            <td class="fw-bolder"><?php echo number_format($total, 2); ?> جنيه</td>
          </tr>
          <tr>
            <th>الإجمالي:</th>
            <td class="fw-bold"><?php echo number_format($orderDetails['total_price'], 2); ?> جنيه</td>
          </tr>
        </tbody>
      </table>
    </section>

    <section class="mb-5">
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
</section>
<?php endif; ?>
</main>

<?php
require_once 'inc/footer.php';
?>
