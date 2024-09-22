<?php 
 session_start();
require_once "../classes/DatabaseConnection.php";
require_once "../function.php";

$conn=  DatabaseConnection::getInstance()->getConnection();

if(isset($_GET['query'])&& !empty($_GET['query']) ){
    $query = $_GET['query'];
    $searchQuery = $conn->real_escape_string($query);
    $sql = "SELECT * FROM books WHERE title LIKE '%$searchQuery%' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // إنشاء مصفوفة لتخزين النتائج
        $resultsArray = array();

        // عرض النتائج في جدول
        while ($row = $result->fetch_assoc()) {
            // تخزين النتائج في المصفوفة
            $resultsArray[] = $row;
        }

        // تخزين المصفوفة في الجلسة
        $_SESSION['search'] = $resultsArray;
        redirect("index.php?page=search");

        echo "</ul>";
    } else {
         redirect("index.php?page=shop");
        //  echo "no product ";
    }

    // Free result set
    
    $result->free();
} else {
    echo "<p>Please enter a search term.</p>";
    redirect("index.php?page=shop");

}

 
require_once "../inc/footer.php";
