<?php
/*
税抜き価格9876円の商品をユーザ定義関数「getTaxPrice」を実行すると、税込み価格（税率10%)を小数点以下で切り捨てた整数のみを返し、その結果を以下のように表示する。PHPDocやTypeHintingは自身で考える。

// 税込み価格は10,863円です。
 */

$price = 9876;

/**
 * 引数に税別価格を指定すると、税込み価格(10%)を小数切捨てで返す
 *
 * @param integer|null $p
 * @return integer|null
 */
function getTaxPrice(?int $p): ?int
{
  return floor($p * 1.1);
}

echo '税込み価格は' . number_format(getTaxPrice($price)) . '円です。';
?>