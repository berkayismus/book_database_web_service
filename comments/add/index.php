<?php

include "../../options/validator.php";
include "../../options/config.php";
include "../../models/message.php";

// YORUM YAPMAK İÇİN OLUŞTURULAN WEB SERVİS

$message = new Message();

if(isset($_POST["user_id"]) && !empty($_POST["user_id"])){
    $user_id = input_validator($_POST["user_id"]);
    $book_id = input_validator($_POST["book_id"]);
    $comment_detail = input_validator($_POST["comment_detail"]);
    $comment_status = 1;

    $sorgu = $db->prepare("INSERT INTO comments SET
    user_id = ?,
    book_id = ?,
    comment_detail = ?,
    comment_status = ?
    ");
    $sorgu->execute([
        $user_id,$book_id,$comment_detail,$comment_status
    ]);
    // sorgu başarılı ise true döner
    if($sorgu){
        $message->message = "Yorum başarıyla eklendi";
        $message->tf = true;
        echo json_encode($message);
    }

} else{
    $message->message = "Parametreler boş gelemez";
    $message->tf = false;
    echo json_encode($message);
}




?>