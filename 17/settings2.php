<?php

// メール送信の設定値
// Gmail送信の設定
const SMTP_HOST     = 'smtp.gmail.com';
const SMTP_PORT     = 587;
const SMTP_PROTOCOL = 'tls';
// グーグルのアカウントのGmailアドレス
const GMAIL_SITE    = 'hanma.oioioi@gmail.com';
// グーグルのアプリパスワード
const GMAIL_APPPASS = 'phltzfrvldhrddvw';
// 代替テキスト(送信元のGmail)の設定
const MAIL_FROM     = ['hanma.oioioi@gmail.com' => '公式サイト'];
// 複数の送信先の設定
const MAIL_TO       = [
  'hanma.oioioi@gmail.com'  => 'Web担当者様',
  'hanma.oioioi@gmail.com'  => 'Web管理者'
];
// メールタイトルの設定
const MAIL_TITLE    = 'お問い合わせありがとうございます。';