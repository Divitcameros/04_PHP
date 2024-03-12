<?php

/*
提示された配列関数の解説一覧を「$arrayFunctions」という変数に、二次元配列のリテラル形式で定義し、「順番無しリスト」でforeach、「テーブル(関数名は見出しセル)」でfor、２通りの出力をビュー側で行う。
 */

// 配列関数の解説一覧
$arrayFunctions = [
  [
    'array_change_key_case',
    'キーを小文字/大文字に変換'
  ],
  [
    'array_chunk',
    '配列を分割'
  ],
  [
    'array_column',
    '二次元配列から列を取得'
  ],
  [
    'array_combine',
    'キーと値を用意して配列を生成'
  ],
  [
    'array_count_values',
    '値ごとの個数を算出'
  ],
  [
    'array_diff',
    '配列から配列を引き算'
  ],
  [
    'array_fill',
    '同じ値の配列を生成'
  ],
  [
    'array_fill_keys',
    'キーを用意して配列を生成'
  ],
  [
    'array_filter',
    '関数を使って選別'
  ],
  [
    'array_flip',
    'キーと値を逆転'
  ],
  [
    'array_intersect',
    '共通項を抜粋'
  ],
  [
    'array_keys',
    'キーのみを新たな配列で取得'
  ],
  [
    'array_key_exists',
    'キーが存在するかを判定'
  ],
  [
    'array_merge',
    '配列を結合'
  ],
  [
    'array_map',
    '各値に関数を適用'
  ],
  [
    'array_pad',
    '配列数を加算'
  ],
  [
    'array_pop&array_shift',
    '配列の前後の要素を削除'
  ],
  [
    'array_push&array_unshift',
    '配列の前後に追加'
  ],
  [
    'array_rand',
    'キーをランダムに取得'
  ],
  [
    'array_reverse',
    '値を逆順にソート'
  ],
  [
    'array_search',
    '検索'
  ],
  [
    'array_slice',
    '一部を抜粋'
  ],
  [
    'array_sum&array_product',
    '全ての要素に合計値や総乗算'
  ],
  [
    'array_splice',
    'カット＆ペースト'
  ],
  [
    'array_unique',
    '重複要素を削除'
  ],
  [
    'array_values',
    '数値を添字に置換'
  ],
];

// 二次元関数のキーの初期値
$num = 6;

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>配列関数の解説一覧</title>
    <meta name="description" content="二次元配列と繰り返し構文の練習">
  </head>
  <body>
    <h1>配列関数の解説一覧</h1>
    <h2>foreachで、順番なしリストを繰り返し処理</h2>
    <ul>
      <?php foreach ($arrayFunctions as $value) : ?>
        <li><?=$value[0]?>は、<?=$value[1]?>する。</li>
      <?php endforeach; ?>
    </ul>
    <h2>forで、テーブルを繰り返し処理</h2>
    <table>
      <?php for ($i = 0; $i < count($arrayFunctions); $i++) : ?>
        <tr>
          <th><?=$arrayFunctions[$i][0]?></th>
          <td><?=$arrayFunctions[$i][1]?></td>
        </tr>
      <?php endfor; ?>
    </table>
    <p>
      配列の数は全部で<?=count($arrayFunctions)?>個です。<br>
      <?=$num?>番目の関数は<?=$arrayFunctions[$num -1][0]?>で、<?=$arrayFunctions[$num - 1][1]?>する。
    </p>
  </body>
</html>