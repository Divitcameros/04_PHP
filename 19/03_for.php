<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>九九表</title>
    <meta name="description" content="九九の掛け算表ページ">
  </head>
  <body>
    <h1>九九表</h1>
    <table>
      <tr>
        <th></th>
        <?php for ($k = 1; $k < 10; $k++) :?>
          <th><?=$k?></th>
        <?php endfor; ?>
      </tr>
      <tr>
      <?php for ($j = 1; $j < 10; $j++) : ?>
        <th><?=$j?></th>
        <?php for ($i = 1; $i < 10; $i++) : ?>
          <td><?=$i * $j?></td>
          <?= $i % 10 == 9 ? '</tr><tr>' : '' ?>
        <?php endfor; ?>
      <?php endfor; ?>
      </tr>
    </table>
  </body>
</html>