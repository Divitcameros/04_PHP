<?php

// 型の厳格化
declare(strict_types=1);

// SwiftMailerライブラリの読み込み
require_once(dirname(__FILE__) . '/vendor/autoload.php');
// 設定ファイルの読み込み
require_once(dirname(__FILE__) . '/settings2.php');

// ラジオボタンの初期表示
$query = '質問';

// テキストボックス入力値の初期化
$name   = '';
$email  = '';
$detail = '';

// バリデーションの初期化
$isValidated = false;

// フォーム画面の初期化
$result = 0;

if (!empty($_POST)) {
  $query  = $_POST['query'];
  $name   = $_POST['name'];
  $email  = $_POST['email'];
  $detail = $_POST['detail'];

  // フラグを立てる
  $isValidated = true;

  // 名前の空白判定
  if ($name === '' || preg_match('/^(\s|　)+$/u', $name)) {
    $nameError   = 'お名前を入力してください';
    $isValidated = false;
  }

  // emailの空白判定
  if ($email === '' || preg_match('/^(\s|　)+$/u', $name)) {
    $emailError  = 'メールを入力してください';
    $isValidated = false;

    // emailの入力判定
  } elseif ($email != filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailError  = '正しいメールを入力してください';
    $isValidated = false;
  }

  // お問い合わせの空白判定
  if ($detail === '' || preg_match('/^(\s|　)+$/u', $detail)) {
    $detailError = 'お問い合わせを入力してください';
    $isValidated = false;
  }
}

// フラグがtrueの場合
if ($isValidated === true) {

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
  $message->setTo([
    'hanma.oioioi@gmail.com' => 'web担当者様',
    $email                   => 'お客様'
  ]);


  // ヒアドキュメントの設定
  $mailBody = <<<EOT

  <!-- ロゴ画像の添付 -->
  <img src="{$message->embed(Swift_Image::fromPath('logo.png'))}">

  <!-- メールの見出し -->
  <h2>お問い合わせありがとうございます</h2>

  <!-- メール本文 -->
  <p>この度はお問い合わせいただき誠にありがとうございました。<br>送信内容を以下の内容で承りました。</p>
  ----------------------------
  <p>質問内容：{$query}</p>
  <p>お名前：{$name}</p>
  <p>メールアドレス：{$email}</p>
  <p>お問い合わせ：{$detail}</p>
  ----------------------------
  EOT;

  // メール本文にヒアドキュメントの内容を指定(HTMLタグを使用する)
  $message->setBody($mailBody, 'text/html');

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
    <p><a href="contactform1.php">フォームに戻る</a></p>
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
            <?php if (isset($nameError)) : ?>
              <span class="error"><?= $nameError ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <input type="email" name="email" value="<?= h($email) ?>">
            <?php if (isset($emailError)) : ?>
              <span class="error"><?= $emailError ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>お問い合わせ</th>
          <td>
            <textarea name="detail" value="<?= h($detail) ?>"></textarea>
            <?php if (isset($detailError)) : ?>
              <span class="error"><?= $detailError ?></span>
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