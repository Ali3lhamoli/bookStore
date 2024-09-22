<?php
// session_start(); 
?>

<?php
//  require_once "../classes/DatabaseConnection.php";
require_once "classes/DatabaseConnection.php";
require_once "classes/DatabaseCrud.php";
require_once "function.php";

$crud = new DatabaseCrud();
$cat= new DatabaseCrud();
$carts=$_SESSION['cart'];

$category=$cat->read("category")
?>


<div>
  <div class="header-container fixed-top border-bottom">
    <header>
      <div class="section-container d-flex justify-content-between">
        <div class="header__email d-flex gap-2 align-items-center">
          <i class="fa-regular fa-envelope"></i>
          coding.arabic@gmail.com
        </div>
        <div class="header__info d-none d-lg-block">
          شحن مجاني للطلبات 💥 عند الشراء ب 699ج او اكثر
        </div>
        <div class="header__branches d-flex gap-2 align-items-center">
          <a class="text-white text-decoration-none" href="<?= $config['base_url']; ?>index.php?page=branches">
            <i class="fa-solid fa-location-dot"></i>
            فروعنا
          </a>
        </div>
      </div>
    </header>
    <!--    -->
    <?php
    //  $data = $crud->read('books');
    if (isset($_SESSION['client'])):
      ?>

      <nav class="nav">
        <div class="section-container w-100 d-flex align-items-center gap-4 h-100">
          <div class="nav__categories-btn align-items-center justify-content-center rounded-1 d-none d-lg-flex">
            <button class="border-0 bg-transparent" data-bs-toggle="offcanvas" data-bs-target="#nav__categories">
              <i class="fa-solid fa-align-center fa-rotate-180"></i>
            </button>
          </div>
          <div class="nav__logo">
            <a href="<?= $config['base_url']; ?>index.php?page=home">
              <img class="h-100" src="assets/images/logo.png" alt="">
            </a>
          </div>
          <form action="<?= $config['base_url']; ?>controllers/search.php" class="col-6">
          <div class="nav__search w-100">

<input class="nav__search-input w-100" type="search" name="query" placeholder="أبحث هنا عن اي شئ تريده...">
<span class="nav__search-icon">
  <i class="fa-solid fa-magnifying-glass"></i>
