<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>FormPost</title>
    <meta name="description" content="$_POST Practice HTMLForm">
  </head>
  <body>
    <form action="input02.php" method="post" novalidate>
      <input type="hidden" name="id" value="1234">
      <p>ユーザ名:
        <input type="text" name="user">
      </p>
      <p>パスワード:
        <input type="password" name="pass">
      </p>
      <p>性別:
        <input type="radio" name="gender" value="男性" checked>男性</input>
        <input type="radio" name="gender" value="女性">女性</input>
      </p>
      <p><input type="submit" value="送信"></p>
    </form>
  </body>
</html>