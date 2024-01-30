<?php

// 型の厳格化
declare(strict_types = 1);

// 抽象クラスとインターフェイスのファイルを読み込み
require_once(dirname(__FILE__) . '/Car.php');
require_once(dirname(__FILE__) . '/Status.php');

/**
 * スポーツカークラスの定義
 */
class SportsCar extends Car implements Status
{
  private $bland = 'ポルシェ';
  private $speed;

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
   * スピードの設定
   *
   * @param integer $a  スピードを数値で指定
   * @return void
   */
  public function accel(int $a = 300)
  {
    $this->speed = $a;
  }

  /**
   * スポーツカーの性能を順番なしのリストで表示するメソッド
   *
   * @return void
   */  
  public function getList()
  {
    echo '<ul>';
    echo '<li>ブランド：' . $this->bland . '</li>';
    echo '<li>スピード：' . $this->speed . 'km</li>';
    echo '<li>カラー：' . $this->color . '色</li>';
    echo '<li>タイヤ：' . $this->tire . '個</li>';
    echo '</ul>';
  }
}
