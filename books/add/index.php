<?php

include "../../options/config.php";
include "../../options/validator.php";
include "../../models/message.php";

// KİTAP EKLEYEN WEB SERVİS

$message = new Message();

if(!empty($_POST["category_id"]) && !empty($_POST["book_name"]) 
&& !empty($_POST["book_detail"]) && !empty($_POST["book_author"]) 
&& !empty($_POST["book_page_number"]) && !empty($_POST["book_publisher"]) 
&& !empty($_POST["book_status"]) && !empty($_POST["book_total_score"])
&& !empty($_POST["book_total_rep"]) && !empty($_POST["book_average_score"])){
    $category_id = input_validator($_POST["category_id"]);
    $book_name = input_validator($_POST["book_name"]);
    $book_detail = input_validator($_POST["book_detail"]);
    $book_author = input_validator($_POST["book_author"]);
    $book_page_number = input_validator($_POST["book_page_number"]);
    $book_publisher = input_validator($_POST["book_publisher"]);
    $book_status = input_validator($_POST["book_status"]);
    $book_total_score = input_validator($_POST["book_total_score"]);
    $book_total_rep = input_validator($_POST["book_total_rep"]);
    $book_average_score = input_validator($_POST["book_average_score"]);
    
    
    // PDO ile INSERT ÖRNEĞİ
    // SQL INJECTIONU ÖNLEMEK İÇİN PREPARE KULLANALIM
    $query = $db->prepare('INSERT INTO books SET 
    category_id = ?,
    book_name = ?,
    book_detail = ?,
    book_author = ?,
    book_page_number = ?,
    book_publisher = ?,
    book_status = ?,
    book_total_score = ?,
    book_total_rep = ?,
    book_average_score = ?
    ');
    
    // sorgu çalışırsa ekle true döner
    $ekle = $query->execute([
        $category_id,$book_name,$book_detail,$book_author,$book_page_number,$book_publisher,$book_status,$book_total_score,$book_total_rep,$book_average_score
    ]);
    
    if($ekle){
        $message->message = "Kitap başarıyla eklendi";
        $message->tf = true;
        echo json_encode($message);
    } else{
        $hata = $query->errorInfo();
        echo json_encode($hata[2]);
        //echo "MYSQL HATASI: " . $hata[2];
    }
} else{
    $message->message = "Alanlardan herhangi \n bir tanesi boş olamaz";
    $message->tf = false;
    echo json_encode($message);
}









?>