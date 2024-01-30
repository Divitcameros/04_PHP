<?php

// 抽象クラスの定義

/**
 * 色とタイヤの数の初期値を設定するコンストラクタを定義する
 * 
 * 走る処理(Run)と戻る処理(Back)の実装
 */
abstract class Car
{

  abstract public function __construct(string $c, int $t);

  public function Run()
  {
    return 'run';
  }

  public function Back()
  {
    return 'back';
  }
}
