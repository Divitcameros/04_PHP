<?php
// 果物の配列を作成
$fruits    = ['リンゴ', 'バナナ', 'ぶどう'];
// 果物の値段リストを作成
$arrayList = [
  'apple'  => 100,
  'banana' => 200,
  'grape'  => 300
];

// fruits配列「2」の'ぶどう'を'イチゴ'に変更
$fruits[2] = 'イチゴ';

// インデックスを指定せずに要素を追加すると
// 末尾に配列が追加される
// fruits配列「3」に'メロン'を追加
$fruits[]  = 'メロン';

// fruits配列「1」を削除
unset($fruits[1]);

// arrayList配列に'lemon' : 400(円)を追加
$arrayList['lemon'] = 400;

//arrayList配列の'apple'を80(円)に変更
$arrayList['apple'] = 80;

// fruits配列をデバック用関数で出力
echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo '<pre>';
print_r($fruits);
echo '</pre>';
// arrayList配列をデバック用関数で出力
echo '<pre>';
print_r($arrayList);
echo '</pre>';
?>