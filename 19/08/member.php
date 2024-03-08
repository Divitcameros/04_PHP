<?php
// 型の厳格化
declare(strict_types=1);

// 連番取得の関数ファイルを読み込み
require_once(dirname(__FILE__) . '/util.inc.php');

// セッション開始
session_start();

// 画像の移動先のディレクトリの相対パスをロウデータとして定義
const UP_PATH = 'uploads/';

// ログイン認証確認
// ログイン認証済みでない場合、ログインページへリダイレクト
if ($_SESSION['authenticated'] != true) {
  header('Location: login.php');
  exit;
}

// セッション変数に保存したユーザ名(ユーザID)を取得
$user = $_SESSION['userId'];

// 横並び数の配列
$arrNum = [3, 4, 5, 6];
// 画像幅の配列
$arrSize = [100, 150, 200];

// 画像幅、横並び数の初期値の設定
$num  = $arrNum[2];
$size = $arrSize[2];

if (!empty($_FILES) || !empty($_POST)) {
  $num  = $_POST['num'];
  $size = $_POST['size'];

  // JSONファイルへ横並びの値と画像幅の値を書き込み
  jsonWrite($num, $size);

  // tmpまでのアップロードが成功した場合の処理
  if ($_FILES['upfile']['error'] == UPLOAD_ERR_OK) {

    // tmpから目的のディレクトリへのファイル移動処理
    if (!move_uploaded_file(
      $_FILES['upfile']['tmp_name'],
      UP_PATH . mb_convert_encoding(basename($_FILES['upfile']['name']), 'cp932', 'utf-8')
    )) {
      $messageError = 'ファイルのアップロードに失敗しました';
    }
  } elseif ($_FILES['upfile']['error'] == UPLOAD_ERR_NO_FILE) {
  } else {
    $messageError = 'ファイルのアップロードに失敗しました';
  }
  // ログインページへリダイレクト
  header('Location: login.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>会員専用</title>
  <meta name="description" content="会員専用ページ">
</head>

<body>
  <div class="wrapper">
    <h1>会員専用ページへようこそ</h1>
    <p>あなたのユーザIDは<?= $user ?>です。</p>
    <p>このページでは会員専用の情報が閲覧できます。</p>
    <form action="" method="post" enctype="multipart/form-data">
      <p>画像幅：
        <select name="size">
          <?php for ($i = 0; $i < count($arrSize); $i++) : ?>
            <option value="<?= $arrSize[$i] ?>" <?= $size == $arrSize[$i] ? 'selected' : '' ?>><?= $arrSize[$i] ?></option>
          <?php endfor; ?>
        </select>
      </p>
      <p>横並びの数：
        <?php for ($i = 0; $i < count($arrNum); $i++) : ?>
          <input type="radio" name="num" value="<?= $arrNum[$i] ?>" <?= $num == $arrNum[$i] ? 'checked' : '' ?>><?= $arrNum[$i] ?>
        <?php endfor; ?>
      </p>
      <p>ファイル：
        <input type="file" name="upfile" accept="image/*">
        <input type="submit" value="送信">
      </p>
      <?php if (isset($messageError)) : ?>
        <p class="error"><?= $messageError ?></p>
      <?php endif; ?>
    </form>
    <p><a href="logout.php">ログアウトする</a></p>
</body>

</html>