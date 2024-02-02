<?php
$arr = [1, 50, -2, 21.3, -30.2, 43.4, -24.4, 31.3, 5.9];
$max = max($arr);
$min = min($arr);
$sum = array_sum($arr);
$avg = $sum / count($arr);
echo '<pre>';
print_r($arr);
echo '</pre>';
echo '最大値：' . $max . '<br>最小値：' . $min . '<br>合計：' . $sum . '<br>平均値：' . $avg . '<br>';

echo '<br>';

$price = 2980 * 1.08;
$ceil  = number_format(ceil($price));
$floor = number_format(floor($price));
$round = number_format(round($price));
echo '価格：' . $price . '円<br>切り上げ価格：' . $ceil . '円<br>切り下げ価格：' . $floor . '円<br>四捨五入の価格：' . $round . '円<br>';
echo '<br>';
echo number_format(1.234567, 2);
echo '<br>';
echo round(1.234567, 5);

echo '<br>';

// ランダム関数
$colors = ['赤', '青', '緑', '黄色', '紫', '黒'];
$index  = mt_rand(0, count($colors) - 1);
echo '今日のラッキーカラーは' . $colors[$index] . 'です！<br>';

// $aaa = 10;
// if ($aaa == 10) {
//    // if内では上で呼び出せない
//   function fx($aaa)
//   {
//     echo $aaa.'<br>';
//   }
//   fx($aaa);
// }

// ユーザー定義関数
function callNum()
{
  return '080-XXXX-XXXX';
}
echo callNum() . '<br>';
$phone = callNum();
echo $phone . '<br>';

// 引数の初期値
function profile($name = '太郎', $age = 20, $gender = '男')
{
  return 'こんにちは、' . $name . 'さん!
          年齢は' . $age . '歳で' . $gender . '性ですね<br>';
}
echo profile(gender: '女', name: 'Jane', age: 24,); // 順番を気にせず引数を指定

// 関数と配列
$users = [
  'name'   => '太郎',
  'age'    => 24,
  'gender' => '男'
];
function fx($users)
{
  return 'こんにちは、' . $users['name'] . 'さん!
          年齢は' . $users['age'] . '歳で' . $users['gender'] . '性ですね<br>';
}
echo fx($users);

// アーリーリターン
function isLeapYear($year) {
  if (empty($year)) return null;
  return $year % 400 === 0 ? '閏年です'. '<br>' : 
	($year % 100 === 0 ? '閏年ではありません' . '<br>': 
	($year % 4   === 0 ? '閏年です' . '<br>': 
	'閏年ではありません'. '<br>'));
}
echo isLeapYear(10);


// Doccomment
/**
 * Undocumented function
 *
 * @param integer $user_id
 * @return boolean
 */
function hasUserId(int $user_id): bool
{
  /* 判定処理 */
  return true;
}


//****************************************
//  タイムスタンプ
//****************************************
// 関数
echo time() . '<br>';

// クラス
$d = new DateTime();
echo $d->getTimestamp(). '<br>';


//****************************************
//  タイムスタンプ比較
//****************************************
$d1 = new DateTime('2024-03-03');
$d2 = new DateTime('2024-02-27');

$ts1 = $d1->getTimestamp();
$ts2 = $d2->getTimestamp();

// 比較
if ($ts1 > $ts2) {
    echo $d1->format('Y-m-d') . 'の方が新しいです。' . '<br>';
} elseif ($ts1 < $ts2) {
    echo $d2->format('Y-m-d') . 'の方が新しいです。' . '<br>';
} else {
    echo '同じ日付です'. '<br>';
}

//****************************************
//  日数の差分比較
//****************************************
// 差分
$interval = $d1->diff($d2);

// 新旧判定の数値を取得(1なら新0なら旧)
$invert = $interval->invert;

// 日数の差分を取得
$days = $interval->days;

// 比較
if ($days == 0) {
    echo '日付は同じです。'. '<br>';
} else {
  if ($invert == 1) {
      echo 'd1のほうが「' . $days . '日」新しいです'. '<br>';
    } else {
      echo 'd2のほうが「' . $days . '日」新しいです'. '<br>';
  }
}