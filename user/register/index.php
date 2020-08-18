<?php

include "../../options/config.php";
include "../../options/validator.php";
include "../../models/message.php";

$userMessage = new Message();

    $user_name = input_validator($_POST["user_name"]);
    $user_email = input_validator($_POST["user_email"]);
    $user_password = input_validator($_POST["user_password"]);
    $user_validate_code = rand(0,10000).rand(0,10000);
    //$user_status = input_validator($_POST["user_status"]);
    
    // PDO ile INSERT ÖRNEĞİ
    // SQL INJECTIONU ÖNLEMEK İÇİN PREPARE KULLANALIM
    $query = $db->prepare('INSERT INTO users SET 
    user_name = ?,
    user_email = ?,
    user_password = ?,
    user_status = ?,
    user_validate_code = ?
    ');
    
    // sorgu çalışırsa ekle true döner
    $ekle = $query->execute([
        $user_name,$user_email,$user_password,0,$user_validate_code
    ]);
    
    if($ekle){
        $userMessage->message = "Kullanıcı kaydı başarılı," . "\n" . "Hesabınızı aktive etmek için \n epostanızı kontrol edin";
        $userMessage->tf = true;
        // alttaki remote sunucuda denenecek - localde çalışmıyor
        // emailSendToUser($user_email,$user_validate_code);
        echo json_encode($userMessage);
    } else{
        $hata = $query->errorInfo();
        echo "MYSQL HATASI: " . $hata[2];
    }
 



function emailSendToUser($user_email,$user_validate_code,$siteBaseUrl){
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "admin@berkayismus.site";
    $to = $user_email;
    $subject = "Hesabını Aktive Et";
    $message = "Hesabınızı aktive etmek için " . "<a href='$siteBaseUrl/user/activation/?user_email=$user_email&user_validate_code=$user_validate_code'><b>tıklayın</b></a>";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    //echo "eposta başarılı ile gönderildi";
}



?>