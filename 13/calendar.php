<?php

// 繰り返し処理のエラー回避のための初期値設定
$year  = (new DateTime())->format('Y');
$month = (new DateTime())->format('m');

// フォームから値を取得
if (!empty($_POST)) {
  $year  = $_POST['year'];
  $month = $_POST['month'];
}

// 文字列結合でフォームから取得した値をXXXX-XX-XXの形式にする
$date = $year . '-' . $month . '-01';

// インスタンス生成
$d = new DateTime($date);

// 月初めの曜日を数値で取得(カレンダーの月初め前の空白の数)
$firstWeekNum = $d->format('w');

// パラメータで月末の日付を取得
$lastDayNum = $d->modify('last day of this month')->format('d');

// カレンダーの表示に必要な行数を判定する日数を取得
// 月初めの位置によりカレンダーの行数が変わるので、月の日数に月初めの曜日の数値を足すことで行数を判定する

// 合計が35以上なら6週分である42(7*6週)を代入
if ($firstWeekNum + $lastDayNum > 35) {
  $allDays = 42;

  // 35以下なら5週分である35(7*5週)を代入
} else {
  $allDays = 35;
}

// カレンダーの月初め前の空白を含めて、1か月の日数を配列に追加
// 開始日の初期化
$dayCount = 1;
for ($i = 0; $i < $allDays; $i++) {

  // $iが月初め前のなら空白を代入
  if ($i < $firstWeekNum) {
    $days[] = '';

    // $iが月初め前の数と月の日数の合計以上なら空白を代入
  } elseif ($i >= $firstWeekNum + $lastDayNum) {
    $days[] = '';

    // 1から順に月末までの日付を代入
  } else {
    $days[] = $dayCount;
    $dayCount++;
  }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>カレンダー</title>
  <meta name="description" content="1980年～2030年のカレンダーです。">
  <style>
    table {
      border-collapse: collapse;
      width: 700px;
    }

    tr:nth-of-type(even) {
      background-color: #f6f6f6;
    }

    th,
    td {
      border: 1px solid #999;
      padding: 15px;
      text-align: center;
    }

    th {
      background-color: #eee;
      font-weight: bold;
    }

    td:first-of-type {
      background-color: #fee;
      font-weight: bold;
      color: #900;
    }

    td:nth-of-type(7) {
      background-color: #eef;
      font-weight: bold;
      color: #009;
    }
  </style>
</head>

<body>
  <h1>カレンダー</h1>
  <form action="" method="post">
    <p>
      <select name="year">
        <?php for ($y = 1980; $y < 2031; $y++) : ?>
          <option value="<?= $y ?>" <?= $year == $y ? 'selected' : '' ?>><?= $y ?></option>
        <?php endfor; ?>
      </select>年
      <select name="month">
        <?php for ($m = 1; $m < 13; $m++) : ?>
          <option value="<?= $m ?>" <?= $month == $m ? 'selected' : '' ?>><?= $m ?></option>
        <?php endfor; ?>
      </select>月
      <input type="submit" value="生成">
    </p>
  </form>
  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
    <table>
      <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
      </tr>
      <tr>
        <?php for ($j = 0; $j < $allDays; $j++) : ?>
          <td><?= $days[$j] ?></td>
          <?= $j % 7 == 6 ? '</tr><tr>' : '' ?> <!-- $jを7(1週間の日数)で割った時の余りが6なら改行 -->
        <?php endfor; ?>
      </tr>
    </table>
  <?php endif; ?>
</body>

</html>