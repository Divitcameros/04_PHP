<?php

// 初期化
$total  = 0;
$total2 = 0;

// 繰り返し処理で1~30までの値を加算
for ($i = 1; $i < 31; $i++) {
  $total += $i;
}
echo '合計は' . $total . 'です<br>';

// 配列格納用変数
$arrNums = [];

// $arrNumsに1~100までの数値を代入
for ($i = 1; $i < 101; $i++) {
  $arrNums[] = $i;
}

// $arrNumsの合計値をforeachを用いて計算出力
foreach ($arrNums as $num) {
  $total2 += $num;
}
echo '配列の合計は' . $total2 . 'です<br>';

?>