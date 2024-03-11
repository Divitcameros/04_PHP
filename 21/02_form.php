<?php

// フォームの初期化
$name = '';
if (!empty($_POST)) {
  $name = $_POST['name'];
}

/**
 * XSS対策の表記省略
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
    <title>フォーム</title>
    <meta name="description" content="formの練習">
  </head>
  <body>
    <form action="" method="post">
      <p>
        <input type="text" name="name" size="8" maxlength="8" value="<?=h($name)?>">
        <input type="submit" value="送信">
      </p>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <h2><?=$name?>さん、おはようございます！</h2>
    <?php endif; ?>
  </body>
</html>