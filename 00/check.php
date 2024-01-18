<?php
// $none = [0, 1, "", "空", "0", "1", false, true, null];

// $hoge = 'fuga';
// $genius = 'バカ';
// $totalPrice =  1.7 + 5.6 . '円です。';
// $urlTop = 'check.php';
// const ONE_HOUR_SEC = 3600;
// $add = 10;
// $add++;
// $subtract = 10;
// $subtract--;
// $num = 1;
// $b = 'Hello ';
// $b .= 'World!';
// $fruits = [
//   'リンゴ', 
//   'バナナ', 
//   'ぶどう'
// ];
// $fruits[3] = 'メロン'; //要素を追加
// $fruits[]  = 'スイカ';
// unset($fruits[3]);

// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// $fruits[]  = 'キウイ';
// $fruits[3] = 'パパイヤ';

// echo '<pre>';
// print_r($fruits);
// echo '</pre>';

// $fruitsSecond = [
//   'リンゴ', 
//   'バナナ', 
//   'ぶどう'
// ];
// unset($fruitsSecond[2]);

// echo '<pre>';
// print_r($fruitsSecond);
// echo '</pre>';

// $fruitsSecond[] = 'みかん';

// echo '<pre>';
// print_r($fruitsSecond);
// echo '</pre>';

// $profile = [
//   'name'     => '山田太郎',
//   'birthday' => '1990-06-27'
// ];

// echo '<pre>';
// print_r($profile);
// echo '</pre>';

// $profile['address'] = '東京';

// echo '<pre>';
// print_r($profile);
// echo '</pre>';

// $arr      = [10, 20, 5 => 50];
// $arr[3]   = 30;
// $arr[]    = '10';
// $arr[]    = '20';
// $arr[5]   = '30';
// unset($arr[7]);
// $arr['4'] = 10;
// $arr[]    = [...[40]];

// echo '<pre>';
// var_dump($arr);
// echo '</pre>';

// $fruits = [];
// $parts = ['梨', '柿'];
// $fruits = ['リンゴ', 'ぶどう'];

// echo '<pre>';
// print_r($fruits);
// echo '</pre>';
// echo '<pre>';
// print_r($parts);
// echo '</pre>';

// $assort = array_merge($parts, $fruits);

// echo '<pre>';
// print_r($assort);
// echo '</pre>';

// $fruits = ['リンゴ', ...$parts, 'ぶどう'];

// echo '<pre>';
// print_r($fruits);
// echo '</pre>';

// $txtPara = '5 yes 太郎';
// $arrPara = ['5', 'yes', '太郎'];
// $parametor = [
//   [
//     'id'     => '01',
//     'detail' => 'man',
//     'name'   => 'jhon'
//   ],
//   [
//     'id'     => '02',
//     'detail' => 'woman',
//     'name'   => 'anne'
//   ],
//   [
//     'id'     => '03',
//     'detail' => 'man',
//     'name'   => '太郎'
//   ]
// ];

// echo http_build_query($parametor[0]);
// echo '<br>';
// echo http_build_query($parametor[1]);
// echo '<br>';
// echo http_build_query($parametor[2]);
// echo '<br>';
// echo http_build_query(explode(' ', $txtPara));
// echo '<br>';
// echo http_build_query($arrPara);
// echo '<br>';
// echo '<a href="check.php?' . http_build_query(explode(' ', $txtPara), 'a') . '">確認画面へ</a>';
// echo '<a href="check.php?' . http_build_query($parametor[1]) . '">リンク</a>';

// $season = '';
// $message = '';
// $address = '';
// $season = $_POST['season'];

// echo '<pre>';
// var_dump($season);
// echo '</pre>';

// $message = $_POST['message'];

// echo nl2br($message);
$num = '';
if (!empty($_POST)) {
  $num = $_POST['num'];
}
// if (is_numeric($num) === false) {
// 	$error = '数値を入力してください';
// }
if (!is_numeric($num)) {
	$error = '数値を入力してください';
}
$age = 3;
if (6 <= $age && $age <= 18) {
  echo 'あなたは学生です';
}
if (6 <= $age || $age <= 18) {
  echo 'あなたは学生です';
}
for ($i = 1; $i <= 10; $i++) {
	$total = $total + $i;
  echo $total . ' ';
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check</title>
    <style>
      .red {
        background-color : red;
      }
    </style>
  </head>
  <body>
    <!-- <p>私は、<C?=$hoge?>です。</p>
    <C?='<a href="check.php?' . http_build_query($parametor[1]) . '">リンク</a>'?>
    <C?="私は、$geniusです。"?><br>
    <C?="私は、$genius です。"?><br>
    <C?="私は、{$genius}です。"?>
    <p>私は、<C?=$genius?>です。</p>
    <C?='合計金額は' . floor($totalPrice)?>
    <C?='合計金額は' . $totalPrice?><br>
    <C?php print '合計金額は\{$totalPrice\}円です。' ?><br>
    <C?='合計金額は<a href="">こちら</a>から'?><br>
    <a href="<C?=$urlTop?>">トップ</a><br>
    <C?="１時間は{ONE_HOUR_SEC}秒だ"?><br>
    <C?='１時間は' . ONE_HOUR_SEC . '秒だ'?><br>
    <C?=$add?><br>
    <C?=$subtract?><br>
    <C?=++$num?><br>
    <C?=$num++?><br>
    <C?=$num?><br>
    <C?=$b?><br> -->
    <!-- <form action="" method="post">
      <input type="checkbox" name="season[]" value="spring">春
      <input type="checkbox" name="season[]" value="summer">夏
      <input type="checkbox" name="season[]" value="fall">秋
      <input type="checkbox" name="season[]" value="winter">冬
      <textarea name="message" col="40" row="5" placeholder="初期値">編集値</textarea>
      <p><input type="submit" value="送信"></p>
    </form> -->
    <form action="" method="post">
			<p><input type="text" name="num"></p>
			<p><input type="submit" value="送信"></p>
		</form>
		<!-- エラーメッセージの表示 -->
		<?php /*if (isset($error)) {
		echo '<p class="red">' . $error . '</p>';
		}*/ ?>
		<?php if (isset($error) && $_SERVER['REQUEST_METHOD'] === 'POST') {
		echo '<p class="red">' . $error . '</p>';
		} ?>
  </body>
</html>