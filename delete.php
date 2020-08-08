<?php

include "config.php";

// PDO ile silme işlemi

$sorgu = $db->prepare("DELETE FROM users WHERE user_id=?");
$sorgu->execute([
    1
]);

if($sorgu){
    echo "silme işlemi başarılı";
} else{
    echo "işlem başarısız";
}




?>