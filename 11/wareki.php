<?php

// 厳格な型判定
declare(strict_types = 1);

// 絶対パスで外部関数を読み込み
require_once(dirname(__FILE__) . '/util.inc.php');

// グローバル変数
$seireki = '';
$wareki  = '';
if (!empty($_POST)) {
  $seireki = $_POST['seireki'];
}

// 和暦変換の関数の戻り値を出力用の変数$warekiに代入
$wareki = getWareki($seireki);


?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>西暦⇒和暦変換</title>
    <meta name="description" content="西暦 XXXX年を、和暦 令和XX年に変換します。">
  </head>
  <body>
    <h1>西暦⇒和暦変換</h1>
    <p>西暦を入力し、「計算」ボタンを押してください。</p>
    <form action="" method="post">
      <p>西暦:
        <input type="text" name="seireki" size="4" maxlength="4" value="<?=h($seireki)?>">年
      </p>
      <p><input type="submit" value="計算"></p>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <p>西暦<?=$seireki?>年は、<?=$wareki?>です。</p>
    <?php endif; ?>
  </body>
</html>