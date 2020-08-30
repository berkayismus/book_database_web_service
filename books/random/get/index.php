<?php

include "../../../options/config.php";
include "../../../options/validator.php";
include "../../../models/message.php";

// RASTGELE KİTAP GETİREN WEB SERVİS

$message = new Message();

$sorgu = $db->prepare("SELECT * FROM books  
ORDER BY RAND() LIMIT 10");
$sorgu->execute();
$books = $sorgu->fetchAll(PDO::FETCH_ASSOC);
if($sorgu){
    echo json_encode($books);
} else{
    $message->message = "Sorgu çalışırken hata";
    $message->tf = false;
}



?>