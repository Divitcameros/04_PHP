<?php

/*
・「Calc」クラスを作成する。
・クラスに数値の配列を引数で受けカプセル化で内部に値を保持する。
・「getTotalNum」というインスタンスメソッドで合計値を返す。
・「getAvgNum」というインスタンスメソッドで平均値を返す。
・「getCountNum」というスタティックメソッドで、引数に直接配列値を受けて要素数を返す。
・各メソッドを使用し以下のように表示する。PHPDocやTypeHintingは自身で考える。

// 23と59と42と30の合計値は154で平均値は38.5で要素数は4です。

また、文章の最初の「23と59と42と30」も配列の要素数が増減しても自動で表示が切り替わるようにする。
 */

$nums = [23, 59, 42, 30];
// $nums = [23, 59];
// $nums = [23, 59, 42, 30, 84, 13, 65];

class Calc
{
  private $nums;

  /**
   * インスタンス生成時に配列を受け取り、
   * プライベートプロパティへ渡すコンストラクタ
   *
   * @param array|null $n
   */
  public function __construct(?array $n)
  {
    $this->nums = $n;
  }

  /**
   * 配列の合計値を整数型で返す
   *
   * @return integer|null
   */
  public function getTotalNum(): ?int
  {
    return array_sum($this->nums);
  }

  /**
   * 配列の平均値を浮動小数点(小数第二位を四捨五入)で返す
   *
   * @return float|null
   */
  public function getAvgNum(): ?float
  {
    return round(array_sum($this->nums) / count($this->nums), 1);
  }

  /**
   * 引数で受け取った配列の要素数を返すスタティックメソッド
   *
   * @param array|null $n
   * @return integer|null
   */
  public static function getCountNum(?array $n): ?int
  {
    return count($n);
  }
}

// インスタンス生成
$c = new Calc($nums);

// 文章の最初の配列の要素を結合
$allNums = $nums[0];
for ($i = 1; $i < count($nums); $i++) {
  $allNums .= 'と'. $nums[$i];
}

echo $allNums . 'の合計値は' . $c->getTotalNum() . 'で平均値は' . $c->getAvgNum() . 'で要素数は' . Calc::getCountNum($nums) . 'です。';