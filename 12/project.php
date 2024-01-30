<?php

// 型の厳格化
declare(strict_types = 1);

// スポーツカークラス、トラッククラスの読み込み
require_once(dirname(__FILE__) . '/SportsCar.php');
require_once(dirname(__FILE__) . '/Track.php');

// スポーツカーのインスタンス生成
$s = new SportsCar('赤', 4);
$s->accel();
$s->getList();

// トラックのインスタンス生成
$t = new Track('青', 6);
$t->lift();
$t->getList();

