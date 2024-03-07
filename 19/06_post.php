<?php

// 初期化
$name = '';
$age  = '';
$mail = '';
// POST送信時のみフォームの値を代入
if (!empty($_POST)) {
  $name = $_POST['name'];
  $age  = $_POST['age'];
  $mail = $_POST['mail'];
}

/**
 * XSS対策の省略表現
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
    <meta name="description" content="入力フォームのページ">
  </head>
  <body>
    <h1>フォーム</h1>
    <form action="" method="post">
      <p>名前：<input type="text" name="name" value="<?=h($name)?>" size="10"></p>
      <p>年齢：<input type="text" name="age" value="<?=h($age)?>" size="3" maxlength="3"></p>
      <p>メール：<input type="email" name="mail" value="<?=h($mail)?>"></p>
      <p><input type="submit" value="送信"></p>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <table>
        <tr>
          <th>名前</th>
          <th>年齢</th>
          <th>メール</th>
        </tr>
        <tr>
          <td><?=$name?></td>
          <td><?=$age?></td>
          <td><?=$mail?></td>
        </tr>
      </table>
    <?php endif; ?>
  </body>
</html>