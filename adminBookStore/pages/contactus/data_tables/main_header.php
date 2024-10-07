<?php
$active_menu = "contactus";
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
            <h3 class="box-title">Contact Us Submissions</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="contactus" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Couse</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Massege</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $crud = new DatabaseCrud();
                $contacts = $crud->read("contactus");

                foreach ($contacts as $contact) {
                  echo "
                  <tr>
                      <td>{$contact['id']}</td>
                      <td>{$contact['name']}</td>
                      <td>{$contact['couse']}</td>
                      <td>{$contact['phone']}</td>
                      <td>{$contact['email']}</td>
                      <td>{$contact['massege']}</td>
                      <td>
                          <button 
                              class='btn btn-sm btn-info view-btn' 
                              data-id='{$contact['id']}' 
                              data-name='{$contact['name']}' 
                              data-couse='{$contact['couse']}' 
                              data-phone='{$contact['phone']}' 
                              data-email='{$contact['email']}' 
                              data-massege='{$contact['massege']}'>
                              View
                          </button>
                          <button 
                              class='btn btn-sm btn-primary edit-btn' 
                              data-id='{$contact['id']}' 
                              data-name='{$contact['name']}' 
                              data-couse='{$contact['couse']}' 
                              data-phone='{$contact['phone']}' 
                              data-email='{$contact['email']}' 
                              data-massege='{$contact['massege']}'>
                              Edit
                          </button>
                          <a href='delete_contact.php?id={$contact['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this contact?\");'>Delete</a>
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

  <!-- View Contact Modal -->
  <div class="modal fade" id="viewContactModal" tabindex="-1" role="dialog" aria-labelledby="viewContactModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="viewContactModalLabel">View Contact</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="viewName">Name</label>
            <input type="text" id="viewName" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewCouse">Couse</label>
            <input type="text" id="viewCouse" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewPhone">Phone</label>
            <input type="text" id="viewPhone" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewEmail">Email</label>
            <input type="text" id="viewEmail" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewMassege">Massege</label>
            <textarea id="viewMassege" class="form-control" readonly></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Contact Modal -->
  <div class="modal fade" id="editContactModal" tabindex="-1" role="dialog" aria-labelledby="editContactModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="editContactForm" method="POST" action="edit_contact.php">
          <input type="hidden" name="id" id="editContactId">
          <div class="modal-header">
            <h4 class="modal-title" id="editContactModalLabel">Edit Contact</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="editName">Name</label>
              <input type="text" name="name" id="editName" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="editCouse">Couse</label>
              <select name="couse" id="editCouse" class="form-control" required>
                <option value="استفسار">استفسار</option>
                <option value="استبدال">استبدال</option>
                <option value="استرجاع">استرجاع</option>
                <option value="استعجال الاوردر">استعجال الاوردر</option>
                <option value="اخرى">اخرى</option>
              </select>
            </div>
            <div class="form-group">
              <label for="editPhone">Phone</label>
              <input type="text" name="phone" id="editPhone" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="editEmail">Email</label>
              <input type="email" name="email" id="editEmail" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="editMassege">Massege</label>
              <textarea name="massege" id="editMassege" class="form-control" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div><!-- /.content-wrapper -->

<?php include_once "../layout/footer.php" ?>

<script>
  $(document).ready(function () {
    // View Modal
    $('.view-btn').click(function () {
      $('#viewName').val($(this).data('name'));
      $('#viewCouse').val($(this).data('couse'));
      $('#viewPhone').val($(this).data('phone'));
      $('#viewEmail').val($(this).data('email'));
      $('#viewMassege').val($(this).data('massege'));

      $('#viewContactModal').modal('show');
    });

    // Edit Modal
    $('.edit-btn').click(function () {
      $('#editContactId').val($(this).data('id'));
      $('#editName').val($(this).data('name'));
      $('#editCouse').val($(this).data('couse'));
      $('#editPhone').val($(this).data('phone'));
      $('#editEmail').val($(this).data('email'));
      $('#editMassege').val($(this).data('massege'));

      $('#editContactModal').modal('show');
    });
  });
</script>