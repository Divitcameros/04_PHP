<?php
$prices = [298, 129, 198, 274, 625, 273, 296, 325, 200, 127, 398];
// 3,143円

// 3桁でカンマ区切りして出力
echo number_format(getPriceInTax($prices, 10)) . '円';

/**
 * 購入商品価格の配列を指定すると、
 * 8%の税込み価格を返す
 *
 * 第2引数に税率を指定すると、その税込み価格を返す
 * 
 * @param array|null $prices 価格の配列を引数とする
 * @param integer|null $tax  税率を引数とする
 * @return integer|null      税込み価格を戻り値とする
 */
function getPriceInTax(?array $prices, ?int $tax = 8): ?int
{
    // アーリーリターンを実装
    if (empty($prices) || empty($tax)) return null;

    $total = 0;
    foreach ($prices as $price) {
        $total += $price;
    }
    // 税込み価格を小数点以下切り捨てした値を戻り値として返す
    // 税率10%なら1.1倍した値が税込みとなるので、(1 + 0.1)となるように演算を記述
    return floor($total * (1 + $tax / 100));
}
?>