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

function callNum()
{
  return '080-XXXX-XXXX';
}
echo callNum() . '<br>';
$phone = callNum();
echo $phone . '<br>';

function profile($name = '太郎', $age = 20, $gender = '男')
{
  return 'こんにちは、' . $name . 'さん!
          年齢は' . $age . '歳で' . $gender . '性ですね<br>';
}
echo profile(gender: '女', name: 'Jane', age: 24,); // 順番を気にせず引数を指定

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


function isLeapYear($year) {
  if (empty($year)) return null;
  return $year % 400 === 0 ? '閏年です' : 
	($year % 100 === 0 ? '閏年ではありません' : 
	($year % 4   === 0 ? '閏年です' : 
	'閏年ではありません'));
}
echo isLeapYear(10);


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
hasUserId
?>


<html lang="ja">
  <head>
  </head>
  <body>
    
  </body>
</html>