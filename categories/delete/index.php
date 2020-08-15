<?php

include "../../options/config.php";
include "../../options/validator.php";
include "../../models/message.php";

// KATEGORİ SİLEN WEB SERVİS
$message = new Message();
if(isset($_POST["category_id"]) && !empty($_POST["category_id"])){
    $category_id = input_validator($_POST["category_id"]);
    $sorgu = $db->prepare("DELETE FROM categories WHERE category_id=?");
    $sorgu->execute([
        $category_id
    ]);
    // sorgu başarılı oldu ise
    if($sorgu){
        $message->message = "Kategori başarıyla silindi";
        $message->tf = true;
        echo json_encode($message);
    } else{
        $message->message = "Kategori silerken hata oluştu";
        $message->tf = false;
        echo json_encode($message);
    }
} else{
    $message->message = "Parametreler boş gelemez";
    $message->tf = false;
    echo json_encode($message);
}


?>