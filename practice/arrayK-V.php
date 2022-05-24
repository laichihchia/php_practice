<?php


$ar = [
    'name' => 'Nathan',
    'age' => 30,
    'data' => [2,4,6],
];

// is_array 回傳boolean , implode 相當於 js 的 join
foreach($ar as $k => $v){
    if(is_array($v)) $v = implode(',',$v);
    echo "$k : $v<br>";
};

?>