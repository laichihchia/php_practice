<?php
$ar = [];
for ($i=0; $i < 10; $i++) { 
    $ar[] = rand(1,99);
}
print_r($ar);
echo '<br>';
foreach($ar as $v){   // $v 此為等號設定 也可改成參照 &$v,
    echo "$v<br>";
}
?>