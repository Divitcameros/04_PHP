<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';
require_once dirname(__FILE__) . '/settings.php';

$transport = new Swift_SmtpTransport(
  SMTP_HOST, SMTP_PORT, SMTP_PROTOCOL
);
$transport->setUsername(GMAIL_SITE);
$transport->setPassword(GMAIL_APPPASS);
$mailer = new Swift_Mailer($transport);

$message = new Swift_Message(MAIL_TITLE);
$message->setFrom(MAIL_FROM);
$message->setTo(MAIL_TO);

// ヒアドキュメント
$mailBody = <<<EOT
<h2>テキスト</h2>
<p>本文</p>
<!-- 画像の埋め込み -->
<img src="{$message->embed(Swift_Image::fromPath('logo.png'))}">
EOT;
// 添付ファイル
$message->attach(Swift_Attachment::fromPath('logo.png'));
// メール本文にHTMLタグを使用
$message->setBody($mailBody, 'text/html');

echo $mailer->send($message);
?>