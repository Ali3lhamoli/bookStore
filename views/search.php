<?php 
require_once "./inc/header.php";
require_once "./inc/nav.php";
require_once "./classes/DatabaseConnection.php";
require_once "./function.php";
?>
<style>
.hh{
     display: flex;
    min-height: 100vh;
    padding: 5rem 0rem;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;
    align-items: center;
}
</style>
<?php


    $rowultsArray = $_SESSION['search_results'];


// echo "<pre>";
// print_r($_SESSION['search']);
// echo "</pre>";
// print_r($rowult)
 ?>


<div class="container hh ">
 
 

<div class="row products__list">

<?php 
isset($_SESSION['search']) && !empty($_SESSION['search']) ? $resultsArray = $_SESSION['search'] :"" ?>
<?php  foreach ($resultsArray as $row):?>

     <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
          <div class="product__header mb-3">
            <a href="<?= $config['base_url']; ?>index.php?page=single-product&id=<?= $res['id'] ?>">
              <div class="product__img-cont">
                <img
                  class="product__img w-100 h-100 object-fit-cover"
                  src=" <?=  $row['image']  ?>"
                  data-id="white" />
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
            <a
              class="text-black text-decoration-none"
              href="single-product.html">
           <?= $row['title']?>
            </a>
          </div>
          <div class="product__author text-center"><?= $row['author'] ?></div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <span class="product__price product__price--old">
              <?= $row['price'] ?>جنيه
            </span>
            <span class="product__price"><?= $row['discount_price']?>جنيه </span>
          </div>
        </div>
        <?php endforeach ?>
     </div>
      
 </div>

 
<?php 
require_once "./inc/footer.php";

?>