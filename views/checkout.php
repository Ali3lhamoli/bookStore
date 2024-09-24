 


 
 

<?php 
if(isset($_SESSION['cart']['price'])==0 && isset($_SESSION['client'])==0):?>
<?php  require_once "function.php";
redirect("index.php?page=home")
//  exit(); // تأكد من إنهاء التنفيذ بعد إعادة التوجيه ?>

<?php else: ?>
<?php 
  require_once 'inc/header.php';
  require_once 'inc/nav.php';
  require_once 'function.php';
  
  $sub_section = 'اتمام الطلب';
  require_once 'inc/subSectionFromMain.php';
  require_once 'validation/validation.php';
  // require_once 'validation/validation.php';
  $cart = $_SESSION['cart'];
   
  // $crud = new DatabaseCrud();  
  $result = $crud->read('books'); 
   
  ?>
  <section class="section-container my-5 py-5 d-lg-flex">
  <div class="checkout__form-cont w-50 px-3 mb-5">
    <h4>الفاتورة </h4>
    <form class="checkout__form" action="controllers/checkout.php" method="POST">
      <div class="d-flex gap-3 mb-3">
        <div class="w-50">
          <label for="first-name">الاسم الأول <span class="required">*</span></label>


          <input class="form__input" type="text" id="first-name" name="first_name"
          <?php if(isset($_SESSION['first_name'])): ?>
            value=" <?php echo $_SESSION['first_name'] ?>" <?php endif ?>
          />
          <?php  if(isset($_SESSION['errors']['first_name'])): ?>
        <h4 class="text-end text-danger"><?php echo $_SESSION['errors']['first_name'] ?></h4>

        <?php  endif ?>



        </div>
        <div class="w-50">
          <label for="last-name">الاسم الأخير <span class="required">*</span></label>
          <input class="form__input" type="text" id="last-name"  name="last_name" 
          <?php if(isset($_SESSION['last_name'])): ?>
            value=" <?php  echo $_SESSION['last_name'] ?>" <?php endif ?>
          />
          <?php  if(isset($_SESSION['errors']['last_name'])): ?>
        <h4 class="text-end text-danger"><?php echo $_SESSION['errors']['last_name'] ?></h4>

        <?php  endif ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="last-name">المدينة / المحافظة<span class="required">*</span></label>
        <select class="form__input bg-transparent" name="state" type="text" id="last-name">
          <option value="cairo">القاهرة</option>
          <option value="alex">اسكندرية</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="last-name">العنوان بالكامل ( المنطقة -الشارع - رقم المنزل)<span class="required">*</span></label>
        <input class="form__input" placeholder="رقم المنزل او الشارع / الحي" type="text" id="last-name" name="address"
          <?php if(isset($_SESSION['address'])): ?>
            value=" <?php echo $_SESSION['address'] ?>" <?php endif ?>
           
        />
        <?php  if(isset($_SESSION['errors']['address'])): ?>
        <h4 class="text-end text-danger"><?php echo $_SESSION['errors']['address'] ?></h4>

        <?php  endif ?>
      </div>
      <div class="mb-3">
        <label for="last-name">رقم الهاتف<span class="required">*</span></label>
        <input class="form__input" type="text" id="last-name" name="phone" 
        <?php if(isset($_SESSION['phone'])): ?>
            value="  <?php echo $_SESSION['phone'] ?>" <?php endif ?>
           
        />
        <?php  if(isset($_SESSION['errors']['phone'])): ?>
        <h4 class="text-end text-danger"><?php echo $_SESSION['errors']['phone'] ?></h4>

        <?php  endif ?>

      </div>
      <div class="mb-3">
        <label for="last-name">البريد الإلكتروني (اختياري)<span class="required">*</span></label>
        <input class="form__input" type="text" id="last-name" name="email"   <?php if(isset($_SESSION['client'])): ?>
            value=" <?php echo $_SESSION['client']['email'] ?>" <?php endif ?>
           
        />
      </div>
      <div class="mb-3">
        <h2>معلومات اضافية</h2>
        <label for="last-name">ملاحظات الطلب (اختياري)<span class="required">*</span></label>
        <textarea class="form__input" placeholder="ملاحظات حول الطلب, مثال: ملحوظة خاصة بتسليم الطلب." type="text"
          id="last-name"></textarea>
      </div>
      <button class="primary-button w-100 py-2">تاكيد الطلب</button>
    </form>
  </div>
  <div class="checkout__order-details-cont w-50 px-3">
    <h4>طلبك</h4>

    <table class="w-100 checkout__table">
      <thead>
        <tr class="border-0">
          <th>المنتج</th>
          <th>المجموع</th>
          
        </tr>
      </thead>
      <?php if (isset($cart) && is_array($cart)): ?>

        <tbody>
        <?php foreach($cart as $id =>   $item):?>
            <?php $product = findProductById($result, $id); ?>
            <tr>
              
              <!-- title -->
              <td> <?php print_r($product['title']) ?>   </td>
