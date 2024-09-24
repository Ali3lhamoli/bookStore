<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';
require_once 'classes/DatabaseCrud.php';
require_once 'classes/DatabaseConnection.php';




// $id = $_GET['id'];

$crud = new DatabaseCrud();
// DatabaseConnection::getInstance()->selectDatabase();
if(isset($_GET['id'])){
$id =$_GET['id'];
  $result = $crud->read('books', "`id` = $id");
}else{
  echo "";
}
$fav = $crud->readLIMIT('books');
$serves = $crud->read('services');
$Q = $crud->read('description_single_products');


?>
<style>
  a {
    text-decoration: none;
  }
</style>


<main>
  <!-- Product details Start -->
  <?php
  foreach ($result as $item):
  ?>
    <section class="section-container my-5 pt-5 d-md-flex gap-5">

 
      <div class="single-product__img w-100" id="main-img">
        <img src=" <?= $item['image'] ?>" alt="">
      </div>
      <div class="single-product__details w-100 d-flex flex-column justify-content-between">
        <div>
          <h4><?= $item['title'] ?></h4>
          <div class="product__author"><?= $item['author'] ?></div>
          <div class="product__author"></div>
          <div class="product__price mb-3 text-center d-flex gap-2">
             <?php if (isset($item['discount_price'])): ?>
              <h4 class="mr-1">$
                <?= $item['discount_price'] ?>
              </h4>
              <span class="strike-text text-decoration-line-through">
                $<?= $item['price'] ?>
              </span>
            <?php else: ?>
              <h4 class="mr-1">$<?= $item['price'] ?></h4>
            <?php endif; ?> 

