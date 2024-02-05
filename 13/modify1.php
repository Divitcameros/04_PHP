<?php
// 日本の曜日配列
$weekday = ['日', '月', '火', '水', '木', '金', '土'];

// インスタンス生成
// 2025年2月末日
$d1 = new DateTime('last day of February 2025');
// $d1の曜日取得
$w1 = $weekday[$d1->format('w')];

// 現在日時の10日前
$d2 = new DateTime('10 days ago');
// $d2の曜日取得
$w2 = $weekday[$d2->format('w')];

// 差分比較
$interval = $d1->diff($d2);

// 新旧判定結果取得
$invert = $interval->invert;

// 差分日数取得
$days = $interval->days;

if ($days == 0) {
    echo '同じ日付です。';
} else {
  if ($invert == 1) {
      echo $d1->format('Y年m月d日') . '(' . $w1 . ')の方が「' . $days . '日分」' . $d2->format('Y年m月d日') . '(' . $w2 . ')より新しいです。';
  } else {
    echo $d2->format('Y年m月d日') . '(' . $w2 . ')の方が「' . $days . '日分」' . $d1->format('Y年m月d日') . '(' . $w1 . ')より新しいです。';
  }
}

