<?php
//****************************************
//  論理型boolean値の確認
//****************************************
/*
*var_dump() : デバック用の出力関数
*(bool) : キャスト(型変換)演算子 boolean
*/
var_dump((bool) 1); // 整数 true
echo "<br>";
var_dump((bool) -2); // 負の整数 true
echo "<br>";
var_dump((bool) 0); // 値の無い整数 false
echo "<br>";
var_dump((bool) null); // 型や値無し false
echo "<br>";
var_dump((bool) 'foo'); // 文字列 true
echo "<br>";
var_dump((bool) false); // 真偽値 false
echo "<br>";
var_dump((bool) true); // 真偽値 true
echo "<br>";
var_dump((bool) 'false'); // 文字列の真偽値 true
echo "<br>";
var_dump((bool) ''); // 空文字 false
echo "<br>";
var_dump((bool) 0.0); // 値の無い浮動小数点 false
echo "<br>";
var_dump((bool) 0.1); // 浮動小数点 true
echo "<br>";
var_dump((bool) [1]); // 配列内の整数 true
echo "<br>";
// var_dump((bool) undefined); // 未定義 undefinedという値は存在しないのでerror
echo "<br>";
var_dump((bool) []); // 空の配列 false
echo "<br>";
var_dump((bool) '0'); // 文字列型の整数 false
?>