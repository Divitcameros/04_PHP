<?php

// クラスの定義
class Member
{

  // インスタンスプロパティの定義
  public $name;

  // インスタンスメソッドの定義
  public function showInfo($n1, $n2, $n3)
  {
    echo '<ul>';
    echo '<li>' . $n1 . '</li>';
    echo '<li>' . $n2 . '</li>';
    echo '<li>' . $n3 . '</li>';
    echo '</ul>';
  }
}

// インスタンスを生成
$m = new Member();

// インスタンスプロパティに値を代入
$m->name = '田中太郎';

// インスタンスプロパティの出力
echo $m->name;

// インスタンスメソッドの実行
$m->showInfo('田中','鈴木','高橋');

?>