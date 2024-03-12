<?php

/*
以下のように数値や■の後に半角空白を空けて表示し、7個目で改行されるようにする。仮に100まで出力しても同じ法則(■の条件に注目)で出力されるようにする。

1 ■ ■ ■ 5 ■ 7 
■ ■ ■ 11 ■ 13 ■
■ ■ 17 ■ 19 ■ ■
 */

// 1~100までの繰り返し処理
for ($i = 1; $i < 101; $i++) {
  if ($i % 2 == 0 || $i % 3 == 0 || $i % 4 == 0) { // 2, 3, 4で割り切れる場合、■を出力
    echo '■ ';
  } else { // それ以外の場合、数値を出力
    echo $i . ' ';
  }
  // 改行を三項演算子で指定
  echo $i % 7 == 0 ? '<br>' : ''; // 7で割り切れる場合改行
}