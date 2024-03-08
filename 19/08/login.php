<?php
// 型の厳格化
declare(strict_types = 1);
// 連番取得の関数ファイルを読み込み
require_once(dirname(__FILE__) . '/util.inc.php');
// 画像の移動先のディレクトリの相対パスをロウデータとして定義
const UP_PATH = 'uploads/';
// 連番ファイルの初期化
/* ここで毎回0にしないとファイル送信のタイミングで連番の値が加算され続けてしまう
ので応急処置としての対応 */
file_put_contents('num.dat', 0);

// セッション開始
session_start();

// jsonファイルの読み込み
$arr = jsonRead();
// 画像幅、横並び数の取得
$num  = $arr['num'];
$size = $arr['size'];
// 画像一覧の幅の設定
$glWidth = $num * $size;

// フォームの初期化
$user = '';
$pass = '';
$error = '';
if (!empty($_POST)) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  // ユーザID「taro」、パスワード「abcd」の場合ログイン成功とし、ログイン認証済みであるという情報を「authenticated」と、フォームで取得したユーザIDを「userId」というキーで、それぞれをセッション変数に保存し、会員専用ページへリダイレクトする。
  if ($user === 'taro' && $pass === 'abcd') {
    $_SESSION['authenticated'] = true;
    $_SESSION['userId'] = $user;
    header('Location: member.php');
    exit;
  } else {
    $loginError = 'ユーザIDかパスワードが正しくありません';
  }
}

// uploads内の全png画像のファイルパスを配列で返す
$files = glob(UP_PATH . '*.png');

// ファイル名だけを残すための削除対象文字列(ディレクトリと拡張子)の指定
$replace = [UP_PATH, '.png'];

/**
 * XSS対策の省略表記
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
  <title>ログイン</title>
  <meta name="description" content="ログインページ">

</head>

<body>
  <div class="wrapper">
    <h1>ログイン</h1>
    <?php if (!empty($loginError)) : ?>
      <p class="error"><?= $loginError ?></p>
    <?php endif; ?>
    <p>ユーザIDとパスワードを入力して「ログイン」ボタンを押してください</p>
    <form action="" method="post">
      <table style="width: 100%;">
        <tr>
          <th>ユーザID</th>
          <td><input type="text" name="user" value="<?= h($user) ?>"></td>
        </tr>
        <tr>
          <th>パスワード</th>
          <td><input type="text" name="pass" value="<?= h($pass) ?>"></td>
        </tr>
      </table>
      <p><input type="submit" value="ログイン"></p>
    </form>
  </div>
  <div class="wrapper" style="max-width: <?= $glWidth ?>px;">
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
            <!-- numつ目の画像(余りがnum-1)のときだけ改行 -->
            <?= $i % $num == $num - 1 ? '</tr><tr>' : '' ?>
          <?php endfor; ?>
        </tr>
      <?php endif; ?>
    </table>
    <p><a href="member.php">会員専用ページへ移動</a></p>
  </div>
</body>

</html>