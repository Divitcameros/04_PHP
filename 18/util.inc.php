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
?>