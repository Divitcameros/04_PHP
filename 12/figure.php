<?php
// インターフェースを作成
interface figure
{
  // コンストラクタ
  public function __construct(string $n, int $d);

  // 面積
  public function getArea();

  // 周囲長
  public function getSurroundings();
}

// サブクラスの定義
// 正方形
class Rect implements figure
{
  private $name;
  private $diameter;
  public function __construct(string $n, int $d)
  {
    $this->name     = $n;
    $this->diameter = $d;
  }
  public function getArea()
  {
    return $this->name . 'の面積は' . $this->diameter ** 2 . 'です。';
  }
  public function getSurroundings()
  {
    return $this->name . 'の周囲長は' . $this->diameter * 4 . 'です。';
  }
}

// 円
class Circle implements figure
{
  private $name;
  private $diameter;
  public function __construct(string $n, int $d)
  {
    $this->name     = $n;
    $this->diameter = $d;
  }
  public function getArea()
  {
    return $this->name . 'の面積は' . round(($this->diameter / 2) ** 2 * pi(), 2) . 'です。';
  }
  public function getSurroundings()
  {
    return $this->name . 'の円周率は' . round($this->diameter * pi(), 2) . 'です。';
  }
}
// インスタンス生成
$r = new Rect('正方形', 10);
$c = new Circle('円', 10);

echo $r->getArea();
echo $r->getSurroundings();

echo $c->getArea();
echo $c->getSurroundings();

?>