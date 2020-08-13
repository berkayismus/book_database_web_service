<?php

// TÜM KATEGORİLERİ LİSTELEYEN WEB SERVİS

include "../options/config.php";
include "../models/message.php";
include "../options/validator.php";

// PDO ile Veri Çekme ÖRNEĞİ

$sorgu = $db->prepare("SELECT * FROM categories");
$sorgu->execute();
// tek bir veri çekmek için fetch(), tamamını dizi halinde çekmek için fetchAll()
$kategoriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);

//kullanıcılar bir dizi olduğundan yazdırmak için print_r
//print_r( $kategoriler );



echo json_encode($kategoriler);

?>