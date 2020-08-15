<?php

// KİTAP SİLEN WEB SERVİS
// ASLINDA KİTAP'I VERİTABANINDAN SİLMEYECEK, book_status=0 olarak güncelleyecek

include "../../options/config.php";
include "../../options/validator.php";
include "../../models/message.php";

$message = new Message();

if(isset($_POST["book_id"]) && !empty($_POST["book_id"])){
    $book_id = input_validator($_POST["book_id"]);
    $sorgu = $db->prepare("UPDATE books
    SET book_status = ?
    WHERE book_id = ?");
    $sorgu->execute([
        0,$book_id
    ]);
    // sorgu başarılı bir şekilde çalışırsa
    if($sorgu){
        $message->message = "Kitap başarıyla silindi"; // aslında güncellendi
        $message->tf = true;
        echo json_encode($message);
    } else{
        $message->message = "Kitap silinirken hata ile karşılaşıldı";
        $message->tf = false;
        echo json_encode($message);
    }

} else{
    $message->message = "Parametreler boş geçilemez";
    $message->tf = false;
    echo json_encode($message);
}

?>