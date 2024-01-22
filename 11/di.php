<?php

// グローバル変数
$t = 0; // 気温 T
$h = 57; // 湿度 H

/**
 * 温度と湿度を指定すると不快指数の数値と判定結果を配列で返す
 *
 * 温度または湿度の値がnullでなければ、
 * それぞれを計算式に代入して不快指数を計算する
 * 
 * @param mixed $t 型指定をmixed(全ての型)として温度を引数とする
 * @param mixed $h 型指定をmixed(全ての型)として湿度を引数とする
 * @return array|null 不快指数と判定結果の配列を戻り値とする
 */
function getDi(mixed $t = null, mixed $h = null): ?array
{
    // アーリーリターンを実装
    if (is_null($t) || is_null($h)) return null;

    // 不快指数の計算式
    $di = 0.81 * $t + 0.01 * $h * (0.99 * $t - 14.3) + 46.3;
    
    // 不快指数の判定結果を返す条件分岐
    if ($di < 55) {
      // 配列にキーと値を代入
      $diArr['di']     = $di;
      $diArr['result'] = '「寒い」';
    }elseif ($di < 60) {
      $diArr['di']     = $di;
      $diArr['result'] = '「肌寒い」';
    }elseif ($di < 65) {
      $diArr['di']     = $di;
      $diArr['result'] = '「何も感じない」';
    }elseif ($di < 70) {
      $diArr['di']     = $di;
      $diArr['result'] = '「快い」';
    }elseif ($di < 75) {
      $diArr['di']     = $di;
      $diArr['result'] = '「暑くない」';
    }elseif ($di < 80) {
      $diArr['di']     = $di;
      $diArr['result'] = '「やや暑い」';
    }elseif ($di < 85) {
      $diArr['di']     = $di;
      $diArr['result'] = '「暑くて汗が出る」';
    }else{
      $diArr['di']     = $di;
      $diArr['result'] = '「暑くてたまらない」';
    }
    return $diArr;
}
?>
<html>
  <p>気温<?=$t?>℃、湿度<?=$h?>％の時の不快指数は<?=getDi($t, $h)['di']?>で<?=getDi($t, $h)['result']?> です。</p>
</html>