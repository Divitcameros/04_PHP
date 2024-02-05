<?php

// インスタンス生成
// 2025年2月末日
$d1 = new DateTime('last day of February 2025');

// 現在日時の10日前
$d2 = new DateTime();
$d2->modify('10 days ago');

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
      echo getJpDate($d1) . 'の方が「' . $days . '日分」' . getJpDate($d2) . 'より新しいです。';
    } else {
      echo getJpDate($d2) . 'の方が「' . $days . '日分」' . getJpDate($d1) . 'より新しいです。';
  }
}

/**
 * 曜日を和製表記に変換し、和製年月日を文字列で返す
 *
 * @param object|null $d DateTimeのインスタンスを引数とする
 * @return string        和製年月日を文字列の戻り値とする
 */
function getJpDate(?object $d): string
{
  // 日本の曜日配列に変換
  $weekday = ['日', '月', '火', '水', '木', '金', '土'];
  $w = $weekday[$d->format('w')];

  // 和製年月日を返す
  return $d->format('Y年m月d日') . '(' . $w . ')';
  
}