<?php

require_once "../../options/config.php";
require_once "../../options/validator.php";
require_once "../../models/message.php";

// Kullanıcı bilgilerini POST ile alalım
$message = new Message();
if(isset($_POST["user_name"]) && isset($_POST["user_password"])){
    $user_name = input_validator($_POST["user_name"]);
    $user_password = input_validator($_POST["user_password"]);
    if(!empty($user_name) && !empty($user_password)){
        $sorgu = $db->prepare("select * from users where user_name=? and user_password=?");
        $sorgu->execute([
            $user_name,$user_password
        ]);
        if($sorgu){
            $isUser = $sorgu->fetch(PDO::FETCH_ASSOC);
            if($isUser!=null){
                $message->message = "Kullanıcı girişi başarılı, hoşgeldin $user_name";
                $message->tf = true;
                echo json_encode($message);
            } else{
                $message->message = "Böyle bir kullanıcı bulunamadı";
                $message->tf = false;
                echo json_encode($message);
            }
        } else{
            $message->message = "Sorgu çalışırken hata alındı ";
            $message->tf = false;
            echo json_encode($message);
        }
    } else {
        $message->message = "Kullanıcı adı veya parola boş geçilemez";
        $message->tf = false;
        echo json_encode($message);
    }
}




?>