</span>
</div>
          </form>
         
          <ul class="nav__links gap-3 list-unstyled d-none d-lg-flex m-0">
            <li class="nav__link nav__link-user">
              <a class="d-flex align-items-center gap-2">
                حسابي
                <i class="fa-regular fa-user"></i>
                <i class="fa-solid fa-chevron-down fa-2xs"></i>
              </a>
              <ul class="nav__user-list position-absolute p-0 list-unstyled bg-white">
                <li class="nav__link nav__user-link"><a href="<?= $config['base_url']; ?>index.php?page=profile">لوحة
                    التحكم</a></li>
                <li class="nav__link nav__user-link"><a
                    href="<?= $config['base_url']; ?>index.php?page=orders">الطلبات</a>
                </li>
                <li class="nav__link nav__user-link"><a
                    href="<?= $config['base_url']; ?>index.php?page=account_details">تفاصيل الحساب</a></li>
                <li class="nav__link nav__user-link"><a
                    href="<?= $config['base_url']; ?>index.php?page=favourites">المفضلة</a></li>
                <li class="nav__link nav__user-link"><a href="<?= $config['base_url']; ?>index.php?page=logout">تسجيل
                    الخروج</a></li>
              </ul>
            </li>
            <!-- <li class="nav__link">
              <a class="d-flex align-items-center gap-2" href="<?= $config['base_url']; ?>index.php?page=account">
                تسجيل الدخول
                <i class="fa-regular fa-user"></i>
              </a>
            </li> -->
            <li class="nav__link">
              <a class="d-flex align-items-center gap-2" href="<?= $config['base_url']; ?>index.php?page=favourites">
                المفضلة
                <div class="position-relative">
                  <i class="fa-regular fa-heart"></i>

                </div>
              </a>
            </li>
            <li class="nav__link">
              <a class="d-flex align-items-center gap-2" data-bs-toggle="offcanvas" data-bs-target="#nav__cart">
                عربة التسوق
                <div class="position-relative">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <div class="nav__link-floating-icon">
                    <?php  if(isset($_SESSION['cart'])):?>
                      <?php echo  count($_SESSION['cart']) ?>
                      <?php elseif(!isset($_SESSION['cart'])): ?>
                        <div class="nav__link-floating-icon">

                        0
                        </div>
                        <?php endif ?>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="nav-mobile fixed-bottom d-block d-lg-none">
          <ul class="nav-mobile__list d-flex justify-content-around gap-2 list-unstyled  m-0 border-top">
            <li class="nav-mobile__link">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none"
                href="<?= $config['base_url']; ?>index.php?page=home">
                <i class="fa-solid fa-house"></i>
                الرئيسية
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
              data-bs-target="#nav__categories">
              <i class="fa-solid fa-align-center fa-rotate-180"></i>
              الاقسام
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none"
                href="<?= $config['base_url']; ?>index.php?page=profile">
                <i class="fa-regular fa-user"></i>
                حسابي
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none"
                href="<?= $config['base_url']; ?>index.php?page=favourites">
                <i class="fa-regular fa-heart"></i>
                المفضلة
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
              data-bs-target="#nav__cart">
              <i class="fa-solid fa-cart-shopping"></i>
              السلة
            </li>
          </ul>
          <!--  -->
        </div>
      </nav>

    <?php elseif (!isset($_SESSION['client'])): ?>
      <nav class="nav">
        <div class="section-container w-100 d-flex align-items-center gap-4 h-100">
          <div class="nav__categories-btn align-items-center justify-content-center rounded-1 d-none d-lg-flex">
            <button class="border-0 bg-transparent" data-bs-toggle="offcanvas" data-bs-target="#nav__categories">
              <i class="fa-solid fa-align-center fa-rotate-180"></i>
            </button>
          </div>
          <div class="nav__logo">
            <a href="<?= $config['base_url']; ?>index.php?page=home">
              <img class="h-100" src="assets/images/logo.png" alt="">
            </a>
          </div>
          <div class="nav__search w-100">
            <input class="nav__search-input w-100" type="search" placeholder="أبحث هنا عن اي شئ تريده...">
            <span class="nav__search-icon">
              <i class="fa-solid fa-magnifying-glass"></i>
            </span>
          </div>
          <ul class="nav__links gap-3 list-unstyled d-none d-lg-flex m-0">
        
            <li class="nav__link">
              <a class="d-flex align-items-center gap-2" href="<?= $config['base_url']; ?>index.php?page=account">
                تسجيل الدخول
                <i class="fa-regular fa-user"></i>
              </a>
            </li>
            <?php if(isset($_SESSION['client'])): ?>
            <li class="nav__link">
              <a class="d-flex align-items-center gap-2" href="<?= $config['base_url']; ?>index.php?page=favourites">
                المفضلة
                <div class="position-relative">
                  <i class="fa-regular fa-heart"></i>
                  <div class="nav__link-floating-icon">
                    0
                  </div>
                </div>
              </a>
            </li>
            <?php endif; ?>
            <li class="nav__link">
              <a class="d-flex align-items-center gap-2" data-bs-toggle="offcanvas" data-bs-target="#nav__cart">
                عربة التسوق
                <div class="position-relative">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <div class="nav__link-floating-icon">
                    <?php  if(isset($_SESSION['cart'])):?>
                      <?php echo  count($_SESSION['cart']) ?>
                      <?php elseif(!isset($_SESSION['cart'])): ?>
                        <div class="nav__link-floating-icon">

                        0
                        </div>
                        <?php endif ?>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="nav-mobile fixed-bottom d-block d-lg-none">
          <ul class="nav-mobile__list d-flex justify-content-around gap-2 list-unstyled  m-0 border-top">
            <li class="nav-mobile__link">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none"
                href="<?= $config['base_url']; ?>index.php?page=home">
                <i class="fa-solid fa-house"></i>
                الرئيسية
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
              data-bs-target="#nav__categories">
              <i class="fa-solid fa-align-center fa-rotate-180"></i>
              الاقسام
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none"
                href="<?= $config['base_url']; ?>index.php?page=profile">
                <i class="fa-regular fa-user"></i>
                حسابي
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none"
                href="<?= $config['base_url']; ?>index.php?page=favourites">
                <i class="fa-regular fa-heart"></i>
                المفضلة


              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
              data-bs-target="#nav__cart">
              <i class="fa-solid fa-cart-shopping"></i>
              السلة
            </li>
          </ul>
          <!--  -->
        </div>
      </nav>
    <?php endif ?>
    <div class="nav__categories offcanvas offcanvas-start px-4 py-2" tabindex="-1" id="nav__categories"
      aria-labelledby="nav__categories">
      <div class="nav__categories-header offcanvas-header justify-content-end">
        <button type="button" class="border-0 bg-transparent text-danger nav__close" data-bs-dismiss="offcanvas"
          aria-label="Close">
          <i class="fa-solid fa-x fa-1x fw-light"></i>
        </button>
      </div>
      <div class="nav__categories-body offcanvas-body pt-0">
        <div class="nav__side-logo mb-2">
          <img class="w-100" src="assets/images/logo.png" alt="">
        </div>





        <ul class="nav__list list-unstyled">
          <li class="nav__link nav__side-link"><a href="<?= $config['base_url']; ?>index.php?page=shop"
              class="py-3">جميع
              المنتجات</a></li>
        <?php foreach($category as $cate): ?>

          <li class="nav__link nav__side-link"><a href="<?= $config['base_url']; ?>index.php?page=shop&type=<?=$cate['id']  ?>" class="py-3">
            <?php echo $cate['nameCategory'] ?>  </a></li>
        <?php endforeach ?>

         
        </ul>



        
      </div>
    </div>

    <div class="nav__cart offcanvas offcanvas-end px-3 py-2" tabindex="-1" id="nav__cart" aria-labelledby="nav__cart">
      <div class="nav__categories-header offcanvas-header align-items-center">
        <h5>سلة التسوق</h5>
        <button type="button" class="border-0 bg-transparent text-danger nav__close" data-bs-dismiss="offcanvas"
          aria-label="Close">
          <i class="fa-solid fa-x fa-1x fw-light"></i>
        </button>
      </div>
      <?php if (isset($_SESSION['cart'])): ?>
        <div class="nav__categories-body offcanvas-body pt-4">
          <div class="cart-products">
            <?php foreach ($_SESSION['cart'] as $id => $cart): ?>

              <?php  $result = $crud->read('books', "`id` = $id"); ?>
              <?php foreach ($result as $product): ?>
                <ul class="nav__list list-unstyled">

                  <li class="cart-products__item d-flex justify-content-between gap-2">
                    <div class="d-flex gap-2">
                      <div>
                        <button class="cart-products__remove">x</button>
                      </div>
                      <div>
                        <p class="cart-products__name m-0 fw-bolder"><?php $product['title'] ?></p>
                     
                        <h6><?php $product['discount_price'] 
                        ? print_r($product['discount_price']) .  print_r("X") .  print_r($cart['qty'])  :
                        
                        
                        $product['price'] . "جنيه" .   print_r( $cart['qty']) .print_r(  " X") ?></h6>
    
                      </div>
                    </div>
                    <div class="cart-products__img">
                      <img class="w-100" src="<?php echo $product['image'] ?>" alt="">
                    </div>
                  </li>
            
 


                </ul>
              <?php endforeach ?>



            <?php endforeach ?>

 
            <div class="d-flex justify-content-between">
              <p class="fw-bolder">المجموع:</p>
