<?php
$n = mt_rand(1,10);// 1から10までの乱数を発生させる
if ($n < 4) {
    $res = '大吉';
} elseif ($n < 6) {
    $res = '中吉';
} elseif ($n < 8) {
    $res = '小吉';
} else {
    $res = '吉';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>結果｜おみくじ</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav>
        <h1>result</h1>
    </nav>
    <div class="box">
    <h2 class="result-text"><?php echo $res;?></h2>
    <div class="form-box">
        <a href="start.php">
            <button type="button">もう一度引く</button>
        </a>
    </div>
</body>
</html>