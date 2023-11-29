<?php
// 文字列を定義
$alph = 'A-B-C';

// 文字列を配列に変換(変数に関数を代入する)
$alphArray = explode('-', $alph);

// デバック出力(配列はechoで出力できない)
// echo '<pre>';
// print_r($alphArray);
// echo '</pre>';

// 配列の最後に要素'D'を追加
array_push($alphArray, 'D');

// デバック出力(配列)
// echo '<pre>';
// print_r($alphArray);
// echo '</pre>';
// デバック出力(要素数)
// echo count($alphArray);

// 配列の最後に要素数'4'を追加
array_push($alphArray, count($alphArray));

// デバック出力(配列)
// echo '<pre>';
// print_r($alphArray);
// echo '</pre>';

// 配列を文字列に変換して' | 'で区切る(変数の上書き)
$alphArray = implode(' | ', $alphArray);

// 文字列の出力
echo $alphArray . '個'
?>