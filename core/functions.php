<?php
 function dd($data = [])
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}  
function category($table_name, $id, $connection, $BookStatic) {
    $sql = "SELECT * FROM `$table_name`
            INNER JOIN `$BookStatic`
            ON `$table_name`.`id` = `$BookStatic`.`id_cate`
            WHERE `$BookStatic`.`id_cate` = '$id'";
            
    $result = mysqli_query($connection, $sql);

    if ($result) {
        // Fetch and return the result as an associative array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // If there's an error with the query, return the error message
        return "Query Error: " . mysqli_error($connection);
    }
}
