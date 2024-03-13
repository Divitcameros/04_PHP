<?php
/*
以下の対角線に「00」が並ぶ構造をビュー側でコロンブロックを使用して出力する(0パディングの関数は使用しない)。また、以前に用意したCSSを読み込み、テーブルを可視化する。

① まずはテーブル内に最初の1行分を表示するため、テーブルセルに0～9を横に10個 並べる。
② テーブル1行分を縦に10回、繰り返しの二重構造で展開し、それぞれのカウンター変数「$i」と「$j」を文字列結合してセル内に出力する。
③ 2つのカウンター変数が等しい条件のときのみ「00」を見出しセルの固定値 にしておく。(出力する必要は無し)
 */

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>テーブル</title>
  <meta name="description" content="">
</head>

<body>
  <h1>テーブル</h1>
  <table>
    <?php for ($i = 0; $i < 10; $i++) : ?> <!-- 行の繰り返し処理 -->
      <tr>
        <?php for ($j = 0; $j < 10; $j++) : ?> <!-- 列の繰り返し処理 -->
          <?php if ($i == $j) : ?> <!-- iとjが同じ場合 -->
          <th>00</th>
          <?php else : ?>
          <td><?= $i . $j ?></td>
          <?php endif;?>
        <?php endfor; ?>
      </tr>
    <?php endfor; ?>
  </table>
</body>

</html>