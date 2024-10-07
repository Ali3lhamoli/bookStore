<?php
$active_menu = "orders";
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
            <h3 class="box-title">Orders</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="ordersTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User ID</th>
                  <th>Total Price</th>
                  <th>Payment Status</th>
                  <th>Shipping Status</th>
                  <th>Status</th>
                  <th>Billing Name</th>
                  <th>Billing Address</th>
                  <th>Billing City</th>
                  <th>Billing Postal Code</th>
                  <th>Billing Phone</th>
                  <th>Billing Email</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $crud = new DatabaseCrud();
                $orders = $crud->read("orders");

                foreach ($orders as $order) {
                  echo "
                  <tr>
                      <td>{$order['id']}</td>
                      <td>{$order['user_id']}</td>
                      <td>{$order['total_price']}</td>
                      <td>{$order['payment_status']}</td>
                      <td>{$order['shipping_status']}</td>
                      <td>{$order['status']}</td>
                      <td>{$order['billing_name']}</td>
                      <td>{$order['billing_address']}</td>
                      <td>{$order['billing_city']}</td>
                      <td>{$order['billing_postal_code']}</td>
                      <td>{$order['billing_phone']}</td>
                      <td>{$order['billing_email']}</td>
                      <td>
                            <button class='btn btn-sm btn-info view-btn'
                                data-id='{$order['id']}' 
                                data-user_id='{$order['user_id']}'
                                data-total_price='{$order['total_price']}'
                                data-payment_status='{$order['payment_status']}'
                                data-shipping_status='{$order['shipping_status']}'
                                data-billing_name='{$order['billing_name']}'
                                data-billing_address='{$order['billing_address']}'
                                data-billing_city='{$order['billing_city']}'
                                data-billing_postal_code='{$order['billing_postal_code']}'
                                data-billing_phone='{$order['billing_phone']}'
                                data-billing_email='{$order['billing_email']}'>
                                View
                            </button>
                            <button 
                                class='btn btn-sm btn-primary edit-btn' 
                                data-id='{$order['id']}' 
                                data-total_price='{$order['total_price']}' 
                                data-payment_status='{$order['payment_status']}' 
                                data-shipping_status='{$order['shipping_status']}' 
                                data-billing_name='{$order['billing_name']}' 
                                data-billing_address='{$order['billing_address']}' 
                                data-billing_city='{$order['billing_city']}' 
                                data-billing_postal_code='{$order['billing_postal_code']}' 
                                data-billing_phone='{$order['billing_phone']}' 
                                data-billing_email='{$order['billing_email']}'>
                                Edit
                            </button>
                            <a href='delete_order.php?id={$order['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this order?\");'>Delete</a>
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

  <!-- Edit Order Modal -->
  <div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="editOrderForm" action="edit_order.php?i=<?= $order['id']; ?>" method="POST">
          <input type="hidden" name="order_id" id="editOrderId">
          <div class="modal-header">
            <h4 class="modal-title" id="editOrderModalLabel">Edit Order</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="editOrderTotalPrice">Total Price</label>
              <input type="text" name="total_price" id="editOrderTotalPrice" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="editOrderPaymentStatus">Payment Status</label>
              <select name="payment_status" id="editOrderPaymentStatus" class="form-control">
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
                <option value="failed">Failed</option>
              </select>
            </div>
            <div class="form-group">
              <label for="editOrderShippingStatus">Shipping Status</label>
              <select name="shipping_status" id="editOrderShippingStatus" class="form-control">
                <option value="pending">Pending</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
              </select>
            </div>
            <!-- Billing details -->
            <div class="form-group">
              <label for="editBillingName">Billing Name</label>
              <input type="text" name="billing_name" id="editBillingName" class="form-control">
            </div>
            <div class="form-group">
              <label for="editBillingAddress">Billing Address</label>
              <input type="text" name="billing_address" id="editBillingAddress" class="form-control">
            </div>
            <div class="form-group">
              <label for="editBillingCity">Billing City</label>
              <input type="text" name="billing_city" id="editBillingCity" class="form-control">
            </div>
            <div class="form-group">
              <label for="editBillingPostalCode">Billing Postal Code</label>
              <input type="text" name="billing_postal_code" id="editBillingPostalCode" class="form-control">
            </div>
            <div class="form-group">
              <label for="editBillingPhone">Billing Phone</label>
              <input type="text" name="billing_phone" id="editBillingPhone" class="form-control">
            </div>
            <div class="form-group">
              <label for="editBillingEmail">Billing Email</label>
              <input type="email" name="billing_email" id="editBillingEmail" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Order</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Order Details Modal -->
  <div class="modal fade" id="viewOrderModal" tabindex="-1" role="dialog" aria-labelledby="viewOrderModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="viewOrderModalLabel">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="viewOrderId">Order ID</label>
            <input type="text" id="viewOrderId" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewUserId">User ID</label>
            <input type="text" id="viewUserId" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewTotalPrice">Total Price</label>
            <input type="text" id="viewTotalPrice" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewPaymentStatus">Payment Status</label>
            <input type="text" id="viewPaymentStatus" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewShippingStatus">Shipping Status</label>
            <input type="text" id="viewShippingStatus" class="form-control" readonly>
          </div>
          <!-- Add more fields as needed -->
          <div class="form-group">
            <label for="viewBillingName">Billing Name</label>
            <input type="text" id="viewBillingName" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewBillingAddress">Billing Address</label>
            <input type="text" id="viewBillingAddress" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewBillingCity">Billing City</label>
            <input type="text" id="viewBillingCity" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewBillingPostalCode">Billing Postal Code</label>
            <input type="text" id="viewBillingPostalCode" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewBillingPhone">Billing Phone</label>
            <input type="text" id="viewBillingPhone" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewBillingEmail">Billing Email</label>
            <input type="text" id="viewBillingEmail" class="form-control" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


</div><!-- /.content-wrapper -->

<?php include_once "../layout/footer.php" ?>

<script>
  $(document).ready(function () {
    $('.edit-btn').click(function () {
      // Retrieve the data from the clicked button
      var orderId = $(this).data('id');
      var totalPrice = $(this).data('total_price');
      var paymentStatus = $(this).data('payment_status');
      var shippingStatus = $(this).data('shipping_status');
      var billingName = $(this).data('billing_name');
      var billingAddress = $(this).data('billing_address');
      var billingCity = $(this).data('billing_city');
      var billingPostalCode = $(this).data('billing_postal_code');
      var billingPhone = $(this).data('billing_phone');
      var billingEmail = $(this).data('billing_email');

      // Populate the form fields in the modal
      $('#editOrderId').val(orderId);
      $('#editOrderTotalPrice').val(totalPrice);
      $('#editOrderPaymentStatus').val(paymentStatus);
      $('#editOrderShippingStatus').val(shippingStatus);
      $('#editBillingName').val(billingName);
      $('#editBillingAddress').val(billingAddress);
      $('#editBillingCity').val(billingCity);
      $('#editBillingPostalCode').val(billingPostalCode);
      $('#editBillingPhone').val(billingPhone);
      $('#editBillingEmail').val(billingEmail);

      // Show the modal
      $('#editOrderModal').modal('show');
    });


    $('.view-btn').click(function () {
      var orderId = $(this).data('id');
      var userId = $(this).data('user_id');
      var totalPrice = $(this).data('total_price');
      var paymentStatus = $(this).data('payment_status');
      var shippingStatus = $(this).data('shipping_status');
      var billingName = $(this).data('billing_name');
      var billingAddress = $(this).data('billing_address');
      var billingCity = $(this).data('billing_city');
      var billingPostalCode = $(this).data('billing_postal_code');
      var billingPhone = $(this).data('billing_phone');
      var billingEmail = $(this).data('billing_email');

      // Populate the modal fields
      $('#viewOrderId').val(orderId);
      $('#viewUserId').val(userId);
      $('#viewTotalPrice').val(totalPrice);
      $('#viewPaymentStatus').val(paymentStatus);
      $('#viewShippingStatus').val(shippingStatus);
      $('#viewBillingName').val(billingName);
      $('#viewBillingAddress').val(billingAddress);
      $('#viewBillingCity').val(billingCity);
      $('#viewBillingPostalCode').val(billingPostalCode);
      $('#viewBillingPhone').val(billingPhone);
      $('#viewBillingEmail').val(billingEmail);

      // Show the modal
      $('#viewOrderModal').modal('show');
    });

  });

</script>