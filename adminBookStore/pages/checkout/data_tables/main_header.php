<?php
$active_menu = "checkout";
include_once "../layout/header.php";

require_once '../../classes/DatabaseConnection.php';
require_once '../../classes/DatabaseCrud.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header d-flex justify-content-between align-items-center">
            <h3 class="box-title">Checkout</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="checkoutTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Order ID</th>
                  <th>Payment Method</th>
                  <th>Transaction ID</th>
                  <th>Shipping Address</th>
                  <th>Billing Address</th>
                  <th>Payment Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $crud = new DatabaseCrud();
                $checkoutRecords = $crud->read("checkout");

                foreach ($checkoutRecords as $checkout) {
                  echo "
                  <tr>
                      <td>{$checkout['id']}</td>
                      <td>{$checkout['order_id']}</td>
                      <td>{$checkout['payment_method']}</td>
                      <td>{$checkout['transaction_id']}</td>
                      <td>{$checkout['shipping_address']}</td>
                      <td>{$checkout['billing_address']}</td>
                      <td>{$checkout['payment_status']}</td>
                      <td>
                          <button class='btn btn-sm btn-primary edit-btn' 
                                  data-id='{$checkout['id']}' 
                                  data-order_id='{$checkout['order_id']}'
                                  data-payment_method='{$checkout['payment_method']}'
                                  data-transaction_id='{$checkout['transaction_id']}'
                                  data-shipping_address='{$checkout['shipping_address']}'
                                  data-billing_address='{$checkout['billing_address']}'
                                  data-payment_status='{$checkout['payment_status']}'>
                                  Edit
                          </button>
                          <a href='delete_checkout.php?id={$checkout['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this checkout record?\");'>Delete</a>
                      </td>
                  </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

  <!-- Edit Checkout Modal -->
  <div class="modal fade" id="editCheckoutModal" tabindex="-1" role="dialog" aria-labelledby="editCheckoutModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="editCheckoutForm" action="edit_checkout.php" method="POST">
          <input type="hidden" name="checkout_id" id="editCheckoutId">
          <div class="modal-header">
            <h4 class="modal-title" id="editCheckoutModalLabel">Edit Checkout</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="editCheckoutOrderId">Order ID</label>
              <input type="text" name="order_id" id="editCheckoutOrderId" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="editCheckoutPaymentMethod">Payment Method</label>
              <select name="payment_method" id="editCheckoutPaymentMethod" class="form-control">
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Bank Transfer</option>
                <option value="cash_on_delivery">Cash on Delivery</option>
              </select>
            </div>
            <div class="form-group">
              <label for="editCheckoutTransactionId">Transaction ID</label>
              <input type="text" name="transaction_id" id="editCheckoutTransactionId" class="form-control">
            </div>
            <div class="form-group">
              <label for="editCheckoutShippingAddress">Shipping Address</label>
              <textarea name="shipping_address" id="editCheckoutShippingAddress" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="editCheckoutBillingAddress">Billing Address</label>
              <textarea name="billing_address" id="editCheckoutBillingAddress" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="editCheckoutPaymentStatus">Payment Status</label>
              <select name="payment_status" id="editCheckoutPaymentStatus" class="form-control">
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
                <option value="failed">Failed</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Checkout</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- End Bootstrap Modal -->

</div><!-- /.content-wrapper -->

<?php include_once "../layout/footer.php" ?>

<script>
  $(document).ready(function () {
    $('.edit-btn').click(function () {
      // Retrieve the data from the clicked button
      var checkoutId = $(this).data('id');
      var orderId = $(this).data('order_id');
      var paymentMethod = $(this).data('payment_method');
      var transactionId = $(this).data('transaction_id');
      var shippingAddress = $(this).data('shipping_address');
      var billingAddress = $(this).data('billing_address');
      var paymentStatus = $(this).data('payment_status');

      // Populate the form fields in the modal
      $('#editCheckoutId').val(checkoutId);
      $('#editCheckoutOrderId').val(orderId);
      $('#editCheckoutPaymentMethod').val(paymentMethod);
      $('#editCheckoutTransactionId').val(transactionId);
      $('#editCheckoutShippingAddress').val(shippingAddress);
      $('#editCheckoutBillingAddress').val(billingAddress);
      $('#editCheckoutPaymentStatus').val(paymentStatus);

      // Show the modal
      $('#editCheckoutModal').modal('show');
    });
  });
</script>