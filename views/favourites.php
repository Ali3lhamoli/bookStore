<?php

require_once 'inc/header.php';
require_once 'inc/nav.php';

$sub_section = 'المفضلة';
require_once 'inc/subSectionFromMain.php';

$user_id = $_SESSION['client'][3];

$conn = DatabaseConnection::getInstance()->getConnection();

$favorite_query = "
    SELECT books.title, books.price, books.discount_price, books.stock, favouriets.created_at 
    FROM favouriets 
    INNER JOIN books ON favouriets.book_id = books.id 
    WHERE favouriets.user_id = '$user_id'";

$result = mysqli_query($conn, $favorite_query);

$favorite_books = array();
while ($row = mysqli_fetch_assoc($result)) {
    $favorite_books[] = $row;
}
?>

<div class="my-5 py-5">
  <section class="section-container favourites">
    <?php if (count($favorite_books) > 0): ?>
    <table class="w-100">
      <thead>
        <th class="d-none d-md-table-cell"></th>
        <th class="d-none d-md-table-cell"></th>
        <th class="d-none d-md-table-cell">الاسم</th>
        <th class="d-none d-md-table-cell">السعر</th>
        <th class="d-none d-md-table-cell">تاريخ الإضافة</th>
        <th class="d-none d-md-table-cell">المخزون</th>
        <th class="d-table-cell d-md-none">المنتج</th>
      </thead>
      <tbody class="text-center">
        <?php foreach ($favorite_books as $book): ?>
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
              <a href=""><?= $book['title'] ?></a>
            </td>
            <td class="d-block d-md-table-cell">
              <span class="product__price product__price--old"><?= $book['price'] ?></span>
              <span class="product__price">
                <?= $book['discount_price'] ? $book['price'] - $book['discount_price'] : $book['price'] ?>
              </span>
            </td>
            <td class="d-block d-md-table-cell"><?= date('d-m-Y', strtotime($book['created_at'])) ?></td>
            <td class="d-block d-md-table-cell">
              <span class="me-2"><i class="fa-solid fa-<?= $book['stock'] > 0 ? 'check' : 'times' ?>"></i></span>
              <span class="d-inline-block d-md-none d-lg-inline-block"><?= $book['stock'] > 0 ? 'متوفر بالمخزون' : 'سيتوفر قريبا' ?></span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
      <p>لم يتم إضافة أي منتج إلى المفضلة بعد.</p>
    <?php endif; ?>
  </section>
</div>
</main>

<?php

require_once 'inc/footer.php';

?>
