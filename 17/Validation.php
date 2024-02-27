<?php

/**
 * フォームの入力判定クラスの定義
 */
class Validation
{

  /**
   * 氏名の空白判定
   *
   * @param string|null $name
   * @return string|null
   */
  public function validName(?string $name): ?string
  {
    if ($name === '' || preg_match('/^(\s|　)+$/u', $name)) {
      return '氏名を入力してください';
    } else {
      return null;
    }
  }
  
  /**
   * フリガナの空白と入力形式の判定
   *
   * @param string|null $kana
   * @return string|null
   */
  public function validKana(?string $kana): ?string
  {
    if ($kana === '' || preg_match('/^(\s|　)+$/u', $kana)) {
      return 'フリガナを入力してください';
    } elseif (!preg_match('/^([ア-ヶー])+$/u', $kana)) {
      return 'フリガナの形式が正しくありません';
    } else {
      return null;
    }
  }

  /**
   * 電話番号の空白と入力形式の判定
   *
   * @param string|null $phone
   * @return string|null
   */
  public function validPhone(?string $phone): ?string
  {
    if ($phone === '' || preg_match('/^(\s|　)+$/u', $phone)) {
      return '電話番号を入力してください';
    } elseif (!preg_match('/^0\d{9,10}$/', $phone)) {
      return '電話番号の形式が正しくありません';
    } else {
      return null;
    }
  }

  /**
   * Emailの空白と入力判定
   * スタッフ宛ての送信の禁止 array_key()[]
   * @param string|null $email
   * @return string|null
   */
  public function validEmail(?string $email): ?string
  {
    if ($email === '' || preg_match('/^(\s|　)+$/u', $email)) {
      return 'メールを入力してください';
    } elseif ($email != filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return '正しいメールを入力してください';
    } elseif ($email === array_keys(MAIL_FROM, '公式サイト')[0]){
      return 'そのメールアドレスは入力できません';
    } else {
      return null;
    }
  }
  
  /**
   * お問い合わせの空白判定
   *
   * @param string|null $detail
   * @return string|null
   */
  public function validDetail(?string $detail): ?string
  {
    if ($detail === '' || preg_match('/^(\s|　)+$/u', $detail)) {
      return 'お問い合わせを入力してください';
    } else {
      return null;
    }
  }
}