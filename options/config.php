<?php 

// PDO ile veritabanı bağlantısı

try{
$db = new PDO("mysql:host=localhost;dbname=ibdb","root","");
} catch(PDOException $e){
    echo $e->getMessage();
}

?>