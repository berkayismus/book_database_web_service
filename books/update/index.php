<?php

include "../../models/message.php";
include "../../options/validator.php";
include "../../options/config.php";

// KİTAP GÜNCELLEYEN WEB SERVİS
// GÜNCELLENEBİLECEK ALANLAR
// book_name , book_detail , book_page_number , book_publisher

$message = new Message();
if(isset($_POST["book_id"]) && !empty($_POST["book_id"])){
    $book_id = input_validator($_POST["book_id"]);
    $book_name = input_validator($_POST["book_name"]);
    $book_detail = input_validator($_POST["book_detail"]);
    $book_page_number = input_validator($_POST["book_page_number"]);
    $book_publisher = input_validator($_POST["book_publisher"]);

    $sorgu = $db->prepare("UPDATE books SET 
    book_name = ?,
    book_detail = ?,
    book_page_number = ?,
    book_publisher = ?
    WHERE book_id = ?");
    $sorgu->execute([
        $book_name,$book_detail,$book_page_number,$book_publisher,$book_id
    ]);
    // eğer sorgu başarılı olarak çalışır ise
    if($sorgu){
        $message->message = "Kitap başarıyla güncellendi";
        $message->tf = true;
        echo json_encode($message);
    } else{
        $message->message = "Kitap güncellendirken hata oluştu";
        $message->tf = false;
        echo json_encode($message);
    }

} else{
    $message->message = "Parametreler boş geçilemez";
    $message->tf = false;
    echo json_encode($message);
}



?>