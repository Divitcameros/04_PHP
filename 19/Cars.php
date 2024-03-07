<?php

/**
 * インターフェースの定義
 * 運転時のエンジン音を返すメソッド
 * 
 */
interface Engine
{
  public function drive();
}

/**
 * クラスの定義
 */
class Cars implements Engine
{
  // プロパティの定義
  private $maker;
  private $customer;

  /**
   * 乗車する人と車種をプロパティに追加
   *
   * @param string|null $m
   * @param string|null $c
   */
  public function __construct(?string $m = 'BMW', ?string $c = '私')
  {
    $this->maker    = $m;
    $this->customer = $c;
  }

  /**
   * 乗車する人と車種のメッセージを返す
   *
   * @return void
   */
  public function rideOnCar()
  {
    return $this->customer . 'は' . $this->maker . 'の車に乗っています。<br>';
  }

  /**
   * 運転時のエンジン音を返す
   *
   * @return void
   */
  public function drive()
  {
    return 'ブロロロロ～<br>';
  }
}