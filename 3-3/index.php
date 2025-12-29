<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {

  $contents = $pdo->prepare("SELECT * FROM post_img order by created_at DESC");
  $contents->execute();
  $imgs = $contents->fetchAll();

} else {

  // $_FILES httpファイルから「POST」でアップロードされた値を取得する関数
  if (!empty($_FILES['image']['name'])) {
      $id = null;
      $name = $_FILES['image']['name'];
      $type = $_FILES['image']['type'];
      $img = file_get_contents($_FILES['image']['tmp_name']);
      $size = $_FILES['image']['size'];
      date_default_timezone_set('Asia/Tokyo');
      $created_at = date("Y-m-d H:i:s");

      $stmt = $pdo->prepare("INSERT INTO post_img(id, name, type, img, size, created_at) VALUES (:id, :name, :type, :img, :size, :created_at)");
      $stmt->bindValue(":id", $id, PDO::PARAM_INT);
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':type', $type, PDO::PARAM_STR);
      $stmt->bindValue(':img', $img, PDO::PARAM_STR);
      $stmt->bindValue(':size', $size, PDO::PARAM_INT);
      $stmt->bindValue(":created_at", $created_at, PDO::PARAM_STR);
      $stmt->execute();
  }
  header('Location:index.php');
  exit();
}


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHPで画像を操作</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
  ImageUpload
</nav>

<div class="form-area">
  <form action="" method="post" enctype="multipart/form-data">
      <div class="form-container">
        <div class="form-item">
          <label>画像を選択</label>
          <input type="file" name="image" required>
        </div>
        <div class="form-item">
          <button type="submit">保存</button>
        </div>
      </div>
  </form>
</div>

<main>
  <div class="container">
  <?php for($i = 0; $i < count($imgs); $i++): ?>
    <div class="item">
      <img src="img.php?id=<?= $imgs[$i]['id']; ?>">
      <p><?= $imgs[$i]['name']; ?></p>
    </div>
  <?php endfor; ?>
  </div>
</main>

</body>
</html>