<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'المتجر';
require_once 'inc/subSectionFromMain.php';
require_once 'classes/DatabaseCrud.php';
require_once 'classes/DatabaseConnection.php';


DatabaseConnection::getInstance()->selectDatabase();
$crud = new DatabaseCrud();
$result = $crud->read('books'); // Specify your table name
// print_r($result['title']); 

?>


<div class="section-container d-block d-lg-flex gap-5 shop mt-5 pt-5">
  <!-- <div class="shop__filter mb-4"> -->
  <!-- <div class="mb-4">
            <h6 class="shop__filter-title">بتدور علي ايه؟</h6>
            <form action="">
              <div class="filter__search position-relative">
                <input
                  class="w-100 py-1 ps-2"
                  type="text"
                  placeholder="بتدور علي ايه؟"
                />
                <div
                  class="filter__search-icon position-absolute h-100 top-0 end-0 p-2 d-flex justify-content-center align-items-center"
                >
                  <i class="fa-solid fa-magnifying-glass"></i>
                </div>
              </div>
            </form>
          </div> -->
  <div class="shop__products col-12">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <p class="m-0">عرض 1 - 40 من أصل 144 نتيجة</p>
      <form action="">
        <div class="filter__search position-relative">
          <input
            class="w-100 py-1 ps-2"
            type="text"
            placeholder="بتدور علي ايه؟" />
          <div
            class="filter__search-icon position-absolute h-100 top-0 end-0 p-2 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>
      </form>
    </div>
    <div class="row products__list">
      <?php
      foreach ($result as  $item):


      ?>
        <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
          <div class="product__header mb-3">
            <a href="<?= $config['base_url']; ?>index.php?page=single-product&id=<?= $item['id'] ?>">
              <div class="product__img-cont">
                <img
                  class="product__img w-100 h-100 object-fit-cover"
                  src=" <?= $item['image']  ?>"
                  data-id="white" />
              </div>
            </a>
            <div
              class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
              وفر 10%
            </div>
            <div

              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
          <div class="product__title text-center">
            <a
              class="text-black text-decoration-none"
              href="single-product.html">
              <?= $item['title'] ?>
            </a>
          </div>
          <div class="product__author text-center"><?= $item['author'] ?></div>
          <div
            class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <span class="product__price product__price--old">
              <?= $item['price'] ?>جنيه
            </span>
            <span class="product__price"><?= $item['offer'] ?>جنيه </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div
      class="products__pagination mb-5 d-flex justify-content-center gap-2">
      <span class="pagination__btn rounded-1 pagination__btn--next"><i class="fa-solid fa-arrow-right-long"></i></span>
      <span class="pagination__btn rounded-1 active">1</span>
      <span class="pagination__btn rounded-1">2</span>
      <span class="pagination__btn rounded-1">3</span>
      <span class="pagination__btn rounded-1">4</span>
      <span class="pagination__btn rounded-1 pagination__btn--prev"><i class="fa-solid fa-arrow-left-long"></i></span>
    </div>
  </div>
</div>
</main>

<?php

require_once 'inc/footer.php';

?>