<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'المفضلة';
require_once 'inc/subSectionFromMain.php';

$conn = DatabaseConnection::getInstance()->getConnection();
$user_id = $_SESSION['client'][3];
$favorite = "SELECT `favouriets`.*,`books`.* FROM `favouriets` INNER JOIN `books` 
             ON `favouriets`.`book_id` = `books`.`id` 
             WHERE `favouriets`.`user_id` = '$user_id'";

$result = mysqli_query($conn, $favorite);
$favorite = array();
while ($row = mysqli_fetch_assoc($result)) {
  $favorite[] = $row;
}
?>

<div class="my-5 py-5">
  <section class="section-container favourites">
    <table class="w-100">
      <thead>
        <th class="d-none d-md-table-cell"></th>
        <th class="d-none d-md-table-cell"></th>
        <th class="d-none d-md-table-cell">الاسم</th>
        <th class="d-none d-md-table-cell">السعر</th>
        <th class="d-none d-md-table-cell">تاريخ الاضافه</th>
        <th class="d-none d-md-table-cell">المخزون</th>
        <th class="d-table-cell d-md-none">product</th>
      </thead>
      <tbody class="text-center">
        <?php foreach ($favorite as $valuo): ?>
          <tr>
            <td class="d-block d-md-table-cell">
              <span class="favourites__remove m-auto">
                <i class="fa-solid fa-xmark"></i>
              </span>
            </td>
            <td class="d-block d-md-table-cell favourites__img">
              <img src="assets/images/product-1.webp" alt="" />
            </td>
            <td class="d-block d-md-table-cell">
              <a href=""> <?= $valuo['title'] ?> </a>
            </td>
            <td class="d-block d-md-table-cell">
              <span class="product__price product__price--old"><?= $valuo['price'] ?></span>
              <span class="product__price"><?= $valuo['price'] - $valuo['discount_price']; ?></span>
            </td>
            <td class="d-block d-md-table-cell">يوليو 24, 2023</td>
            <td class="d-block d-md-table-cell">
              <span class="me-2"><i class="fa-solid fa-<?php echo $valuo['stock'] > 0 ? 'check' : 'notdef' ?>"></i></span>
              <span class="d-inline-block d-md-none d-lg-inline-block"><?php echo $valuo['stock'] > 0 ? 'متوفر بالمخزون' : 'سيتوفر قريبا' ?></span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</div>
</main>

<?php

require_once 'inc/footer.php';

?>