<?php

// 初期化
$name = '';
$kana = '';
$phone = '';
$isValidated = false;
if (!empty($_POST)) {
  $name = $_POST['name'];
  $kana = $_POST['kana'];
  $phone = $_POST['phone'];
  $isValidated = true;

  // 正規表現のバリデーション判定
  // POST送信時の氏名の空判定
  if ($name == '' || preg_match('/^(\s|　)+$/u', $name)) {
      $nameError = '氏名を入力してください';
      $isValidated = false;
  }
  // POST送信時のフリガナの空判定
  if ($kana == '' || preg_match('/^(\s|　)+$/u', $kana)) {
      $kanaError = 'フリガナを入力してください';
      $isValidated = false;
      
      // フリガナのパターン判定
      // 全角カタカナと全角長音記号（ー）以外の文字が含まれている場合はエラーメッセージ表示
  } elseif (!preg_match('/^([ア-ヶー])+$/u', $kana)) {
      $kanaError = 'フリガナの形式が正しくありません';
      $isValidated = false;  
  }
  // POST送信時の電話番号の空判定
  if ($phone == '' || preg_match('/^(\s|　)+$/u', $phone)) {
      $phoneError = '電話番号を入力してください';
      $isValidated = false;
  }
}


/**
 * XSS対策の省略
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
  <p>下のフォームに記入して「送信」ボタンを押してください</p>
  <form action="" method="post">
    <table>
      <tr>
        <th>氏名</th>
        <td>
          <input type="text" size="15" name="name" value="<?= h($name) ?>">
          <?php if (isset($nameError)) : ?>
            <span class="error"><?= $nameError ?></span>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <th>フリガナ</th>
        <td>
          <input type="text" size="15" name="kana" value="<?= h($kana) ?>">
          <?php if (isset($kanaError)) : ?>
            <span class="error"><?= $kanaError ?></span>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td>
          <input type="text" size="15" name="phone" value="<?= h($phone) ?>">
          <?php if (isset($phoneError)) : ?>
            <span class="error"><?= $phoneError ?></span>
          <?php endif; ?>
        </td>
      </tr>
    </table>
    <p><input type="submit" value="送信"></p>
  </form>
</body>

</html>