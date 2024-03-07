<?php

// 型の厳格化
declare(strict_types = 1);

// クラスファイルの読み込み
require_once(dirname(__FILE__) . '/Cars.php');

// インスタンス生成
$c1 = new Cars('Toyota', '彼');
$c2 = new Cars();

// メソッドの呼び出し
echo $c1->rideOnCar();
echo $c2->rideOnCar();
echo $c2->drive();

?>