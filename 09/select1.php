<?php
// 値の初期化
$item = '';
if (!empty($_POST)) {
  $item = $_POST['item'];
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>セレクトボックス</title>
    <meta name="description" content="php selectbox practice">
  </head>
  <body>
    <h1>セレクトボックス</h1>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <p><?=$item?>が選択されました</p>
    <?php endif; ?>
    <form action="" method="post">
      <p>
        <select name="item">
          <option value="リンゴ" <?php if ($item === 'リンゴ') echo 'selected' ?>>リンゴ</option>
          <option value="バナナ" <?php if ($item === 'バナナ') echo 'selected' ?>>バナナ</option>
          <option value="ぶどう" <?php if ($item === 'ぶどう') echo 'selected' ?>>ぶどう</option>
        </select>
      </p>
      <p><input type="submit" value="送信"></p>
    </form>
  </body>
</html>