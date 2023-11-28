<?php
/*
*配列の定義
*/
$fruits = ['リンゴ', 'バナナ', 'ぶどう'];

// 配列指定の出力
echo $fruits[0] . '<br>';
echo $fruits[1] . '<br>';
echo $fruits[2];

// 型を含むデバック用関数
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// 型を含まない簡易版デバック用関数
echo '<pre>';
print_r($fruits);
echo '</pre>';

?>