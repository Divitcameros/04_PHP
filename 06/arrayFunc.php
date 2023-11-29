<?php
$domain = 'http://example.com?';
$text = 'PHP　MySQL　Laravel';

// 文字列を配列に変換する関数
// 全角空白'　'を基準に$textの文字列を配列に変換
// explode('　', $text);

// ()内の配列をパラメーターに変換する関数
// ()内に$textの文字列を配列に変換する関数を入れてパラメーターに変換
// http_build_query(explode('　', $text));

// 文字列を結合して出力
echo $domain . http_build_query(explode('　', $text));
?>