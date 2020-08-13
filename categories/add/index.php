<?php

include "../../options/config.php";
include "../../options/validator.php";
include "../../models/message.php";

// KATEGORİ EKLEYEN WEB SERVİS

$message = new Message();

$category_name = input_validator($_POST["category_name"]);


// PDO ile INSERT ÖRNEĞİ
// SQL INJECTIONU ÖNLEMEK İÇİN PREPARE KULLANALIM
$query = $db->prepare('INSERT INTO categories SET 
category_name = ?
');

// sorgu çalışırsa ekle true döner
$ekle = $query->execute([
    $category_name
]);

if($ekle){
    $message->message = "Kategori başarıyla eklendi";
    $message->tf = true;
    echo json_encode($message);
} else{
    $hata = $query->errorInfo();
    echo json_encode($hata[2]);
    //echo "MYSQL HATASI: " . $hata[2];
}