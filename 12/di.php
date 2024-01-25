<?php
// グローバル変数
$t = 29; // 気温 T
$h = 70; // 湿度 H

// クラスの定義
class Di
{
  // 外部アクセス不可のプロパティの定義
  // 温度 T
  private $t;
  // 湿度 H
  private $h;

  /**
   * セッターとして初期値を追加
   *
   * @param integer|null $t
   * @param integer|null $h
   */
  public function __construct(?int $t, ?int $h)
  {
    $this->t = $t;
    $this->h = $h;
  }

  /**
   * 温度と湿度を元に不快指数の数値を返す
   *
   * @return float|null
   */
  public function getDiScore(): ?float
  {
    $di = 0.81 * $this->t + 0.01 * $this->h * (0.99 * $this->t - 14.3) + 46.3;
    return $di;
  }

  /**
   * 不快指数の演算結果を元に体感を文字列で返す
   *
   * @return string|null
   */
  public function getDiResult(): ?string
  {
    // 不快指数の判定結果を返す条件分岐
    // $this->getDiScore()で不快指数の演算結果を取得
    if ($this->getDiScore() < 55) {
      return '「寒い」';
    }elseif ($this->getDiScore() < 60) {
      return '「肌寒い」';
    }elseif ($this->getDiScore() < 65) {
      return '「何も感じない」';
    }elseif ($this->getDiScore() < 70) {
      return '「快い」';
    }elseif ($this->getDiScore() < 75) {
      return '「暑くない」';
    }elseif ($this->getDiScore() < 80) {
      return '「やや暑い」';
    }elseif ($this->getDiScore() < 85) {
      return '「暑くて汗が出る」';
    }else{
      return '「暑くてたまらない」';
    }
  }
}

// グローバル変数を引数に代入してインスタンスを生成
$di = new Di($t, $h);

?>
<html>
  <p>気温<?=$t?>℃、湿度<?=$h?>％の時の不快指数は<?=$di->getDiScore()?>で<?=$di->getDiResult()?> です。</p>
</html>