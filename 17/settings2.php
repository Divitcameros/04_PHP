<?php
const SMTP_HOST     = 'smtp.gmail.com';
const SMTP_PORT     = 587;
const SMTP_PROTOCOL = 'tls';
const GMAIL_SITE    = 'hanma.oioioi@gmail.com';
const GMAIL_APPPASS = 'phltzfrvldhrddvw';
// 代替テキスト(送信元のGmailでOK)
const MAIL_FROM     = ['hanma.oioioi@gmail.com' => 'テスト送信者'];
// 複数の送信先の設定
const MAIL_TO       = [
  'hanma.oioioi@gmail.com'  => 'Web担当者様',
  'hanma.oioioi@gmail.com'  => 'Web管理者'
];
const MAIL_TITLE    = 'タイトル';