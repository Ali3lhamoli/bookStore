<?php
  $active_menu = "data_tables";
  include_once "../layout/header.php";

  // Include the necessary files to work with the database
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
                  <h3 class="box-title">Users</h3>
                  <!-- New User Button -->
                  <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#addUserModal">Add New User</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="usersTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $crud = new DatabaseCrud();
                      $users = $crud->read("users");

                      foreach ($users as $user) {
                          echo "
                          <tr>
                            <td>{$user['id']}</td>
                            <td>{$user['name']}</td>
                            <td>{$user['email']}</td>
                            <td>{$user['role']}</td>
                            <td>
                              <button data-id='{$user['id']}' data-name='{$user['name']}' data-email='{$user['email']}' data-role='{$user['role']}' class='btn btn-sm btn-primary edit-btn'>Edit</button>
                              <a href='delete_user.php?id={$user['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
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

        <!-- Adding User -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="addUserForm" method="post" action="add_user.php">
                  <div class="form-group">
                    <label for="addUserName">Name</label>
                    <input type="text" class="form-control" id="addUserName" name="name" required>
                  </div>
                  <div class="form-group">
                    <label for="addUserEmail">Email</label>
                    <input type="email" class="form-control" id="addUserEmail" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="addUserPassword">Password</label>
                    <input type="password" class="form-control" id="addUserPassword" name="password" required>
                  </div>
                  <div class="form-group">
                    <label for="addUserRole">Role</label>
                    <select class="form-control" id="addUserRole" name="role" required>
                      <option value="customer">Customer</option>
                      <option value="admin">Admin</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Add User</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Bootstrap Modal -->

        <!--  Editing User -->
        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="editUserForm" method="post" action="edit_user.php">
                  <input type="hidden" id="editUserId" name="id">
                  <div class="form-group">
                    <label for="editUserName">Name</label>
                    <input type="text" class="form-control" id="editUserName" name="name" required>
                  </div>
                  <div class="form-group">
                    <label for="editUserEmail">Email</label>
                    <input type="email" class="form-control" id="editUserEmail" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="editUserRole">Role</label>
                    <select class="form-control" id="editUserRole" name="role" required>
                      <option value="customer">Customer</option>
                      <option value="admin">Admin</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Bootstrap Modal -->

    </div><!-- /.content-wrapper -->

<?php include_once "../layout/footer.php" ?>

<script>
  $(document).ready(function() {
    // Handle Edit Button Click
    $('.edit-btn').click(function() {
      var userId = $(this).data('id');
      var userName = $(this).data('name');
      var userEmail = $(this).data('email');
      var userRole = $(this).data('role');

      $('#editUserId').val(userId);
      $('#editUserName').val(userName);
      $('#editUserEmail').val(userEmail);
      $('#editUserRole').val(userRole);

      $('#editUserModal').modal('show');
    });
  });
</script>
