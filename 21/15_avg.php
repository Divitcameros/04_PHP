<?php
/*
複数の数値を配列で受けて、四捨五入(小数点第二位まで)した平均値を返す関数「getAvg」を定義し、今回は「1と7と11」を指定して画面に結果を表示する。PHPDocやTypeHintingは自身で考える。その際、戻り値の型は整数/浮動小数点のいずれかとする。

// 平均値は6.33です。
 */

$arrNums = [1, 7, 11];

/**
 * 数値が複数代入されている配列を引数にしていすると
 * 四捨五入(小数点第二位まで)した平均値を返す
 *
 * @param array|null $n
 * @return float|null
 */
function getAvg(?array $n): ?float
{
  return round(array_sum($n) / count($n), 2);
}

echo '平均値は' . getAvg($arrNums) . 'です。';
?>