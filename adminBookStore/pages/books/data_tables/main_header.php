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
            <h3 class="box-title">Books</h3>
            <!-- New Book Button -->
            <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#addBookModal">Add
              New Book</button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="booksTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $crud = new DatabaseCrud();
                $books = $crud->read("books");

                foreach ($books as $book) {
                  echo "
                                    <tr>
                                        <td>{$book['id']}</td>
                                        <td>{$book['title']}</td>
                                        <td>{$book['author']}</td>
                                        <td>{$book['price']}</td>
                                        <td>{$book['stock']}</td>
                                        <td><img src='../../uploads/{$book['image']}' alt='{$book['title']}' width='50' height='50'></td>
                                        <td>
                                            <button data-id='{$book['id']}' data-title='{$book['title']}' data-author='{$book['author']}' data-price='{$book['price']}' data-stock='{$book['stock']}' data-pages='{$book['pages']}' data-image='{$book['image']}' class='btn btn-sm btn-primary edit-btn'>Edit</button>
                                            <button data-id='{$book['id']}' data-title='{$book['title']}' data-author='{$book['author']}' data-price='{$book['price']}' data-stock='{$book['stock']}' data-pages='{$book['pages']}' data-image='{$book['image']}' class='btn btn-sm btn-info view-btn'>View</button>
                                            <a href='delete_book.php?id={$book['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this book?\");'>Delete</a>
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

  <!-- Adding Book Modal -->
  <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addBookForm" method="post" action="add_book.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="addBookTitle">Title</label>
              <input type="text" class="form-control" id="addBookTitle" name="title" required>
            </div>
            <div class="form-group">
              <label for="addBookAuthor">Author</label>
              <input type="text" class="form-control" id="addBookAuthor" name="author" required>
            </div>
            <div class="form-group">
              <label for="addBookPrice">Price</label>
              <input type="number" class="form-control" id="addBookPrice" name="price" required>
            </div>
            <div class="form-group">
              <label for="addBookStock">Stock</label>
              <input type="number" class="form-control" id="addBookStock" name="stock" required>
            </div>
            <div class="form-group">
              <label for="addBookPages">Pages</label>
              <input type="number" class="form-control" id="addBookPages" name="pages" required>
            </div>
            <div class="form-group">
              <label for="addBookImage">Book Image</label>
              <input type="file" class="form-control" id="addBookImage" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Add Book Modal -->

  <!-- Editing Book Modal -->
  <div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editBookModalLabel">Edit Book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editBookForm" method="post" action="edit_book.php" enctype="multipart/form-data">
            <input type="hidden" id="editBookId" name="id">
            <div class="form-group">
              <label for="editBookTitle">Title</label>
              <input type="text" class="form-control" id="editBookTitle" name="title" required>
            </div>
            <div class="form-group">
              <label for="editBookAuthor">Author</label>
              <input type="text" class="form-control" id="editBookAuthor" name="author" required>
            </div>
            <div class="form-group">
              <label for="editBookPrice">Price</label>
              <input type="number" class="form-control" id="editBookPrice" name="price" required>
            </div>
            <div class="form-group">
              <label for="editBookStock">Stock</label>
              <input type="number" class="form-control" id="editBookStock" name="stock" required>
            </div>
            <div class="form-group">
              <label for="editBookPages">Pages</label>
              <input type="number" class="form-control" id="editBookPages" name="pages" required>
            </div>
            <div class="form-group">
              <label for="editBookImage">Book Image</label>
              <input type="file" class="form-control" id="editBookImage" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Edit Book Modal -->

  <!-- Viewing Book Modal -->
  <div class="modal fade" id="viewBookModal" tabindex="-1" role="dialog" aria-labelledby="viewBookModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewBookModalLabel">Book Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4 id="viewBookTitle"></h4>
          <p><strong>Author:</strong> <span id="viewBookAuthor"></span></p>
          <p><strong>Price:</strong> <span id="viewBookPrice"></span></p>
          <p><strong>Stock:</strong> <span id="viewBookStock"></span></p>
          <p><strong>Pages:</strong> <span id="viewBookPages"></span></p>
          <img id="viewBookImage" src="" alt="Book Image" width="200">
        </div>
      </div>
    </div>
  </div>
  <!-- End View Book Modal -->

</div><!-- /.content-wrapper -->

<?php include_once "../layout/footer.php" ?>

<script>
  $(document).ready(function () {
    // Edit book button
    $('.edit-btn').click(function () {
      var bookId = $(this).data('id');
      var bookTitle = $(this).data('title');
      var bookAuthor = $(this).data('author');
      var bookPrice = $(this).data('price');
      var bookStock = $(this).data('stock');
      var bookPages = $(this).data('pages');
      var bookImage = $(this).data('image');

      $('#editBookId').val(bookId);
      $('#editBookTitle').val(bookTitle);
      $('#editBookAuthor').val(bookAuthor);
      $('#editBookPrice').val(bookPrice);
      $('#editBookStock').val(bookStock);
      $('#editBookPages').val(bookPages);

      $('#editBookModal').modal('show');
    });

    // View book button
    $('.view-btn').click(function () {
      var bookTitle = $(this).data('title');
      var bookAuthor = $(this).data('author');
      var bookPrice = $(this).data('price');
      var bookStock = $(this).data('stock');
      var bookPages = $(this).data('pages');
      var bookImage = $(this).data('image');

      $('#viewBookTitle').text(bookTitle);
      $('#viewBookAuthor').text(bookAuthor);
      $('#viewBookPrice').text(bookPrice);
      $('#viewBookStock').text(bookStock);
      $('#viewBookPages').text(bookPages);
      $('#viewBookImage').attr('src', 'uploads/' + bookImage);

      $('#viewBookModal').modal('show');
    });
  });
</script>