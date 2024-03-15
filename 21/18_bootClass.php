<?php

/*
「Hello」クラスのインタンスを生成した時点で「こんにちは」と表示されるクラスを定義する。

コンストラスタはインスタンス生成時に自動で実行するメソッド
 */

class Hello
{
  public $hello = 'こんにちは';

  public function __construct()
  {
    echo $this->hello;
  }
}

$h = new Hello();
?>