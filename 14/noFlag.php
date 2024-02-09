<?php

// 型の厳格化
declare(strict_types=1);

// クラスファイルの読み込み
require_once(dirname(__FILE__) . '/Validation.php');

// フォーム入力値の初期化
$name  = '';
$kana  = '';
$phone = '';

// エラーメッセージの初期化
$error['name']  = '';
$error['kana']  = '';
$error['phone'] = '';

// インスタンス生成
$v = new Validation();

if (!empty($_POST)) {
  $name = $_POST['name'];
  $kana = $_POST['kana'];
  // 受け取った値にハイフン-がある場合は削除して代入
  $phone = str_replace('-', '', $_POST['phone']);

  // バリデーション判定処理の実行
  $error['name']  = $v->validName($name);
  $error['kana']  = $v->validKana($kana);
  $error['phone'] = $v->validPhone($phone);
}

/**
 * XSS対策の参照省略
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
  <title>ユーザー情報入力</title>
  <meta name="description" content="サイト登録用フォーム">
  <style>
    table {
      border: 1px solid #666;
      border-collapse: collapse;
      width: 450px;
    }

    th {
      border: 1px solid #666;
      background-color: #ddd;
      padding: 4px;
      width: 100px;
    }

    td {
      border: 1px solid #666;
      padding: 4px;
    }

    .error {
      font-weight: bold;
      color: #f00;
      font-size: 11px;
    }
  </style>
</head>

<body>
  <h1>ユーザー情報入力</h1>
  <!-- 入力値が正しい場合の表示 -->
  <?php if (!isset($error['name']) && !isset($error['kana']) && !isset($error['phone'])) : ?>
    <table>
      <tr>
        <th>氏名</th>
        <td><?= h($name) ?></td>
      </tr>
      <tr>
        <th>フリガナ</th>
        <td><?= h($kana) ?></td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td><?= h($phone) ?></td>
      </tr>
    </table>
    <p>入力ありがとうございました。</p>
    <p><a href="noFlag.php">入力ページへ戻る</a></p>
    <!-- 初回訪問時または入力値が正しくない場合の表示 -->
  <?php else : ?>
    <p>下のフォームに記入して「送信」ボタンを押してください</p>
    <form action="" method="post">
      <table>
        <tr>
          <th>氏名</th>
          <td>
            <input type="text" size="15" name="name" value="<?= h($name) ?>">
            <?php if (isset($error['name'])) : ?>
              <span class="error"><?= $error['name'] ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>フリガナ</th>
          <td>
            <input type="text" size="15" name="kana" value="<?= h($kana) ?>">
            <?php if (isset($error['kana'])) : ?>
              <span class="error"><?= $error['kana'] ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>
            <input type="text" size="15" name="phone" value="<?= h($phone) ?>">
            <?php if (isset($error['phone'])) : ?>
              <span class="error"><?= $error['phone'] ?></span>
            <?php endif; ?>
          </td>
        </tr>
      </table>
      <p><input type="submit" value="送信"></p>
    </form>
  <?php endif; ?>
</body>

</html>