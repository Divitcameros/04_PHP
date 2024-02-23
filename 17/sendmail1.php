<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

// 送信元(GmailのSMTPサーバ)の設定
$transport = new Swift_SmtpTransport(
  'smtp.gmail.com', 587, 'tls'
);
// 差出人の認証に使用する資格情報(SMTP Credentials)を指定
$transport->setUsername('hanma.oioioi@gmail.com'); // 自身のGmailに変更
// Googleのアプリパスワードを添付
$transport->setPassword('phltzfrvldhrddvw'); // 自身のアプリパスワードを添付
// サーバリソースを設定したメール送信のインスタンスを生成
$mailer = new Swift_Mailer($transport);

// メールメッセージの作成
$message = new Swift_Message('よかったわ');
$message->setBody('各クラスが無くてメールを送信できないのかと思ったらメアド間違ってたわwww');
// メールの差出人
$message->setFrom(['hanma.oioioi@gmail.com']); // 自身のGmailに変更
// メールの送信先
$message->setTo(['hanma.oioioi@gmail.com']); // 自身のGmailに変更

// メール送信(成功時1失敗時0が返る)
echo $mailer->send($message);
?>