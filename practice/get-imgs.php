<?php

$ar = ['https://im.marieclaire.com.tw/m800c533h100b0/assets/mc/202105/609BC5FEC4BEB1620821502.jpeg'];







foreach($ar as $url){
    $file_name = './imgs/'.basename($url);
    
    // 如果存檔失敗列出檔名
    if(!file_put_contents($file_name,file_get_contents($url))){
        echo basename($url).'<br>';
    };
}
echo '完成';