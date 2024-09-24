<?php
 function dd($data = [])
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}  
////////////////////category ///id//////con//////////books///////
function category($table_name, $id, $connection) {
    // استعلام SQL مع استخدام جدول المنتجات وربطه بفئة المنتجات
    $sql = "SELECT books.*, category.nameCategory AS cat_name, category.id AS id_cat 
            FROM `$table_name`
            INNER JOIN `category`
            ON `category`.`id` = `books`.`cat_id`
            WHERE `books`.cat_id = '$id'  ";

    // تنفيذ الاستعلام
    $result = mysqli_query($connection, $sql);

    // التحقق من نجاح الاستعلام
    if ($result) {
        // إرجاع النتائج كمصفوفة تراAssociative
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // إرجاع رسالة الخطأ في حالة وجود مشكلة في الاستعلام
        return "Query Error: " . mysqli_error($connection);
    }
}
function categoryWithPage($table_name, $id, $connection,$start,$last) {
    // استعلام SQL مع استخدام جدول المنتجات وربطه بفئة المنتجات
    $sql = "SELECT books.*, category.nameCategory AS cat_name, category.id AS id_cat 
            FROM `$table_name`
            INNER JOIN `category`
            ON `category`.`id` = `books`.`cat_id`
            WHERE `books`.cat_id = '$id' LIMIT $start,$last  ";

    // تنفيذ الاستعلام
    $result = mysqli_query($connection, $sql);

    // التحقق من نجاح الاستعلام
    if ($result) {
        // إرجاع النتائج كمصفوفة تراAssociative
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // إرجاع رسالة الخطأ في حالة وجود مشكلة في الاستعلام
        return "Query Error: " . mysqli_error($connection);
    }
}


function getLastRow($table_name, $connection) {
    // استعلام SQL لجلب آخر صف بناءً على ترتيب العمود id تنازليًا
    $sql = "SELECT * FROM `$table_name`
            ORDER BY id DESC
            LIMIT 1";

    // تنفيذ الاستعلام
    $result = mysqli_query($connection, $sql);

    // التحقق من نجاح الاستعلام
    if ($result) {
        // إرجاع الصف الأخير كصف واحد فقط
        return mysqli_fetch_assoc($result);
    } else {
        // إرجاع رسالة الخطأ في حالة وجود مشكلة في الاستعلام
        return "Query Error: " . mysqli_error($connection);
    }
}