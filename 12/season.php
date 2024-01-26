<?php
// 型の厳格化
declare(strict_types = 1);

// クラスファイルの読み込み
require_once(dirname(__FILE__) . '/Chart.php');

// グローバル変数
$spring = '';
$summer = '';
$fall = '';
$winter = '';
if (!empty($_POST)) {
  $spring = $_POST['spring'];
  $summer = $_POST['summer'];
  $fall   = $_POST['fall'];
  $winter = $_POST['winter'];
}

// グラフのデータ配列
$data = [$spring, $summer, $fall, $winter];

// グラフのX軸ラベル
$label = ['春', '夏', '秋', '冬'];

// インスタンス生成
$c = new Chart();

// グラフのタイトルを設定
$c->setTitle('好きな季節 アンケート結果');

// グラフの値を設定
$c->addData($data, 'season');

// グラフのX軸ラベルを設定
$c->setXLabel($label);

// グラフのX軸ジャンル名を設定
$c->setXAxisName('季節');

// グラフのY軸ジャンル名を設定
$c->setYAxisName('(人)');

// グラフのサイズ設定
$c->setSize(300, 200);

/**
 * XSS対策の設定
 *
 * @param [type] $string
 * @return void
 */
function h($string)
{
return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>集計結果入力</title>
  <meta name="description" content="アンケート調査結果">
</head>

<body>
  <h1>集計結果入力</h1>
  <form action="" method="post">
    <table>
      <tr>
        <td>春</td>
        <td><input type="text" name="spring" size="4" maxlength="4" value="<?=h($spring)?>"></td>
        <td>人</td>
      </tr>
      <tr>
        <td>夏</td>
        <td><input type="text" name="summer" size="4" maxlength="4" value="<?=h($summer)?>"></td>
        <td>人</td>
      </tr>
      <tr>
        <td>秋</td>
        <td><input type="text" name="fall" size="4" maxlength="4" value="<?=h($fall)?>"></td>
        <td>人</td>
      </tr>
      <tr>
        <td>冬</td>
        <td><input type="text" name="winter" size="4" maxlength="4" value="<?=h($winter)?>"></td>
        <td>人</td>
      </tr>
    </table>
    <p><input type="submit" value="グラフ生成"></p>
  </form>
  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <!-- 棒グラフの出力 -->
    <?php $c->printBarChart(); ?>
  <?php endif; ?>
</body>

</html>