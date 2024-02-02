<?php

// DateTimeインスタンス化
$dBirth = new DateTime('1998-02-28');
$dNow   = new DateTime();

// タイムラインの取得
$tBirth = $dBirth->getTimestamp();
$tNow   = $dNow->getTimestamp();

// 差分比較
$interval = $dBirth->diff($dNow);

echo '現在の年齢は「' . $interval->y . '歳」<br>';
