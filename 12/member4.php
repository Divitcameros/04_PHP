<?php

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
  
  // コンストラクタの定義
/**
 * 初期値の追加
 *
 * @param string|null $name
 * @param integer|null $age
 * @param string|null $address
 */
  public function __construct(?string $name,?int $age,?string $address)
  {
    $this->name    = $name;
    $this->age     = $age;
    $this->address = $address;
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

// ワンラインでインスタンスを生成(変数に代入せずメソッドを直接実行)
(new Member('高橋三郎', 32, '神奈川県'))->showInfo();

?>