<?php

include "../../options/config.php";
include "../../options/validator.php";
include "../../models/message.php";

// KULLANICININ HESABINI AKTİVE EDEN WEB SERVİS

$message = new Message();
// GET ile atanan değerleri alalım
if(isset($_GET["user_email"]) && isset($_GET["user_validate_code"])){
    $user_email = input_validator($_GET["user_email"]);
    $user_validate_code = input_validator(($_GET["user_validate_code"]));
}

// gelen değerler boş değilse, user_status = 1 yani aktif yapalım
if(!empty($user_email) && !empty($user_validate_code)){
    $query = $db->prepare("
    UPDATE users SET user_status = ?
    WHERE user_email = ? and user_validate_code = ?
    ");
    $isQuerySuccess= $query->execute([
        1,$user_email,$user_validate_code
    ]);
    if($isQuerySuccess){
        $message->message = "Hesabınız başarılı şekilde aktif edildi, mobil uygulamadan giriş yapabilirsiniz";
        $message->tf = true;
        echo $message->message;
    }
}






?>