<?php

include "../../options/config.php";
include "../../options/validator.php";
include "../../models/message.php";

// KATEGORİ GÜNCELLEYEN WEB SERVİS
$message = new Message();
if(isset($_POST["category_id"]) && !empty($_POST["category_id"]) && isset($_POST["category_name"]) && !empty($_POST["category_name"])){
    $category_id = input_validator($_POST["category_id"]);
    $category_name = input_validator($_POST["category_name"]);
    $sorgu = $db->prepare("UPDATE categories
    SET category_name = ?
    WHERE category_id = ?");
    $sorgu->execute([
        $category_name,$category_id
    ]);
    // sorgu başarılı oldu ise
    if($sorgu){
        $message->message = "Kategori başarıyla güncellendi";
        $message->tf = true;
        echo json_encode($message);
    } else{
        $message->message = "Kategori güncellenirken hata oluştu";
        $message->tf = false;
        echo json_encode($message);
    }
} else{
    $message->message = "Parametreler boş gelemez";
    $message->tf = false;
    echo json_encode($message);
}



?>