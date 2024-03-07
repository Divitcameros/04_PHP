<?php

// 二次元配列を定義
$recipe = [
  [
    'code'  => 'A0001',
    'name'  => '豚ロース薄切り(50g)',
    'price' => 128
  ],
  [
    'code'  => 'K0001',
    'name'  => '白菜(3枚)',
    'price' => 240
  ],
  [
    'code'  => 'A0002',
    'name'  => 'にんじん(1/5本)',
    'price' => 258
  ],
  [
    'code'  => 'A0003',
    'name'  => '水菜(1株)',
    'price' => 265
  ],
  [
    'code'  => 'K0002',
    'name'  => 'しめじ(1/2株)',
    'price' => 139
  ],
  [
    'code'  => 'A0004',
    'name'  => '九条ネギ(1本)',
    'price' => 378
  ]
];
// ①print_rで出力
echo '<pre>';
print_r($recipe);
echo '</pre>';

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>レシピ</title>
    <meta name="description" content="レシピの材料表ページ">
  </head>
  <body>
    <!-- ②<table>で繰り返し処理を用いて出力 -->
    <!-- ③<th>をforeachで出力 -->
    <table>
      <tr>
      <?php foreach ($recipe[0] as $key => $value) : ?>
        <th><?=$key?></th>
      <?php endforeach; ?>
      </tr>
      <?php for ($i = 0; $i < count($recipe); $i++) : ?>
        <tr>
          <td><?=$recipe[$i]['code']?></td>
          <td><?=$recipe[$i]['name']?></td>
          <td><?=$recipe[$i]['price']?></td>
        </tr>
      <?php endfor; ?>
    </table>
  </body>
</html>