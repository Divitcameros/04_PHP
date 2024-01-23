<?php

// クラスの定義
class Member
{

  // スタティックプロパティの定義
  // 名前
  public static $name    = '山田太郎';
  // 年齢
  public static $age     = 21;
  // 住所
  public static $address = '東京都';

  // スタティックメソッドの定義
  public static function showInfo()
  {
    // self::で自身のスタティックプロパティを参照
    echo '<ul>';
    echo '<li>名前：' . self::$name . '</li>';
    echo '<li>年齢：' . self::$age . '</li>';
    echo '<li>住所：' . self::$address . '</li>';
    echo '</ul>';
  }
}

// スタティックメソッドを実行
Member::showInfo();

// スタティックプロパティに値を代入
Member::$name    = '鈴木次郎';
Member::$age     = 34;
Member::$address = '大阪府';

// スタティックメソッドを再実行
Member::showInfo();

?>