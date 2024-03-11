<?php
/*
条件分岐を使用して50点未満なら「不可」、50点以上65点未満なら「可」、65点以上80点未満なら「良」、80点以上なら「優」というコードを作成する(「」は表示する必要はない)。

また、70点ちょうどの場合は、数字を固定値では出力せず、変数を利用して 「70点」と画面に表示する。
*/

// $score = 49; //不可
// $score = 50; //可
// $score = 65; //良
$score = 70; //70点
// $score = 75; //良
// $score = 80; //優


if ($score < 50) {
  echo '不可';
} elseif ($score < 65) {
  echo '可';
} elseif ($score == 70) {
  echo $score . '点';
} elseif ($score < 80) {
  echo '良';
} else {
  echo '優';
}

?>