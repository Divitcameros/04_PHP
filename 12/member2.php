<?php

// クラスの定義
class Member
{

  // インスタンスプロパティの定義
  // 名前
  public $name;
  // 年齢
  public $age;
  // 住所
  public $address;

  // インスタンスメソッドの定義
  public function showInfo()
  {
    // $thisで自身のインスタンスプロパティを参照
    echo '<ul>';
    echo '<li>名前：' . $this->name . '</li>';
    echo '<li>年齢：' . $this->age . '</li>';
    echo '<li>住所：' . $this->address . '</li>';
    echo '</ul>';
  }
}

// インスタンスを生成
$m1 = new Member();
$m2 = new Member();

// インスタンスプロパティに値を代入
$m1->name    = '山田太郎';
$m1->age     = 21;
$m1->address = '東京都';

$m2->name    = '鈴木次郎';
$m2->age     = 34;
$m2->address = '大阪府';

// インスタンスメソッドの実行
$m1->showInfo();
$m2->showInfo();

?>