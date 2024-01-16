<?php
// 値の初期化
$score = '';

// 初回訪問時のエラー回避
if (!empty($_POST)) {
  $score = $_POST['score'];
}

// 値の判定処理の関数
// グローバル変数の$scoreとローカル変数の$scoreで名前が同じなのでややこしい
function getScoreResult($score)
{
  if (!is_numeric($score)) {
    $result = '数値を入力してください';
  } elseif ($score < 0 || $score >= 101) {
    $result = '不正な点数です';
  } else {
    if ($score == 100) {
      $result = '満点おめでとう!';
    } elseif ($score >= 80) {
      $result = '素晴らしいです!';
    } elseif ($score >= 60) {
      $result = '合格です';
    }else {
      $result = '不合格です';
    }
  }
  return $result;
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>テスト結果判定</title>
    <meta name="description" content="if() Practice">
  </head>
  <body>
    <h1>テスト結果判定</h1>
    <form action="" method="post">
      <p>点数:
        <input type="text" name="score" size="3" maxlength="3" value="<?=htmlspecialchars($score, ENT_QUOTES | ENT_HTML5, 'UTF-8')?>">点
        <input type="submit" value="判定">
      </p>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>判定:<?=getScoreResult($score)?></p>
      <?php endif; ?>
    </form>
  </body>
</html>
