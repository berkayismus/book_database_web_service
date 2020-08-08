<?php

include "config.php";

// PDO ile Güncelleme ÖRNEĞİ

$sorgu = $db->prepare("UPDATE users SET 
user_name = ?,
user_email = ?,
user_password = ?
WHERE user_id=?");
$guncelle = $sorgu->execute([
    "berkay","berkaydiyebiri@gmail.com","cmdmkrs0",1
]);

if($guncelle){
    echo "Güncelleme işlemi başarılı";
} else{
    echo "Güncelleme işlemi başarısız";
}

?>