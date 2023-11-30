<?php
// 商品リスト
$goodsList = [
  'テレビ',
  'パソコン',
  '携帯電話',
  '冷蔵庫',
  '洗濯機'
];
// 商品のidを取得(lists.phpから送信されたキー'id'から値を取得する：例_books.php?id=0なら'0'を取得)
$id = $_GET['id'];
// 商品名を取得($goodsListのキーと$idで取得した値を紐づける：例_books.php?id=0なら$goodsListのキー0と紐づけて'テレビ'を取得)
$itemName = $goodsList[$id];
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Goodslist</title>
    <meta name="description" content="$_GET Practice">
  </head>
  <body>
    <p><?=$itemName?>が選択されました</p>
    <p><a href="lists.php">一覧ページに戻る</a></p>
  </body>
</html>