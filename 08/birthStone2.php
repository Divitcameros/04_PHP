<?php
// 誕生石の連想配列
$birthStones = [
  'ガーネット',
  'アメジスト',
  'アクアマリン',
  'ダイヤモンド',
  'エメラルド',
  'パール',
  'ルビー',
  'ペリドット',
  'サファイア',
  'オパール',
  'トパーズ',
  'ターコイズ'
];

// 月の値を取得
$month = $_POST['month'];

// 誕生石を取得
$stoneName = $birthStones[$month -1];

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>誕生石</title>
    <meta name="description" content="$_POST Practice">
  </head>
  <body>
    <h1>誕生石</h1>
    <p><?=$month?>月の誕生石は<?=$stoneName?>です!</p>
    <form action="" method="post">
      <p>誕生月を選んでください:
        <select name="month">
          <option value="1" selected>1月</option>
          <option value="2">2月</option>
          <option value="3">3月</option>
          <option value="4">4月</option>
          <option value="5">5月</option>
          <option value="6">6月</option>
          <option value="7">7月</option>
          <option value="8">8月</option>
          <option value="9">9月</option>
          <option value="10">10月</option>
          <option value="11">11月</option>
          <option value="12">12月</option>
        </select>
        <input type="submit" value="送信">
      </p>
    </form>
  </body>
</html>