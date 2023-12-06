<?php
// 値段の配列
$priceList = [298, 348, 198, 680, 98, 980, 498, 640];
// 合計値の初期値設定
$total = 0;
for ($i = 0; $i < count($priceList); $i++) {
  $total += $priceList[$i];
}
// echo $total * 1.1 .'円';
$result = $total * 1.1;
echo $result .'円';
?>