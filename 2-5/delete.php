<?php

// $host = 'mysql:dbname=test01;host=localhost;charset=utf8mb4';
// $user = 'root';
// $password = '';
// try{
//     $pdo = new PDO($host,$user,$password);
//     echo '接続成功';
// } catch(PDOException $e){
//     echo '接続失敗' . $e->getMessage() . "\n";
//     exit();
// }
require('connect.php');// 共通DB接続処理を読み込み

$id = $_REQUEST['id'];
$del = $pdo->prepare('DELETE FROM post WHERE id = :id');
$del->bindValue('id', $id);
$del->execute();

header('Location: index.php');// index.phpにリダイレクト
exit();// 処理終了