<?php # $item['discount_price'] ?  print_r( $item['discount_price']) : print_r($item['price']) ?>


          </div>
          <div class="d-flex w-100 gap-2 mb-3">
            <div class="single-product__quanitity position-relative">
              <input class="single-product__input text-center px-3" type="number" value="1" placeholder="---">
              <button
                class="single-product__increase border-0 bg-transparent position-absolute end-0 h-100 px-3">+</button>
              <button
                class="single-product__decrease border-0 bg-transparent position-absolute start-0 h-100 px-3">-</button>
            </div>
            <a class="single-product__add-to-cart primary-button w-100 text"
              href="<?php echo $config['base_url'] ?>controllers/add_to_cart.php?id=<?= $item['id'] ?>">اضافه الي السلة</a>
          </div>
          <div class="single-product__favourite d-flex align-items-center gap-2 mb-4">
            <a href="<?php echo $config['base_url'] ?>controllers/fav.php?id=<?= $item['id'] ?>">
            <i class="fa-regular fa-heart"></i>
            </a>
            اضافة للمفضلة
          </div>
        </div>
        <div class="single-product__categories">
          <p class="mb-0">رمز المنتج: غير محدد</p>
          <div>
            <span>التصنيفات: </span><a href="shop.html">new</a>, <a href="shop.html">احذية</a>, <a
              href="shop.html">رجاليه</a>
          </div>
          <div>
            <span>الوسوم: </span><a href="shop.html">pr150</a>, <a href="shop.html">flotrate</a>
          </div>
        </div>
      </div>
    </section>
  <?php
  endforeach
  ?>
  <!-- Product details End -->

  <!-- Description and questions Start -->
  <section class="section-container">
    <nav class="mb-0 ">
      <div class="nav nav-tabs single-product__nav pb-0 gap-2" id="nav-tab" role="tablist">
        <button class="single-product__tab nav-link active" id="single-product__describtion-tab" data-bs-toggle="tab"
          data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
          الوصف
        </button>
        <button class="single-product__tab nav-link" id="single-product__questions-tab" data-bs-toggle="tab"
          data-bs-target="#single-product__questions" type="button" role="tab" aria-controls="nav-profile"
          aria-selected="false">
          الاسئلة الشائعة
        </button>
      </div>
    </nav>
    <div class="tab-content pt-4" id="nav-tabContent">
      <div class="tab-pane show active" id="nav-description" role="tabpanel"
        aria-labelledby="single-product__describtion-tab" tabindex="0">

      </div>
      <div class="questions tab-pane" id="single-product__questions" role="tabpanel"
        aria-labelledby="single-product__questions-tab" tabindex="0">
        <div class="questions__list accordion" id="question__list">
          <?php foreach ($Q as $code): ?>
            <div class="questions__item accordion-item">
              <h2 class="questions__header accordion-header" id="question1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <?= $code['Q'] ?>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="question1"
                data-bs-parent="#question__list">
                <div class="accordion-body">
                  <?= $code['Ansare'] ?>

                </div>
              </div>
            </div>
          <?php endforeach ?>
          <!-- <div class="questions__item accordion-item">
            <h2 class="questions__header accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                خامات التصنيع؟
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#question__list">
              <div class="accordion-body">
                خامات مصرية عالية الجودة.
              </div>
            </div>
          </div>
          <div class="questions__item accordion-item">
            <h2 class="questions__header accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                متاح استبدال او استرجاع المنتج
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#question__list">
              <div class="accordion-body">
                نعم، متاح الاستبدال والاسترجاع خلال 7 ايام، برجاء مراجعة <a class="text-danger" href="refund-policy.html">سياسة الاسترجاع والاستبدال</a>.
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </section>
  <!-- Description and questions End -->

  <!-- Features Start -->
  <section class="section-container py-5">
    <div class="row">
      <?php foreach ($serves as $service): ?>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="features__item d-flex align-items-center gap-2">
            <div class="features__img">
              <img class="w-100" src=" <?= $service['icon'] ?>" alt="">
            </div>
            <div>
              <h6 class="features__item-title m-0"><?= $service['service'] ?></h6>
              <p class="features__item-text m-0"><?= $service['subservice'] ?></p>
            </div>
          </div>
        </div>

      <?php
      endforeach
      ?>
    </div>

  </section>
  <!-- Features End -->

  <!-- May love Start -->
  <section class="section-container">
    <div class="d-flex gap-4 align-items-center w-100 mb-4">
      <h5 class="m-0">قد يعجبك ايضا...</h5>
      <hr class="flex-grow-1">
    </div>
    <div class="row">
      <?php
      foreach ($fav as $product):
      ?>
        <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
          <div class="product__header mb-3">
            <a href="single-product.html">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="<?= $product['image'] ?>" data-id="white">
              </div>
            </a>
            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
              وفر 10%
            </div>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="single-product.html">
              <?= $product['title'] ?>
            </a>
          </div>
          <div class="product__author text-center">
            <?= $product['author'] ?>
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <span class="product__price product__price--old">
              <?= $product['offer'] ?> جنيه
            </span>
            <span class="product__price">
              <?= $product['price'] ?> جنيه
            </span>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </section>
  <!-- May love End -->

  <!-- Related products Start -->
  <section class="section-container">
    <div class="d-flex gap-4 align-items-center w-100 mb-4">
      <h5 class="m-0">منتجات ذات صلة</h5>
      <hr class="flex-grow-1">
    </div>
    <div class="row">
      <?php
      foreach ($fav as $product):
      ?>
        <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
          <div class="product__header mb-3">
            <a href="single-product.html">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="<?= $product['image'] ?>" data-id="white">
              </div>
            </a>
            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
              وفر 10%
            </div>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="single-product.html">
              <?= $product['title'] ?>
            </a>
          </div>
          <div class="product__author text-center">
            <?= $product['author'] ?>
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <span class="product__price product__price--old">
              <?= $product['offer'] ?> جنيه
            </span>
            <span class="product__price">
              <?= $product['price'] ?> جنيه
            </span>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </section>
  <!-- Related products End -->

  <!-- Users comments Start -->
  <section class="section-container comments mb-5">
    <div class="d-flex gap-4 align-items-center w-100 mb-4">
      <h5 class="m-0">أعرف اراء عملاؤنا</h5>
      <hr class="flex-grow-1">
    </div>
    <div class="comments__slider owl-carousel owl-theme">
      <div class="comments__item">
        <div class="comments__icon">
          <img class="w-100" src="assets/images/quote.png" alt="">
        </div>
        <div class="comments__text mb-3">
          الكتاب جميل جدا
        </div>
        <div class="comments__author d-flex align-items-center gap-2">
          <div class="comments__author-dash"></div>
          <div class="comments__author-name fw-bolder">
            Moamen Sherif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Users comments End -->
</main>

<?php

require_once 'inc/footer.php';

?>