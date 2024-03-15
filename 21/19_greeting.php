<?php

/*
「Greeting」（挨拶）クラスからインスタンス生成時点で名前「田中太郎」という文字列を受け取りカプセル化で値を保持しておき、それと同時に「こんにちは田中太郎さん(改行)」と表示する。

また「goodBy」というインスタンスメソッドを実行すると「さようなら田中太郎さん(改行)」とプロパティの名前を利用して文字列を返すメソッドを定義し、ワンラインで表示する。PHPDocやTypeHintingは自身で考える。
 */

class Greeting
{
  
  private $name;

  /**
   * インスタンス生成時に文字列を受け取り、
   * あいさつ文を出力するコンストラクタ
   */
  public function __construct(?string $n)
  {
    $this->name = $n;
    echo 'こんにちは' . $this->name . 'さん<br>';
  }
  
  /**
   * 実行すると文字列を返す
   *
   * @return void
   */
  public function goodBy()
  {
    echo 'さようなら' . $this->name . 'さん<br>';
  }
}

// インスタンス生成とメソッド実行をワンラインで記述
$g = (new Greeting('田中太郎'))->goodBy();