<?php

// 型の厳格化
declare(strict_types=1);

// SwiftMailerライブラリの読み込み
require_once(dirname(__FILE__) . '/vendor/autoload.php');
// 設定ファイルの読み込み
require_once(dirname(__FILE__) . '/mailEnv.php');
// バリデーション判定のクラスファイルの読み込み
require_once(dirname(__FILE__) . '/Validation.php');


// ラジオボタンの初期表示
$query = '質問';

// テキストボックス入力値の初期化
$name   = '';
$email  = '';
$detail = '';

// エラーメッセージの初期化
$error['name']   = '';
$error['email']  = '';
$error['detail'] = '';


// バリデーションのインスタンス生成
$v = new Validation();

// フォーム画面の初期化
$result = 0;

if (!empty($_POST)) {
  // フォーム入力値の取得
  $query  = $_POST['query'];
  $name   = $_POST['name'];
  $email  = $_POST['email'];
  $detail = $_POST['detail'];

  // バリデーション判定処理結果を配列に代入
  $error['name']   = $v->validName($name);
  $error['email']  = $v->validEmail($email);
  $error['detail'] = $v->validDetail($detail);

}

// フォームから取得した値を配列にまとめる
// メール本文を取得するユーザ関数setMailBodyに複数の値を渡すための設定
$messageArr = [
  'query'  => $query,
  'name'   => $name,
  'email'  => $email,
  'detail' => $detail
];

// 全てのエラーメッセージが表示されない場合
if (!isset($error['name']) && !isset($error['email']) && !isset($error['detail'])) {

  // 送信元(GmailのSMTPサーバ)の設定
  $transport = new Swift_SmtpTransport(
    SMTP_HOST,
    SMTP_PORT,
    SMTP_PROTOCOL
  );

  // 差出人の認証に使用する資格情報(SMTP Credentials)を指定
  $transport->setUsername(GMAIL_SITE);

  // Googleのアプリパスワードを添付
  $transport->setPassword(GMAIL_APPPASS);

  // サーバリソースを設定したメール送信のインスタンスを生成
  $mailer = new Swift_Mailer($transport);

  // メールメッセージのインスタンスを生成
  $message = new Swift_Message(MAIL_TITLE);

  // メールの差出人を指定
  $message->setFrom(MAIL_FROM);

  // メールの送信先を指定
  $message->setTo(setUserMail($email, $name));

  // メール本文にヒアドキュメントの内容を指定(HTMLタグを使用する)
  $message->setBody(setMailBody($message, $messageArr), 'text/html');

  // メール送信
  $result = $mailer->send($message);
}

/**
 * XSS対策の焼灼表記
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
  <title>お問い合わせフォーム</title>
  <meta name="description" content="お問い合わせフォームと返信メールの確認です">
  <style>
    th,
    td {
      border-bottom: 1px dotted #ccc;
      padding: 10px;
    }

    th {
      vertical-align: top;
      text-align: left;
    }

    td {
      padding-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="submit"],
    textarea {
      width: 400px;
      padding: 10px;
    }

    .error {
      font-weight: bold;
      color: #f00;
      font-size: 12px;
    }

    .error:before {
      content: "※ ";
    }
  </style>
</head>

<body>
  <?php if ($result == 2) : ?>
    <h1>お問い合わせフォーム</h1>
    <h2>お問い合わせありがとうございました。</h2>
    <p><a href="contactform2.php">フォームに戻る</a></p>
  <?php else : ?>
    <h1>お問い合わせフォーム</h1>
    <p>質問項目を選択し、送信ボタンを押してください</p>
    <form action="" method="post">
      <table>
        <tr>
          <th>質問内容</th>
          <td>
            <input type="radio" name="query" value="質問" <?= $query === '質問' ? 'checked' : '' ?>>質問
            <input type="radio" name="query" value="要望" <?= $query === '要望' ? 'checked' : '' ?>>要望
          </td>
        </tr>
        <tr>
          <th>お名前</th>
          <td>
            <input type="text" name="name" value="<?= h($name) ?>">
            <?php if (!empty($error['name'])) : ?>
              <span class="error"><?= $error['name'] ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <input type="email" name="email" value="<?= h($email) ?>">
            <?php if (!empty($error['email'])) : ?>
              <span class="error"><?= $error['email'] ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>お問い合わせ</th>
          <td>
            <textarea name="detail" value="<?= h($detail) ?>"></textarea>
            <?php if (!empty($error['detail'])) : ?>
              <span class="error"><?= $error['detail'] ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th></th>
          <td><input type="submit" value="送信"></td>
        </tr>
      </table>
    </form>
  <?php endif; ?>
</body>

</html>