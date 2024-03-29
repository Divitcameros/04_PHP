<?php

/*
身長と体重から肥満度を示すBMI値の計算式は「体重(kg) ÷ 身長(m)の2乗」で適正(proper)体重は「身長(m)の2乗×22」となる。

それぞれ身長(height)が「175cm」、体重(weight)「70kg」として定数で定義し、演算結果を小数点第二位以降を四捨五入し、以下の表示結果になるように出力する。

適正体重の結果の符号プラスマイナス(+/-)の表示は、三項演算子の条件によって切り替える。ただし、負の値のときはマイナス記号が自動で表示されるため、三項演算子から表示させる必要はない。

// 身長は175cmで体重は70kgのときのBMI値は22.86で、<br>
// 適正体重は＋2.63kgです。
 */

// 身長、体重
const HEIGHT = 175;
const WEIGHT = 70;

// BMI値を計算し、小数点第二位以降を四捨五入して代入
$bmi = round(WEIGHT / (HEIGHT * 0.01)** 2, 2);

// 適正体重を計算し、現在の体重との差分を小数点第二位以降を四捨五入して代入
$proper = round((HEIGHT * 0.01)** 2 * 22 - WEIGHT, 2);

$plus = $proper > 0 ? '+' : '';

echo '身長は' . HEIGHT . 'cmで体重は' . WEIGHT . 'のときのBMI値は' . $bmi . 'で、<br>適正体重は' . $plus . $proper . 'kgです。';
?>