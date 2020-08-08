<?php

include "config.php";

// PDO ile Veri Çekme ÖRNEĞİ

$sorgu = $db->prepare("SELECT * FROM users");
$sorgu->execute();
// tek bir veri çekmek için fetch(), tamamını dizi halinde çekmek için fetchAll()
$kullanicilar = $sorgu->fetchAll(PDO::FETCH_ASSOC);

//kullanıcılar bir dizi olduğundan yazdırmak için print_r
print_r( $kullanicilar );

?>