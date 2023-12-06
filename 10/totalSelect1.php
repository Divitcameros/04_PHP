<?php
$numArr = [
  [30, 65, 72, 47, 63, 96],
  [35, 57, 67, 23, 14, 56, 61],
  [46, 16, 27, 58],
  [84, 27, 40, 18, 92, 46, 21],
  [14, 74, 54, 2, 85]
];
// 未定義エラーの回避
$arr    = '';
$num    = '';
$result = '';
if (!empty($_POST)) {
  $arr = $_POST['arr'];
  $num = $_POST['num'];
}
// 合計の計算
$total = 0;
if (!is_numeric($num)) {
    $result = '数値を入力してください';
    } elseif ($num < 1 || $num > 99) {
        $result = '1から99までの数値を入力してください';
      } else {
        // $arrで取得したものを$numArrのキーとして、count($numArr[$arr])は、
        // キー$arrに該当する二次配列の中身の要素数をカウントしている。
        // (例：$arrが0を取得したら、それに該当する$numArrの二次配列である[30, 65, 72, 47, 63, 96]の要素数6を指定する。)
        for ($i = 0; $i < count($numArr[$arr]); $i++) {
          // 以下は$totalに$numArrの$arrキーの二次配列の中の$iに該当する数値を加算している。
          // (例：$arrが0なら、$numArrの二次配列[30, 65, 72, 47, 63, 96]の$i=0に該当する30を加算している。)
          $total += $numArr[$arr][$i];
      }
      $result = $total * $num;
}


?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>合計値の計算</title>
    <meta name="description" content="foreach form practice">
  </head>
  <body>
    <h1>合計値の計算</h1>
    <form action="" method="post">
      <p>配列の選択:
        <select name="arr">
          <option value="0" <?= $arr === '0'? 'selected' : '' ?>>配列１</option>
          <option value="1" <?= $arr === '1'? 'selected' : '' ?>>配列２</option>
          <option value="2" <?= $arr === '2'? 'selected' : '' ?>>配列３</option>
          <option value="3" <?= $arr === '3'? 'selected' : '' ?>>配列４</option>
          <option value="4" <?= $arr === '4'? 'selected' : '' ?>>配列５</option>
        </select>
      </p>
      <p>掛ける数値:
        <input type="text" name="num" size="2" maxlength="2" value="<?=htmlspecialchars($num, ENT_QUOTES | ENT_HTML5, 'UTF-8')?>">
      </p>
      <p><input type="submit" value="計算"></p>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>合計結果:<?=$result?></p>
      <?php endif; ?>
    </form>
  </body>
</html>