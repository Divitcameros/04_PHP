<?php

echo h('<script>alert("危険")</script>');

/**
 * XSS対策のサニタイジングと参照名省略
 * 
 * サニタイジングの関数htmlspecialchars()を短縮してh()として呼び出す
 * 
 * @param string|null $str フォームのから受け取った値を引数とする
 * @return string|null     受け取った値をサニタイジングして返す
 */
function h(?string $str): ?string
{

    // アーリーリターンを実装
    if (empty($str)) return null;

    // htmlspecialcharsを返す
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, 'UTF-8'); 
}
?>