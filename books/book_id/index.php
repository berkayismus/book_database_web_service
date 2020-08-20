<?php

include "../../options/config.php";
include "../../options/validator.php";
include "../../models/message.php";

// KİTAP ID'ye göre kitap getiren web servis

$message = new Message();

if(isset($_GET["book_id"]) && !empty($_GET["book_id"])){
    $book_id = input_validator($_GET["book_id"]);
    $sorgu = $db->prepare("SELECT * FROM books WHERE book_id=? AND book_status=?");
    $sorgu->execute([
        $book_id,1
    ]);
    $book = $sorgu->fetch(PDO::FETCH_ASSOC);
    echo json_encode($book);
} else{
    $message->message = "Parametreler boş geçilemez";
    $message->tf = false;
    echo json_encode($message);
}


?>