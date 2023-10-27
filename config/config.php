<?php
//connection TO Database
try {
    $host = "mysql:host=localhost;dbname=coffe-blend";
    $user = "root";
    $password = "";

    $connect = new PDO("$host","$user","$password");
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // echo "Connection True";
}catch(PDOException $e){
    echo "Failed Connection : " . $e->getMessage();
}
