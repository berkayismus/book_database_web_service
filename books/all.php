<?php

include "../options/config.php";
include "../options/validator.php";

// KATEGORİYE GÖRE KİTAPLARI GETİREN WEB SERVİS
// book_status=1 ise aktif, yani görünür kitapları getirecek

if(isset($_GET["category_id"]) && !empty($_GET["category_id"])){
    $category_id = $_GET["category_id"];
    $book_status = $_GET["book_status"];
    $query = $db->prepare("SELECT * FROM books WHERE category_id=? AND book_status=?");
    $query->execute([
        $category_id,$book_status
    ]);
    $books = $query->fetchAll(PDO::FETCH_ASSOC); // books is array, print_r($books);

    echo json_encode($books);

}

// eğer category_id== boş gelirse book_status=1 olan tüm kitapları getirsin
if(!isset($_GET["category_id"])){
    $book_status = 1;
    $query = $db->prepare("SELECT * FROM books WHERE book_status=?");
    $query->execute([
        $book_status
    ]);
    $books = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($books);

}




?>