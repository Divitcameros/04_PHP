<?php
$arr      = [10, 20, 5 => 50];
$arr[3]   = 30;
$arr[]    = '10';
$arr[]    = '20';
$arr[5]   = '30';
unset($arr[7]);
$arr['4'] = 10;
$arr[]    = [...[40]];

echo '結果の予測' . '<br>',
     '0   => 10'. '<br>',
     '1   => 20'. '<br>',
     '5   => 50'. '<br>', //5 => 30
     '3   => 30'. '<br>',
     '4   => \'10\''. '<br>', //6 => 10 おそらく先に5が出てるから4は飛ばされて6になっている
     '5   => \'20\''. '<br>', //7 (削除)
     '[4] => 10'. '<br>',
     'array'; //8 => array (0 => 40)

echo '<pre>';
print_r($arr);
echo '</pre>';
?>