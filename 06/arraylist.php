<?php
// 果物の配列を作成
$fruits = ['リンゴ', 'バナナ', 'ぶどう'];

// 配列「2」の'ぶどう'を'イチゴ'に変更
$fruits[2] = 'イチゴ';

// インデックスを指定せずに要素を追加すると
// 末尾に配列が追加される
// 配列「3」に'メロン'を追加
$fruits[] = 'メロン';

// 配列「1」を削除
unset($fruits[1]);

echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo '<pre>';
print_r($fruits);
echo '</pre>';
?>