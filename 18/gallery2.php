<?php

// 型の厳格化
declare(strict_types=1);

// 連番取得の関数ファイルを読み込み
require_once(dirname(__FILE__) . '/util.inc.php');

// 画像の移動先のディレクトリの相対パスをロウデータとして定義
const UP_PATH = 'uploads/';
// 連番ファイルの初期化
/* ここで毎回0にしないとファイル送信のタイミングで連番の値が加算され続けてしまう
ので応急処置としての対応 */
file_put_contents('num.dat', 0);

// 画像幅の配列
$arrSize = [100, 150, 200];

// 横並び数の配列
$arrNum = [3, 4, 5, 6];

// 初期値
$size = $arrSize[2];
$num  = $arrNum[2];

if (!empty($_FILES) || !empty($_POST)) {
  $size = $_POST['size'];
  $num  = $_POST['num'];

  // 全体幅の調整値
  $glWidth = $size * $num;

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
}

// uploads内の全png画像のファイルパスを配列で返す
$files = glob(UP_PATH . '*.png');

// ファイル名だけを残すための削除対象文字列(ディレクトリと拡張子)の指定
$replace = [UP_PATH, '.png'];

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>画像ギャラリー</title>
  <meta name="description" content="画像アップロードのフォームと画像表示ページ">
  <style>
    .wrapper {
      max-width: 1000px;
      margin: auto;
    }

    table {
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 5px;
      text-align: center;
    }

    th {
      background-color: #eee;
    }

    img {
      display: block;
      padding: 3px;
      border: 1px solid #aaa;
      box-shadow: 0 0 8px #ccc;
    }

    img:hover {
      box-shadow: 0 0 8px #ccc, 0 0 12px #669;
    }

    span {
      font-size: 12px;
      font-weight: bold;
    }

    span::after {
      content: " ]";
    }

    span::before {
      content: "[ ";
    }

    .error {
      color: #990000;
    }
  </style>
</head>

<body>
  <div class="wrapper" style="max-width: <?= $glWidth ?>px;">
    <h1>画像ギャラリー</h1>
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
    <table>
      <tr>
        <th colspan="<?= $num ?>">画像一覧</th>
      </tr>
      <?php if (count($files) == 0) : ?>
        <tr>
          <td colspan="<?= $mum ?>">アップロードされたファイルはありません。</td>
        </tr>
      <?php else : ?>
        <tr>
          <?php for ($i = 0; $i < count($files); $i++) : ?>
            <?php
            // 画像ファイルのファイル名のみを取得
            $file = str_replace($replace, '', $files[$i]);
            // ファイル名をブラウザ表示用の文字コードに変換
            $file = mb_convert_encoding($file, 'utf-8', 'cp932');
            $file_name = serialNum($file);
            ?>
            <td><img src="<?= UP_PATH . $file ?>.png" alt="<?= $file ?>" width="<?= $size ?>"><span><?= $file_name ?></span></td>
            <!-- 5つ目の画像(余りが4)のときだけ改行 -->
            <?= $i % $num == $num - 1 ? '</tr><tr>' : '' ?>
          <?php endfor; ?>
        </tr>
      <?php endif; ?>
    </table>
  </div>
</body>

</html>