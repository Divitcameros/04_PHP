<?php
// input01.phpから4つの値を取得
$id     = $_POST['id'];
$user   = $_POST['user'];
$pass   = $_POST['pass'];
$gender = $_POST['gender'];
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>UserPage</title>
    <meta name="description" content="$_POST Practice Indicate">
  </head>
  <body>
    <h1><?=$user?>さん、こんにちは!</h1>
    <p>あなたのパスワードは「<?=$pass?>」です。</p>
    <p>ID: <?=$id?></p>
    <p>性別: <?=$gender?></p>
    <p><a href="input01.php">フォームに戻る</a></p>
  </body>
</html>