<?php
/**
 * 不快指数を計算する
*/
$t = 29; // 気温 T
$h = 70; // 湿度 H

// 不快指数の計算式

function getDi($t = 24, $h = 60)
{
  $di = 0.81 * $t + 0.01 * $h * (0.99 * $t - 14.3) + 46.3;
  return $di;
}
?>
<html>
  <p>気温<?=$t?>℃、湿度<?=$h?>の時の不快指数は<?=getDi($t, $h)?>です。</p>
</html>