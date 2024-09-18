<?php
require_once "./classes/DatabaseConnection.php";
require_once "./inc/header.php";
require_once "./inc/nav.php";

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
        <input type="text" name="price" placeholder="price" class="form-control">
        <input type="text" name="offer" placeholder="offer" class="form-control">
        <input type="text" name="stock" placeholder="stock" class="form-control"> 
        <input type="text" name="description" placeholder="description" class="form-control">
        <input type="file" name="image" placeholder="image" class="form-control">
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