<?php    $totalPrice =calculateTotalPriceA($carts);

$_SESSION['totalP']=$totalPrice;
?>

              <?php     print_r($_SESSION['totalP']) //$totalPrice  =           total($cart)   ?>
           </p>    جنيه</p>
        
            </div>
          </div>
          <a class="nav__cart-btn text-center text-white w-100 border-0 mb-3 py-2 px-3 bg-success btn btn-primary"  href="<?= $config['base_url']; ?>index.php?page=checkout">اتمام الطلب</a>
          <a class="nav__cart-btn text-center text-white w-100 border-0 mb-3 py-2 px-3  btn btn-danger" href="<?= $config['base_url']; ?>index.php?page=shop">تابع التسوق</a>
        </div>
      <?php elseif (!isset($_SESSION['cart'])): ?>
        <p>لا توجد منتجات في سلة المشتريات.</p>
        <!--     background-color: #fe4040 !important; -->
        <a class="nav__cart-btn text-center text-white w-100 border-0 mb-3 py-2 px-3 bg-success btn btn-primary" href="<?= $config['base_url']; ?>index.php?page=shop">تابع التسوق</a>
      <?php endif ?>
    </div>
  </div>


  <!-- News Content Start -->
  <section class="sales text-center p-2 d-block d-lg-none">
    شحن مجاني للطلبات 💥 عند الشراء ب 699ج او اكثر
  </section>
  <!-- News Content End -->
</div>