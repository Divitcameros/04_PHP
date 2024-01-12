<?php
$arrNum = [1490, 320, 2160, 1980, 498, 2324, 698, 2218, 1240, 198];

$total = 0;
for ($i = 0; $i < count($arrNum); $i++) {
  // 0~要素数の範囲でランダムにインデックスを取得
  $index  = mt_rand(0, array_key_last($arrNum));
  echo $arrNum[$index] . ' | ';
  $total += $arrNum[$index];
}
echo '<br>';
echo number_format($total / count($arrNum)) . '円';
// $avg = number_format($total / count($arrNum));
// echo '平均値：' . $avg . '円';
?>