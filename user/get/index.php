<?php

include "../../options/config.php";
include "../../options/validator.php";
include "../../models/message.php";


// USER ID'ye göre user getiren WEB SERVİS

if(isset($_GET["user_id"]) && !empty($_GET["user_id"])){
    $user_id = input_validator($_GET["user_id"]);
    $sorgu = $db->prepare("SELECT * FROM users WHERE user_id=?");
    $sorgu->execute([
        $user_id
    ]);
    $users = $sorgu->fetch(PDO::FETCH_ASSOC);
    print_r($users);
}

?>