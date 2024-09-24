<?php
require_once "classes/DatabaseConnection.php";
require_once 'classes/DatabaseCrud.php';
require_once 'inc/header.php';
require_once 'inc/nav.php';

$img_path = $config['base_url'] . "assets/images/";
$single_product_path = $config['base_url'] . "index.php?page=single-product&id=";
$crud = new DatabaseCrud();
$sliders = $crud->read("homeslider");

// Get latest books
$latestBooks = $crud->read("books", "", "*", "ORDER BY created_at DESC");

// Get books with the most purchases
$mostPurchasedBooks = $crud->read("books", "", "*", "ORDER BY purchases DESC");

// Get all books
$allBooks = $crud->read("books");

?>
<!-- Page Content Start -->
<main class="pt-4">
  <!-- Hero Section Start -->
  <section class="section-container hero">
    <div class="owl-carousel hero__carousel owl-theme">
      <?php foreach ($sliders as $slider): ?>
        <div class="hero__item">
          <img class="hero__img" src="<?= $img_path . 'Slider/' . $slider['image']; ?>" alt="">
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Offer Section Start -->
  <section class="section-container mb-5 mt-3">
    <div class="offer d-flex align-items-center justify-content-between rounded-3 p-3 text-white">
      <div class="offer__title fw-bolder">
        عروض اليوم
      </div>
      <div class="offer__time d-flex gap-2 fs-6">
        <div class="d-flex flex-column align-items-center">
          <span class="fw-bolder">06</span>
          <div>ساعات</div>
        </div>:
        <div class="d-flex flex-column align-items-center">
          <span class="fw-bolder">10</span>
          <div>دقائق</div>
        </div>:
        <div class="d-flex flex-column align-items-center">
          <span class="fw-bolder">13</span>
          <div>ثواني</div>
        </div>
      </div>
    </div>
  </section>
  <!-- Offer Section End -->

  <!-- Products Section Start -->
  <section class="section-container mb-4">
    <div class="owl-carousel products__slider owl-theme">
      <?php foreach ($allBooks as $book): ?>
        <div class="products__item">
          <div class="product__header mb-3">
            <a href="<?= $single_product_path . $book['id']; ?>">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="<?= $img_path . 'books/' . $book['image']; ?>"
                  alt="<?= $book['title']; ?>">
              </div>
            </a>
            <?php if ($book['discount_price'] < $book['price']): ?>
              <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                وفر
                <?= number_format((($book['price'] - $book['discount_price']) / $book['price']) * 100, 2); ?>%
              </div>
            <?php endif; ?>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <a href="<?php echo $config['base_url'] ?>controllers/fav.php?id=<?= $book['id'] ?>&page=home">
              <i class="fa-regular fa-heart"></i>
              </a>
            </div>
          </div>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="<?= $single_product_path . $book['id']; ?>">
              <?= htmlspecialchars($book['title']); ?>
            </a>
          </div>
          <div class="product__author text-center">
            <?= htmlspecialchars($book['author']); ?>
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <?php if ($book['discount_price'] < $book['price']): ?>
              <span class="product__price product__price--old">
                <?= number_format($book['price'], 2); ?> جنيه
              </span>
            <?php endif; ?>
            <span class="product__price">
              <?= number_format($book['discount_price'] ?: $book['price'], 2); ?> جنيه
            </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <!-- Products Section End -->


  <!-- Categories Section Start -->
  <section class="section-container mb-5">
    <div class="categories row gx-4">
      <div class="col-md-6 p-2">
        <div class="p-4 border rounded-3">
          <img class="w-100" src="assets/images/category-1.png" alt="">
        </div>
      </div>
      <div class="col-md-6 p-2">
        <div class="p-4 border rounded-3">
          <img class="w-100" src="assets/images/category-2.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- Categories Section End -->

  <!-- Best Sales Section Start -->
  <section class="section-container mb-5">
    <div class="products__header mb-4 d-flex align-items-center justify-content-between">
      <h4 class="m-0">الاكثر مبيعا</h4>
      <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
    </div>
    <div class="owl-carousel products__slider owl-theme">
      <?php foreach ($mostPurchasedBooks as $mostPurchasedBook): ?>
        <div class="products__item">
          <div class="product__header mb-3">
            <a href="<?= $single_product_path . $mostPurchasedBook['id']; ?>">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover"
                  src="<?= $img_path . 'books/' . $mostPurchasedBook['image']; ?>"
                  alt="<?= $mostPurchasedBook['title']; ?>">
              </div>
            </a>
            <?php if ($mostPurchasedBook['discount_price'] < $mostPurchasedBook['price']): ?>
              <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                وفر
                <?= number_format((($mostPurchasedBook['price'] - $mostPurchasedBook['discount_price']) / $mostPurchasedBook['price']) * 100, 2); ?>%
              </div>
            <?php endif; ?>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <a href="<?php echo $config['base_url'] ?>controllers/fav.php?id=<?= $book['id'] ?>&page=home">
              <i class="fa-regular fa-heart"></i>
              </a>            
            </div>
          </div>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="<?= $single_product_path . $mostPurchasedBook['id']; ?>">
              <?= htmlspecialchars($mostPurchasedBook['title']); ?>
            </a>
          </div>
          <div class="product__author text-center">
            <?= htmlspecialchars($mostPurchasedBook['author']); ?>
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <?php if ($mostPurchasedBook['discount_price'] < $mostPurchasedBook['price']): ?>
              <span class="product__price product__price--old">
                <?= number_format($mostPurchasedBook['price'], 2); ?> جنيه
              </span>
            <?php endif; ?>
            <span class="product__price">
              <?= number_format($mostPurchasedBook['discount_price'] ?: $mostPurchasedBook['price'], 2); ?> جنيه
            </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <!-- Best Sales Section End -->

  <!-- Newest Section Start -->
  <section class="section-container mb-5">
    <div class="products__header mb-4 d-flex align-items-center justify-content-between">
      <h4 class="m-0">وصل حديثا</h4>
      <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
    </div>
    <div class="owl-carousel products__slider owl-theme">
      <?php foreach ($latestBooks as $latestBook): ?>
        <div class="products__item">
          <div class="product__header mb-3">
            <a href="<?= $single_product_path . $latestBook['id']; ?>">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover"
                  src="<?= $img_path . 'books/' . $latestBook['image']; ?>" alt="<?= $latestBook['title']; ?>">
              </div>
            </a>
            <?php if ($latestBook['discount_price'] < $latestBook['price']): ?>
              <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                وفر
                <?= number_format((($latestBook['price'] - $latestBook['discount_price']) / $latestBook['price']) * 100, 2); ?>%
              </div>
            <?php endif; ?>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <a href="<?php echo $config['base_url'] ?>controllers/fav.php?id=<?= $book['id'] ?>&page=home">
              <i class="fa-regular fa-heart"></i>
              </a>            
            </div>
          </div>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="<?= $single_product_path . $latestBook['id']; ?>">
              <?= htmlspecialchars($latestBook['title']); ?>
            </a>
          </div>
          <div class="product__author text-center">
            <?= htmlspecialchars($latestBook['author']); ?>
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <?php if ($latestBook['discount_price'] < $latestBook['price']): ?>
              <span class="product__price product__price--old">
                <?= number_format($latestBook['price'], 2); ?> جنيه
              </span>
            <?php endif; ?>
            <span class="product__price">
              <?= number_format($latestBook['discount_price'] ?: $latestBook['price'], 2); ?> جنيه
            </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <!-- Newest Section End -->
</main>
<!-- Page Content End -->

<?php

require_once 'inc/footer.php';

?>