<!-- 追記ここから -->
<?php

$pdo = new PDO(
  "mysql:dbname=test01;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
);
if ($pdo) {
  echo "DB接続OK";
} else {
  echo "DB接続NG";
}

$id = null;
$name = $_POST["name"];
$contents = $_POST["contents"];
date_default_timezone_set('Asia/Tokyo');
$time = date("Y-m-d H:i:s");

$stmt = $pdo->prepare("INSERT INTO post(id, name, contents, time) VALUES (:id,:name,:contents,:time)");
$stmt->bindParam(":id", $id);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":contents", $contents);
$stmt->bindParam(":time", $time);
$stmt->execute();

if ($stmt) {
    echo "登録成功";
} else {
    echo "登録失敗";
}
?>



<!DOCTYPE html>
<meta charset="UTF-8">
<title>掲示板サンプル</title>
<h1>掲示板サンプル</h1>
<section>
    <h2>投稿完了</h2>
    <button onclick="location.href='index.php'">戻る</button>
</section>
 

