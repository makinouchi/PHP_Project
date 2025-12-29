<?php
require_once 'connect.php';

$stmt = $pdo->prepare('SELECT * FROM post_img WHERE id = :id LIMIT 1');
$stmt->bindValue(':id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$img = $stmt->fetch();

header('Content-type: ' . $img['type']);
echo $img['img'];
exit();