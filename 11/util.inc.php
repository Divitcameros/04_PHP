<?php

/**
 * 4桁の年数を受け取り和暦に変換
 *
 * @param string|integer|null $seireki
 * @return string|null
 */
function getWareki(null | string | int $seireki): ?string
{
  
  if (!is_numeric($seireki) || $seireki < 1868) {
    
    $wareki = '未対応';
  
    }elseif ($seireki < 1912 ) {
  
      // 西暦の差分から和暦を計算
      $year   = $seireki - 1867; 

      // 差分が1なら'元'を代入しそれ以外なら計算結果をそのまま代入
      $year  == 1 ? $year = '元' : $year;
      
      $wareki = '明治' . $year . '年';
      
    }elseif ($seireki < 1926) {
      
      $year   = $seireki - 1911;
      
      $year  == 1 ? $year = '元' : $year;
      
      $wareki = '大正' . $year . '年';
      
    }elseif ($seireki < 1989) {
      
      $year   = $seireki - 1925;
      
      $year  == 1 ? $year = '元' : $year;
      
      $wareki = '昭和' . $year . '年';
      
    }elseif ($seireki < 2019) {
      
      $year   = $seireki - 1988;
      
      $year  == 1 ? $year = '元' : $year;
      
      $wareki = '平成' . $year . '年';
      
    }else {
      
      $year   = $seireki - 2018;
      
      $year  == 1 ? $year = '元' : $year;
      
      $wareki = '令和' . $year . '年';
  
    }
  return $wareki;
}

/**
 * XSS対策の参照名省略
 *
 * @param string|null $string
 * @return string|null
 */
function h(?string $string): ?string
{
return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
?>