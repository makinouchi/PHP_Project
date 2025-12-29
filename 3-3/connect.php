<?php
$host = 'mysql:dbname=img_test;host=localhost;charset=utf8mb4';
$user = 'root';
$password = '';
try{
    $pdo = new PDO($host,$user,$password);
} catch(PDOException $e){
    echo '接続失敗' . $e->getMessage() . "\n";
    exit();
}