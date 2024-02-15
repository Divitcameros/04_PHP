<?php

// 初回訪問時を日本語に設定
$lang = 'ja';

// POST送信時
if (!empty($_POST)) {
  $lang = $_POST['lang'];

  // 再訪問時(クッキー情報が残っている場合)
} elseif (isset($_COOKIE['lang'])) {
  $lang = $_COOKIE['lang'];
}
// クッキー情報の登録(保存期間30日)
setcookie('lang', $lang, time() + 86400 * 30);

// あいさつ文を取得
if ($lang === 'en') {
  $message = 'Welcome!';
} elseif ($lang === 'ja') {
  $message = 'ようこそ!';
} elseif ($lang === 'kr') {
  $message = '오신 것을 환영합니다!';
} elseif ($lang === 'cn') {
  $message = '欢迎光临!';
} elseif ($lang === 'it') {
  $message = 'Benvenuto!';
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title><?= $message ?></title>
  <meta name="description" content="英語、日本語、韓国語、中国語、イタリア語のあいさつを表示します">
</head>

<body>
  <h1><?= $message ?></h1>
  <form action="" method="post">
    <p>
      <select name="lang">
        <option value="en" <?= $lang === 'en' ? 'selected' : '' ?>>英語</option>
        <option value="ja" <?= $lang === 'ja' ? 'selected' : '' ?>>日本語</option>
        <option value="kr" <?= $lang === 'kr' ? 'selected' : '' ?>>韓国語</option>
        <option value="cn" <?= $lang === 'cn' ? 'selected' : '' ?>>中国語</option>
        <option value="it" <?= $lang === 'it' ? 'selected' : '' ?>>イタリア語</option>
      </select>
      <input type="submit" value="送信">
    </p>
  </form>
</body>

</html>