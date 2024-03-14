<?php

/**
 * 年齢を引数に指定すると、年齢に基づいた料金を返す
 *
 * @param integer|null $a
 * @return string|null
 */
function getPriceResult(?string $a): ?string
{
  if ($a >= 0 && $a <= 12) {
    return '入場料金は600円です。';
  } else {
    return '入場料金は1,800円です。';
  }
}

/**
 * XSS対策の省略表記
 *
 * @param [type] $string
 * @return void
 */
function h($string)
{
  return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}