<?php
/**
 * 引数にファイル名を受けて、3桁の連番付きの文字列を返す
 *
 * @param string|null $file_name
 * @return string|null
 */
function serialNum(?string $file_name): ?string
{
  // アーリーリターン
  if (empty($file_name)) return null;
  // 連番用のファイルを読み込み値を取得
  $serial = file_get_contents('num.dat');
  // 連番用のファイルの値を書き換える処理
  file_put_contents('num.dat', $serial += 1);
  // ファイル名に3桁の連番を付与して文字列で返す
  return sprintf('%03d', $serial) . '_' . $file_name;
}

/**
 * JSONの書き込み
 * 引数は文字列型である必要がありそう
 *
 * @param string|null $num
 * @param string|null $size
 * @return void
 */
function jsonWrite(?string $num, ?string $size)
{
  $obj = '{ "num": '. $num . ',  "size": ' . $size . '}';
  $data = json_decode($obj, true);    // 連想配列で取得
  $json = fopen('data.json', 'w+b'); // 新規作成し読み書き状態
  fwrite($json, json_encode($data)); // JSONに配列形式で保存
  fclose($json);
}

/**
 * JSONの読み込み
 *
 * @return void
 */
function jsonRead()
{
  $json = file_get_contents('data.json'); // JSONを取得
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN'); // UTF8に変換
  $arr = json_decode($json,true); // 連想配列で取得
  return $arr;
}