<!-- price & Qty -->
<?php   $_SESSION['cart_qty']= [$item['qty'] ] ?>

<?php  $_SESSION['cart_price']= $item['discount_price']? $item['discount_price']:$item['price'] ?>
<td>     
  <div class="product__price text-center d-flex gap-2 flex-wrap">
  <?php if(isset($product['discount_price'])): ?>
    <span class="product__price"> <?php  $single_Dis  =$product['discount_price']  *  $item['qty'];
                                        
                                        $_SESSION['singleDis']=$single_Dis;
                                        
                                        echo $single_Dis
    ?>   جنيه</span> *  
     <span class="product__price"> <?= $product['discount_price'] . "X". $item['qty'] ?>   جنيه</span> *  

<?php else: ?>
      <span class="product__price">  <?= $single_Price=$product['price']  *  $item['qty']; 
      
                                        $_SESSION['singlePrice']=$single_Price;
                                        
                                        echo $single_Price?>  جنيه </span> * 

      <span class="product__price">  <?= $product['price'] . "X". $item['qty'] ?>  جنيه </span> * 
    </div>
    <?php endif ?>

</td>
     
                <tr class="bg-green">
            <th>قمت بتوفير</th>
            <td class="fw-bolder"> 
            <?php if(isset($product['discount_price'])): ?>
 <span class="product__price"> <?= $product['price'] - $product['discount_price']    ?>   جنيه</span> *  

 <?php else: ?>
  <span class="product__price">  <?= $product['price'] ?>  جنيه </span> * 

            </td>
        
    <?php endif ?>
 
          </tr>
          <td  >  جنيه</td>
    
              <!-- price -->
         
            </tr>


<?php endforeach ?>

<?php (  $totalPrice =calculateTotalPriceA($cart))?>
<?php  $totalPriceP =calculateTotalPriceP($cart)?>
            <!--endforeach from cartUser  -->
         <?php    $_SESSION['totalP']=$totalPrice;  ?> 
         <?php    $_SESSION['totalBeforDis']=$totalPriceP;  ?> 


         <tr>
            <th>الإجمالي</th>
             <td class="fw-bolder"> <?php   print_r($totalPrice) ?> جنيه</td>
        
          </tr>
        </tbody>
      <?php elseif (!isset($cart)): ?>


      
      <?php endif ?>
    </table>



    <div class="checkout__payment py-3 px-4 mb-3">
      <p class="m-0 fw-bolder">الدفع نقدا عند الاستلام</p>
    </div>

    <p>الدفع عند التسليم مباشرة.</p>
  </div>
</section>

 

    <?php endif ?>

 

 
 <?php
 unset($_SESSION['errors']['first_name']);
 unset($_SESSION['errors']['last_name']);
 unset($_SESSION['errors']['address']);
 unset($_SESSION['errors']['phone']);
 ?>


<?php
 


require_once 'inc/footer.php';

?>
