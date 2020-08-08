<?php

include "config.php";

// PDO ile INSERT ÖRNEĞİ
// SQL INJECTIONU ÖNLEMEK İÇİN PREPARE KULLANALIM
$sorgu = $db->prepare('INSERT INTO users SET 
user_name = ?,
user_email = ?,
user_password = ?,
user_status = ?
');

// sorgu çalışırsa ekle true döner
$ekle = $sorgu->execute([
    "deneme user","deneme email","deneme pass",0
]);

if($ekle){
    echo "verileriniz eklendi";
} else{
    $hata = $sorgu->errorInfo();
    echo "MYSQL HATASI: " . $hata[2];
}

?>