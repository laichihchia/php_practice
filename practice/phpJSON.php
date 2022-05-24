<?php

$ar = [
    'name' => '王小明',
    'age' => 30,
    'data' => [2,4,6],
];
echo json_encode($ar).'<br>';
echo json_encode($ar,JSON_UNESCAPED_UNICODE);


?>