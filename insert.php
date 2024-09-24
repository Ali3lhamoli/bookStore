<?php
require_once "./classes/DatabaseConnection.php";
require_once "./inc/header.php";
require_once "./inc/nav.php";


$connection= new mysqli("localhost","root","","bookStore");
$sql="SELECT * FROM category ";

 $dataCat= mysqli_query($connection, $sql);
$cat=mysqli_fetch_all($dataCat,MYSQLI_ASSOC)

?>
<style>
    .container{
        min-height: 40rem;
    max-height: 25rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    flex-direction: row;
    align-content: center;
    }
    form{
        height: 100%;
    }
</style>
 
 <div class="container col-10">
    <div class="all_div">
        
 <form action="formInsert.php" method="POST" class="form-control col-10" enctype="multipart/form-data" role="form">
        <input type="text" name="title" placeholder="title" class="form-control">
        <input type="text" name="author" placeholder="author" class="form-control">
        <input type="text" name="pages" placeholder="pages" class="form-control">
        <input type="text" name="price" placeholder="price" class="form-control">
        <input type="text" name="discount_price" placeholder="offer" class="form-control">
        <input type="text" name="stock" placeholder="stock" class="form-control"> 
         <input type="file" name="image" placeholder="image" class="form-control">
         <input type="text" name="rating" placeholder="rating" class="form-control">
        <select name="category" id="">
            <?php foreach($cat as $catId): ?>
                <option value="<?=$catId['id'] ?>"><?= $catId['nameCategory']?></option>
            <?php endforeach ?>
        </select>
         <button type="submit" class="btn btn-primary"> send</button>
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, reiciendis.
        </p>
    </form>
    </div>
 </div>


 <?php
 
require_once "./inc/footer.php";
 
 ?>