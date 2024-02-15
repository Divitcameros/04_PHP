<?php

// クラスファイルの定義
class ConvertLang
{
  private $totalLang;

  /**
   * セッターとしてプロパティ$totalLangに配列を保持する
   *
   * @param array $totalLang
   */
  public function __construct(array $totalLang)
  {
    $this->totalLang = $totalLang;
  }


  /**
   * 2文字の言語記号(ja)によって各国の挨拶に変換
   *
   * @param string|null $lang
   * @return string|null
   */
  public function getConvertLang(?string $lang): ?string
  {
    for ($g = 0; $g < count($this->totalLang); $g++) {
      if ($lang === $this->totalLang[$g]['nation']) {
        return $this->totalLang[$g]['greeting'];
      }
    }
  }
}