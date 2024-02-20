<?php

// セッション開始
session_start();

// ログイン認証確認
// ログイン認証済みでない場合、ログインページへリダイレクト
if ($_SESSION['authenticated'] != true) {
  header('Location: login.php');
  exit;
}

// セッション変数に保存したユーザ名(ユーザID)を取得
$user = $_SESSION['userId'];

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>会員専用</title>
    <meta name="description" content="会員専用ページ">
  </head>
  <body>
    <h1>会員専用ページへようこそ</h1>
    <p>あなたのユーザIDは<?=$user?>です。</p>
    <p>このページでは会員専用の情報が閲覧できます。</p>
    <p><a href="logout.php">ログアウトする</a></p>
  </body>
</html>