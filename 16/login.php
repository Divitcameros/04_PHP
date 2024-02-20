<?php

// セッション開始
session_start();

// セッション変数を持っており、かつ承認済みであれば
if (!empty($_SESSION) && $_SESSION['authenticated'] == true) {
  header('Location: member.php'); // 会員ページに移動
  exit;
}

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
  <style>
    .error {
      color: #f00;
    }
  </style>
</head>

<body>
  <h1>ログイン</h1>
  <?php if (!empty($loginError)) : ?>
    <p class="error"><?= $loginError ?></p>
  <?php endif; ?>
  <p>ユーザIDとパスワードを入力して「ログイン」ボタンを押してください</p>
  <form action="" method="post">
    <table>
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
</body>

</html>