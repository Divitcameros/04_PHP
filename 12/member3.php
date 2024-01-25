<?php
// 型の厳格化
declare(strict_types = 1);
// クラスファイルの読み込み
require_once(dirname(__FILE__) . '/Member.php');

// クラスの定義
class Member
{

  // プロパティを外部アクセス不可で定義
  // 名前
  private $name;
  // 年齢
  private $age;
  // 住所
  private $address;
  
  // セッターの定義
  // 名前のセッター
  public function setName($n)
  {
    $this->name = $n;
  }
  // 年齢のセッター
  public function setAge($a)
  {
    $this->age = $a;
  }
  // 住所のセッター
  public function setAddress($ad)
  {
    $this->address = $ad;
  }

  // ゲッターの定義
  // 名前のゲッター
  public function getName()
  {
    return $this->name;
  }
  // 年齢のゲッター
  public function getAge()
  {
    return $this->age;
  }
  // 住所のゲッター
  public function getAddress()
  {
    return $this->address;
  }

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
// $m1 = new Member();
// $m2 = new Member();
$m3 = new Member();

// インスタンスプロパティに値を代入
// $m1->name    = '山田太郎';
// $m1->age     = 21;
// $m1->address = '東京都';

// $m2->name    = '鈴木次郎';
// $m2->age     = 34;
// $m2->address = '大阪府';

// セッターを介してインスタンスプロパティに値を代入
$m3->setName('高橋三郎');
$m3->setAge(32);
$m3->setAddress('神奈川県');

// インスタンスメソッドの実行
// $m1->showInfo();
// $m2->showInfo();
$m3->showInfo();
?>