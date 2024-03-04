<?php

// 画像の移動先のディレクトリの相対パスをロウデータとして定義
const IMGS_PATH = 'images/';
if (!empty($_FILES)) {
  // tmpまでのアップロードが成功した場合の処理
  if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
    // アップロードされたファイル名の取得と、そこからパスを辿られないようにする対策処理
    $name = basename($_FILES['userfile']['name']);
    // サーバーへアップロードする際のファイル名の文字化け対策処理
    $name = mb_convert_encoding($name, 'cp932', 'utf-8');
    // tmpの絶対パスを取得
    $temp = $_FILES['userfile']['tmp_name'];
    // tmpから目的のディレクトリへのファイルの移動処理
    $result = move_uploaded_file($temp, IMGS_PATH . $name);
    // 移動が成功した場合
    if ($result == true) {
      $message = 'ファイルをアップロードしました';
      // 移動が失敗した場合
    } else {
      $message = 'tmpからimagesへのファイル移動に失敗しました';
    }
    // ファイルが空送信された場合
  } elseif ($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE) {
    $message = 'ファイルのアップロードは空送信です';
  } else {
    $message = 'ファイルのアップロードはシステムエラーです';
  }
}
// 初回訪問でも実行するため
// アップロード処理が終わった後(外側)に記述する。

// images内の全jpg画像のファイルパスを配列で返す
$files = glob('images/*.jpg');

// ファイル名だけを残すための削除対象文字列
$replace = ['images/', '.jpg'];

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>アップロードテスト</title>
  <meta name="description" content="画像ファイルのアップロードテスト">
  <style>
    ul {
      padding: 0;
      list-style-type: none;
      display: grid;
      grid-template-columns:
        repeat(auto-fill, minmax(200px, 1fr));
      gap: 15px;
      grid-auto-rows: 200px;
      grid-auto-flow: dense;
    }

    li {
      border: 1px solid #ccc;
      text-align: center;
    }

    li:nth-of-type(4n+2) {
      grid-column: span 2;
      grid-row: span 2;
    }

    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <h1>アップロードテスト</h1>
  <?php if (isset($message)) : ?>
    <p><?= $message ?></p>
  <?php endif; ?>
  <form action="" method="post" enctype="multipart/form-data">
    <p>ファイル：<input type="file" name="userfile" accept="image/*"></p>
    <p><input type="submit" value="送信"></p>
  </form>
  <h2>画像一覧</h2>
  <!-- もし画像が1件も登録されていなければ -->
  <?php if (count($files) == 0) : ?>
    <p>ファイルをアップロードしてください</p>
  <?php else : ?>
    <ul>
      <!-- 取得した配列(画像数)分だけ繰り替えし(foreachも可) -->
      <?php for ($i = 0; $i < count($files); $i++) : ?>
        <?php
        // ファイル名だけに置換
        $file = str_replace($replace, '', $files[$i]);
        // ブラウザ用に文字コードを変換
        $file = mb_convert_encoding($file, 'utf-8', 'cp932');
        ?>
        <li><img src="<?= IMGS_PATH . $file ?>.jpg" alt="<?= $file ?>"></li>
      <?php endfor; ?>
    </ul>
  <?php endif; ?>
</body>

</html>