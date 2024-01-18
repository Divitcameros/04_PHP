<?php

// グローバル変数
$t = 29; // 気温 T
$h = 70; // 湿度 H

/**
 * 温度と湿度を指定すると不快指数の数値を返す
 * 
 * 温度または湿度の値が空でなければ、
 * それぞれを計算式に代入して不快指数を計算する
 * 
 * @param integer|null $t 温度を引数とする
 * @param integer|null $h 湿度を引数とする
 * @return integer|null   不快指数を戻り値とする
 */
function getDi(?int $t = 24, ?int $h = 60): ?int
{
    // アーリーリターンを実装
    if (empty($t) || empty($h)) return null;

    // 不快指数の計算式
    $di = 0.81 * $t + 0.01 * $h * (0.99 * $t - 14.3) + 46.3;
    
    return $di;
}
?>
<html>
  <p>気温<?=$t?>℃、湿度<?=$h?>の時の不快指数は<?=getDi($t, $h)?>です。</p>
</html>