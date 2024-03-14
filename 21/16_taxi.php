<?php
/*
初乗り料金が「1km」まで「410円」、それ以降は「237m」ごとに「80円」加算(端数は切り上げ)されていくタクシーがある。このタクシーに乗ったことを想定し、ｍで距離を入力すると、料金結果を出力する関数「getPriceTaxi」を作成し、以下のように表示する。PHPDocやTypeHintingは自身で考える。

// 1001m乗った場合の料金は490円です。
 */
$distance = 1001;

/**
 * 引数に移動距離を指定することで、タクシー料金を返す
 * 1kmまでは410円、それ以降は237m毎に80円追加される。
 * 端数切り上げなので、1m超えても80円加算される。
 *
 * @param integer|null $d
 * @return integer|null
 */
function getPriceTaxi(?int $d): ?int
{
  if ($d < 1001) { // 1kmまでなら410円
    $price = 410;
  } else { // それ以外なら237m（端数切り上げ）ごとに80円加算
    $addPrice = ceil(($d - 1000) / 237) * 80;
    $price = 410 + $addPrice;
  }
  return $price;
}
echo $distance . 'm乗った場合の料金は' . getPriceTaxi($distance) . '円です。<br>';
?>