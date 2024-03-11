<?php

// 配列を定義
$editors = [
  'VSCode'   => 'MicroSoft',
  'PhpStorm' => 'JetBrains',
  'Atom'     => 'GitHub',
  'Eclipse'  => 'IBM',
  'AEM'      => 'Adobe'
];

foreach ($editors as $key => $value) {
  echo $key . 'は' . $value . '社開発です。<br>';
}
