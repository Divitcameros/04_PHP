<?php
$prices = [298, 129, 198, 274, 625, 273, 296, 325, 200, 127, 398];
// 3,143円

// 3桁でカンマ区切りして出力
echo number_format(getPriceInTax($prices, 10)) . '円';

// $pricesの合計価格に$tax%の税率を加えた値を返す処理
function getPriceInTax($prices, $tax = 8)
{
  $total = 0;
  foreach ($prices as $price) {
    $total += $price;
  }
  // 税込み価格を小数点以下切り捨てした値を戻り値として返す
  // 税率10%なら1.1倍した値が税込みとなるので、(1 + 0.1)となるように演算を記述
  return floor($total * (1 + $tax / 100));
}
?>