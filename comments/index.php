<?php

include "../options/config.php";
include "../options/validator.php";
include "../models/message.php";
include "../models/comment.php";

// kitapa ait yorumları getiren web servis
// comment_status=1 (aktif) olan yorumları getirecek
$message = new Message();

if(isset($_GET["book_id"]) && !empty($_GET["book_id"])){
    $book_id = input_validator($_GET["book_id"]);
    $sorgu = $db->prepare("SELECT * from comments WHERE book_id=? AND comment_status=? order by comment_created_date DESC");
    $sorgu->execute([
        $book_id,1
    ]); 
    $comments = $sorgu->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($comments);
}



?>