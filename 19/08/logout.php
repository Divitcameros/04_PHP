<?php

// セッション開始
session_start();

// セッション変数のデータを空値で上書き
$_SESSION = [];

// セッションに使用しているクッキー情報を取得
$p = session_get_cookie_params();

// 現在のセッションIDと各要素を空値で上書き
setcookie(session_name(), '', time() - 60,
$p['path'], $p['domain'], $p['secure'], $p['httponly']);

// tmpフォルダ内のセッションファイルを破棄
session_destroy();

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ログアウト</title>
    <meta name="description" content="ログアウトページ">
  </head>
  <body>
    <p>ログアウトしました</p>
    <p><a href="login.php">ログインページへ</a></p>
  </body>
</html>