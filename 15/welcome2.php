<?php

// 言語データの二次元配列
$totalLang = [
  [
    'language' => '英語',
    'nation'   => 'en',
    'greeting' => 'Welcome!'
  ],
  [
    'language' => '日本語',
    'nation'   => 'jp',
    'greeting' => 'ようこそ!'
  ],
  [
    'language' => '韓国語',
    'nation'   => 'kr',
    'greeting' => '오신 것을 환영합니다!'
  ],
  [
    'language' => '中国語',
    'nation'   => 'cn',
    'greeting' => '欢迎光临!'
  ],
  [
    'language' => 'イタリア語',
    'nation'   => 'it',
    'greeting' => 'Benvenuto!'
  ],
  [
    'language' => 'スペイン語',
    'nation'   => 'es',
    'greeting' => 'Hola!'
  ],
  [
    'language' => 'ロシア語',
    'nation'   => 'ru',
    'greeting' => 'Привет!'
  ]
];
// 初回訪問時を日本語に設定
$lang = $totalLang[1]['nation'];

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
for ($g = 0; $g < count($totalLang); $g++) {
  if ($lang === $totalLang[$g]['nation']) {
    $message = $totalLang[$g]['greeting'];
  }
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
        <?php for ($l = 0; $l < count($totalLang); $l++) : ?>
          <option value="<?= $totalLang[$l]['nation'] ?>" <?= $lang === $totalLang[$l]['nation'] ? 'selected' : '' ?>><?= $totalLang[$l]['language'] ?></option>
        <?php endfor; ?>
      </select>
      <input type="submit" value="送信">
    </p>
  </form>
</body>

</html>