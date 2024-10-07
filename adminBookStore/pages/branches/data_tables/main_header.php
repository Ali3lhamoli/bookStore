<?php
$active_menu = "branches";
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
            <h3 class="box-title">Branches</h3>
            <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#addBranchModal">Add
              New Branch</button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="branchesTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Branch</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Brief</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $crud = new DatabaseCrud();
                $branches = $crud->read("branches");

                foreach ($branches as $branch) {
                  echo "
                  <tr>
                      <td>{$branch['id']}</td>
                      <td>{$branch['branch']}</td>
                      <td>{$branch['address']}</td>
                      <td>{$branch['phone']}</td>
                      <td>{$branch['brief_branch']}</td>
                      <td>
                          <button class='btn btn-sm btn-info view-btn' 
                                  data-id='{$branch['id']}' 
                                  data-branch='{$branch['branch']}' 
                                  data-address='{$branch['address']}' 
                                  data-phone='{$branch['phone']}' 
                                  data-brief='{$branch['brief_branch']}'>
                              View
                          </button>
                          <button class='btn btn-sm btn-primary edit-btn' 
                                  data-id='{$branch['id']}' 
                                  data-branch='{$branch['branch']}' 
                                  data-address='{$branch['address']}' 
                                  data-phone='{$branch['phone']}' 
                                  data-brief='{$branch['brief_branch']}'>
                              Edit
                          </button>
                          <a href='delete_branch.php?id={$branch['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this branch?\");'>Delete</a>
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

  <!-- View Branch Modal -->
  <div class="modal fade" id="viewBranchModal" tabindex="-1" role="dialog" aria-labelledby="viewBranchModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="viewBranchModalLabel">View Branch</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="viewBranch">Branch</label>
            <input type="text" id="viewBranch" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewAddress">Address</label>
            <input type="text" id="viewAddress" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewPhone">Phone</label>
            <input type="text" id="viewPhone" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="viewBrief">Brief</label>
            <input type="text" id="viewBrief" class="form-control" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Branch Modal -->
  <div class="modal fade" id="editBranchModal" tabindex="-1" role="dialog" aria-labelledby="editBranchModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="editBranchForm" method="POST" action="edit_branch.php">
          <input type="hidden" name="id" id="editBranchId">
          <div class="modal-header">
            <h4 class="modal-title" id="editBranchModalLabel">Edit Branch</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="editBranch">Branch</label>
              <input type="text" name="branch" id="editBranch" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="editAddress">Address</label>
              <input type="text" name="address" id="editAddress" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="editPhone">Phone</label>
              <input type="text" name="phone" id="editPhone" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="editBrief">Brief</label>
              <input type="text" name="brief_branch" id="editBrief" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Add Branch Modal -->
  <div class="modal fade" id="addBranchModal" tabindex="-1" role="dialog" aria-labelledby="addBranchModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="addBranchForm" method="POST" action="add_branch.php">
          <div class="modal-header">
            <h4 class="modal-title" id="addBranchModalLabel">Add New Branch</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="addBranch">Branch</label>
              <input type="text" name="branch" id="addBranch" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="addAddress">Address</label>
              <input type="text" name="address" id="addAddress" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="addPhone">Phone</label>
              <input type="text" name="phone" id="addPhone" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="addBrief">Brief</label>
              <input type="text" name="brief_branch" id="addBrief" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Branch</button>
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
      $('#viewBranch').val($(this).data('branch'));
      $('#viewAddress').val($(this).data('address'));
      $('#viewPhone').val($(this).data('phone'));
      $('#viewBrief').val($(this).data('brief'));

      $('#viewBranchModal').modal('show');
    });

    // Edit Modal
    $('.edit-btn').click(function () {
      $('#editBranchId').val($(this).data('id'));
      $('#editBranch').val($(this).data('branch'));
      $('#editAddress').val($(this).data('address'));
      $('#editPhone').val($(this).data('phone'));
      $('#editBrief').val($(this).data('brief'));

      $('#editBranchModal').modal('show');
    });
  });
</script>