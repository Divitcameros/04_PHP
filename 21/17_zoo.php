<?php
/*
フォームに人数を入力し、年齢に応じた動物園の入場料を表示させる。
・titleは「動物園入場料判定」とし、CSSを読み込む。
・フォームの幅とサイズは4文字分としキーはageとする。
・初回訪問時はテーブル1行分の結果を非表示にする。
・Undefinedエラーを表示させない。
・送信後はフォームに値を残す。
・必要な箇所にh関数を使用してサニタイジングを行う。
・空文字や文字列または0歳未満150歳以上の場合は「正しい数値を入力してください」と結果に赤字で表示し、再度数値の入力を促す。赤字で表示するためにspan.errorでラップする。
・0歳以上12歳以下は子供料金の600円、それ以外の年齢は1800円とする。
・正しい数値であれば3桁カンマを付与して「入場料金は1,800円です」と返す「年齢に基づいて入場結果を返す」関数「getPriceResult」を、結果表示側で直接実行する。(必要なPHPDocやTypeHintingを付与)
・0を送信するとh関数内のアーリーリターンに引っ掛かりフォームに値が再表示されなくなる ため、emptyをis_nullに変更する。
・2つの関数定義を「util.inc.php」に外部ファイル化する。
 */

// 型の厳格化
declare(strict_types = 1);

// 外部関数ファイルの読み込み
require_once(dirname(__FILE__) . '/util.inc.php');

$age = '';
$error = '';
if (!empty($_POST)) {
  $age = $_POST['age'];
  if (!is_numeric($age) || $age < 0 || $age >= 150) {
    $error = '正しい数値を入力してください';
  }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>動物園入場料金判定</title>
  <meta name="description" content="formの練習">
</head>

<body>
  <h1>動物園入場料金判定</h1>
  <form action="" method="post">
    <table>
      <tr>
        <th>年齢入力</th>
        <td><input type="text" name="age" size="4" maxlength="4" value="<?= h($age) ?>">歳</td>
        <td><input type="submit" value="変換"></td>
      </tr>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($error)): ?>
        <tr>
          <td colspan="3"><span class="error"><?=$error?></span></td>
        </tr>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
          <tr>
            <td colspan="3"><?=getPriceResult($age)?></td>
          </tr>
      <?php endif; ?>
    </table>
  </form>
</body>

</html>