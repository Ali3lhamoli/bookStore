<?php
function isActive($menu, $mode = "full")
{
  global $active_menu;
  if ($mode == "partial")
    echo ($active_menu == $menu ? "active" : "");
  else
    echo ($active_menu == $menu ? "class='active'" : "");
}
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= $_SESSION['admin_user']['name'] ?></p>
        <i class="fa fa-circle text-success"></i> Online
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>


      <!-- users -->
      <li <?php isActive("users") ?>>
        <a href="../../pages/users/users.php">
          <i class="fa fa-user"></i>
          <span>Users</span>
        </a>
      </li>

      <!-- Books -->
      <li <?php isActive("users") ?>>
        <a href="../../pages/books/books.php">
          <i class="fa fa-book"></i>
          <span>Books</span>
        </a>
      </li>

      <!-- orders -->
      <li <?php isActive("orders") ?>>
        <a href="../../pages/orders/orders.php">
          <i class="fa fa-book"></i>
          <span>Orders</span>
        </a>
      </li>

      <!-- contactus -->
      <li <?php isActive("contactus") ?>>
        <a href="../../pages/contactus/contactus.php">
          <i class="fa fa-book"></i>
          <span>Contact Us</span>
        </a>
      </li>

      <!-- branches -->
      <li <?php isActive("branches") ?>>
        <a href="../../pages/branches/branches.php">
          <i class="fa fa-book"></i>
          <span>Branches</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<script>
  var parent = $("ul.sidebar-menu li.active").closest("ul").closest("li");
  if (parent[0] != undefined)
    $(parent[0]).addClass("active");
</script>