<?php
$output = [];
$ar1 = [
    "name" => "David",
    "age" => 25,
];
$ar2 = $ar1; // 設定值
$ar3 = &$ar1; // 設定 位址(參照) 
$ar1['name'] = "Bob";
$output['ar1'] = $ar1;
$output['ar2'] = $ar2;
$output['ar3'] = $ar3;

// & 位址設定 不僅限於 array
$a = 10;
$b = &$a;
$a = 20;
$output['b'] = $b;
echo json_encode($output);

?>