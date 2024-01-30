<?php

// 型の厳格化
declare(strict_types = 1);

// 抽象クラスとインターフェイスのファイルを読み込み
require_once(dirname(__FILE__) . '/Car.php');
require_once(dirname(__FILE__) . '/Status.php');

/**
 * トラッククラスを定義
 */
class Track extends Car implements Status
{
  private $power = 400;
  private $weight;

  private $color;
  private $tire;

  /**
   * 色とタイヤの数の設定
   *
   * @param string $c   色を文字列で指定
   * @param integer $t  タイヤの数を数値で指定
   */
  public function __construct(string $c, int $t)
  {
    $this->color = $c;
    $this->tire  = $t;
  }

  /**
   * 容量の設定
   *
   * @param integer $w　容量を数値で指定
   * @return void
   */
  public function lift(int $w = 3)
  {
    $this->weight = $w;
  }

  /**
   * トラックの性能を順番なしのリストで表示するメソッド
   *
   * @return void
   */
  public function getList()
  {
    echo '<ul>';
    echo '<li>馬力：' . $this->power . 'kw</li>';
    echo '<li>容量：' . $this->weight . 'トン</li>';
    echo '<li>カラー：' . $this->color . '色</li>';
    echo '<li>タイヤ：' . $this->tire . '個</li>';
    echo '</ul>';
  }
}
